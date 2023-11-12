<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ProfileRequest extends FormRequest
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
            'first_name' => 'required|max:255|',
            'last_name' => 'required|max:255|',
            'phone' => 'required|max:50|unique:users,phone,' . Auth::user()->id,
            'address' => 'nullable|max:200',
            'email' => 'required|email',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ];
        return $rules;
    }

    public function messages()
    {
        return [
            'email.required'         => trans('validation.required', ['attributes' => 'email']),
            'email.email'         => trans('validation.email', ['attributes' => 'email']),
            'first_name.required'         => trans('validation.required', ['attributes' => __('message.register.first_name')]),
            'last_name.required'         => trans('validation.required', ['attributes' => __('message.register.last_name')]),
            'phone.unique'         => trans('validation.unique', ['attributes' => __('message.register.phone')]),
        ];
    }
}
