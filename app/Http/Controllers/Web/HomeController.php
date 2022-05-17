<?php

namespace App\Http\Controllers\Web;

use App\Models\Reports\Access;
use App\Http\Controllers\Controller;
use App\Repos\Eloquent\SlideRepository;
use App\Repos\Eloquent\ArticleRepository;
use App\Repos\Eloquent\HighlightRepository;

class HomeController extends Controller
{
    public function __invoke(ArticleRepository $articleRepository, HighlightRepository $highlightRepository, SlideRepository $slideRepository)
    {   
        (new Access())->report(true);

        $slides     = $slideRepository->allFront();
        $highlights = $highlightRepository->allFront();
        $posts      = $articleRepository->handleAll('post', 5);
        $videos     = $articleRepository->handleAll('video', 4);
        $page       = "home";

        return view('web.pages.index', compact('page', 'slides', 'highlights', 'posts', 'videos'));
    }
}
