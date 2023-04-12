<?php

namespace App\Http\Resources\Front\Products;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'name' => $this->name,
            'category' => $this->categoryId,
            //"category_detail" => $this->category->name,
            'price' => $this->unitPrice,
            'stock' => $this->stock
        ];
    }
}
