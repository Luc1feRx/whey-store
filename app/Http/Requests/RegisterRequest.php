<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
        return [
            'email'     => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'password'  => 'required',
        ];
    }

    public function messages()
    {
        return [
            'email.required'         => trans('validation.required', ['attributes' => 'email']),
            'first_name.required'         => trans('validation.required', ['attributes' => __('message.register.first_name')]),
            'last_name.required'         => trans('validation.required', ['attributes' => __('message.register.last_name')]),
            'password.required'      => trans('validation.required', ['attributes' => 'password']),
        ];
    }
}
