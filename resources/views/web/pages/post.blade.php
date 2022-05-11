@extends('web.template')

@section('title', ' - Notícias')

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
        <section class="others-articles container center">
            <div class="others-articles-header">
				<h1>Veja também:</h1>
				<p>Confira mais notícias e estar por dentro no mundo dos games</p>
			</div>
            <div class="others-articles-body">
                <article>
                    <a class="box-img" href="#">
                        <img src="assets/images/Shen_15.jpg" alt="">
                    </a>
                    <header>
                        <p class="meta">
                            <a href="">Evento</a> • Marlon Cruz • 06/02/2019 17h31  
                        </p>
                        <h2>
                            <a href="">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                             Lorem Ipsum has been the industry's standard dummy
                            </a>
                        </h2>
                        <p> 
                            <a href="">
                                psum is simply dummy text of the printing and typesetting industry. 
                                Lorem Ipsum 
                            </a> 
                        </p>
                    </header>
                </article>
                <article>
                    <a class="box-img" href="#">
                        <img src="assets/images/Shen_15.jpg" alt="">
                    </a>
                    <header>
                        <p class="meta">
                            <a href="">Evento</a> • Marlon Cruz • 06/02/2019 17h31  
                        </p>
                        <h2>
                            <a href="">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                             Lorem Ipsum has been the industry's standard dummy
                            </a>
                        </h2>
                        <p> 
                            <a href="">
                                psum is simply dummy text of the printing and typesetting industry. 
                                Lorem Ipsum 
                            </a> 
                        </p>
                    </header>
                </article>
                <article>
                    <a class="box-img" href="#">
                        <img src="assets/images/Shen_15.jpg" alt="">
                    </a>
                    <header>
                        <p class="meta">
                            <a href="">Evento</a> • Marlon Cruz • 06/02/2019 17h31  
                        </p>
                        <h2>
                            <a href="">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                             Lorem Ipsum has been the industry's standard dummy
                            </a>
                        </h2>
                        <p> 
                            <a href="">
                                psum is simply dummy text of the printing and typesetting industry. 
                                Lorem Ipsum 
                            </a> 
                        </p>
                    </header>
                </article>
            </div>
        </section>
    </main>
@endsection