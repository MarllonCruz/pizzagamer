<?php

namespace App\Http\Controllers\Adm;

use App\Supports\Notify;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\VideoCreateRequest;
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VideoCreateRequest $request, ArticleRepository $articleRepository)
    {   
        $fields = $request->only('title', 'description', 'opening_at', 'status', 
        'video', 'cover');
        $article = $articleRepository->handleCreate($fields, 'video');

        $this->notify->success("Video {$article->title} foi criado com sucesso");
        return redirect()->route('videos.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function search()
    {
        
    }
}
