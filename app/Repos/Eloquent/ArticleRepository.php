<?php

namespace App\Repos\Eloquent;

use App\Models\Slide;
use App\Models\Article;
use App\Supports\Tools;
use App\Models\Category;
use App\Models\Highlight;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Repos\Eloquent\AbstractRepository;

class ArticleRepository extends AbstractRepository
{
    protected $model = Article::class;

    /**
     * @param int $id
     * @param string $type
     * 
     * @return Article|null
     */
    public function findTypeId(int $id, string $type): ?Article
    {
        return Article::select()->where('id', $id)->where('type', $type)->first();
    }

    /**
     * @param string $uri
     * @param string $type
     * 
     * @return Article|null
     */
    public function findTypeUri(string $uri, string $type): ?Article
    {
        $article = Article::select()->where('uri', $uri)->where('type', $type)->first();
        if (!$article) {
            return null;
        }

        $article->views += 1;
        $article->save();
        return $article;
    }

    /**
     * @param string $type 'post', 'video'
     * @param int $ignoreId
     * 
     * @return Article|null
     */
    public function othersArticles(string $type, int $ignoreId)
    {
        return Article::inRandomOrder()->where('type', $type)
            ->where('status', 'active')
            ->whereDate('opening_at', '<', date('Y-m-d H:i:s'))
            ->where('id', '!=', $ignoreId)->limit(3)->get();
    }

    /**
     * @param string $type 'post', 'video'
     * @param int|null $paginate
     * @param string $orderBy = 'DESC'
     * 
     * @return Article|null
     */
    public function handleAll(string $type, bool $date, bool $status, int $paginate = null, string $orderBy = 'DESC')
    {
        $articles = Article::where('type', $type)->orderBy('id', $orderBy);

        if ($date) {
            $articles->whereDate('opening_at', '<', date('Y-m-d H:i:s'));
        }

        if ($status) {
            $articles->where('status', 'active');
        }

        if (!$paginate) {
            return $articles->get();
        }

        return $articles->paginate($paginate);
    }

    /**
     * @param string $type 'post', 'video'
     * @param string $orderBy = 'DESC'
     * 
     * @return Article|null
     */
    public function latestNews(string $type, string $orderBy = 'DESC')
    {
        return Article::where('type', $type)->where('status', 'active')
            ->whereDate('opening_at', '<', date('Y-m-d H:i:s'))
            ->orderBy('opening_at', $orderBy)
            ->limit(5)
            ->get();
    }

    public function handleAllByCategory(Category $category, int $paginate = null)
    {
        $articles = Article::where('category_id', $category->id)
            ->whereDate('opening_at', '<', date('Y-m-d H:i:s'))->orderBy('opening_at', 'DESC');

        if (!$paginate) {
            return $articles->get();
        }

        return $articles->paginate($paginate);
    }

    /**
     * @return array|object|mixed|null
     */
    public function listPostsActive($model)
    {
        $slides = $model->select('article_id')
            ->whereNotNull('article_id')
            ->get();

        $ids = [];
        foreach ($slides as $slide) {
            $ids[] = $slide->article_id;
        }

        return Article::select()
            ->whereNotIn('id', $ids)
            ->where('type', 'post')
            ->where('status', 'active')
            // ->whereDate('opening_at', '<', date('Y-m-d H:i:s'))
            ->get();
    }

    /**
     * @param array $fields
     * @param string $type 'post', 'video'
     * 
     * @return Article|null
     */
    public function handleCreate(array $fields, string $type): ?Article
    {
        if (isset($fields['category_id'])) {
            $category = Category::where('id', $fields['category_id'])->where('type', $type)->first();

            if (!$category && $type == 'post') {
                $this->setMessage('ID da categoria não encontrado');
                return null;
            }
        }

        $article = new Article();
        $tools   = (new Tools());
        $user    = Auth::user();

        $article->title       = $fields['title'];
        $article->description = $fields['description'];
        $article->user_id     = $user->id;
        $article->category_id = $fields['category_id'] ?? null;
        $article->type        = $type;
        $article->uri         = Str::slug($article->title, '-');
        $article->opening_at  = $fields['opening_at'] ?? date('Y-m-d H:i:s');
        $article->status      = $fields['status'];
        $article->content     = $fields['content'] ?? null;
        $article->cover       = $tools->fileUpload($fields['cover'], 'article/');
        $article->views       = 0;

        if ($type == 'video') {
            $article->video = str_replace("watch?v=", "embed/", $fields['video']);
        }

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
        if (isset($fields['category_id'])) {
            $category = Category::where('id', $fields['category_id'])->where('type', $type)->first();

            if (!$category && $type == 'post') {
                $this->setMessage('ID da categoria não encontrado');
                return null;
            }
        }

        $article->title       = $fields['title'];
        $article->description = $fields['description'];
        $article->category_id = $fields['category_id'] ?? null;
        $article->type        = $type;
        $article->uri         = Str::slug($article->title, '-');
        $article->opening_at  = $fields['opening_at'] ?? date('Y-m-d H:i:s');
        $article->status      = $fields['status'];
        $article->content     = $fields['content'] ?? null;

        if (isset($fields['cover']) && !empty($fields['cover'])) {
            $tools = (new Tools());
            $tools->removeFileUpload($article->cover);

            $article->cover = $tools->fileUpload($fields['cover'], 'article/');
        }

        if ($type == 'video') {
            $article->video = str_replace("watch?v=", "embed/", $fields['video']);
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

    /**
     * @param string $search
     * 
     * @return null|array|mixed
     */
    public function handleSearch(string $search, string $type)
    {
        $articles = Article::where('title', 'LIKE', '%' . $search . '%')
            ->where('type', $type)->whereDate('opening_at', '<', date('Y-m-d H:i:s'))
            ->where('status', 'active')
            ->orWhere('description', 'LIKE', '%' . $search . '%')
            ->where('type', $type)->whereDate('opening_at', '<', date('Y-m-d H:i:s'))
            ->where('status', 'active')
            ->paginate(9);
        return $articles;
    }
}
