<?php

namespace App\Enums;

enum OrderStatusEnum: int
{

    case PENDING = 0;
    case PROCESSING = 1;
    case SHIPPED = 2;
    case DELIVERED = 3;
    case CANCELLED = 4;


    public function toString(): string
     {
         return match ($this) {

             self::PENDING => "Siparişiniz Beklemede",
             self::PROCESSING => "Siparişiniz İşleme Alındı",
             self::SHIPPED => "Siparişiniz Kargoya Verildi",
             self::DELIVERED => "Siparişiniz Teslim Edildi",
             self::CANCELLED => "Siparişiniz İptal Edildi",
             default => "Siparişiniz Beklemede, Default",
         };
     }




}
