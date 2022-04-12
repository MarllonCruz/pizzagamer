<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;

class CategoryUpdateRequest
{      
    public function rules(int $id): array
    {
        return [
            'title' => 'required|'.Rule::unique('categories')->ignore($id),
            'description' => 'required',
            'cover' => 'file|mimes:jpg,png|max:8192|dimensions:min_width=620,min_height=400'
        ];
    }

    public function messages(): array
    {   
        return [
            'title.required' => 'Campo titulo não pode ser vazio',
            'title.unique' => 'Esse titulo já existe na outra categoria',
            'description.required' => 'Campo descrição não pode ser vazio',
            'cover.file' => 'O arquivo da capa tem que ser jpg ou png',
            'cover.mimes' =>  'O arquivo da capa tem que ser jpg ou png',
            'cover.dimensions' => 'minimo dimensão da imagem 620 de largura e 400 de altura',
            'cover.size' => 'maximo do tamanho da imagem é 8MB (8192 KB)'
        ];
    }
}