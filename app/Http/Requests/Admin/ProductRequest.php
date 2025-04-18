<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:100'],
            'image' => ['nullable', 'image', 'max:2048'],
            'description' => ['required', 'string'],
            'price' => ['required', 'numeric', 'min:0'],
            'unit' => ['required', 'string', 'max:100'],
            'vat' => ['required', 'integer', 'in:0,10,20'],
            'active' => ['required', 'boolean'],
        ];
    }

    public function payload(): array
    {
        $data = $this->validated();
        if ($this->hasFile('image')) {
            $data['image'] = $this->file('image')->store('products', 'public');
        }
        return $data;
    }

    public function authorize(): bool
    {
        return true;
    }
}
