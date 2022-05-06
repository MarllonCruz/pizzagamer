<!DOCTYPE html>
<html>
	
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ghost Gamer</title>

	 <!-- Fontawesome style -->
	 <link rel="stylesheet" href="{{ url(mix('assets/css/fontawesome.css')) }}">
	 <!-- App Style -->
	 <link rel="stylesheet" href="{{ url('assets/css/web/app.css') }}">
</head>

<body>
	<!-- Header -->
	<header class="width-full">
		<nav class="container center">
			<div class="nav-top">
				<p class="nav-top--numb">Cel: +01 123 456 7890</p>
				<ul class="nav-top--social">
					<li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
					<li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
					<li><a href="#"><i class="fa-brands fa-github-alt"></i></a></li>
				</ul>
			</div>
			<div class="nav-separate"></div>
			<div class="nav-menu">
				<div class="nav-menu--log">
					<a href="#"><i class="fa-solid fa-ghost"></i>Ghost Gamer</a>
				</div>
				<div class="nav-menu--menus">
					<ul>
						<div class="nav-menu--btn-close">
							<i class="fa-solid fa-right-long"></i>
						</div>
						<li><a class="active" href="file:///C:/projetos/newsgames_v2/__MODELO/index.html">HOME</a></li>
						<li><a href="file:///C:/projetos/newsgames_v2/__MODELO/news.html">NOTÍCIAS</a></li>
						<li><a href="file:///C:/projetos/newsgames_v2/__MODELO/videos.html">VIDEOS</a></li>
					</ul>
				</div>
				<div class="nav-menu--btn-open">
					<i class="fa-solid fa-bars"></i>
				</div>
			</div>
		</nav>
	</header>

	<!-- Main Content -->
	<main>
		<!-- Feed SlideShow -->
		<section class="width-full mt-20 feed-slideshow-responsive">
			<div class="feed-slideshow container center">
				@foreach ($posts as $key => $post)
					<div @if($key==0) class="slide active" @else class="slide" @endif>
						<img src="{{ url('storage/' . $post->cover) }}" alt="" />
						<div class="slide-info">
							<h2>{{ $post->title }}</h2>
							<p>{{ $post->description }}</p>
							<a href="#">Read More</a> 
						</div>
					</div>
				@endforeach

				<div class="navigation">
					@foreach ($posts as $key => $post)
						<div @if($key==0) class="btn active" @else class="btn" @endif></div>
					@endforeach
				</div>
			</div>
		</section>

		<!-- Feed Highlights -->
		<section class="width-full mt-20 feed-highlights-responsive">
			<div class="feed-highlights container center">
				<!-- Feed Large -->
				<article class="feed-large">
					<div class="feed-info">
						<a class="feed-type" href="#">Movies</a>
						<a href="#">
							<h2>Assassin's Creed Valhalla cing elit, sed do eiusmod tempor incididunt  cing elit, sed do eiusmod tempor incididunt</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod teorem ipsum dolor sit amet, consectetur adipiscing elit, sorem ipsum dolor sit amet, consectetur adipiscing elit, s orem ipsum dolor sit amet, consectetur adipiscing elit, smpor incididunt ut labore et dolore magna aliqua.</p>
						</a>
					</div>
					<a class="feed-cover" href="#">
						<img src="assets/images/Shen_15.jpg" alt="" />
					</a>
					<span class="feed-datetime">
						<i class="fa-solid fa-clock"></i> 10 hours ago
					</span>
				</article>
				<!-- Feed Medium -->
				<article class="feed-medium">
					<div class="feed-info">
						<a class="feed-type" href="#">Movies</a>
						<a href="#">
							<h2>Assassin's Creed Valhalla cing elit, sed do eiusmod tempor incididunt  cing elit, sed do eiusmod tempor incididunt</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod teorem ipsum dolor sit amet, consectetur adipiscing elit, sorem ipsum dolor sit amet, consectetur adipiscing elit, s orem ipsum dolor sit amet, consectetur adipiscing elit, smpor incididunt ut labore et dolore magna aliqua.</p>
						</a>
					</div>
					<a class="feed-cover" href="#">
						<img src="assets/images/Shen_15.jpg" alt="" />
					</a>
					<span class="feed-datetime">
						<i class="fa-solid fa-clock"></i> 10 hours ago
					</span>
				</article>
				<!-- Feed Small Diff -->
				<article class="feed-small diff">
					<div class="feed-info">
						<a class="feed-type" href="https://www.google.com/">Movies</a>
						<a href="#">
							<h2>Assassin's Creed Valhalla cing elit, sed do eiusmod tempor incididunt  cing elit, sed do eiusmod tempor incididunt</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod teorem ipsum dolor sit amet, consectetur adipiscing elit, sorem ipsum dolor sit amet, consectetur adipiscing elit, s orem ipsum dolor sit amet, consectetur adipiscing elit, smpor incididunt ut labore et dolore magna aliqua.</p>
						</a>
					</div>
					<a class="feed-cover" href="#">
						<img src="assets/images/Shen_15.jpg" alt="" />
					</a>
					<div class="feed-author">
						<div class="feed-author--icon">
							<img src="assets/images/icon.png" alt="">
						</div>
						<div class="feed-author--info">
							<h4>Sylas</h4>
							<span><i class="fa-solid fa-clock"></i> 10 hours ago</span>
						</div>
					</div>
				</article>
				<!-- Feed Small -->
				<article class="feed-small">
					<div class="feed-info">
						<a class="feed-type" href="#">Movies</a>
						<a href="#">
							<h2>Assassin's Creed Valhalla cing elit, sed do eiusmod tempor incididunt  cing elit, sed do eiusmod tempor incididunt</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod teorem ipsum dolor sit amet, consectetur adipiscing elit, sorem ipsum dolor sit amet, consectetur adipiscing elit, s orem ipsum dolor sit amet, consectetur adipiscing elit, smpor incididunt ut labore et dolore magna aliqua.</p>
						</a>
					</div>
					<a class="feed-cover" href="#">
						<img src="assets/images/Shen_15.jpg" alt="" />
					</a>
					<span class="feed-datetime">
						<i class="fa-solid fa-clock"></i> 10 hours ago
					</span>
				</article>
				<article class="feed-small">
					<div class="feed-info">
						<a class="feed-type" href="#">Movies</a>
						<a href="#">
							<h2>Assassin's Creed Valhalla cing elit, sed do eiusmod tempor incididunt  cing elit, sed do eiusmod tempor incididunt</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod teorem ipsum dolor sit amet, consectetur adipiscing elit, sorem ipsum dolor sit amet, consectetur adipiscing elit, s orem ipsum dolor sit amet, consectetur adipiscing elit, smpor incididunt ut labore et dolore magna aliqua.</p>
						</a>
					</div>
					<a class="feed-cover" href="#">
						<img src="assets/images/Shen_15.jpg" alt="" />
					</a>
					<span class="feed-datetime">
						<i class="fa-solid fa-clock"></i> 10 hours ago
					</span>
				</article>
				<article class="feed-small">
					<div class="feed-info">
						<a class="feed-type" href="#">Movies</a>
						<a href="#">
							<h2>Assassin's Creed Valhalla cing elit, sed do eiusmod tempor incididunt  cing elit, sed do eiusmod tempor incididunt</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod teorem ipsum dolor sit amet, consectetur adipiscing elit, sorem ipsum dolor sit amet, consectetur adipiscing elit, s orem ipsum dolor sit amet, consectetur adipiscing elit, smpor incididunt ut labore et dolore magna aliqua.</p>
						</a>
					</div>
					<a class="feed-cover" href="#">
						<img src="assets/images/Shen_15.jpg" alt="" />
					</a>
					<span class="feed-datetime">
						<i class="fa-solid fa-clock"></i> 10 hours ago
					</span>
				</article>
				<article class="feed-small">
					<div class="feed-info">
						<a class="feed-type" href="#">Movies</a>
						<a href="#">
							<h2>Assassin's Creed Valhalla cing elit, sed do eiusmod tempor incididunt  cing elit, sed do eiusmod tempor incididunt</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod teorem ipsum dolor sit amet, consectetur adipiscing elit, sorem ipsum dolor sit amet, consectetur adipiscing elit, s orem ipsum dolor sit amet, consectetur adipiscing elit, smpor incididunt ut labore et dolore magna aliqua.</p>
						</a>
					</div>
					<a class="feed-cover" href="#">
						<img src="assets/images/Shen_15.jpg" alt="" />
					</a>
					<span class="feed-datetime">
						<i class="fa-solid fa-clock"></i> 10 hours ago
					</span>
				</article>

				<!-- Feed News -->
				<article class="feed-news">
					<div class="header">
						<h4>News</h4>
					</div>
					<div class="body">
						<a class="feed" href="#1">
							<img src="assets/images/Shen_15.jpg" alt="">
							<span>10 hours ago</span>
							<h3>Assassin's Creed Valhalla cing elit, sed do eiusmod tempor incididunt</h3>
						</a>
						<a class="feed" href="#2">
							<span>10 hours ago</span>
							<h3>Assassin's Creed Valhalla cing elit, sed do eiusmod tempor incididunt</h3>
						</a>
						<a class="feed" href="#3">
							<span>10 hours ago</span>
							<h3>Assassin's Creed Valhalla cing elit, sed do eiusmod tempor incididunt</h3>
						</a>
						<a class="feed" href="#4">
							<span>10 hours ago</span>
							<h3>Assassin's Creed Valhalla cing elit, sed do eiusmod tempor incididunt</h3>
						</a>
						<a class="feed" href="#5">
							<span>10 hours ago</span>
							<h3>Assassin's Creed Valhalla cing elit, sed do eiusmod tempor incididunt</h3>
						</a>
					</div>
					<div class="footer">
						<a href="#10">ALL NEWS</a>
					</div>
				</article>
			</div>
		</section>

		<!-- Feed Videos -->
		<section class="width-full my-20 feed-videos-responsive">
			<div class="feed-videos container center">
				<div class="header">
					<h4>Videos</h4>
				</div>
				<div class="body">
					@foreach ($videos as $video)
						<a class="video" href="#" 
							data-modal=".home_video_modal" 
							data-uri="{{ $video->video }}">
								<div class="box-img">
									<img src="{{ url('storage/' . $video->cover) }}" alt="">
									<i class="fa-solid fa-play"></i>
								</div>
								<p>{{ $video->title }}</p>
						</a>
					@endforeach
				</div>
			</div>

			<div class="home_video_modal j_modal_close">
				<div class="home_video_modal_box">
					<div class="embed">
						<iframe width="560" class="iframe_1"
							src=""
							frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
					</div>
				</div>
			</div>
		</section>
	</main>

	<!-- Footer -->
	<footer class="width-full mt-20">
		<section class="footer-container container center">
			<h3>Desenvolvido pelo Marlon Cruz</h3>
			<p><i class="fa-brands fa-whatsapp"></i>(21) 9 9890-1259</p>
			<ul>
				<li><a target="_blank" href="https://www.linkedin.com/in/marlon-cruz-ba1839186/" title="Linkedin">
						<i class="fa-brands fa-linkedin-in"></i>
					</a></li>
				<li><a target="_blank" href="https://github.com/marlinho20" title="GitHub">
					<i class="fa-brands fa-github-alt"></i>
				</a></li>
				<li><a target="_blank" href="mailto:marloncruz.contato@gmail.com" title="Gmail">
					<i class="fa-solid fa-envelope"></i>
				</a></li>
				<li><a target="_blank" href="./assets/media/MarlonDeveloper.pdf" title="Curriculo" download>
					<i class="fa-solid fa-file-pdf"></i>
				</a></li>
			</ul>
		</section>
	</footer>

	<!-- Fontawesome script -->
    <script src="{{ url('assets/js/fontawesome.js') }}"></script>
    <!-- JQuery -->
    <script src="{{ url('assets/js/jquery.min.js') }}"></script>
	<!-- App Script -->
    <script src="{{ url(mix('assets/js/web/app.js')) }}"></script>
</body>

</html>