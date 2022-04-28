@extends('adm.common.template')

@section('content')
   <section>
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
               <input type="text" name="title" placeholder="Titulo da categoria" 
                  value="{{ old('title') }}" @error('title') class="is-invalid" @enderror>
               @error('title')
                  <span class="alert alert-danger">{{ $message }}</span>
               @enderror
               
               <label for="description">*Descrição</label>
               <input type="text" name="description" placeholder="Descrição da categoria" 
                  value="{{ old('description') }}"  @error('description') class="is-invalid" @enderror>
               @error('description')
                  <span class="alert alert-danger">{{ $message }}</span>
               @enderror

               <label for="cover">Capa</label>
               <input type="file" name="cover">
               @error('cover')
                  <span class="alert alert-danger">{{ $message }}</span>
               @enderror

               <div class="al-right">
                  <button type="submit"><i class="fa-solid fa-square-check"></i> Criar Categoria</button>
               </div>
            </form>
         </div>
      </div>
   </section>
@endsection
