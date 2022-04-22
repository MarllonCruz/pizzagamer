<?php

namespace App\Repos\Eloquent;

use App\Models\Article;
use App\Models\Slide;
use App\Repos\Eloquent\AbstractRepository;

class SlideRepository extends AbstractRepository
{
    protected $model = Slide::class;

    /**
     * @return Slide|array|mixed|null
     */
    public function all()
    {
        return Slide::select()->orderBy('order')->get();
    }

    /**
     * @param Article $article
     * 
     * @return bool
     */
    public function add(Article $article): bool
    {
        $slide = Slide::select()->where('article_id', null)->first();
        if (!$slide) {
            $this->setMessage('Todos slides estão lotado... Precisa remover pelo menos 1 para adicionar');
            return false;
        }

        $slide->article_id = $article->id;
        $slide->save();
        return true;
    }
}