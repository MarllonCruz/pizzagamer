@extends('web.template')

@section('title', ' - Videos')

@section('content')
	 <!-- Article Video -->
     <main class="width-full">
        <article class="article article-video container center">
            <h1>{{ $article->title }}</h1>
            <h3>{{ $article->description }}</h3>
            <div class="video">
                <iframe width="560" class="iframe_1"
                    src="{{ $article->video }}"
                    frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
            </div>
            <div class="info">
                <div class="author">
                    <div class="avatar"><img src="{{ url("storage/{$article->user->photo}") }}" alt=""></div>
                    <div class="name">Por: {{ $article->user->fullName() }}</div>
                </div>
                <div class="date">{{ date_fmt_custom($article->created_at) }}</div>
            </div>
        </article>
    </main>
    <!-- Others Articles -->
    @include('web.common.others-articles', ['routeUri' => 'video'])
@endsection