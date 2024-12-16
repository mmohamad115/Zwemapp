<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreZwemDocentRequest extends FormRequest
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
            'naam' => 'required|string|max:255',
            'beschrijving' => 'required|string',
            'duurtijd' => 'required|integer',
            'datum' => 'required|date',
            'tijd' => 'required|date_format:H:i',
        ];
    }
}
