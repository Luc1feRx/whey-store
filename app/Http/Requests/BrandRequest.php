<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
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
            'name' => 'required|max:255|unique:brands,name,' . $this->route('id'),
            'slug' => 'required|max:255|unique:brands,slug,' . $this->route('id'),
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
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
            'name.required' => "Tên thương hiệu không được để trống",
            'name.max' => "Tên thương hiệu không quá 255 ký tự",
            'name.unique' => "Tên thương hiệu không được trùng nhau",
            'slug.required' => "Tên slug không được để trống",
            'slug.max' => "Tên slug không quá 255 ký tự",
            'slug.unique' => "Tên slug không được trùng nhau",
            'thumbnail.image' => "Tệp upload phải là ảnh",
            'thumbnail.mimes' => "Tệp đúng định dạng jpeg,png,jpg,gif",
            'thumbnail.max' => "Kích thước ảnh không quá 2mb"
        );
        return $messages;
    }
}
