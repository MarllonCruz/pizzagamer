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
        $result = $slideRepository->add($article);

        if (!$result) {
            $this->notify->error($slideRepository->getMessage());
            return redirect()->back();
        }

        $this->notify->success('Adicionado com sucesso!');
        return redirect()->route('slides.index');
    }

    public function sortable(Request $request, SlideRepository $slideRepository)
    {   
        $list = (gettype($request->list) == "string") ? json_decode($request->list) : $request->list;
        $order = 1;
        
        foreach ($list as $id) {
            $slideRepository->updateOrder(intval($id), $order);
            $order ++;
        }

        return response()->json(["success"=> true, 200]);
    }
}
