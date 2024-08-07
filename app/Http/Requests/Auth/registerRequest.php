<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class registerRequest extends FormRequest
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
            'username' => 'required|unique:users|string|max:50',
            'name' => 'nullable|string|max:50',
            'email' => 'nullable|string|email|max:255|unique:users',
            'phoneNumber' => 'nullable|string|size:11|regex:/^09[0-9]{9}$/',
            'profile' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'password' => 'required|string|min:4|confirmed',
        ];
    }
}
