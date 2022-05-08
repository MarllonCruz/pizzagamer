<section class="width-full mt-20 feed-slideshow-responsive">
    <div class="feed-slideshow container center">
        @foreach ($slides as $key => $slide)
            <div @if($key==0) class="slide active" @else class="slide" @endif>
                <img src="{{ url('storage/' . $slide->cover) }}" alt="" />
                <div class="slide-info">
                    <h2>{{ $slide->title }}</h2>
                    <p>{{ $slide->description }}</p>
                    <a href="#">Read More</a> 
                </div>
            </div>
        @endforeach

        <div class="navigation">
            @foreach ($slides as $key => $slide)
                <div @if($key==0) class="btn active" @else class="btn" @endif></div>
            @endforeach
        </div>
    </div>
</section>