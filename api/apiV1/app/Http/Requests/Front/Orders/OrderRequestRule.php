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
            'data.*.productId' => 'required|exists:products,id',
            'data.*.quantity' => 'required|integer|min:1',
        ];
    }

    // Hata mesajlarını Türkçeleştirmek istenir ise doldurulacak.
    public function messages(): array
    {
        return [
            'data.*.productId.required' => 'Bir ürün seçiniz!',
            'data.*.productId.exists' => 'Böyle bir ürün bulunmuyor!',
            'data.*.quantity.required' => 'Adet bilgisini giriniz!',
            'data.*.quantity.integer' => 'Adet bilgisi sayısal bir değer olmalıdır!',
            'data.*.quantity.min' => 'Bu üründen en az 1 adet seçmelisiniz!'
        ];
    }
}
