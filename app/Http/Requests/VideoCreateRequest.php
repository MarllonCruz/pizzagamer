<?php

namespace App\Http\Requests;

use App\Rules\RuleYoutube;
use App\Rules\RuleYoutubeExistWatch;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class VideoCreateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|max:100|unique:articles',
            'description' => 'required',
            'cover' => 'required|file|mimes:jpg,png|max:8192|dimensions:min_width=620,min_height=400',
            'status' => Rule::in(['active', 'trash', 'draft']),
            'video' => ['required', new RuleYoutube, new RuleYoutubeExistWatch]
        ];
    }

    public function messages(): array
    {   
        return [
            'title.required' => 'Preenche campo titulo',
            'title.max' => 'Máximo de caracteres é 100',
            'title.unique' => 'Esse titulo já existe no outro artigo',
            'description.required' => 'Preenche campo descrição',
            'cover.file' => 'O arquivo da capa tem que ser jpg ou png',
            'cover.mimes' =>  'O arquivo da capa tem que ser jpg ou png',
            'cover.dimensions' => 'minimo dimensão da imagem 620 de largura e 400 de altura',
            'cover.size' => 'maximo do tamanho da imagem é 8MB (8192 KB)',
            'cover.required' => 'Precisa ter uma imagem na capa',
            'video.required' => 'Precisa ter um link do video no Youtube'
        ];
    }
}
