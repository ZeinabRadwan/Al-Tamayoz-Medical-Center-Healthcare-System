<?php

namespace App\Http\Controllers;

use App\Models\Billing;
use App\Models\Clinic;
use App\Models\Service;
use App\Models\User;
use App\Models\Patients;
use App\Services\Zatca\Zatca;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Str;
use App\Services\Zatca\GenerateXmlFile;

class BillingController extends Controller
{
    private $zatca;

    public function __construct()
    {
        $this->zatca = new Zatca();
    }

    public function create()
    {
        $services = Service::all();
        $clinics = Clinic::all();
        $doctors = User::all();
        $patients = Patients::all();

        return view('billing.create', compact('services', 'clinics', 'doctors', 'patients'));
    }

    public function store(Request $request)
    {

        try {
            $validated = $request->validate([
                'patient_id' => 'required|exists:patients,id',
                'doctor_id' => 'required|exists:users,id',
                'doctor_id2' => 'nullable|exists:users,id',
                'doctor_id3' => 'nullable|exists:users,id',
                'doctor_id4' => 'nullable|exists:users,id',
                'clinic_services' => 'required|array',
                'clinic_services.*.type' => 'required|in:service,clinic',
                'clinic_services.*.service_id' => 'nullable|exists:services,id',
                'clinic_services.*.clinic_id' => 'nullable|exists:clinics,id',
                'clinic_services.*.price' => 'required|numeric|min:0',
                'clinic_services.*.quantity' => 'required|integer|min:0',
                'clinic_services.*.discount' => 'nullable|numeric',
                'clinic_services.*.discount_amount' => 'nullable|numeric',
                'clinic_services.*.tax' => 'nullable|numeric',
                'total_amount' => 'required|numeric|min:0',  // allow zero here
                'payments' => 'required|array',
                'payments.*.method' => 'required|in:cash,bank_card,mada,transfer,insurance',
                'payments.*.amount' => 'required|numeric|min:0',
                'paid_amount' => 'required|numeric|min:0',
            ]);

            $billing = Billing::create([
                'patient_id' => $validated['patient_id'],
                'doctor_id' => $validated['doctor_id'],
                'doctor_id2' => $validated['doctor_id2'] ?? null,
                'doctor_id3' => $validated['doctor_id3'] ?? null,
                'doctor_id4' => $validated['doctor_id4'] ?? null,
                'clinic_services' => $validated['clinic_services'],
                'total_amount' => $validated['total_amount'],
                'payments' => $validated['payments'],
                'uuid' => Str::uuid(),
                'paid_amount' => $validated['paid_amount'],
            ]);

            $this->reportBilling($billing);

            return redirect()->route('billing.view', ['id' => $billing->id])
                ->with('success', 'تم إنشاء الفاتورة بنجاح');

        } catch (\Exception $e) {
            Log::error('Billing Creation Failed:', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return redirect()->back()->with('error', 'فشل إنشاء الفاتورة');
        }
    }

    public function index(Request $request)
    {
        $search = $request->get('search');
        $perPage = $request->get('perPage', 5);
        $fromDate = $request->get('from_date');
        $toDate = $request->get('to_date');

        $bills = Billing::with(['patient', 'doctor'])
            ->when($search, function ($query) use ($search) {
                return $query->where('id', 'like', "%{$search}%")
                    ->orWhereHas('patient', function ($q) use ($search) {
                        $q->where('name', 'like', "%{$search}%");
                    });
            })
            ->when($fromDate, function ($query) use ($fromDate) {
                return $query->whereDate('created_at', '>=', $fromDate);
            })
            ->when($toDate, function ($query) use ($toDate) {
                return $query->whereDate('created_at', '<=', $toDate);
            })
            ->orderBy('created_at', 'desc')
            ->paginate($perPage);

        $totalBills = Billing::count();

        $paymentMethods = [
            'cash' => Billing::where('payment_method', 'cash')->count(),
            'credit_card' => Billing::where('payment_method', 'credit_card')->count(),
            'mada' => Billing::where('payment_method', 'mada')->count(),
            'transfer' => Billing::where('payment_method', 'transfer')->count(),
            'insurance' => Billing::where('payment_method', 'insurance')->count(),
        ];

        return view('billing.index', compact('bills', 'totalBills', 'paymentMethods'));
    }

    public function show($id)
    {
        $bill = Billing::findOrFail($id);
        $generatedString = '';
        if ($bill->qr)
            $generatedString = Zatca::renderQrCode($bill->qr);

        return view('billing.show', compact('bill', 'generatedString'));
    }

    public function markAsReturned($id)
    {
        $bill = Billing::query()
            ->findOrFail($id);

        if ($bill->is_returned) {
            return redirect()->back()->with('info', 'هذه الفاتورة مسترجعة بالفعل.');
        }

        DB::beginTransaction();

        try {
            $bill->update(['is_returned' => true]);
            $newData = $bill->only([
                'patient_id', 'doctor_id', 'doctor_id2', 'doctor_id3', 'doctor_id4',
                'clinic_services', 'total_amount', 'payments', 'paid_amount'
            ]);
            $newData['returned_id'] = $bill->id;
            $newData['type_code'] = 381;
            $newData['uuid'] = (string) Str::uuid();
            $billingReturn = Billing::create($newData);
            DB::commit();
            $this->reportBilling($billingReturn);
            return redirect()->back()->with('success', 'تم إنشاء فاتورة الاسترجاع بنجاح.');

        } catch (\Throwable $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'حدث خطأ أثناء إنشاء فاتورة الاسترجاع: ' . $e->getMessage());
        }
    }

    private function reportBilling(Billing $billing)
    {
        try {
            $xml = (new GenerateXmlFile())->loadXmlFile($billing->refresh());
            $response = $this->zatca->reporting_invoice($xml);
            if ($response->successful()) {
                $dom = new \DOMDocument();
                $dom->loadXML(base64_decode($xml['invoice']));
                $qr = $dom->getElementsByTagName('EmbeddedDocumentBinaryObject')->item(1)->textContent;
                $hash = $xml['invoiceHash'];
                $billing->update(['qr' => $qr, 'hash' => $hash, 'zatca_status' => 1, 'zatca_errors' => null]);
            } else {
                $errors = $response->json()['validationResults']['errorMessages'] ?? 'worrying';
                $billing->update(['zatca_errors' => ['errors' => $errors]]);
            }
        } catch (\Exception $e) {
            $billing->update(['zatca_errors' => ['errors' => $e->getMessage()]]);
        }
    }

}
