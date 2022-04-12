<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'type', 'uri', 'description', 'cover'
    ];

    public function countPosts()
    {
        // Article::select()->where('category_id', $this->attributes['id'])
        return $this->hasMany(Article::class)->count();
    }
}
