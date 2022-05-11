<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Repos\Eloquent\ArticleRepository;
use Illuminate\Http\Request;

class PostShowController extends Controller
{
    public function __invoke($uri, ArticleRepository $articleRepository)
    {   
        $article = $articleRepository->findTypeUri($uri, 'post');
        
        return view('web.pages.post', [
            'article' => $article,
            'type'    => 'noticia',
            'page'    => 'post'
        ]);
    }
}
