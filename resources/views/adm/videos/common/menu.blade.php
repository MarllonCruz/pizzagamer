<ul>
    <li @if($menu == 'videos') ?? class="active" @endif>
       <a href="{{ route('videos.index') }}"><i class="fa-solid fa-pen-to-square"></i> Videos</a>
    </li>
    <li @if($menu == 'category') ?? class="active" @endif>
       <a href="{{ route('videos.categorias.index') }}"><i class="fa-solid fa-bookmark"></i> Categorias</a>
    </li>
    <li @if($menu == 'new-post') ?? class="active" @endif>
       <a href="{{ route('videos.create') }}"><i class="fa-solid fa-square-plus"></i> Novo Video</a>
    </li>
</ul>