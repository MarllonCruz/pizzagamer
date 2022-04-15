@extends('adm.common.template')

@section('content')
   <section class="article-post">
      <h2>Artigos/<span>categorias</span></h2>

      <div class="content">
         <div class="left">
            @include('adm.posts.common.menu', ['menu', $menu])
         </div>
         <div class="right category">
            <header>
               <h2><i class="fa-solid fa-pen-to-square"></i> Categorias</h2>
               <a href="{{ route('artigos.categorias.create') }}"><i class="fa-solid fa-square-plus"></i> Nova categoria</a>
            </header>
            <div class="categories">
               @foreach ($categories as $category)
                  <div class="category">
                     <div class="cover">
                       @if (!empty($category->cover))
                          <img src="{{ url('storage/' . $category->cover) }}" alt="">      
                       @endif
                     </div>
                     <div class="info">
                        <h2>{{ $category->title }} <span>[{{ $category->countPosts() }} Artigo(s)]</span></h2>
                        <p>{{ $category->description }}</p>
                        <div class="btns">
                           <a href="{{ route('artigos.categorias.edit', ['category' => $category->id]) }}"><i class="fa-solid fa-pen"></i> Editar</a>
                           <a href="{{ route('artigos.categorias.destroy', ['category' => $category->id]) }}" onclick="return confirm('Tem certeza que deseja excluir categoria {{ $category->title }} ?')"><i class="fa-solid fa-trash-can"></i> Deletar</a>
                        </div>
                     </div>
                  </div>
               @endforeach
            </div>
            
            {{ $categories->links('adm.common.pagination-custom') }}
         </div>
      </div>
   </section>
@endsection