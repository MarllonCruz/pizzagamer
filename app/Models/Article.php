<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'category_id', 'title', 'uri', 'description', 
        'content', 'cover', 'views', 'type', 'status', 'opening_at'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function statusPtBr()
    {
        switch ($this->attributes['status']) {
            case 'active':
                return 'Ativo';
                break;
            case 'draft':
                return 'Rascunho';
                break;
            case 'trash':
                return 'Lixo'; 
        }
    }
}
