<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Visualizar</title>

    <!-- App Style -->
    <link rel="stylesheet" href="{{ url(mix('assets/css/adm/app.css')) }}">

    <style>
        body {
            max-width: 800px;
            margin-top: 20px;
        }

        h1 {
            text-align: center;
            font-size: 34px;
            font-weight: 600;
            padding: 20px 0 20px 0;
            line-height: 1.2;
        }

        h3 {
            text-align: center;
            font-size: 22px;
            margin: 0 0 15px 0;
            line-height: 1.2;
            font-weight: 400;
        }

        .video {
            width: 100%;
            height: 400px;
            background-color: #292a2c;
            border-radius: 10px;
            overflow: hidden;
        }

        .video iframe {
            width: inherit;
            height: inherit;
        }

        .info {
            display: flex;
            justify-content: space-between;
            padding: 10px 0 30px 0;
        }

        .info .author {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #5a5a5afd;
            font-size: 18px;
            margin: 0;
        }

        img {
            width: 50px;
            height: 50px;
            overflow: hidden;
            border-radius: 50%;
        }

        .info .date {
            display: flex;
            align-items: center;
            color: #5a5a5afd;
            margin: 0;
        }
    </style>
</head>
<body>
    <h1>{{ $article->title }}</h1>
    <h3>{{ $article->description }}</h3>
    <div class="video">
        <iframe width="560" class="iframe_1"
            src="{{ $article->video }}"
            frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
    </div>
    <div class="info">
        <div class="author">
            <div class="avatar">
                <img src="{{ url('storage/' . $article->user->photo) }}" alt="">
            </div>
            <div class="name">
                Por: {{ $article->user->fullName() }}
            </div>
        </div>

        <div class="date">
            Dia {{ date_fmt($article->opening_at) }}
        </div>
    </div>
</body>
</html>