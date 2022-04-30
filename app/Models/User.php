<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'level',
        'genre',
        'datebirth',
        'document',
        'photo'
    ];

    protected $hidden = [
        'password'
    ];

    public function fullName()
    {
        return $this->attributes['first_name'] . " " . $this->attributes['last_name'];
    }
}
