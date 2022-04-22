<ul>
    <li @if($menu == 'slide') ?? class="active" @endif>
       <a href="{{ route('slides.index') }}"><i class="fa-solid fa-list-ul"></i> Lista</a>
    </li>
    <li @if($menu == 'add') ?? class="active" @endif>
        <a href="{{ route('slides.create') }}"><i class="fa-solid fa-pen-to-square"></i> Adicionar</a>
     </li>
</ul>