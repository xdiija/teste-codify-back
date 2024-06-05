<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateAutorRequest extends FormRequest
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
            'biografia' => [
                'required',
                'min:10',
                'max:2000'
            ],
            'data_nascimento' => [
                'required',
                'date_format:d/m/Y'
            ]
        ];

        return $rules;
    }
}
