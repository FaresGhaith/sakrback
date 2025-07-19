<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TolabRequest extends FormRequest
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
            'firstname' => 'required|string|max:255',
                'secname' => 'required|string|max:255',
                'phone' => 'required|string|unique:tolabs,phone|regex:/^01[0-2,5]{1}[0-9]{8}$/',
                'walyphone' => 'required|string|regex:/^01[0-2,5]{1}[0-9]{8}$/',
                'governorate' => 'required|string',
                'year' => 'required|in:ola,tanya,talta',
                'pass' => 'required|string|min:6',
        ];
    }
}
