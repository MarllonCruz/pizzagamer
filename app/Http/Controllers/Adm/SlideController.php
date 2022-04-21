<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Supports\Notify;

class SlideController extends Controller
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
    }

     /** 
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('adm.slides.home', [
            'page' => 'slide',
            'menu' => 'slide'
        ]);
    }

    public function create()
    {
        
    }

    public function store()
    {

    }
}
