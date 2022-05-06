<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'first_name'     => 'required',
            'last_name'      => 'required',
            'email'          => 'required|email|' . Rule::unique('users')->ignore($this->id),
            'document'       => 'nullable|numeric',
            'new_password'   => 'nullable|min:6',
            'level'          => 'required|' .  Rule::in(['1', '6', '10']),
            'genre'          =>  Rule::in(['masculine', 'feminine']),
            'datebirth'      => 'nullable|date', 
            'photo'          => 'nullable|file|mimes:jpg,png|max:8192'
        ];
    }

    public function messages(): array
    {   
        return [
            'first_name.required' => 'Preenche campo Nome',

            'last_name.required' => 'Preenche campo Sobrenome',

            'email.required' => 'Preenche campo E-mail',
            'email.email'    => 'E-mail invaldo',
            'email.unique'   => 'Esse E-mail já existe no sistema',

            'document' => 'CPF invalido',

            'level.required' => 'Nivel invalido',
            'level.rule'     => 'Nivel invalido',

            'new_password.min'      => 'Minimo 6 caracteres',

            'photo.required'  => 'Precisa ter uma image de perfil',
            'photo.file'      => 'O arquivo da capa tem que ser jpg ou png',
            'photo.mimes'     =>  'O arquivo da capa tem que ser jpg ou png',
            'photo.size'      => 'maximo do tamanho da imagem é 8MB (8192 KB)',
        ];
    }
}
