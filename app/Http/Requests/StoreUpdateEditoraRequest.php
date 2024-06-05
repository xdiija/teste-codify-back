<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateEditoraRequest extends FormRequest
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
        $rules = [
            'nome' => [
                'required',
                'min:3',
                'max:255'
            ],
            'endereco' => [
                'required',
                'min:3',
                'max:255'
            ],
            'telefone' => [
                'required',
                'min:8',
                'max:15'
            ]
        ];

        return $rules;
    }
}
