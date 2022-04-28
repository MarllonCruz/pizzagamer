@extends('adm.common.template')

@section('content')
   <section>
      <h2>Destaques</h2>

      <div class="content">
         <div class="left">
            @include('adm.highlights.common.menu', ['menu', $menu])
         </div>
         <div class="right">
            <header>
               <h2><i class="fa-solid fa-pen-to-square"></i> Listas de Destaque</h2>
            </header>

            <div class="highlights">
                @foreach ($highlights as $highlight)
                    <div class="highlight">
                        <h2>Destaque {{ $highlight->title }}</h2>
                        @if (!$highlight->article)
                            <p><i class="fa-solid fa-face-frown-open"></i> Vazio</p>
                            <a class="btn add" href="{{ route('destaques.create', ['highlight' => $highlight->id]) }}">
                                <i class="fa-solid fa-square-plus"></i> Adicionar
                            </a>
                        @else 
                            <p>{{ $highlight->article->title }} ({{ $highlight->article->category->title }})</p>
                            <a class="btn remove" href="{{ route('destaques.destroy', ['highlight' => $highlight->id]) }}" onclick="return confirm('Tem certeza que remover artigo: {{ $highlight->article->title }} ?')">
                                <i class="fa-solid fa-trash-can"></i> Remover
                            </a> 
                        @endif
                    </div>
                @endforeach
            </div>
         </div>
      </div>
   </section>
@endsection