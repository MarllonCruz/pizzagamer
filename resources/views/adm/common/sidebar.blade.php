<aside id="menu-aside">
    <div class="logo">
        Ghost Gamer Adm
    </div>
    <nav class="nav-menu">
        <a href="{{ route('dash') }}" @if($page == 'dash') ?? class="active" @endif ><i class="fa-solid fa-chart-simple"></i> Dashboard</a>
        <a href="{{ route('artigos.index') }}" @if($page == 'post') ?? class="active" @endif ><i class="fa-solid fa-newspaper"></i> Artigos</a>
        <a href=""  @if($page == 'video') ?? class="active" @endif ><i class="fa-solid fa-clapperboard"></i> Videos</a>
        <a href=""  @if($page == 'user') ?? class="active" @endif ><i class="fa-solid fa-user"></i> Usuários</a>
        <a href="{{ route('admin.logout') }}"><i class="fa-solid fa-door-open"></i> Sair</a>
    </nav>
</aside>