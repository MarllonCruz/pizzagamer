<section class="others-articles container center">
    <div class="others-articles-header">
        <h1>Veja também:</h1>
        <p>Confira mais notícias e estar por dentro no mundo dos games</p>
    </div>
    <div class="others-articles-body">
        @foreach ($othersArticles as $article)
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
                        <a href="{{ route($routeUri, ['uri' => $article->uri]) }}">
                           {{ $article->title }}
                        </a>
                    </h2>
                    <p> 
                        <a href="{{ route($routeUri, ['uri' => $article->uri]) }}">
                            {{ $article->description }}
                        </a> 
                    </p>
                </header>
            </article>
        @endforeach
    </div>
</section>