<?php

namespace App\Http\Controllers\Adm;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Supports\Notify;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Http\Requests\PostCreateRequest;
use App\Http\Requests\PostUpdateRequest;
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
        $this->notify = $notify;
    }

    /**
     * @param ArticleRepository $articleRepository
     * 
     * @return \Illuminate\Http\Response
     */
    public function index(ArticleRepository $articleRepository)
    {   
        $articles = $articleRepository->handleAll('post', 9);

        return view('adm.posts.home', [
            'page' => 'post',
            'menu' => 'posts',
            'articles' => $articles
        ]);
    }

    /**
     * @param CategoryRepository $categoryRepository
     * 
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
     * @param PostCreateRequest $postRequest
     * 
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, PostCreateRequest $postRequest)
    {   
        $validator = Validator::make($request->all(), $postRequest->rules(), $postRequest->messages());
        
        if ($validator->fails()) {
            $this->notify->error('Dados estão incorretos!');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $articleRepository = (new ArticleRepository());
        $fields = $request->only('title', 'description', 'category_id', 'opening_at', 'status', 
            'content', 'cover');
        $article = $articleRepository->handleCreate($fields, 'post');

        if (!$article) {
            $this->notify->error($articleRepository->getMessage());
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $this->notify->success("Artigo {$article->title} foi criado com sucesso");
        return redirect()->route('artigos.categorias.create');
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
    public function edit(int $article_id, ArticleRepository $articleRepository, CategoryRepository $categoryRepository)
    {
        $article   = $articleRepository->find($article_id);
        $categories = $categoryRepository->handleAll('post', null, 'ASC');
        
        if (!$article || !$categories) {
            $this->notify->warning('Artigo não encotrando para editar');
            return redirect()->route('artigos.index');
        }


        return view('adm.posts.edit', [
            'page'       => 'post',
            'menu'       => 'new-post',
            'categories' => $categories,
            'article'    => $article
        ]);
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  int $article_id
     * @param ArticleRepository $articleRepository
     * 
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $article_id, ArticleRepository $articleRepository)
    {   
        $article   = $articleRepository->find($article_id);
        if (!$article) {
            $this->notify->warning('Artigo não encotrando para editar');
            return redirect()->route('artigos.index');
        }

        $postRequest = (new PostUpdateRequest());
        $validator   = Validator::make($request->all(), $postRequest->rules($article->id), $postRequest->messages());
        if ($validator->fails()) {
            $this->notify->error('Dados estão incorretos!');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $article = $articleRepository->handleUpdate($article, $validator->validated(), 'post');
        if (!$article) {
            $this->notify->error($articleRepository->getMessage());
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $this->notify->success("Artigo {$article->title} foi atualizado com sucesso");
        return redirect()->route('artigos.edit', ['post' => $article->id]);
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
