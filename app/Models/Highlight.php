<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Highlight extends Model
{
    use HasFactory;

    protected $fillable = [
        'article_id', 'position',
    ];

    public $timestamps = false;

    public function article()
    {
        return $this->belongsTo(Article::class, 'article_id');
    }
}
