<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    public function authorize(): bool
    {
        // Only authenticated users can create posts
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'content' => ['required', 'string', 'min:10'],
        ];
    }

    public function messages(): array
    {
        return [
            'content.required' => 'Please write something in your post.',
            'content.min' => 'Your post must be at least 10 characters long.',
        ];
    }
}
