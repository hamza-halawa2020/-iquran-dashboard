<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class ContactStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'    => 'required|string|max:255',
            'phone'   => 'required|string|max:20',
            'email'   => 'required|email|max:255',
            'age'     => 'required|integer|min:1|max:120',
            'country' => 'required|string|max:255',
            'course'  => 'required|string|max:255',
            'message' => 'required|string|min:10',
        ];
    }
}
