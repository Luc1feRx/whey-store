<?php

namespace App\Http\Requests;

use App\Models\ProductFlavor;
use Illuminate\Foundation\Http\FormRequest;

class ExportGoodRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'quantity' => [
                'required',
                function ($attribute, $value, $fail) {
                    $productId = $this->input('product_id');
                    $flavorId = $this->input('flavor_id');

                    $flavor = ProductFlavor::where('product_id', $productId)
                        ->where('flavor_id', $flavorId)
                        ->first();

                    if ($flavor) {
                        $remainingQuantity = $flavor->quantity - $value;

                        if ($remainingQuantity < 0) {
                            $fail('Số lượng nhập vào vượt quá số lượng có sẵn.');
                        }
                    }
                },
            ],
        ];
    }

    public function messages()
    {
        return [
            'quantity.required' => 'Trường số lượng là bắt buộc.',
        ];
    }
}
