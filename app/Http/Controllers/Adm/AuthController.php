<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AuthenticateRequest;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\URL;

class AuthController extends Controller
{  
    public function __construct()
    {   
        $this->middleware('guest')->except('logout');
    }
    
    public function index()
    {    
        return view('adm.login.home');
    }

    public function login(AuthenticateRequest $request)
    {  
        if (! Auth::attempt($request->only(['email', 'password']))) {
            return response()->json(['message' => 'E-mail e/ou a senha incorretas']);
        }

        return response()->json(['redirect' => URL::route('admin.dash')]);
    }
}
