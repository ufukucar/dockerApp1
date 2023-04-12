<?php

/** 1 ID'li kategoriden iki veya daha fazla ürün satın alındığında, en ucuz ürüne %20 indirim yapılır. */

namespace App\Classes\Discounts\fromInterface;

use App\Classes\Interfaces\IDiscountStrategies;

class En_ucuz_yuzde_yirmi implements  IDiscountStrategies
{

    private $categoryId = 1;
    private $discounts = [];
    private $cheapest = [];

    function calculateDiscount($order, $total)
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

        // En küçüğüne %20 uygula
        $discountAmount = number_format( $orderedArr[0]["total"] * 0.2, 2);
        $orderedArr[0]["total"] -=  number_format( $orderedArr[0]["total"] * 0.2, 2);

        $subtotal = 0;
        foreach ($orderedArr as $item ) {
            $subtotal += $item["total"];
        }

        $this->discounts []= [
            'discountReason' => "20_PERCENT_CHEAPEST_ONE",
            'discountAmount' => $discountAmount,
            //'subtotal' => $subtotal + $total,
            'subtotal' => number_format((float) $subtotal + (float) $total, 2, ',', '')


        ];


        return $this->discounts;

    }
}

