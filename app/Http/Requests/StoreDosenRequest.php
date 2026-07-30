<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreDosenRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
        'nip' => 'required|string|max:50',
        'nama' => 'required|string|max:255',
        'prodi' => 'required|string|max:255',
        'fakultas' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'alamat' => 'required|string',
        'no_telepon' => 'required|string|max:20',
        ];
    }
}
