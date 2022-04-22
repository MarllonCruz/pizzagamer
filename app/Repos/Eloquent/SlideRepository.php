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
        $slide = Slide::select()->where('article_id', null)->orderBy('order')->first();
        if (!$slide) {
            $this->setMessage('Todos slides estão lotado... Precisa remover pelo menos 1 para adicionar');
            return false;
        }

        $slide->article_id = $article->id;
        $slide->save();
        return true;
    }

    /**
     * @return void
     */
    public function updateOrder(int $id, string $order): void
    {
        $data = Slide::find($id);
        $data->order = $order;
        $data->save(); 
    }

    public function remove(Slide $slide)
    {
        $slide->article_id = null;
        $slide->save();
    }
}