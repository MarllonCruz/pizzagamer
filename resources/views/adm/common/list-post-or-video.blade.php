<div class="list-post">
    @foreach ($articles as $article)
       <div class="post">
          <img src="{{ url('storage/' . $article->cover) }}" alt="">  

          <a target="_blank" href="{{ route("{$route}.show", ["{$param}" => $article->id]) }}">{{ $article->title }}</a>

          <div class="status-post">
             <span><i class="fa-solid fa-clock"></i> {{ date_fmt($article->updated_at, 'd/m/Y H:i') }}</span>
             @if (isset($article->category->title))
               <span><i class="fa-solid fa-bookmark"></i> {{ $article->category->title }}</span>
             @endif
             <span><i class="fa-solid fa-user"></i> {{ $article->user->fullName() }}</span>
             <span><i class="fa-solid fa-pen-to-square"></i> {{ $article->statusPtBr() }}</span>
          </div>

          <div class="btns">
             <a href="{{ route("{$route}.edit", ["{$param}" => $article->id]) }}"><i class="fa-solid fa-pen"></i> Editar</a>
             <a href="{{ route("{$route}.destroy", ["{$param}" => $article->id]) }}" onclick="return confirm('Tem certeza que deseja excluir categoria {{ $article->title }} ?')"><i class="fa-solid fa-trash-can"></i> Deletar</a>
          </div>
       </div>
    @endforeach
 </div>

 {{ $articles->links('adm.common.pagination-custom') }}