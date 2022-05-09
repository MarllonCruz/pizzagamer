<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\SearchWebRequest;
use App\Repos\Eloquent\ArticleRepository;
use App\Repos\Eloquent\CategoryRepository;
use Illuminate\Http\Request;

class ListController extends Controller
{
    public function list($type)
    {  
        if ($type == "noticia") {
            return $this->returnViewListPost(null, new ArticleRepository());
        } elseif ($type == "video") {
            return $this->returnViewListVideo(null, new ArticleRepository());
        }
    }

    public function search($type, SearchWebRequest $request)
    {   
        $search = $request->s;
        if (!$search || empty($search)) {
            return redirect()->route("listagem", ["type" => "noticia"]);
        }

        return redirect()->route('listagem.search.action', [
            'type'   => $type,
            'search' => $search
        ]);
    }

    public function searchAction($type, $search)
    {   
        $search = filter_var($search, FILTER_SANITIZE_STRIPPED);
        if (!$search || empty($search)) {
            return redirect()->route("listagem", ["type" => "noticia"]);
        }   
        
        if ($type == "noticia") {
            return $this->returnViewListPost($search, new ArticleRepository());
        } elseif ($type == "video") {
            return $this->returnViewListVideo($search, new ArticleRepository());
        }
    }

    public function category($category_uri, ArticleRepository $articleRepository, CategoryRepository $categoryRepository)
    {   
        $category = $categoryRepository->handleFindByUri($category_uri);
        $articles = $articleRepository->handleAllByCategory($category, 5);
 
        return view('web.pages.list', [
            'title'            => 'NOTÍCIAS',
            'description'      => "Confira nossas notícias em categoria (". $category->title .")",
            'placeholderInput' => 'Encontre um artigo:',
            'searchInput'      => null,
            'page'             => 'post',
            'type'             => 'noticia',
            'articles'         => $articles
        ]);
    }

    private function returnViewListPost(string $search = null, ArticleRepository $articleRepository)
    {   

        $articles = ($search) 
            ? $articleRepository->handleSearch($search, 'post') 
            : $articleRepository->handleAll('post', 9);
 
        return view('web.pages.list', [
            'title'            => 'NOTÍCIAS',
            'description'      => ($search) 
                ? "Resultado da pesquisa: {$search}" 
                : 'Confira nossas notícias e estar por dentro no mundo dos games',
            'placeholderInput' => 'Encontre um artigo:',
            'searchInput'      => $search,
            'page'             => 'post',
            'type'             => 'noticia',
            'articles'         => $articles
        ]);
    }

    private function returnViewListVideo(string $search = null, ArticleRepository $articleRepository)
    {
        $articles = ($search) 
        ? $articleRepository->handleSearch($search, 'video') 
        : $articleRepository->handleAll('video', 9);

        return view('web.pages.list', [
            'title'            => 'VIDEOS',
            'description'      => ($search) 
                ? "Resultado da pesquisa: {$search}" 
                : 'Confira nossas videos e estar por dentro no mundo dos games',
            'placeholderInput' => 'Encontre um video:',
            'searchInput'      => $search,
            'page'             => 'video',
            'type'             => 'video',
            'articles'         => $articles
        ]);
    }
}
