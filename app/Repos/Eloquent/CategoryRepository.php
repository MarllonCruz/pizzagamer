<?php

namespace App\Repos\Eloquent;

use App\Models\Category;
use Illuminate\Support\Str;
use App\Repos\Eloquent\AbstractRepository;
use App\Repos\Contracts\CategoryRepositoryInterface;
use App\Supports\Tools;

class CategoryRepository extends AbstractRepository
{
    protected $model = Category::class;

    /**
     * @param string $type = 'post'
     * @param int $paginate = 6
     * 
     * @return null|array
     */
    public function handleAll(string $type = 'post', int $paginate = 6)
    {   
        return Category::where('type', $type)
            ->orderBy('created_at', 'DESC')    
            ->paginate($paginate);
    }

    /**
     * @param array $fields
     * @param string $type
     * 
     * @return Category
     */
    public function handleCreate(array $fields, string $type): Category
    {   
        $attributes['title']       = $fields['title'];
        $attributes['description'] = $fields['description'];
        $attributes['type']        = $type;
        $attributes['uri']         = Str::slug($attributes['title'] , '-');

        if (isset($fields['cover'])) {
            $tools = (new Tools());

            $attributes['cover'] = $tools->fileUpload($fields['cover'], 'category/');
        }

        return $this->create($attributes);
    }

     /**
     * @param Category $category
     * @param array $fields
     * 
     * @return Category
     */
    public function handleUpdate(Category $category, array $fields): Category
    {   
        $attributes['title']       = $fields['title'];
        $attributes['description'] = $fields['description'];
        $attributes['uri']         = Str::slug($attributes['title'] , '-');

        if (isset($fields['cover']) || isset($fields['cover-remove'])) {
            $tools = (new Tools());
            $tools->removeFileUpload($category->cover);

            if (isset($fields['cover']) && !empty($fields['cover'])) {
                $attributes['cover'] = $tools->fileUpload($fields['cover'], 'category/');
            }
        }

        return $this->update($category->id, $attributes);
    }

    /**
     * @param Category $category
     * 
     * @return void
     */
    public function handleDelete(Category $category): void
    {   
        if (!empty($category->cover)) {
            $tools = (new Tools());
            $tools->removeFileUpload($category->cover);
        } 

        $this->delete($category->id);
    }
}