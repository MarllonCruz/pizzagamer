<?php

namespace App\Repos\Contracts;

use Illuminate\Database\Eloquent\Collection;

interface ArticleRepositoryInterface
{
    public function find(int $id);
}