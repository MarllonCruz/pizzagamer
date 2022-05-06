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
    * @return User|array|mixed|null
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
    public function handleCreate(array $fields): User
    {  
        $tools = (new Tools());

        $fields['photo']    = $tools->fileUpload($fields['photo'], 'media/profile/');
        $fields['password'] = Hash::make($fields['password']);

        return User::create($fields);
    }

    /**
     * @param array $fields
     * @param User $user
     * 
     * @return User
     */
    public function handleUpdate(array $fields, User $user): User
    {
        if (!empty($fields['photo'])) {
            $tools = (new Tools());
            $tools->removeFileUpload($user->cover);

            $fields['photo'] = $tools->fileUpload($fields['photo'], 'media/profile/');
        }

        if (!empty($fields['new_password'])) {
            $fields['password'] = Hash::make($fields['new_password']);
        }
        
        $user->update($fields);
        return $user;
    }

    /**
     * @param User $user
     * 
     * @return bool
     */
    public function handleDelete(User $user): bool
    {   
        if ($user->id == 1) {
            $this->setMessage('Esse usuário não pode ser deletado');
            return false;
        }

        if (!empty($user->photo)) {
            $tools = (new Tools());
            $tools->removeFileUpload($user->photo);
        }

        $user->delete();
        return true;
    }

    /**
     * @param string $search
     * 
     * @return null|array|mixed
     */
    public function handleSearch(string $search)
    {
        $users = User::where('first_name','LIKE','%' . $search .'%')
                            ->orWhere('last_name','LIKE','%' . $search . '%')
                            ->orWhere('email','LIKE','%' . $search . '%')
                            ->paginate(9);
        return $users;
    }
}