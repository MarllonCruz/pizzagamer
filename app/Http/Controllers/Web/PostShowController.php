<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Reports\Access;
use App\Repos\Eloquent\ArticleRepository;
use Illuminate\Http\Request;

class PostShowController extends Controller
{   
    public function __invoke($uri, ArticleRepository $articleRepository)
    {   
        $article        = $articleRepository->findTypeUri($uri, 'post');
        if (!$article) {
            return redirect()->route('home');
        }
        
        $othersArticles = $articleRepository->othersArticles('post', $article->id);
        
        (new Access())->report(true);
        return view('web.pages.post', [
            'page'           => 'post',
            'article'        => $article,
            'othersArticles' => $othersArticles
        ]);
    }
}
