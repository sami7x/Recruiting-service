<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobApplicationRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'full_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'current_address' => 'required|string|max:255',
            'phone_number' => 'required|string|max:255',
            'education' => 'required|string|max:255',
            'cv_file' => 'nullable|file|mimes:pdf|max:2048',
            'coverletter_file' => 'nullable|file|mimes:pdf|max:2048',
        ];

    }
}
