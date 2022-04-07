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
               <h2><i class="fa-solid fa-square-plus"></i>Nova Categoria</h2>
               <area />
            </header>

            <form action="{{ route('artigos.categorias.store') }}" method="post" enctype="multipart/form-data">
               @csrf
               <label for="title">*Titulo</label>
               <input type="text" name="title" placeholder="Titulo da categoria" value="{{ old('title') }}">
               
               <label for="description">*Descrição</label>
               <input type="text" name="description" placeholder="Descrição da categoria" value="{{ old('description') }}">

               <label for="cover">Capa</label>
               <input type="file" name="cover">

               <div class="al-right">
                  <button type="submit"><i class="fa-solid fa-square-check"></i> Criar Categoria</button>
               </div>
            </form>
         </div>
      </div>
   </section>
@endsection
