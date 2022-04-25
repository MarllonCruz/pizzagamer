@extends('adm.common.template')

@section('content')
   <section>
      <h2>Artigos</h2>

      <div class="content">
         <div class="left">
            @include('adm.posts.common.menu', ['menu', $menu])
         </div>
         <div class="right post">
            <header>
               <h2><i class="fa-solid fa-pen-to-square"></i> Artigos</h2>

               <form class="form-search" action="{{ route('artigos.search') }}" method="get">
                  <button><i class="fa-solid fa-magnifying-glass"></i></button>
                  <input type="text" name="search">
               </form>
            </header>

            <div class="list-post">
               @foreach ($articles as $article)
                  <div class="post">
                     <img src="{{ url('storage/' . $article->cover) }}" alt="">      
                     <a href="{{ route('artigos.show', ['post' => $article->id]) }}">{{ $article->title }}</a>
                     <div class="status-post">
                        <span><i class="fa-solid fa-clock"></i> {{ date_fmt($article->updated_at, 'd/m/Y H:i') }}</span>
                        <span><i class="fa-solid fa-bookmark"></i> {{ $article->category->title }}</span>
                        <span><i class="fa-solid fa-user"></i> {{ $article->user->first_name }}</span>
                        <span><i class="fa-solid fa-pen-to-square"></i> {{ $article->statusPtBr() }}</span>
                     </div>
                     <div class="btns">
                        <a href="{{ route('artigos.edit', ['post' => $article->id]) }}"><i class="fa-solid fa-pen"></i> Editar</a>
                        <a href="{{ route('artigos.destroy', ['post' => $article->id]) }}" onclick="return confirm('Tem certeza que deseja excluir categoria {{ $article->title }} ?')"><i class="fa-solid fa-trash-can"></i> Deletar</a>
                     </div>
                  </div>
               @endforeach
            </div>

            {{ $articles->links('adm.common.pagination-custom') }}
         </div>
      </div>
   </section>
@endsection