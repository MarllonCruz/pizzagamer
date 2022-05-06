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
               <h2><i class="fa-solid fa-pen-to-square"></i> Lista</h2>

               <form class="form-search" id="form-post-search" action="{{ route('usuarios.search.ajax') }}" method="post">
                  @csrf
                  <button><i class="fa-solid fa-magnifying-glass"></i></button>
                  <input type="text" name="s" value="{{ $search }}">
               </form>
            </header>

            <div class="list">
               @foreach ($users as $user)
                  <div class="user">
                     <div class="photo">
                        <img src="{{ url('storage/' . $user->photo) }}" alt="">
                     </div>
                     <span><i class="fa-solid fa-user"></i> {{ $user->level() }}</span>
                     <h3>{{ $user->fullName() }} @if($user->id == auth()->user()->id) ( Você ) @endif</h3>
                     <span>{{ $user->email }}</span>
                     <span>Desde {{ date_fmt_custom($user->created_at) }}</span>

                     <div class="btns">
                        <a href="{{ route("usuarios.edit", ["user" => $user->id]) }}"><i class="fa-solid fa-pen"></i> Editar</a>
                        <a href="{{ route("usuarios.destroy", ["user" => $user->id]) }}" onclick="return confirm('Tem certeza que deseja excluir usuário {{ $user->fullName() }} ?')"><i class="fa-solid fa-trash-can"></i> Deletar</a>
                     </div>
                  </div>
               @endforeach

               {{ $users->links('adm.common.pagination-custom') }}
            </div>
         </div>
      </div>
   </section>
@endsection