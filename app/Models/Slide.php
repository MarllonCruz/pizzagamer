<?php

namespace App\Models;

use App\Models\Article;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Slide extends Model
{
    use HasFactory;

    protected $fillable = [
        'article_id', 'order',
    ];

    public $timestamps = false;

    public function article()
    {
        return $this->belongsTo(Article::class, 'article_id');
    }
}
