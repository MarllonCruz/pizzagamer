<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchWebRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            's' => 'required|string'
        ];
    }

    public function messages(): array
    {   
        return [
            's.required' => 'Nenhum resultado na pesquisa',
        ];
    }
}
