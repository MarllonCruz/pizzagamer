<?php

namespace App\Http\Controllers\Adm;

use App\Supports\Notify;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Repos\Eloquent\UserRepository;

class UserController extends Controller
{   
    /** @var Notify */
    protected $notify;

    /**
    * Constructor
    * 
    * @param Notify $notify
    */
   public function __construct(Notify $notify)
   {
       $this->notify = $notify;
       
        $this->middleware('permission.crud.user', ['except' => [
           'index', 'show', 'create', 'edit', 'search'
        ]]);
   }

   /**
    * @param UserRepository $userRepository
    *
    * @return \Illuminate\Http\Response
    */
    public function index(UserRepository $userRepository)
    {   
        $users = $userRepository->handleAll(9);
        
        return view('adm.users.home', [
            'page' => 'user',
            'menu' => 'list',
            'users' => $users,
            'search' => null
        ]);
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        return view('adm.users.create', [
            'page' => 'user',
            'menu' => 'new'
        ]);
    }
    
    /**
     * @param UserCreateRequest $request
     * @param UserRepository $userRepository
     * 
     * @return \Illuminate\Http\Response
     */
    public function store(UserCreateRequest $request, UserRepository $userRepository)
    {
        $userRepository->handleCreate($request->validated());

        $this->notify->success("Usuário foi criado com sucesso");
        return redirect()->route('usuarios.create');
    }

    /**
     * @param int $user_id
     * @param UserRepository $userRepository
     * 
     * @return \Illuminate\Http\Response
     */
    public function edit(int $user_id, UserRepository $userRepository)
    {
        $user = $userRepository->find($user_id);

        if (!$user) {
            $this->notify->warning('Usuário não encontrado');
            return redirect()->route('usuarios.index');
        }

        return view('adm.users.edit', [
            'page' => 'user',
            'menu' => 'list',
            'user'    => $user
        ]);
    }

     /**
     * @param int $user_id
     * @param UserRepository $userRepository
     * 
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, int $user_id, UserRepository $userRepository)
    {   
        $user = $userRepository->find($user_id);

        if (!$user || $request->id != $user->id) {
            $this->notify->warning('Usuário não encotrando para editar');
            return redirect()->route('usuarios.index');
        }

        $user = $userRepository->handleUpdate($request->validated(), $user);
        $this->notify->success("Usuário {$user->fullName()} foi atualizado com sucesso");

        return view('adm.users.edit', [
            'page' => 'user',
            'menu' => 'list',
            'user'    => $user
        ]);
    }

    /**
     * @param int $user_id
     * @param UserRepository $articleRepository
     * 
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $user_id, UserRepository $userRepository)
    {   
        $user = $userRepository->find($user_id);

        if (!$user) {
            $this->notify->warning('Usuário não encotrando para deletar');
            return redirect()->route('usuarios.index');
        }

        $result = $userRepository->handleDelete($user);

        if (!$result) {
            $this->notify->warning($userRepository->getMessage());
            return redirect()->route('usuarios.index');
        }

        $this->notify->success("Usuário deletado com sucesso!");
        return redirect()->route('usuarios.index');
    }

     /**
     * @param null|string $search
     * @param Request $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function search(string $search = null, Request $request)
    {
        if ($request->only('s')) {
            return response()->json(['redirect' => route('usuarios.search', ['search' => $request->s])]);
        }

        $users = [];
        if (!empty($search)) {
            $userRepository = (new UserRepository());
            $users = $userRepository->handleSearch($search);
        } 

        return view('adm.users.home', [
            'page' => 'user',
            'menu' => 'list',
            'users' => $users,
            'search' => $search
        ]);
    }
}
