<?php

namespace App\Http\Resources\Front\Orders;

use App\Models\OrderedItem;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        $items = OrderedItem::where('orderId', $this->id)->get(['productId', 'quantity', 'unitPrice', 'total']);

        return [
            'id' => $this->id,
            'customerId' => $this->customerId,
            'items' => $items,
            'total' => $this->total,
            'status' => $this->status->name,
        ];
    }


}
