<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Repos\Eloquent\ArticleRepository;

class VideoShowController extends Controller
{
    public function __invoke($uri, ArticleRepository $articleRepository)
    {   
        $article = $articleRepository->findTypeUri($uri, 'video');
        
        return view('web.pages.video', [
            'article' => $article,
            'type'    => 'video',
            'page'    => 'video'
        ]);
    }
}
