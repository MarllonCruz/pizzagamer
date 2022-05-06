<?php

namespace App\Http\Controllers\Adm;

use App\Supports\Notify;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\VideoCreateRequest;
use App\Http\Requests\VideoUpdateRequest;
use App\Repos\Eloquent\ArticleRepository;
use App\Repos\Eloquent\CategoryRepository;

class VideoController extends Controller
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
        
        $this->middleware('permission.crud.post', ['except' => [
            'index', 'show'
        ]]);
    }

     /**
     * @param ArticleRepository $articleRepository
     * 
     * @return \Illuminate\Http\Response
     */
    public function index(ArticleRepository $articleRepository)
    {   
        $articles = $articleRepository->handleAll('video', 9);

        return view('adm.videos.home', [
            'page' => 'video',
            'menu' => 'videos',
            'articles' => $articles,
            'search' => null
        ]);
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        return view('adm.videos.create', [
            'page' => 'video',
            'menu' => 'new-video'
        ]);
    }

    /**
     * @param VideoCreateRequest $request
     * @param ArticleRepository $articleRepository
     * 
     * @return \Illuminate\Http\Response
     */
    public function store(VideoCreateRequest $request, ArticleRepository $articleRepository)
    {   
        $fields = $request->only('title', 'description', 'opening_at', 'status', 'video', 'cover');
        
        $article = $articleRepository->handleCreate($fields, 'video');

        $this->notify->success("Video {$article->title} foi criado com sucesso");
        return redirect()->route('videos.create');
    }

    /**
     * @param int $article_id
     * @param ArticleRepository $articleRepository
     * 
     * @return \Illuminate\Http\Response
     */
    public function show(int $article_id, ArticleRepository $articleRepository)
    {
        $article = $articleRepository->find($article_id);

        if (!$article) {
            $this->notify->warning('Video não encotrando');
            return redirect()->route('artigos.index');
        }

        return view('adm.videos.show', [
            'article' => $article
        ]);
    }

    /**
    * @param int $article_id
    * @param ArticleRepository $articleRepository
    * 
    * @return \Illuminate\Http\Response
    */
    public function edit(int $article_id, ArticleRepository $articleRepository)
    {
        $article = $articleRepository->findType($article_id, 'video');

        if (!$article) {
           $this->notify->warning('Video não encotrando para editar');
           return redirect()->route('videos.index');
        }

        $article->video = str_replace("embed/", "watch?v=", $article->video);

        return view('adm.videos.edit', [
           'page'       => 'video',
           'menu'       => 'videos',
           'article'    => $article
        ]);
    }

    /**
     * @param Request  $request
     * @param int $article_id
     * @param ArticleRepository $articleRepository
     * 
     * @return \Illuminate\Http\Response
     */
    public function update(VideoUpdateRequest $request, int $article_id, ArticleRepository $articleRepository)
    {    
        $article = $articleRepository->findType($article_id, 'video');

        if (!$article || $request->id != $article->id) {
            $this->notify->warning('Video não encotrando para editar');
            return redirect()->route('videos.index');
        }

        $fields  = $request->only('title', 'description', 'opening_at', 'status', 'video', 'cover');
        $article = $articleRepository->handleUpdate($article, $fields, 'video');

        $this->notify->success("Video {$article->title} foi atualizado com sucesso");
        return redirect()->route('videos.edit', ['video' => $article->id]);
    }


    /**
     * @param int $article_id
     * @param ArticleRepository $articleRepository
     * 
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $article_id, ArticleRepository $articleRepository)
    {   
        $article = $articleRepository->findType($article_id, 'video');

        if (!$article) {
            $this->notify->warning('Artigo não encotrando para editar');
            return redirect()->route('artigos.index');
        }

        $articleRepository->handleDelete($article);

        $this->notify->success("Video {$article->title} deleta com sucesso!");
        return redirect()->route('videos.index');
    }

    /**
     * @param null|string $search
     * @param Request $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function search(string $search = null, Request $request)
    {
        if ($request->only('s')) {
            return response()->json(['redirect' => route('videos.search', ['search' => $request->s])]);
        }

        $articles = [];
        if (!empty($search)) {
            $articleRepository = (new ArticleRepository());
            $articles = $articleRepository->handleSearch($search, 'video');
        } 

        return view('adm.videos.home', [
            'page' => 'video',
            'menu' => 'videos',
            'articles' => $articles,
            'search' => $search
        ]);
    }
}
