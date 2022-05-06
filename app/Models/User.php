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
        'photo',
        'password'
    ];

    public function fullName()
    {
        return $this->attributes['first_name'] . " " . $this->attributes['last_name'];
    }

    public function level()
    {
        switch($this->attributes['level']) {
            case '1':
                return 'Visitante';
            break;
            case '6':
                return 'Administrador';
            break;
            case '10':
                return 'Lider';
            break;
        }
    }
}
