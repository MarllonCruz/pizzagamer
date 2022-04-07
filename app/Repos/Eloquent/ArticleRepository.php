<?php

use App\Models\Article;
use App\Repos\Contracts\ArticleRepositoryInterface;
use App\Repos\Eloquent\AbstractRepository;

class ArticleRepository extends AbstractRepository implements ArticleRepositoryInterface
{
    protected $model = Article::class;

    
}