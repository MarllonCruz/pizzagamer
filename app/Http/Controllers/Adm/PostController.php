<?php

namespace App\Http\Controllers\Adm;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Supports\Notify;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\CategoryUpdateRequest;
use Illuminate\Support\Facades\Validator;
use App\Repos\Contracts\CategoryRepositoryInterface as Category;
use App\Repos\Contracts\ArticleRepositoryInterface as Article;

class PostController extends Controller
{   
    /** @var Notify */
    protected $notify;

    /** @var Category */
    protected $category;

    /** @var Article */
    protected $article;

     /**
     * Constructor
     * @param Notify $notify
     */
    public function __construct(Notify $notify, Category $category, Article $article)
    {
        $this->notify   = $notify;
        $this->category = $category;
        $this->article  = $article;
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('adm.posts.home', [
            'page' => 'post',
            'menu' => 'posts'
        ]);
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());
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

    /**
     * @return \Illuminate\Http\Response
     */
    public function categoriasIndex()
    {  
        $categories = $this->category->handleAll();

        return view('adm.posts.categories.home', [
            'page' => 'post',
            'menu' => 'category',
            'categories' => $categories
        ]);
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function categoriasCreate()
    {   
        return view('adm.posts.categories.create', [
            'page' => 'post',
            'menu' => 'category'
        ]);
    }

    /**
     * @param Request $request
     * @param CategoryRequest $categoryRequest
     * 
     * @return \Illuminate\Http\Response
     */
    public function categoriasStore(Request $request, CategoryRequest $categoryRequest)
    {   
        $validator = Validator::make($request->all(), $categoryRequest->rules(), $categoryRequest->messages());

        if ($validator->fails()) {
            $this->notify->error('Dados estão incorretos!');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $fields   = $request->only('title', 'description', 'cover');
        $category = $this->category->handleCreate($fields, 'post');

        $this->notify->success("Categoria " . $category->title .  " foi criado com sucesso");
        return redirect()->route('artigos.categorias.create');
    }

    /**
     * @param int $category
     * @param CategoryRepositoryInterface $categoryRepository
     * 
     * @return \Illuminate\Http\Response
     */
    public function categoriasEdit(int $category_id)
    {   
        $category = $this->category->find($category_id);
        
        if (!$category) {
            $this->notify->warning('Categoria não encotrando para editar');
            return redirect()->route('artigos.categorias.index');
        } 

        return view('adm.posts.categories.edit', [
            'page' => 'post',
            'menu' => 'category',
            'category' => $category
        ]);
    }

     /**
     * @param Request $request 
     * @param int $category
     * 
     * @return \Illuminate\Http\Response
     */
    public function categoriasUpdate(Request $request, int $category_id, CategoryUpdateRequest $categoryRequest)
    {   
        $category = $this->category->find($category_id);
        if (!$category) {
            $this->notify->warning('Categoria não encotrando para editar');
            return redirect()->back();
        }
        
        $validator = Validator::make($request->all(), $categoryRequest->rules(), $categoryRequest->messages());
        if ($validator->fails()) {
            $this->notify->error('Dados estão incorretos!');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $fields = $request->only(['title', 'description', 'cover-remove', 'cover']);
        $result = $this->category->handleUpdate($category, $fields);
        if (!$result) {
            $this->notify->error('Dados estão incorretos!');
            $validator->errors()->add('title', 'Esse titulo já existe na outra categoria');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $this->notify->success("Categoria " . $category->title .  " foi alterado com sucesso");
        return redirect()->route('artigos.categorias.edit', ['category' => $category->id]);

    }

    public function categoriasDestroy(int $category_id)
    {
       
    }
}
