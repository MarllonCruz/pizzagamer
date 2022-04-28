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
               <h2><i class="fa-solid fa-square-plus"></i>Nova Artigo</h2>
               <area />
            </header>

            <form action="{{ route('artigos.store') }}" method="post" enctype="multipart/form-data">
               @csrf
               <label for="title">*Titulo</label>
               <input type="text" name="title" placeholder=" Titulo" 
                  value="{{ old('title') }}" @error('title') class="is-invalid" @enderror>
               @error('title')
                  <span class="alert alert-danger">{{ $message }}</span>
               @enderror
               
               <label for="description">*Descrição</label>
               <input type="text" name="description" placeholder=" Descrição" 
                  value="{{ old('description') }}"  @error('description') class="is-invalid" @enderror>
               @error('description')
                  <span class="alert alert-danger">{{ $message }}</span>
               @enderror

               <div class="form-group">
                    <div class="form">
                        <label for="category_id">*Categoria</label>
                        <select name="category_id" id="category_id" @error('category_id') class="is-invalid" @enderror>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <span class="alert alert-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form">
                        <label for="description">Data de estreia</label>
                        <input type="date"  name="opening_at"
                            value="{{ old('opening_at') }}">
                    </div>

                    <div class="form">
                        <label for="status">Status</label>
                        <select name="status" id="status">
                            <option value="active" selected>Ativo</option>
                            <option value="draft">Rascunho</option>
                            <option value="trash">Lixo</option>
                        </select>
                    </div>
               </div>

               <label for="cover">*Capa</label>
               <input type="file" name="cover">
               @error('cover')
                  <span class="alert alert-danger">{{ $message }}</span>
               @enderror

               <label>*Conteúdo</label>
               <textarea name="content" class="mce"></textarea>
                @error('content')
                    <span class="alert alert-danger">{{ $message }}</span>
                @enderror

               <div class="al-right">
                  <button type="submit"><i class="fa-solid fa-square-check"></i> Criar Artigo</button>
               </div>
            </form>
         </div>
      </div>
   </section>
@endsection