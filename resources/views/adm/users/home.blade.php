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

               <form class="form-search" id="form-post-search" action="{{ route('videos.search.ajax') }}" method="post">
                  @csrf
                  <button><i class="fa-solid fa-magnifying-glass"></i></button>
                  <input type="text" name="s" value="{{ $search }}">
               </form>
            </header>

            
         </div>
      </div>
   </section>
@endsection