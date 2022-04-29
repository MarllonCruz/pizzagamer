<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ghost Gamer | Admin</title>

    <!-- App Style -->
    <link rel="stylesheet" href="{{ url(mix('assets/css/adm/login.css')) }}">
</head>
<body id="login_body">
    <!-- Ajax Loading -->
    @include('adm.common.ajax-load')

    <main>
        <area class="cover">
        <div class="area-form">
            <form action="{{ route('admin.login') }}" method="post">
                @csrf

                <h1>Ghost Gamer Adm</h1>
                
                <div class="ajax_response"></div>

                <label for="email">E-mail</label>
                <input type="email" name="email" id="email" placeholder="seu-email@exemplo.com">
    
                <label for="password">Senha</label>
                <input type="password" name="password" id="password" placeholder="********">
            
                <input type="submit" value="Entrar">
            </form>
        </div>
    </main>

    <!-- JQuery -->
    <script src="{{ url('assets/js/jquery.min.js') }}"></script>
    <!-- JQuery Ui -->
    <script src="{{ url('assets/js/jquery-ui.js') }}"></script>
    <!-- App Script -->
    <script src="{{ url(mix('assets/js/adm/login.js')) }}"></script>
</body>
</html>