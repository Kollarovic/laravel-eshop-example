<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PageRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'content' => ['nullable', 'string'],
            'active' => ['boolean'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }

}
