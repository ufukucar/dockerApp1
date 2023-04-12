<?php

namespace App\Http\Services\Discounts;

use App\Classes\Discounts\fromInterface\DiscountContext;
use App\Classes\Discounts\fromInterface\Buy_5_Get_1;
use App\Classes\Discounts\fromInterface\En_ucuz_yuzde_yirmi;
use App\Classes\Discounts\fromInterface\TEN_PERCENT_OVER_1000;
use App\Classes\ProjectBaseClass;

class DiscountService extends ProjectBaseClass
{

    public function calculateDiscount($order) {

         /** Yeni Context Oluşturalım. İndirim için kullanılacak sınıfları buraya örnekleyeceğiz */
         $discountContext = new DiscountContext();

         /** Kullanılacak indirimler. Sayısı artabilir. */
         $discountContext->setDiscountType(new Buy_5_Get_1());
         $discountContext->setDiscountType(new En_ucuz_yuzde_yirmi());
         $discountContext->setDiscountType(new TEN_PERCENT_OVER_1000());

         // Boş değer dönerse filtreleyelim
         $discounts = collect($discountContext->calculateDiscountForOrder($order, $order->total))->filter()->values();

         /** Veriler data içinde geliyor, onları alıyoruz */
         $discountArray = [];
         foreach ( $discounts as $discount ) {
             $discountArray[] = collect($discount['data']);
         }

         // Toptalm discountAmount toplanıyor
         $totalDiscount =  collect($discountArray)->flatten(1)->reduce(function (?float $carry, $item) {
                 return isset($item['discountAmount']) ? $carry + $item['discountAmount'] : $carry;
         });

        return [
             'orderId' => $order->id,
             'discounts' => collect($discountArray)->flatten(1),
             'totalDiscount' => number_format((float) $totalDiscount, 2, ',', ''),
             'discountedTotal' => $discountArray[count($discountArray) - 1][0]["subtotal"]
        ];

    }




}
