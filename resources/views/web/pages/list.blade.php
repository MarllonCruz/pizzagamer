@extends('web.template')

@if ($type == 'noticia')
	@section('title', ' - Notícias')
	<?php $routeUri =  'noticia' ?>
@else
	@section('title', ' - Videos')
	<?php $routeUri =  'video' ?>
@endif

@section('content')
	<main class="width-full">
		<section class="news-page container center">
			<div class="news-header">
				<h1>{{ $title }}</h1>
				<p>{{ $description }}</p>
				<form class="search-box" method="post" action="{{ route("listagem.search", ['type' => $type]) }}">
					@csrf
					<input type="text" name="s" value="{{ $searchInput }}" placeholder="{{ $placeholderInput }}">
					<button><i class="fa-solid fa-magnifying-glass"></i></button>
				</form>
			</div>
			<div class="news_content mt-20">
				@foreach ($articles as $article)
					<article>
						<a class="box-img" href="{{ route($routeUri, ['uri' => $article->uri]) }}">
							<img src="{{ url("storage/{$article->cover}") }}" alt="">
						</a>
						<header>
							<p class="meta">
								@if(!empty($article->category_id)) 
									<a href="{{ route('listagem.category', ['category' =>$article->category->uri]) }}"
										>{{ $article->category->title }}</a> •
								@endif 
								{{ $article->user->fullName() }} • {{ date_fmt_custom($article->created_at) }}
							</p>
							<h2>
								<a href="{{ route($routeUri, ['uri' => $article->uri]) }}">{{ $article->title }}</a>
							</h2>
							<p> 
								<a href="{{ route($routeUri, ['uri' => $article->uri]) }}">{{ $article->description }}</a> 
							</p>
						</header>
					</article>
				@endforeach
			</div>
			{{ $articles->links('web.common.pagination-custom') }}
		</section>
	</main>
@endsection