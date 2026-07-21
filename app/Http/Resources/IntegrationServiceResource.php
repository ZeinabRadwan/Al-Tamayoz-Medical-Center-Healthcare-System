<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class IntegrationServiceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'sku' => $this->sku,
            'name_en' => $this->name_en,
            'name_ar' => $this->name_ar,
            'unit' => 'Service',
            'category' => $this->category,
            'price' => $this->price,
            'price_after_discount' => $this->price_after_discount,
            'offer' => $this->offer,
            'vendor_name' => $this->vendor_name,
            'stock' => null,
            'available' => (bool) $this->available,
            'key_advantage_en' => $this->key_advantage_en,
            'key_advantage_ar' => $this->key_advantage_ar,
            'warranty_duration' => null,
            'active' => (bool) $this->active,
            'image_id' => $this->image_id,
        ];
    }
}
