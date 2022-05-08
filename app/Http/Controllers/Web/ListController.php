<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Repos\Eloquent\ArticleRepository;
use Illuminate\Http\Request;

class ListController extends Controller
{
    public function list($type)
    {  
        if ($type == "noticia") {
            return $this->returnViewListPost();
        } elseif ($type == "video") {
            return $this->returnViewListVideo();
        }
    }

    public function returnViewListPost()
    {
        $title            = "NOTÍCIAS";
        $description      = "Confira nossas notícias e estar por dentro no mundo dos games";
        $placeholderInput = "Encontre um artigo:";
        $articles         = (new ArticleRepository())->handleAll('post', 9);
        $page             = "post";

        return view('web.pages.list', compact('title', 'description', 'placeholderInput', 'articles', 'page'));
    }

    private function returnViewListVideo()
    {
        $title            = "VIDEOS";
        $description      = "Confira nossas videos e estar por dentro no mundo dos games";
        $placeholderInput = "Encontre um video:";
        $articles         = (new ArticleRepository())->handleAll('video', 9);
        $page             = "video";

        return view('web.pages.list', compact('title', 'description', 'placeholderInput', 'articles', 'page'));
    }
}
