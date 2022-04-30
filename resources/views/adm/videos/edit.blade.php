@extends('adm.common.template')

@section('content')
   <section>
      <h2>Videos</h2>

      <div class="content">
         <div class="left">
            @include('adm.videos.common.menu', ['menu', $menu])
         </div>
         <div class="right post">
            <header>
               <h2><i class="fa-solid fa-square-plus"></i>Editar Video</h2>
               <area />
            </header>

            <form action="{{ route('videos.update', ['video' => $article->id]) }}" method="post" enctype="multipart/form-data">
               @csrf
               <input type="hidden" name="id" value="{{ $article->id }}">

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

               <label for="video">*Link do video youtube</label>
               <input type="text" name="video" id="video" placeholder=" Exp: https://www.youtube.com/watch?v=JORwlHKBvbI" 
               value="@if(old('video')) {{old('video')}} @else {{$article->video}} @endif" @error('video') class="is-invalid" @enderror>
               @error('video')
                  <span class="alert alert-danger">{{ $message }}</span>
               @enderror

               <div class="form-group">
                    <div class="form">
                        <label for="description">Data de estreia</label>
                        <input type="datetime-local"  name="opening_at" id="opeming_at"
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

               <div class="al-right">
                  <button type="submit"><i class="fa-solid fa-square-check"></i> Salvar Artigo</button>
               </div>
            </form>
         </div>
      </div>
   </section>
@endsection