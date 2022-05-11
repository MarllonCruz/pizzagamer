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