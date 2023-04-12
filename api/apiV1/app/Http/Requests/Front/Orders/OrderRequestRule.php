<?php

namespace App\Http\Requests\Front\Orders;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequestRule extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'productId' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ];
    }

    // Hata mesajlarını Türkçeleştirmek istenir ise doldurulacak.
    public function messages()
    {
        return [
            'productId.required' => 'Bir ürün seçiniz!',
            'productId.exists' => 'Böyle bir ürün bulunmuyor!',
            'quantity.required' => 'Adet bilgisini giriniz!',
            'quantity.integer' => 'Adet bilgisi sayısal bir değer olmalıdır!',
            'quantity.min' => 'Bir üründen en az 1 adet seçmelisiniz!'
        ];
    }
}
