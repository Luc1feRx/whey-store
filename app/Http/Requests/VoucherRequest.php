<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VoucherRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'name' => 'required|max:255|unique:vouchers,name,' . $this->route('id'),
            'voucher_sku' => 'required|max:20|unique:vouchers,voucher_sku,' . $this->route('id'),
            'quantity' => 'required|numeric',
            'min_purchase' => 'required',
            'reduced_amount' => 'required'
        ];
        return $rules;
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        $messages = array(
            'name.required' => "Tên mã giảm giá không được để trống",
            'name.max' => "Tên mã giảm giá không quá 255 ký tự",
            'name.unique' => "Tên mã giảm giá không được trùng nhau",
            'voucher_sku.required' => "Mã giảm giá không được để trống",
            'voucher_sku.max' => "Mã giảm giá không quá 20 ký tự",
            'voucher_sku.unique' => "Mã giảm giá không được trùng nhau",
            'quantity.required' => "Số lượng không được để trống",
            'quantity.numeric' => "Số lượng phải là chữ số",
            'reduced_amount.required' => "Vui lòng nhập số tiền giảm giá",
            'min_purchase.required' => "Vui lòng nhập điều kiện giảm giá",
        );
        return $messages;
    }
}
