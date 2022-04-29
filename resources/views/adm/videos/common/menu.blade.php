<ul>
    <li @if($menu == 'videos') ?? class="active" @endif>
       <a href="{{ route('videos.index') }}"><i class="fa-solid fa-pen-to-square"></i> Videos</a>
    </li>
    <li @if($menu == 'new-video') ?? class="active" @endif>
       <a href="{{ route('videos.create') }}"><i class="fa-solid fa-square-plus"></i> Novo Video</a>
    </li>
</ul>