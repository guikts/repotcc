<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoretccRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; 
    }
    
    public function rules(): array
    {
        return [
            'arquivo_pdf' => 'required|file|mimes:pdf|max:10240'
        ];
    }
}
