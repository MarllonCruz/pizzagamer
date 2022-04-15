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
    public function handleAll(string $type = 'post', int $paginate = null, string $orderBy = 'DESC')
    {   
        $categories = Category::where('type', $type)->orderBy('created_at', $orderBy);   

        if (!$paginate) {
            return $categories->get();
        }

        return $categories->paginate($paginate);  
    }

    /**
     * @param array $fields
     * @param string $type
     * 
     * @return Category
     */
    public function handleCreate(array $fields, string $type): Category
    {   
        $category = new Category();
        $category->title       = $fields['title'];
        $category->description = $fields['description'];
        $category->type        = $type;
        $category->uri         = Str::slug($category['title'] , '-');

        if (isset($fields['cover'])) {
            $tools = (new Tools());

            $category->cover = $tools->fileUpload($fields['cover'], 'category/');
        }

        $category->save();
        return $category;
    }

     /**
     * @param Category $category
     * @param array $fields
     * 
     * @return Category
     */
    public function handleUpdate(Category $category, array $fields): Category
    {   
        $category->title       = $fields['title'];
        $category->description = $fields['description'];
        $category->uri         = Str::slug($category->title , '-');

        if (isset($fields['cover']) || isset($fields['cover-remove'])) {
            $tools = (new Tools());
            $tools->removeFileUpload($category->cover);
            $category->cover = null;

            if (isset($fields['cover']) && !empty($fields['cover'])) {
                $category->cover = $tools->fileUpload($fields['cover'], 'category/');
            }
        }

        $category->save();
        return $category;
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

        $category->delete();
    }
}