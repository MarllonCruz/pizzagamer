<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ghost Gamer | Admin - Dashboard</title>

    <!-- Fontawesome style -->
    <link rel="stylesheet" href="{{ url(mix('assets/css/fontawesome.css')) }}">
    <!-- App Style -->
    <link rel="stylesheet" href="{{ url(mix('assets/css/adm/app.css')) }}">
</head>
<body id="adm_body">
    <!-- Ajax Loading -->
    @include('adm.common.ajax_load')
    <!-- Aside -->
    @include('adm.common.sidebar')
    
    <!-- Main -->
    <main>
        <header>
            div.
        </header>

        @yield('content')
    </main>

    <!-- Fontawesome script -->
    <script src="{{ url('assets/js/fontawesome.js') }}"></script>
    <!-- JQuery -->
    <script src="{{ url('assets/js/jquery.min.js') }}"></script>
    <!-- JQuery Ui -->
    <script src="{{ url('assets/js/jquery-ui.js') }}"></script>
    <!-- App Script -->
    <script src="{{ url(mix('assets/js/adm/login.js')) }}"></script>
</body>
</html>