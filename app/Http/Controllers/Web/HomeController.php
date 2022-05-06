<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Repos\Eloquent\ArticleRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke(ArticleRepository $articleRepository)
    {   
        $posts = $articleRepository->handleAll('post', 6);
        $videos = $articleRepository->handleAll('video', 4);
        return view('web.index', compact('posts', 'videos'));
    }
}
