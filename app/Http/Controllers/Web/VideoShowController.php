<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Repos\Eloquent\ArticleRepository;

class VideoShowController extends Controller
{
    public function __invoke($uri, ArticleRepository $articleRepository)
    {   
        $article        = $articleRepository->findTypeUri($uri, 'video');
        $othersArticles = $articleRepository->othersArticles('video', $article->id);
        
        return view('web.pages.video', [
            'page'           => 'video',
            'article'        => $article,
            'othersArticles' => $othersArticles
        ]);
    }
}
