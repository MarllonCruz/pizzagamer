<?php

namespace App\Http\Controllers\Adm;

use App\Supports\Notify;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repos\Eloquent\ArticleRepository;
use App\Repos\Eloquent\SlideRepository;

class SlideController extends Controller
{   
    /** @var Notify */
    protected $notify;

     /**
     * Constructor
     * 
     * @param Notify $notify
     */
    public function __construct(Notify $notify)
    {
        $this->notify = $notify;
    }

     /** 
     * 
     * @return \Illuminate\Http\Response
     */
    public function index(SlideRepository $slideRepository)
    {   
        $slides = $slideRepository->all();

        return view('adm.slides.home', [
            'page' => 'slide',
            'menu' => 'slide',
            'slides' => $slides
        ]);
    }

    public function create(ArticleRepository $articleRepository)
    {
        $articles = $articleRepository->listPostsActive();

        return view('adm.slides.add', [
            'page' => 'slide',
            'menu' => 'add',
            'articles' => $articles
        ]);
    }

    public function store(Request $request, ArticleRepository $articleRepository)
    {   
        $article = $articleRepository->find($request->article_id);
        if (!$article) {
            $this->notify->warning('Artigo não encotrando para editar');
            return redirect()->route('artigos.index');
        }
        
        $slideRepository = (new SlideRepository());
    }

    public function sortable(Request $request)
    {
        //
    }
}
