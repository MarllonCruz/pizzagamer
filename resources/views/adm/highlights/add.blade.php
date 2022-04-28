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
               <h2><i class="fa-solid fa-pen-to-square"></i>Destauqe {{ $highlight->title }} - Adicionar</h2>
            </header>

            <div class="add">
                <form action="{{ route('destaques.store', ['highlight' => $highlight->id]) }}" method="post">
                    @csrf
                    <label>Seleciona um artigo</label>
                
                    <select name="article_id">
                        @foreach ($articles as $article)
                                <option value="{{ $article->id }}">
                                    Titulo: {{$article->title}} ({{ $article->category->title }})
                                </option>
                        @endforeach
                    </select>

                    <div class="al-right">
                        <button type="submit"><i class="fa-solid fa-square-check"></i> Adicionar</button>
                    </div>
                </form>
            </div>
         </div>
      </div>
   </section>
@endsection