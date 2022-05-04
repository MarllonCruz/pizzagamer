<?php

namespace App\Repos\Eloquent;

use App\Models\User;
use App\Supports\Tools;
use Illuminate\Support\Facades\Hash;
use App\Repos\Eloquent\AbstractRepository;

class UserRepository extends AbstractRepository 
{
    protected $model = User::class;

    /**
    * @param int|null $paginate
    * @param string $orderBy = 'DESC'
    * 
    * @return User|null
    */
    public function handleAll(int $paginate = null, string $orderBy = 'DESC')
    {
        $users = User::select()->orderBy('id', $orderBy);   

        if (!$paginate) {
            return $users->get();
        }

        return $users->paginate($paginate);  
    }

    /**
     * @param array $fields
     * 
     * @return User
     */
    public function handleCreate(array $fields)
    {  
        $tools = (new Tools());

        $fields['photo']    = $tools->fileUpload($fields['photo'], 'media/profile/');
        $fields['password'] = Hash::make($fields['password']);

        return User::create($fields);
    }
}