<?php

/** 1 ID'li kategoriden iki veya daha fazla ürün satın alındığında, en ucuz ürüne %20 indirim yapılır. */

namespace App\Classes\Discounts;
use App\Classes\Abstracts\DiscountAbstract;

class En_ucuz_yuzde_yirmi extends DiscountAbstract
{

    private $categoryId = 1;
    private $discounts = [];
    private $cheapest = [];

    function calculateDiscount($order)
    {

        foreach ($order->ordered_items as $item) {

            if ($item->product['categoryId'] == $this->categoryId && $item->quantity >= 2) {

                $this->cheapest[] = [
                    'id' => $item->id,
                    'unitPrice' => $item->product['unitPrice'],
                    'quantity' => $item->quantity,
                    'total' => $item->total
                ];
            }
        }


        /** Küçükten büyüğe doğru sıralama */
        $arr = collect($this->cheapest);
        $orderedArr = $arr->sortBy('total')->values()->all();


        $this->discounts[] = [
            'discountReason' => "20_PERCENT_CHEAPEST_ONE",
            'discountAmount' => number_format((float) $orderedArr[0]["total"] * 0.2, 2),
            'subtotal' => number_format((float) $orderedArr[0]["total"] * 0.8, 2)
        ];

        return $this->discounts;

    }
}

