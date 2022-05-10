<header class="width-full">
    <nav class="container center">
        <div class="nav-top">
            <p class="nav-top--numb">Cel: +01 123 456 7890</p>
            <ul class="nav-top--social">
                <li><a><i class="fa-brands fa-twitter"></i></a></li>
                <li><a><i class="fa-brands fa-linkedin-in"></i></a></li>
                <li><a><i class="fa-brands fa-github-alt"></i></a></li>
            </ul>
        </div>
        <div class="nav-separate"></div>
        <div class="nav-menu">
            <div class="nav-menu--log">
                <a href="{{ route('home') }}"><i class="fa-solid fa-ghost"></i>Ghost Gamer</a>
            </div>
            <div class="nav-menu--menus">
                <ul>
                    <div class="nav-menu--btn-close">
                        <i class="fa-solid fa-right-long"></i>
                    </div>
                    <li><a @if($page == "home") class="active" @endif href="{{ route('home') }}">HOME</a></li>
                    <li><a @if($page == "post") class="active" @endif href="{{ route('listagem', ['type' => 'noticia']) }}">NOTÍCIAS</a></li>
                    <li><a @if($page == "video") class="active" @endif href="{{ route('listagem', ['type' => 'video']) }}">VIDEOS</a></li>
                </ul>
            </div>
            <div class="nav-menu--btn-open">
                <i class="fa-solid fa-bars"></i>
            </div>
        </div>
    </nav>
</header>