@extends('adm.common.template')

@section('content')
   <section>
      <h2>Usuarios</h2>

      <div class="content">
         <div class="left">
            @include('adm.users.common.menu', ['menu', $menu])
         </div>
         <div class="right post">
            <header>
               <h2><i class="fa-solid fa-square-plus"></i>Editar Usuario</h2>
               <area />
            </header>

            <form action="{{ route('usuarios.update', ['user' => $user->id]) }}" method="post" enctype="multipart/form-data">
               @csrf
               <input type="hidden" name="id" value="{{ $user->id }}">

               <label for="photo">Image de Perfil</label>
               <div class="cover-box">
                  @if (!empty($user->photo))
                     <img src="{{ url('storage/' . $user->photo) }}" alt="">      
                  @endif
               </div>
               <input type="file" name="photo" id="photo">
               @error('photo')
                  <span class="alert alert-danger">{{ $message }}</span>
               @enderror

               <div class="form-group">
                  <div class="form">
                     <label for="first_name">Nome</label>
                     <input type="text" name="first_name" id="first_name"
                     value="@if(old('first_name')) {{old('first_name')}} @else {{$user->first_name}} @endif" 
                     @error('first_name') class="is-invalid" @enderror>
                     @error('first_name')
                        <span class="alert alert-danger">{{ $message }}</span>
                     @enderror
                  </div>

                  <div class="form">
                     <label for="last_name">Sobrenome</label>
                     <input type="text" name="last_name" id="last_name"
                     value="@if(old('last_name')) {{old('last_name')}} @else {{$user->last_name}} @endif"
                     @error('last_name') class="is-invalid" @enderror>
                     @error('last_name')
                        <span class="alert alert-danger">{{ $message }}</span>
                     @enderror
                  </div>
               </div>

               <div class="form-group">
                  <div class="form">
                     <label for="email">E-mail</label>
                     <input type="email" name="email" id="email"
                     value="@if(old('email')) {{old('email')}} @else {{$user->email}} @endif"
                     @error('email') class="is-invalid" @enderror>
                     @error('email')
                        <span class="alert alert-danger">{{ $message }}</span>
                     @enderror
                  </div>
               </div>

               <div class="form-group">
                  <div class="form">
                     <label for="document">CPF:</label>
                     <input type="text" name="document" id="document"
                     value="@if(old('document')) {{old('document')}} @else {{$user->document}} @endif"
                     @error('document') class="is-invalid" @enderror>
                     @error('document')
                        <span class="alert alert-danger">{{ $message }}</span>
                     @enderror
                  </div>

                  <div class="form">
                     <label for="new_password">Nova Senha:</label>
                     <input type="password" name="new_password" id="new_password"
                     value="{{ old('new_password') }}"
                     @error('new_password') class="is-invalid" @enderror>
                     @error('new_password')
                        <span class="alert alert-danger">{{ $message }}</span>
                     @enderror
                  </div>
               </div>

               <div class="form-group">
                  <div class="form">
                     <label for="level">Nivel:</label>
                     <select name="level" id="level">
                        <option value="1" @if($user->level == "1") selected @endif>Visitante</option>
                        <option value="6" @if($user->level == "6") selected @endif>Administrador</option>
                        <option value="10"@if($user->level == "10") selected @endif>Lider</option>
                     </select>
                     @error('level')
                        <span class="alert alert-danger">{{ $message }}</span>
                     @enderror
                  </div>

                  <div class="form">
                     <label for="genre">Gênero</label>
                     <select name="genre" id="genre">
                        <option value="masculine" @if($user->genre == "masculine") selected @endif>Masculino</option>
                        <option value="feminine"  @if($user->genre == "feminine") selected @endif>Feminino</option>
                    </select>
                  @error('genre')
                     <span class="alert alert-danger">{{ $message }}</span>
                  @enderror
                  </div>

                  <div class="form">
                     <label for="datebirth">Data de Nascimento:</label>
                     <input type="date" name="datebirth" id="datebirth"
                     value="@if(old('datebirth')){{old('datebirth')}}@else{{date_fmt($user->datebirth, "Y-m-d")}}@endif">
                     @error('datebirth')
                        <span class="alert alert-danger">{{ $message }}</span>
                     @enderror
                  </div>
               </div>

               <div class="al-right">
                  <button type="submit"><i class="fa-solid fa-square-check"></i> Atualizar Usuário</button>
               </div>
            </form>
         </div>
      </div>
   </section>
@endsection