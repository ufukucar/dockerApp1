<?php

namespace App\Http\Resources\Back\Orders;

use App\Models\OrderedItem;
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
        $items = OrderedItem::where('orderId', $this->id)->get(['productId', 'quantity', 'unitPrice', 'total']);

        return [
            'id' => $this->id,
            'customerId' => $this->customerId,
            'orderNumber' => $this->order_number,
            'items' => $items,
            'total' => $this->total,
            //'status' => $this->status->toString($this->status),
            'status' => $this->status->name,
        ];
    }


}
