<?php

namespace App\Http\Controllers\Adm;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Supports\Notify;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\CategoryUpdateRequest;
use Illuminate\Support\Facades\Validator;
use App\Repos\Eloquent\CategoryRepository;
use App\Repos\Eloquent\ArticleRepository;

class PostController extends Controller
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
        $this->notify   = $notify;
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
    public function create(CategoryRepository $categoryRepository)
    {   
        $categories = $categoryRepository->handleAll('post', null, 'ASC');
        
        if (!$categories) {
            $this->notify->warning('Não pode criar artigo porque não existem categoria... precisa criar uma');
            return redirect()->route('artigos.index');
        }

        return view('adm.posts.create', [
            'page' => 'post',
            'menu' => 'new-post',
            'categories' => $categories
        ]);
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
     * @param CategoryRepository $categoryRepository
     * 
     * @return \Illuminate\Http\Response
     */
    public function categoriasIndex(CategoryRepository $categoryRepository)
    {  
        $categories = $categoryRepository->handleAll('post', 6);

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

        $categoryRepository = (new CategoryRepository());
        $fields   = $request->only('title', 'description', 'cover');
        $category = $categoryRepository->handleCreate($fields, 'post');

        $this->notify->success("Categoria " . $category->title .  " foi criado com sucesso");
        return redirect()->route('artigos.categorias.create');
    }

    /**
     * @param int $category_id
     * @param CategoryRepository $categoryRepository
     * 
     * @return \Illuminate\Http\Response
     */
    public function categoriasEdit(int $category_id, CategoryRepository $categoryRepository)
    {   
        $category = $categoryRepository->find($category_id);
        
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
     * @param int $category_id
     * @param CategoryUpdateRequest $categoryRequest
     * @param CategoryRepository $categoryRepository
     * 
     * @return \Illuminate\Http\Response
     */
    public function categoriasUpdate(Request $request, int $category_id, CategoryUpdateRequest $categoryRequest, CategoryRepository $categoryRepository)
    {   
        $category = $categoryRepository->find($category_id);
        if (!$category) {
            $this->notify->warning('Categoria não encotrando para editar');
            return redirect()->route('artigos.categorias.index');
        }
        
        $validator = Validator::make($request->all(), $categoryRequest->rules($category->id), $categoryRequest->messages());
        if ($validator->fails()) {
            $this->notify->error('Dados estão incorretos!');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $fields = $request->only(['title', 'description', 'cover-remove', 'cover']);
        $category = $categoryRepository->handleUpdate($category, $fields);

        $this->notify->success("Categoria " . $category->title .  " foi alterado com sucesso");
        return redirect()->route('artigos.categorias.edit', ['category' => $category->id]);
    }

    /**
     * @param int $category_id
     * @param CategoryRepository $categoryRepository
     * 
     * @return \Illuminate\Http\Response
     */
    public function categoriasDestroy(int $category_id, CategoryRepository $categoryRepository)
    {
        $category = $categoryRepository->find($category_id);
        if (!$category) {
            $this->notify->warning('Categoria não encotrando para deletar');
            return redirect()->route('artigos.categorias.index');
        }

        if($category->countPosts() > 0) {
            $this->notify->error("Categoria {$category->title} tem artigos poriso não pode ser deletado!");
            return redirect()->route('artigos.categorias.index');
        }

        $categoryRepository->handleDelete($category);
        $this->notify->success("Categoria {$category->title} deleta com sucesso!");
        return redirect()->route('artigos.categorias.index');
    }   
}