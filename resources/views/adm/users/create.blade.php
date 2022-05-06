@extends('adm.common.template')

@section('content')
   <section>
      <h2>Usuários</h2>

      <div class="content">
         <div class="left">
            @include('adm.users.common.menu', ['menu', $menu])
         </div>
         <div class="right post">
            <header>
               <h2><i class="fa-solid fa-square-plus"></i>Novo Usuário</h2>
               <area />
            </header>

            <form action="{{ route('usuarios.store') }}" method="post" enctype="multipart/form-data">
               @csrf
               
               <label for="photo">Image de Perfil</label>
               <input type="file" name="photo" id="photo">
               @error('photo')
                  <span class="alert alert-danger">{{ $message }}</span>
               @enderror

               <div class="form-group">
                  <div class="form">
                     <label for="title">*Nome</label>
                     <input type="text" name="first_name" id="first_name"
                        value="{{ old('first_name') }}" @error('first_name') class="is-invalid" @enderror>
                     @error('first_name')
                        <span class="alert alert-danger">{{ $message }}</span>
                     @enderror
                  </div>

                  <div class="form">
                     <label for="title">*Sobrenome</label>
                     <input type="text" name="last_name" id="last_name"
                        value="{{ old('last_name') }}" @error('last_name') class="is-invalid" @enderror>
                     @error('last_name')
                        <span class="alert alert-danger">{{ $message }}</span>
                     @enderror
                  </div>
               </div>

               <div class="form-group">
                  <div class="form">
                     <label for="title">*E-mail</label>
                     <input type="email" name="email" id="email"
                        value="{{ old('email') }}" @error('email') class="is-invalid" @enderror>
                     @error('email')
                        <span class="alert alert-danger">{{ $message }}</span>
                     @enderror
                  </div>
               </div>

               <div class="form-group">
                  <div class="form">
                     <label for="document">CPF:</label>
                     <input type="text"  name="document" id="document"
                           value="{{ old('document') }}">
                        @error('document')
                           <span class="alert alert-danger">{{ $message }}</span>
                        @enderror
                  </div>

                  <div class="form">
                     <label for="password">*Senha:</label>
                     <input type="password" name="password" id="password"
                        value="{{ old('password') }}">
                     @error('password')
                        <span class="alert alert-danger">{{ $message }}</span>
                     @enderror
                  </div>
               </div>

               <div class="form-group">
                  <div class="form">
                     <label for="level">*Nivel:</label>
                     <select name="level" id="level">
                        <option value="1" selected>Visitante</option>
                        <option value="6">Administrador</option>
                        <option value="10">Lider</option>
                     </select>
                     @error('level')
                        <span class="alert alert-danger">{{ $message }}</span>
                     @enderror
                  </div>

                  <div class="form">
                     <label for="genre">*Gênero</label>
                     <select name="genre" id="genre">
                        <option value="masculine" selected>Masculino</option>
                        <option value="feminine">Feminino</option>
                    </select>
                    @error('genre')
                     <span class="alert alert-danger">{{ $message }}</span>
                  @enderror
                  </div>

                  <div class="form">
                     <label for="datebirth">Data de Nascimento:</label>
                     <input type="date" name="datebirth" id="datebirth"
                        value="{{ old('datebirth') }}">
                     @error('datebirth')
                        <span class="alert alert-danger">{{ $message }}</span>
                     @enderror
                  </div>
               </div>

               <div class="al-right">
                  <button type="submit"><i class="fa-solid fa-square-check"></i> Criar Usuário</button>
               </div>
            </form>
         </div>
      </div>
   </section>
@endsection