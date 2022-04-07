@extends('adm.common.template')

@section('content')
   <section class="article-post">
      <h2>Artigos</h2>

      <div class="content">
         <div class="left">
            @include('adm.posts.common.menu', ['menu', $menu])
         </div>
         <div class="right category">
            <header>
               <h2><i class="fa-solid fa-pen-to-square"></i> Categorias</h2>
               <a href="{{ route('artigos.categorias.create') }}"><i class="fa-solid fa-square-plus"></i> Nova categoria</a>
            </header>
         </div>
      </div>
   </section>
@endsection