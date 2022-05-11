@extends('web.template')

@section('title', " - {$article->title}")

@section('content')
	<!-- Article Post -->
    <main class="width-full">
        <article class="article container center">
            <h1>{{ $article->title }}</h1>
            <img src="{{ url("storage/{$article->cover}") }}" alt="" >
            <div class="info">
                <div class="author">
                    <div class="avatar"><img src="{{ url("storage/{$article->user->photo}") }}" alt=""></div>
                    <div class="name">Por: {{ $article->user->fullName() }}</div>
                </div>
                <div class="date">{{ date_fmt_custom($article->created_at) }}</div>
            </div>

            <div class="htmlchars">{!! $article->content !!}</div>
        </article>
        <!-- Others Articles -->
        @include('web.common.others-articles', ['routeUri' => 'noticia'])
    </main>
@endsection