<ul>
    <li @if($menu == 'posts') ?? class="active" @endif>
       <a href="{{ route('artigos.index') }}"><i class="fa-solid fa-pen-to-square"></i> Artigos</a>
    </li>
    <li @if($menu == 'category') ?? class="active" @endif>
       <a href="{{ route('artigos.categorias.index') }}"><i class="fa-solid fa-bookmark"></i> Categorias</a>
    </li>
    <li @if($menu == 'new-post') ?? class="active" @endif>
       <a href="{{ route('artigos.create') }}"><i class="fa-solid fa-square-plus"></i> Novo Artigo</a>
    </li>
</ul>