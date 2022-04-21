<?php

namespace App\Repos\Eloquent;

use App\Models\Article;
use App\Supports\Tools;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Repos\Eloquent\AbstractRepository;

class ArticleRepository extends AbstractRepository 
{
    protected $model = Article::class;

    public function handleAll(string $type, int $paginate = null, string $orderBy = 'DESC')
    {
        $articles = Article::where('type', $type)->orderBy('created_at', $orderBy);   

        if (!$paginate) {
            return $articles->get();
        }

        return $articles->paginate($paginate);  
    }

    /**
     * @param array $fields
     * @param string $type 'post', 'video'
     * 
     * @return Article|null
     */
    public function handleCreate(array $fields, string $type): ?Article
    {   
        $category = Category::where('id', $fields['category_id'])->where('type', $type)->first();
        if (!$category) {
            $this->setMessage('ID da categoria não encontrado');
            return null;
        }

        if (!isset($fields['cover']) || empty($fields['cover'])) {
            $this->setMessage('Precisa ter uma imagem na capa');
            return null;
        }

        $article = new Article();
        $tools   = (new Tools());
        $user    = Auth::user();

        $article->title       = $fields['title'];
        $article->description = $fields['description'];
        $article->user_id     = $user->id;
        $article->category_id = $fields['category_id'];
        $article->type        = $type;
        $article->uri         = Str::slug($article->title , '-');
        $article->opening_at  = $fields['opening_at'] ?? date('Y-m-d');
        $article->status      = $fields['status'];
        $article->content     = $fields['content'];
        $article->cover       = $tools->fileUpload($fields['cover'], 'article/');
        $article->views       = 0;

        $article->save();
        return $article;
    }

    /**
    * @param Article $article
    * @param array $fields
    * @param string $type 'post', 'video'
    * 
    * @return Article|null
    */
    public function handleUpdate(Article $article, array $fields, string $type): ?Article
    {   
        $category = Category::where('id', $fields['category_id'])->where('type', $type)->first();
        if (!$category) {
            $this->setMessage('ID da categoria não encontrado');
            return null;
        }

        $article->title       = $fields['title'];
        $article->description = $fields['description'];
        $article->category_id = $fields['category_id'];
        $article->type        = $type;
        $article->uri         = Str::slug($article->title , '-');
        $article->opening_at  = $fields['opening_at'] ?? date('Y-m-d');
        $article->status      = $fields['status'];
        $article->content     = $fields['content'];

        if (isset($fields['cover']) && !empty($fields['cover'])) {
            $tools = (new Tools());
            $tools->removeFileUpload($article->cover);

            $article->cover = $tools->fileUpload($fields['cover'], 'article/');
        }

        $article->save();
        return $article;
    }

    /**
     * @param Article $article
     */
    public function handleDelete(Article $article): void
    {
        if (!empty($article->cover)) {
            $tools = (new Tools());
            $tools->removeFileUpload($article->cover);
        }

        $article->delete();
    }
}