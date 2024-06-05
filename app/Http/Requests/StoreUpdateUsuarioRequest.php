<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUpdateUsuarioRequest extends FormRequest
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
            'email' => [
                'required',
                'email',
                'max:255',
                'unique:usuarios'
            ],
            'senha' => [
                'required',
                'min:6',
                'max:100'
            ]
        ];

        if($this->method() == 'PATCH'){
            $userId = $this->route('usuario');

            $rules['email'] = [
                'required',
                'email',
                'max:255',
                Rule::unique('usuarios')->ignore($userId)
            ];
            $rules['senha'] = [
                'nullable',
                'min:6',
                'max:100'
            ];
        }

        return $rules;
    }
}
