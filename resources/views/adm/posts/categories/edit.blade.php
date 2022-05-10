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
               <h2><i class="fa-solid fa-square-plus"></i>Editar Categoria - {{ $category->title }}</h2>
               <area />
            </header>

            <form action="{{ route('artigos.categorias.update', ['category' => $category->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                <label for="title">*Titulo</label>
                <input type="text" name="title" placeholder="Titulo da categoria" 
                    value="@if(old('title')) {{old('title')}} @else {{$category->title}} @endif" @error('title') class="is-invalid" @enderror>
                @error('title')
                    <span class="alert alert-danger">{{ $message }}</span>
                @enderror
                
                <label for="description">*Descrição</label>
                <input type="text" name="description" placeholder="Descrição da categoria" 
                    value="@if(old('description')) {{old('description')}} @else {{$category->description}} @endif"  @error('description') class="is-invalid" @enderror>
                @error('description')
                    <span class="alert alert-danger">{{ $message }}</span>
                @enderror

                <label for="cover">Capa</label>
                <div class="cover-box">
                    @if (!empty($category->cover))
                        <img src="{{ url('storage/' . $category->cover) }}" alt="">      

                        <div class="input-cover">
                            <input type="checkbox" name="cover-remove">
                            Remover capa atual ou escolher outra imagem abaixo
                        </div>
                    @endif
                </div>
                <input type="file" name="cover" placeholder="teste">
                @error('cover')
                    <span class="alert alert-danger">{{ $message }}</span>
                @enderror

                <div class="al-right">
                    <button type="submit"><i class="fa-solid fa-square-check"></i> Atualizar Categoria</button>
                </div>
            </form>
         </div>
      </div>
   </section>
@endsection
