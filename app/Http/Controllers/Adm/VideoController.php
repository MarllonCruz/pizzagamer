<?php

namespace App\Http\Controllers\Adm;

use App\Supports\Notify;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repos\Eloquent\ArticleRepository;

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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
