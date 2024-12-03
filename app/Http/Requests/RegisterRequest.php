<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Password;

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
            'name' => 'required|string|min:3|max:25',
            'email' => 'required|email:dns|unique:users',
            // 'password' => ['required','min:8', 'confirmed', Password::defaults()],
            'password' => [
            'required',
            'min:8', 
            'confirmed', 
            'regex:/[a-z]/',
            'regex:/[0-9]/', 
        ],
        ];
    }
}