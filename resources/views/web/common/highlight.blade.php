<section class="width-full mt-20 feed-highlights-responsive">
    <div class="feed-highlights container center">

        @foreach ($highlights as $highlight)
            @switch($highlight->position)
                @case("large")
                    <!-- Feed Large -->
                    <article class="feed-large">
                        <div class="feed-info">
                            <a class="feed-type" href="#">{{ $highlight->category->title }}</a>
                            <a href="#">
                                <h2>{{ $highlight->title }}</h2>
                                <p>{{ $highlight->description }}</p>
                            </a>
                        </div>
                        <a class="feed-cover" href="#">
                            <img src="{{ url("storage/{$highlight->cover}") }}" alt="" />
                        </a>
                        <span class="feed-datetime">
                            <i class="fa-solid fa-clock"></i> {{ date_fmt_ago($highlight->opening_at) }}
                        </span>
                    </article>
                    @break
                @case("medium")
                    <!-- Feed Medium -->
                    <article class="feed-medium">
                        <div class="feed-info">
                            <a class="feed-type" href="#">{{ $highlight->category->title }}</a>
                            <a href="#">
                                <h2>{{ $highlight->title }}</h2>
                                <p>{{ $highlight->description }}</p>
                            </a>
                        </div>
                        <a class="feed-cover" href="#">
                            <img src="{{ url("storage/{$highlight->cover}") }}" alt="" />
                        </a>
                        <span class="feed-datetime">
                            <i class="fa-solid fa-clock"></i> {{ date_fmt_ago($highlight->opening_at) }}
                        </span>
                    </article>
                    @break
                @case("small diff")
                    <!-- Feed Small Diff -->
                    <article class="feed-small diff">
                        <div class="feed-info">
                            <a class="feed-type" href="https://www.google.com/">{{ $highlight->category->title }}</a>
                            <a href="#">
                                <h2>{{ $highlight->title }}</h2>
                                <p>{{ $highlight->description }}</p>
                            </a>
                        </div>
                        <a class="feed-cover" href="#">
                            <img src="{{ url("storage/{$highlight->cover}") }}" alt="" />
                        </a>
                        <div class="feed-author">
                            <div class="feed-author--icon">
                                <img src="{{ url("storage/{$highlight->user->photo}") }}" alt="">
                            </div>
                            <div class="feed-author--info">
                                <h4>{{ $highlight->user->fullName() }}</h4>
                                <span><i class="fa-solid fa-clock"></i> {{ date_fmt_ago($highlight->opening_at) }}</span>
                            </div>
                        </div>
                    </article>
                    @break
                @case("small")
                    <!-- Feed Small -->
                    <article class="feed-small">
                        <div class="feed-info">
                            <a class="feed-type" href="#">{{ $highlight->category->title }}</a>
                            <a href="#">
                                <h2>{{ $highlight->title }}</h2>
                                <p>{{ $highlight->description }}</p>
                            </a>
                        </div>
                        <a class="feed-cover" href="#">
                            <img src="{{ url("storage/{$highlight->cover}") }}" alt="" />
                        </a>
                        <span class="feed-datetime">
                            <i class="fa-solid fa-clock"></i> {{ date_fmt_ago($highlight->opening_at) }}
                        </span>
                    </article>
                    @break
            @endswitch
        @endforeach

        <!-- Feed News -->
        <article class="feed-news">
            <div class="header">
                <h4>News</h4>
            </div>
            <div class="body">
                @foreach ($posts as $key => $post)
                    <a class="feed" href="#1">
                        @if($key == 0) <img src="{{ url("storage/{$post->cover}") }}" alt=""> @endif
                        <span>{{ date_fmt_ago($post->opening_at) }}</span>
                        <h3>{{ $post->title }}</h3>
                    </a>
                @endforeach
            </div>
            <div class="footer">
                <a href="#10">ALL NEWS</a>
            </div>
        </article>
    </div>
</section>