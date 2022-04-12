<?php

namespace App\Repos\Contracts;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

interface CategoryRepositoryInterface 
{
    public function find(int $id);

    public function handleAll();
    
    public function handleCreate(array $fields, string $type): Category;

    public function handleUpdate(Category $category, array $fields): bool;
}