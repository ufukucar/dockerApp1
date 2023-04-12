<?php

namespace App\Http\Resources\Front\Orders;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'customerId' => $this->customerId,
            'items' => 'items',
            'total' => "total",
            'success' => true,
        ];
    }

    public function with($request){
        return [
            'Sonuc'=> 'Veriler başarıyla getirildi',
        ];
    }
}
