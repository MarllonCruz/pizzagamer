<?php

namespace App\Repos\Eloquent;

use App\Models\Category;
use Illuminate\Support\Str;
use App\Repos\Eloquent\AbstractRepository;
use App\Repos\Contracts\CategoryRepositoryInterface;
use App\Supports\Tools;

class CategoryRepository extends AbstractRepository implements CategoryRepositoryInterface
{
    protected $model = Category::class;

    /**
     * @return null|array
     */
    public function handleAll()
    {
        return Category::orderBy('created_at', 'DESC')->paginate(5);
    }

    /**
     * @param array $fields
     * @param string $type
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
            $file = $fields['cover'];

            $attributes['cover'] = $tools->fileUpload($file, 'category/');
        }

        return $this->create($attributes);
    }

     /**
     * @param Category $category
     * @param array $fields
     * @return bool
     */
    public function handleUpdate(Category $category, array $fields): bool
    {   
        if ($category->uri != Str::slug($fields['title'] , '-')) {
            $data = Category::select()->where('uri', Str::slug($fields['title'] , '-'))->first();
            if ($data) {
                return false;
            }
        }

        $attributes['title']       = $fields['title'];
        $attributes['description'] = $fields['description'];
        $attributes['uri']         = Str::slug($attributes['title'] , '-');

        if (isset($fields['cover']) || isset($fields['cover-remove'])) {
            $tools = (new Tools());

            if (isset($fields['cover']) && !empty($fields['cover'])) {
                $file = $fields['cover'];
                $tools->removeFileUpload($category->cover);

                $attributes['cover'] = $tools->fileUpload($file, 'category/');
            } elseif (isset($fields['cover-remove'])) {
                $tools->removeFileUpload($category->cover);

                $attributes['cover'] = null;
            } 
        }

        $this->update($category->id, $attributes);
        return true;
    }
}