<?php

namespace App\Http\Requests;

use App\Rules\NoRestrictedWords;
use Illuminate\Foundation\Http\FormRequest;

class CreateTaskRequest extends FormRequest
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
            'title' => 'required|string|min:5',
            'description' => ['nullable', 'string', 'max:500', new NoRestrictedWords()],
            'deadline' => 'required|date|after_or_equal:today',
            'category_id' => 'required|exists:category,id',
        ];
    }
}


