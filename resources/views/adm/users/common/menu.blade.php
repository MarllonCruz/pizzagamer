<ul>
    <li @if($menu == 'list') ?? class="active" @endif>
       <a href="{{ route('usuarios.index') }}"><i class="fa-solid fa-pen-to-square"></i> Lista</a>
    </li>
    <li @if($menu == 'new') ?? class="active" @endif>
       <a href="{{ route('usuarios.create') }}"><i class="fa-solid fa-square-plus"></i> Novo Usuário</a>
    </li>
</ul>