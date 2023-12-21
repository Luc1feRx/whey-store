<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' => 'required|max:255|unique:products,name,' . $this->route('id'),
            'slug' => 'required|max:255|unique:posts,slug,' . $this->route('id'),
            'short_description' => 'required|max:1000',
            'weight' => 'required|max:50',
            'serving_size' => 'required|max:50',
            'score' => 'required',
            'origin' => 'required|max:50',
            'main_ingredient' => 'required|max:50',
            'price' => 'required',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ];
        return $rules;
    }
}
