<?php

namespace App\Http\Requests;

class CategoryRequest
{      
    public function rules(): array
    {
        return [
            'title' => 'required|max:20|unique:categories',
            'description' => 'required',
            'cover' => 'file|mimes:jpg,png|max:8192|dimensions:min_width=620,min_height=400'
        ];
    }

    public function messages(): array
    {   
        return [
            'title.required' => 'Preenche campo titulo',
            'title.max' => 'Máximo de caracteres é 20',
            'title.unique' => 'Esse titulo já existe na outra categoria',
            'description.required' => 'Preenche campo descrição',
            'cover.file' => 'O arquivo da capa tem que ser jpg ou png',
            'cover.mimes' =>  'O arquivo da capa tem que ser jpg ou png',
            'cover.dimensions' => 'minimo dimensão da imagem 620 de largura e 400 de altura',
            'cover.size' => 'maximo do tamanho da imagem é 8MB (8192 KB)'
        ];
    }
}
