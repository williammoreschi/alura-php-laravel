<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistroFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8']
        ];
    }

    public function messages()
    {
        return [
            'require' => 'O :attribute é obrigatório',
            'string' => 'O :attribute deve ser uma string',
            'email' => 'O :attribute deve ser um endereço de email válido',
            'unique' => 'O :attribute já existe, tente outro',
            'max' => 'O :attribute deve ter no máximo :max caracteres',
            'min' => 'O :attribute deve ter no mínimo :min caracteres',
        ];
    }
}
