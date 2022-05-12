<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Adm\AuthController;
use App\Http\Controllers\Adm\DashController;
use App\Http\Controllers\Adm\PostController;
use App\Http\Controllers\Adm\UserController;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\ListController;
use App\Http\Controllers\Adm\SlideController;
use App\Http\Controllers\Adm\VideoController;
use App\Http\Controllers\Web\PostShowController;
use App\Http\Controllers\Adm\HighlightController;
use App\Http\Controllers\Adm\MceUploadController;
use App\Http\Controllers\Web\VideoShowController;


// Web
Route::get('/', HomeController::class)->name('home');

Route::get('/listagem/{type}', [ListController::class, 'list'])->name('listagem');
Route::post('/listagem/s/{type}', [ListController::class, 'search'])->name('listagem.search');
Route::get('/listagem/s/{type}/{search}', [ListController::class, 'searchAction'])->name('listagem.search.action');
Route::get('/listagem/noticia/{category}', [ListController::class, 'category'])->name('listagem.category');

Route::get('/noticia/{uri}', PostShowController::class)->name('noticia');
Route::get('/video/{uri}', VideoShowController::class)->name('video');

// Adm
Route::group(['prefix' => 'admin'], function() {
    Route::get('/login', [AuthController::class, 'index'])->name('admin.login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/logout', [AuthController::class, 'logout'])->name('admin.logout');

    // MCE Upload
    Route::post('/mce_upload', MceUploadController::class)->name('mce_uplaod');

    Route::group(['middleware' => 'auth'], function() {
        Route::get('/', [DashController::class, 'home'])->name('dash');

        // Post
        Route::group(['prefix' => 'artigos'], function() {
            Route::get('', [PostController::class, 'index'])->name('artigos.index');
            Route::get('/criar', [PostController::class, 'create'])->name('artigos.create');
            Route::get('/{post}/show', [PostController::class, 'show'])->name('artigos.show');
            Route::get('/{post}/editar', [PostController::class, 'edit'])->name('artigos.edit');
            Route::post('/pesquisar', [PostController::class, 'search'])->name('artigos.search.ajax');
            Route::get('/pesquisar/{search}', [PostController::class, 'search'])->name('artigos.search');
            
            Route::get('/categorias', [PostController::class, 'categoriasIndex'])->name('artigos.categorias.index');
            Route::get('/categorias/criar', [PostController::class, 'categoriasCreate'])->name('artigos.categorias.create');
            Route::get('/categorias/{category}/editar', [PostController::class, 'categoriasEdit'])->name('artigos.categorias.edit');
            
            // Actions
            Route::group(['middleware' => 'check.level:admin'], function() {
                Route::post('/criar', [PostController::class, 'store'])->name('artigos.store');
                Route::post('/{post}/editar', [PostController::class, 'update'])->name('artigos.update');
                Route::get('/{post}/deletar', [PostController::class, 'destroy'])->name('artigos.destroy');

                Route::post('/categorias/criar', [PostController::class, 'categoriasStore'])->name('artigos.categorias.store');
                Route::post('/categorias/{category}/editar', [PostController::class, 'categoriasUpdate'])->name('artigos.categorias.update');
                Route::get('/categorias/{category}/deletar', [PostController::class, 'categoriasDestroy'])->name('artigos.categorias.destroy');
            });
        });

        // SLides 
        Route::group(['prefix' => 'slides'], function() {
            Route::get('', [SlideController::class, 'index'])->name('slides.index');
            Route::get('/criar', [SlideController::class, 'create'])->name('slides.create');

             // Actions
            Route::group(['middleware' => 'check.level:admin'], function() {
                Route::post('/criar', [SlideController::class, 'store'])->name('slides.store');
                Route::post('/sortable', [SlideController::class, 'sortable'])->name('slides.sortable');
                Route::get('/{slide}/deletar', [SlideController::class, 'destroy'])->name('slides.destroy');
            });
        });

        // Highlights
        Route::group(['prefix' => 'destaques'], function() {
            Route::get('', [HighlightController::class, 'index'])->name('destaques.index');
            Route::get('/{highlight}/criar', [HighlightController::class, 'create'])->name('destaques.create');

             // Actions
            Route::group(['middleware' => 'check.level:admin'], function() {
                Route::post('/{highlight}/criar', [HighlightController::class, 'store'])->name('destaques.store');
                Route::get('/{highlight}/deletar', [HighlightController::class, 'destroy'])->name('destaques.destroy');
            });
        });

        // Videos
        Route::group(['prefix' => 'videos'], function() {
            Route::get('', [VideoController::class, 'index'])->name('videos.index');
            Route::get('/criar', [VideoController::class, 'create'])->name('videos.create');
            Route::get('/{video}/show', [VideoController::class, 'show'])->name('videos.show');
            Route::get('/{video}/editar', [VideoController::class, 'edit'])->name('videos.edit');
            Route::post('/pesquisar', [VideoController::class, 'search'])->name('videos.search.ajax');
            Route::get('/pesquisar/{search}', [VideoController::class, 'search'])->name('videos.search');
            
             // Actions
            Route::group(['middleware' => 'check.level:admin'], function() {
                Route::post('/criar', [VideoController::class, 'store'])->name('videos.store');
                Route::post('/{video}/editar', [VideoController::class, 'update'])->name('videos.update');
                Route::get('/{video}/deletar', [VideoController::class, 'destroy'])->name('videos.destroy');
            });
        });

        // Users
        Route::group(['prefix' => 'usuarios'], function() {
            Route::get('', [UserController::class, 'index'])->name('usuarios.index');
            Route::get('/criar', [UserController::class, 'create'])->name('usuarios.create');
            Route::get('/{user}/show', [UserController::class, 'show'])->name('usuarios.show');
            Route::get('/{user}/editar', [UserController::class, 'edit'])->name('usuarios.edit');
            Route::post('/pesquisar', [UserController::class, 'search'])->name('usuarios.search.ajax');
            Route::get('/pesquisar/{search}', [UserController::class, 'search'])->name('usuarios.search');
            
             // Actions
            Route::group(['middleware' => 'check.level:leader'], function() {
                Route::post('/criar', [UserController::class, 'store'])->name('usuarios.store');
                Route::post('/{user}/editar', [UserController::class, 'update'])->name('usuarios.update');
                Route::get('/{user}/deletar', [UserController::class, 'destroy'])->name('usuarios.destroy');
            });
        });
    });
});


