<?php

namespace App\Classes\Discounts\fromInterface;

use App\Classes\Interfaces\IDiscountStrategies;

class Buy_5_Get_1 implements IDiscountStrategies
{

    private $categoryId = 2;
    private $discounts = [];

    public function calculateDiscount($orders, $total)
    {

        foreach ($orders->ordered_items as $item ) {

            if ( $item->product['categoryId'] == $this->categoryId ) {

                $minusValue = floor($item->quantity / 6);

                $newQuantity = $item->quantity - $minusValue;

                $subtotal = number_format(  $newQuantity * $item->unitPrice, 2, ',', '');
                $discountAmount = number_format((float) ($minusValue * $item->unitPrice), 2);

                $this->discounts[] = [
                    'discountReason' => "BUY_5_GET_1",
                    'discountAmount' =>$discountAmount,
                    'subtotal' => $subtotal,
                ];

            }
        }

        return  $this->discounts;

    }

}
