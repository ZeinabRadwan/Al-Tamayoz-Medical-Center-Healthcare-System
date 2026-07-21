<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\IntegrationServiceResource;
use App\Models\Clinic;
use App\Models\Department;
use App\Models\Service;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class IntegrationController extends Controller
{
    public function services(Request $request): JsonResponse
    {
        $normalizedServices = $this->buildServicesCollection($request);

        if ($request->boolean('paginate')) {
            $perPage = max((int) $request->integer('per_page', 15), 1);
            $currentPage = max((int) $request->integer('page', 1), 1);
            $offset = ($currentPage - 1) * $perPage;

            $paginator = new LengthAwarePaginator(
                $normalizedServices->slice($offset, $perPage)->values(),
                $normalizedServices->count(),
                $perPage,
                $currentPage,
                [
                    'path' => $request->url(),
                    'query' => $request->query(),
                ]
            );

            return response()->json([
                'success' => true,
                'data' => IntegrationServiceResource::collection(collect($paginator->items()))->resolve(),
                'meta' => [
                    'current_page' => $paginator->currentPage(),
                    'last_page' => $paginator->lastPage(),
                    'per_page' => $paginator->perPage(),
                    'total' => $paginator->total(),
                ],
            ], 200);
        }

        return response()->json([
            'success' => true,
            'data' => IntegrationServiceResource::collection($normalizedServices)->resolve(),
        ], 200);
    }

    private function buildServicesCollection(Request $request): Collection
    {
        $vendorName = config('app.name') ?: 'Healthcare Center';

        $activeFilter = $request->has('active')
            ? $this->parseBooleanFilter($request->query('active'))
            : true;
        $availableFilter = $request->has('available')
            ? $this->parseBooleanFilter($request->query('available'))
            : null;
        $categoryFilter = $request->string('category')->lower()->value();
        $search = trim((string) $request->query('search', ''));

        $departments = Department::query()
            ->orderBy('name')
            ->get()
            ->map(fn (Department $department) => (object) $this->transformDepartment($department, $vendorName));

        $clinics = Clinic::query()
            ->with('department')
            ->withCount([
                'appointments as available_appointments_count' => fn ($query) => $query->where('is_booked', false),
            ])
            ->orderBy('name')
            ->get()
            ->map(fn (Clinic $clinic) => (object) $this->transformClinic($clinic, $vendorName));

        $services = Service::query()
            ->with('department')
            ->orderBy('name')
            ->get()
            ->map(fn (Service $service) => (object) $this->transformService($service, $vendorName));

        return $departments
            ->concat($clinics)
            ->concat($services)
            ->filter(function (object $item) use ($activeFilter, $availableFilter, $categoryFilter, $search) {
                if (! is_null($activeFilter) && $item->active !== $activeFilter) {
                    return false;
                }

                if (! is_null($availableFilter) && $item->available !== $availableFilter) {
                    return false;
                }

                if ($categoryFilter && strtolower($item->category) !== $categoryFilter) {
                    return false;
                }

                if ($search !== '') {
                    $haystack = strtolower(implode(' ', array_filter([
                        $item->sku,
                        $item->name_en,
                        $item->name_ar,
                        $item->category,
                    ])));

                    return str_contains($haystack, strtolower($search));
                }

                return true;
            })
            ->values();
    }

    private function transformDepartment(Department $department, string $vendorName): array
    {
        $name = $department->name;
        $active = $this->resolveActiveStatus($department);

        return [
            'sku' => $department->code ?: sprintf('DEP-%04d', $department->id),
            'name_en' => $department->name_en ?: $name,
            'name_ar' => $department->name_ar ?: $name,
            'category' => 'Department',
            'price' => $this->normalizePrice($department->price),
            'price_after_discount' => $this->normalizePrice($department->discount_price ?? $department->price),
            'offer' => $department->offer_name,
            'vendor_name' => $vendorName,
            'available' => $active,
            'key_advantage_en' => $department->description_en ?: $name,
            'key_advantage_ar' => $department->description_ar ?: $name,
            'active' => $active,
            'image_id' => $department->image_id,
        ];
    }

    private function transformClinic(Clinic $clinic, string $vendorName): array
    {
        $name = $clinic->name;
        $active = $this->resolveActiveStatus($clinic);

        return [
            'sku' => $clinic->code ?: sprintf('CLN-%04d', $clinic->id),
            'name_en' => $clinic->name_en ?: $name,
            'name_ar' => $clinic->name_ar ?: $name,
            'category' => 'Clinic',
            'price' => $this->normalizePrice($clinic->price ?? $clinic->visit_price),
            'price_after_discount' => $this->normalizePrice($clinic->discount_price ?? $clinic->visit_price),
            'offer' => $clinic->offer_name,
            'vendor_name' => $vendorName,
            'available' => $active && (($clinic->available_appointments_count ?? 0) > 0 || ! isset($clinic->available_appointments_count)),
            'key_advantage_en' => $clinic->description_en ?: $clinic->department?->name ?: $name,
            'key_advantage_ar' => $clinic->description_ar ?: $clinic->department?->name ?: $name,
            'active' => $active,
            'image_id' => $clinic->image_id,
        ];
    }

    private function transformService(Service $service, string $vendorName): array
    {
        $name = $service->name;
        $active = $this->resolveActiveStatus($service);

        return [
            'sku' => $service->code ?: sprintf('%s-%04d', $this->serviceSkuPrefix($service), $service->id),
            'name_en' => $service->name_en ?: $name,
            'name_ar' => $service->name_ar ?: $name,
            'category' => $this->resolveServiceCategory($service),
            'price' => $this->normalizePrice($service->price),
            'price_after_discount' => $this->normalizePrice($service->discount_price ?? $service->price),
            'offer' => $service->offer_name,
            'vendor_name' => $vendorName,
            'available' => $active,
            'key_advantage_en' => $service->description_en ?: $service->department?->name ?: $name,
            'key_advantage_ar' => $service->description_ar ?: $service->department?->name ?: $name,
            'active' => $active,
            'image_id' => $service->image_id,
        ];
    }

    private function resolveActiveStatus(object $model): bool
    {
        foreach (['active', 'is_active', 'status'] as $attribute) {
            if (! isset($model->{$attribute})) {
                continue;
            }

            $value = $model->{$attribute};

            if ($attribute === 'status') {
                return in_array($value, ['active', 'available', 'enabled', 1, '1'], true);
            }

            return (bool) $value;
        }

        return true;
    }

    private function parseBooleanFilter(mixed $value, ?bool $default = null): ?bool
    {
        $parsed = filter_var($value, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);

        return $parsed ?? $default;
    }

    private function normalizePrice(mixed $price): float|int
    {
        return $price === null ? 0 : (float) $price;
    }

    private function resolveServiceCategory(Service $service): string
    {
        $departmentName = strtolower((string) $service->department?->name);
        $serviceName = strtolower((string) $service->name);
        $context = $departmentName.' '.$serviceName;

        if (str_contains($context, 'lab') || str_contains($context, 'laboratory') || str_contains($context, 'مختبر')) {
            return 'Laboratory';
        }

        if (str_contains($context, 'radio') || str_contains($context, 'x-ray') || str_contains($context, 'scan') || str_contains($context, 'أشعة')) {
            return 'Radiology';
        }

        if (str_contains($context, 'package') || str_contains($context, 'bundle') || str_contains($context, 'باقة')) {
            return 'Package';
        }

        return 'Procedure';
    }

    private function serviceSkuPrefix(Service $service): string
    {
        return match ($this->resolveServiceCategory($service)) {
            'Laboratory' => 'LAB',
            'Radiology' => 'RAD',
            'Package' => 'PKG',
            default => 'PRC',
        };
    }
}
