<?php

namespace App\Classes\Discounts\fromAbstract;

use App\Classes\Abstracts\DiscountAbstract;

class Buy_5_Get_1 extends DiscountAbstract
{

    private $categoryId = 2;
    private $discounts = [];

    public function calculateDiscount($order)
    {
        //return $order->ordered_items[0]->product['categoryId'];



        foreach ($order->ordered_items as $item ) {

            if ( $item->product['categoryId'] == $this->categoryId ) {

                $minusValue = floor($item->quantity / 6);

                $newQuantity = $item->quantity - $minusValue;

                $this->discounts[] = [
                    'discountReason' => "BUY_5_GET_1",
                    'discountAmount' => $minusValue * $item->unitPrice,
                    'subtotal' => number_format((float) $newQuantity * $item->unitPrice, 2)
                ];

            }
        }

        return $this->discounts;

    }

}
