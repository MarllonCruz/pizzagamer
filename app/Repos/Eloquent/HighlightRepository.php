<?php

namespace App\Repos\Eloquent;

use App\Models\Article;
use App\Models\Highlight;
use App\Repos\Eloquent\AbstractRepository;

class HighlightRepository extends AbstractRepository
{
    protected $model = Highlight::class;

    /**
     * @return Slide|array|mixed|null
     */
    public function all()
    {
        return Highlight::select()->orderBy('id', 'DESC')->get();
    }

    /**
     * @param Article $article
     * @param int $highlight_id
     * 
     * @return bool
     */
    public function add(Article $article, int $highlight_id): bool
    {   
        $highlight = $this->find($highlight_id);

        if (!$highlight) {
            $this->setMessage('Id do destaque não encontrado');
            return false;
        }

        $highlight->article_id = $article->id;
        $highlight->save();
        return true;
    }

    /**
     * @param Highlight $highlight
     * 
     * @return bool
     */
    public function remove(Highlight $highlight): bool
    {   
        if (!$highlight->article) {
            $this->setMessage("artigo do destaque {$highlight->title} não encontrado ou está vazio");
            return false;
        }

        $highlight->article_id = null;
        $highlight->save();
        return true;
    }
}