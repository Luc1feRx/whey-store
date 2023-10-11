<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'name_category' => 'required|max:255|unique:categories,name_category,' . $this->route('id'),
            'slug_category' => 'required|max:255|unique:categories,slug_category,' . $this->route('id'),
            'parent_id' => 'nullable|sometimes|exists:categories,id',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
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
            'name_category.required' => "Tên danh mục không được để trống",
            'name_category.max' => "Tên danh mục không quá 255 ký tự",
            'name_category.unique' => "Tên danh mục không được trùng nhau",
            'slug_category.required' => "Tên slug không được để trống",
            'slug_category.max' => "Tên slug không quá 255 ký tự",
            'slug_category.unique' => "Tên slug không được trùng nhau",
            'parent_id.exists' => "Vui lòng chọn đúng danh mục cha",
            'thumbnail.required' => "Vui lòng chọn ảnh",
            'thumbnail.image' => "Tệp upload phải là ảnh",
            'thumbnail.mimes' => "Tệp đúng định dạng jpeg,png,jpg,gif",
            'thumbnail.max' => "Kích thước ảnh không quá 2mb"
        );
        return $messages;
    }
}
