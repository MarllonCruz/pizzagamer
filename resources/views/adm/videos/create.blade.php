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
               <h2><i class="fa-solid fa-square-plus"></i>Novo Video</h2>
               <area />
            </header>

            <form action="{{ route('videos.store') }}" method="post" enctype="multipart/form-data">
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

               <label for="video">*Link do video youtube</label>
               <input type="text" name="video" placeholder=" Exp: https://www.youtube.com/watch?v=JORwlHKBvbI" 
               value="{{ old('video') }}"  @error('video') class="is-invalid" @enderror>
               @error('video')
                  <span class="alert alert-danger">{{ $message }}</span>
               @enderror

               <div class="form-group">
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

               <div class="al-right">
                  <button type="submit"><i class="fa-solid fa-square-check"></i> Criar Video</button>
               </div>
            </form>
         </div>
      </div>
   </section>
@endsection