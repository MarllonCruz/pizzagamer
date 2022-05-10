<?php

namespace App\Http\Controllers\Adm;

use App\Supports\Notify;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Highlight;
use App\Repos\Eloquent\ArticleRepository;
use App\Repos\Eloquent\HighlightRepository;

class HighlightController extends Controller
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
    * @param HighlightRepository $highlightRepository
    * 
    * @return \Illuminate\Http\Response
    */
    public function index(HighlightRepository $highlightRepository)
    {   
        $highlights = $highlightRepository->all();

        return view('adm.highlights.home', [
            'page' => 'highlight',
            'menu' => 'highlight',
            'highlights' => $highlights
        ]);
    }

   /** 
    * @param int $highlight_id
    * @param HighlightRepository $highlightRepository
    * 
    * @return \Illuminate\Http\Response
    */
    public function create(int $highlight_id, HighlightRepository $highlightRepository)
    {   
        $highlight = $highlightRepository->find($highlight_id);
        if (!$highlight) {
            $this->notify->warning('Id do destaque não encontrado');
            return redirect()->route('destaques.index');
        }

        $articleRepository = (new ArticleRepository());
        $articles = $articleRepository->listPostsActive();

        return view('adm.highlights.add', [
            'page' => 'highlight',
            'menu' => 'highlight',
            'highlight' => $highlight,
            'articles' => $articles
        ]);
    }

   /** 
    * @param Request $request
    * @param ArticleRepository $articleRepository
    * 
    * @return \Illuminate\Http\Response
    */
    public function store(int $highlight_id, Request $request, ArticleRepository $articleRepository)
    {   
        $article = $articleRepository->find($request->article_id);
        if (!$article) {
            $this->notify->warning('Artigo não encotrando para editar');
            return redirect()->route('artigos.index');
        }

        $highlightRepository = (new HighlightRepository());

        $result = $highlightRepository->add($article, $highlight_id);
        if (!$result) {
            $this->notify->error($highlightRepository->getMessage());
            return redirect()->route('destaques.index');
        }

        $this->notify->success('Adicionado com sucesso!');
        return redirect()->route('destaques.index');
    }

    /** 
    * @param int $highlight_id
    * @param HighlightRepository $highlightRepository
    * 
    * @return \Illuminate\Http\Response
    */
    public function destroy(int $highlight_id, HighlightRepository $highlightRepository)
    {
        $highlight = $highlightRepository->find($highlight_id);
        if (!$highlight) {
            $this->notify->error('Não foi possivel encontra destaque para remover o artigo... Por favor tente novamente');
            return redirect()->route('destaques.index');
        }

        $result = $highlightRepository->remove($highlight);
        if (!$result) {
            $this->notify->error($highlightRepository->getMessage());
            return redirect()->route('destaques.index');
        }

        $this->notify->success('Artigo removido com sucesso');
        return redirect()->route('destaques.index');
    }
}
