<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;

class PostCreateRequest
{      
    public function rules(): array
    {
        return [
            'title' => 'required|max:50|unique:articles',
            'description' => 'required',
            'category_id' => 'required|exists:categories,id',
            'cover' => 'file|mimes:jpg,png|max:8192|dimensions:min_width=620,min_height=400',
            'content' => 'required',
            'status' => Rule::in(['active', 'trash', 'draft']),
        ];
    }

    public function messages(): array
    {   
        return [
            'title.required' => 'Preenche campo titulo',
            'title.max' => 'Máximo de caracteres é 50',
            'title.unique' => 'Esse titulo já existe no outro artigo',
            'description.required' => 'Preenche campo descrição',
            'category_id.required' => 'Escolhe uma categoria',
            'category_id.exists' => 'ID da categoria não encontrado',
            'cover.file' => 'O arquivo da capa tem que ser jpg ou png',
            'cover.mimes' =>  'O arquivo da capa tem que ser jpg ou png',
            'cover.dimensions' => 'minimo dimensão da imagem 620 de largura e 400 de altura',
            'cover.size' => 'maximo do tamanho da imagem é 8MB (8192 KB)',
            'cover.required' => 'Precisa ter uma imagem na capa',
            'content.required' => 'Preenche campo do conteúdo'
        ];
    }
}
