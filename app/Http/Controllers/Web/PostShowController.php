<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Repos\Eloquent\ArticleRepository;
use Illuminate\Http\Request;

class PostShowController extends Controller
{
    public function __invoke($uri, ArticleRepository $articleRepository)
    {   
        $article        = $articleRepository->findTypeUri($uri, 'post');
        $othersArticles = $articleRepository->othersArticles('post', $article->id);
        
        return view('web.pages.post', [
            'page'           => 'post',
            'article'        => $article,
            'othersArticles' => $othersArticles
        ]);
    }
}
