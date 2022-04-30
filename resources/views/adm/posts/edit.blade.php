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
               <h2><i class="fa-solid fa-square-plus"></i>Editar Artigo</h2>
               <area />
            </header>

            <form action="{{ route('artigos.update', ['post' => $article->id]) }}" method="post" enctype="multipart/form-data">
               @csrf
               <label for="title">*Titulo</label>
               <input type="text" name="title" placeholder=" Titulo" id="title"
                  value="@if(old('title')) {{old('title')}} @else {{$article->title}} @endif" 
                  @error('title') class="is-invalid" @enderror>
               @error('title')
                  <span class="alert alert-danger">{{ $message }}</span>
               @enderror
               
               <label for="description">*Descrição</label>
               <input type="text" name="description" placeholder=" Descrição" id="description"
                  value="@if(old('description')) {{old('description')}} @else {{$article->description}} @endif"  
                  @error('description') class="is-invalid" @enderror>
               @error('description')
                  <span class="alert alert-danger">{{ $message }}</span>
               @enderror

               <div class="form-group">
                    <div class="form">
                        <label for="category_id">*Categoria</label>
                        <select name="category_id" id="category_id" @error('category_id') class="is-invalid" @enderror>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    @if($article->category_id == $category->id) selected @endif>
                                    {{ $category->title }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <span class="alert alert-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form">
                        <label for="opening_at">Data de estreia</label>
                        <input type="datetime-local"  name="opening_at" id="opening_at"
                            value="{{ date_fmt($article->opening_at, 'Y-m-d\TH:i') }}">
                    </div>

                    <div class="form">
                        <label for="status">Status</label>
                        <select name="status" id="status">
                            <option value="active" @if($article->status == 'active') selected @endif>Ativo</option>
                            <option value="draft" @if($article->status == 'draft') selected @endif>Rascunho</option>
                            <option value="trash" @if($article->status == 'trash') selected @endif>Lixo</option>
                        </select>
                    </div>
               </div>

               <label for="cover">*Capa</label>
               <div class="cover-box">
                    @if (!empty($article->cover))
                        <img src="{{ url('storage/' . $article->cover) }}" alt="">      
                    @endif
                </div>
               <input type="file" name="cover" id="cover">
               @error('cover')
                  <span class="alert alert-danger">{{ $message }}</span>
               @enderror

               <label>*Conteúdo</label>
               <textarea name="content" class="mce">{{ $article->content }}</textarea>
                @error('content')
                    <span class="alert alert-danger">{{ $message }}</span>
                @enderror

               <div class="al-right">
                  <button type="submit"><i class="fa-solid fa-square-check"></i> Salvar Artigo</button>
               </div>
            </form>
         </div>
      </div>
   </section>
@endsection