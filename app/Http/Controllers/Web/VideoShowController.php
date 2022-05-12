<?php

namespace App\Http\Controllers\Web;

use App\Models\Reports\Access;
use App\Http\Controllers\Controller;
use App\Repos\Eloquent\ArticleRepository;

class VideoShowController extends Controller
{
    public function __invoke($uri, ArticleRepository $articleRepository)
    {   
        $article        = $articleRepository->findTypeUri($uri, 'video');
        if (!$article) {
            return redirect()->route('home');
        }
        
        $othersArticles = $articleRepository->othersArticles('video', $article->id);
        
        (new Access())->report(true);
        return view('web.pages.video', [
            'page'           => 'video',
            'article'        => $article,
            'othersArticles' => $othersArticles
        ]);
    }
}
