<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use Flasher\Toastr\Prime\ToastrFactory;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('adm.posts.home', [
            'page' => 'post',
            'menu' => 'posts'
        ]);
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function categoriasIndex()
    {   
        return view('adm.posts.categories.home', [
            'page' => 'post',
            'menu' => 'category'
        ]);
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function categoriasCreate(ToastrFactory $flasher)
    {   
        // $build1 = $flasher->type('error')
        //     ->message('your custom message messagemessagemessagemessage message message')
        //     ->priority(2)
        //     ->option('timer', 5000)->flash();


        return view('adm.posts.categories.create', [
            'page' => 'post',
            'menu' => 'category'
        ]);
    }

    /**
     * @param CategoryRequest $request
     * @return \Illuminate\Http\Response
     */
    public function categoriasStore(CategoryRequest $request)
    {
       dd($request->all());
    }

    public function categoriasEdit($category)
    {
       
    }

    public function categoriasUpdate(Request $request, $category)
    {
       
    }

    public function categoriasDestroy($category)
    {
       
    }
}
