<?php

namespace App\Http\Controllers\Adm;

use App\Supports\Notify;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserCreateRequest;
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
       
       $this->middleware('permission.crud.post', ['except' => [
           'index', 'show'
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
            'page' => 'users',
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
            'page' => 'users',
            'menu' => 'new'
        ]);
    }

    public function store(UserCreateRequest $request, UserRepository $userRepository)
    {
        $userRepository->handleCreate($request->validated());

        $this->notify->success("Usuário foi criado com sucesso");
        return redirect()->route('usuarios.create');
    }
}
