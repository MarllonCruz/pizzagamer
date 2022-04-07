<?php

namespace App\Http\Controllers\Adm;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashController extends Controller
{
    public function home()
    {   
        return view('adm.dashboard.home', [
            'page' => 'dash'
        ]);
    }
}
