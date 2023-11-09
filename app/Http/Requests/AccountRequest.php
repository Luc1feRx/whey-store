<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccountRequest extends FormRequest
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
            'email' => 'required|max:255|email|unique:admins,email,' . $this->route('id'),
            'name' => 'required|max:255|unique:admins,name,' . $this->route('id'),
            'phone' => 'required|max:255|unique:admins,phone,' . $this->route('id'),
            'address' => 'required|max:255',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ];
        return $rules;
    }

    public function messages()
    {
        $messages = array(
            'name.required' => "Tên tài khoản không được để trống",
            'name.max' => "Tên tài khoản không quá 255 ký tự",
            'name.unique' => "Tên tài khoản không được trùng nhau",
            'email.required' => "Email không được để trống",
            'email.max' => "Email không quá 255 ký tự",
            'email.email' => "Nhập đúng định dạng email",
            'email.unique' => "Email không được trùng nhau",
            'phone.required' => "SĐT không được để trống",
            'phone.max' => "SĐT không quá 255 ký tự",
            'phone.unique' => "SĐT không được trùng nhau",
            'address.required' => "Địa chỉ không được để trống",
            'address.max' => "Địa chỉ không quá 255 ký tự",
            'thumbnail.image' => "Tệp upload phải là ảnh",
            'thumbnail.mimes' => "Tệp đúng định dạng jpeg,png,jpg,gif",
            'thumbnail.max' => "Kích thước ảnh không quá 2mb"
        );
        return $messages;
    }
}
