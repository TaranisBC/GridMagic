<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreCorrectionGeneraleRequest extends FormRequest
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
            'evaluation_id'       => 'required|exists:evaluations,id',
            'no_etudiant'         => 'required|exists:etudiants,no_etudiant',
            'commentaire' => 'required|string',
        ];
    }
}
