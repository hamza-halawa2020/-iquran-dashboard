<?php

namespace App\Http\Requests\Api;

use App\Rules\NotDisposableEmail;
use Illuminate\Foundation\Http\FormRequest;

class TeacherApplicationStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => ['required', 'email', 'max:255', new NotDisposableEmail],
            'phone' => 'required|string|max:20',
            'country' => 'required|string|max:255',
            'job_title' => 'required|string|max:255',
            'message' => 'required|string|min:10',
            'cv' => 'nullable|file|mimes:pdf|max:5120',
            'website' => 'prohibited',
            'url' => 'prohibited',
        ];
    }
}
