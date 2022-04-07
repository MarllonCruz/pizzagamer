@extends('adm.common.template')

@section('content')
   <section class="article-post">
      <h2>Artigos</h2>

      <div class="content">
         <div class="left">
            @include('adm.posts.common.menu', ['menu', $menu])
         </div>
         <div class="right">
            Posts
         </div>
      </div>
   </section>
@endsection