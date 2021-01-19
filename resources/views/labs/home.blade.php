<!DOCTYPE html>
<html lang="en">

<head>
	<title>Labs - Design Studio</title>
	<meta charset="UTF-8">
	<meta name="description" content="Labs - Design Studio">
	<meta name="keywords" content="lab, onepage, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->
	<link href="img/favicon.ico" rel="shortcut icon" />

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Oswald:300,400,500,700|Roboto:300,400,700" rel="stylesheet">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<link rel="stylesheet" href="css/font-awesome.min.css" />
	<link rel="stylesheet" href="css/flaticon.css" />
	<link rel="stylesheet" href="css/magnific-popup.css" />
	<link rel="stylesheet" href="css/owl.carousel.css" />
	<link rel="stylesheet" href="css/style.css" />

	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>

<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader">
			<img src="img/logo.png" alt="">
			<h2>Loading.....</h2>
		</div>
	</div>

	<!-- Header section -->
	<header class="header-section">
		<div class="logo">
			<img src="{{asset('img/small-'.$banners[0]->logo)}}" alt=""><!-- Logo -->
		</div>
		<!-- Navigation -->
		<div class="responsive"><i class="fa fa-bars"></i></div>
		<nav>
			<ul class="menu-list">
				@foreach ($navbars as $item)
				<li class="active"><a href="/">{{$item->link1}}</a></li>
				<li><a href="/services">{{$item->link2}}</a></li>
				<li><a href="/blog">{{$item->link3}}</a></li>
				<li><a href="/contact">{{$item->link4}}</a></li>
				@endforeach
				<!-- Authentication Links -->
				@guest
				@if (Route::has('login'))
				<li class="nav-item">
					<a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
				</li>
				@endif

				@if (Route::has('register'))
				<li class="nav-item">
					<a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
				</li>
				@endif
				@else
				<li class="nav-item dropdown">
					<a href="{{ url('/profil') }}"><span class="text-capitalize">{{Auth::user()->name}}</span></a>
					<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
						document.getElementById('logout-form').submit();">
						{{ __('Logout') }}
					</a>

					<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
						@csrf
					</form>
				</li>
				@endguest
			</ul>
		</nav>
	</header>
	<!-- Header section end -->


	<!-- Intro Section -->
	<div class="hero-section">
		<div class="hero-content">
			<div class="hero-center">
				@foreach ($banners as $item)
				<img src="{{asset('img/'.$item->logo)}}" alt="">
				<p style="color: orange !important; font-weight: bold !important;">{{$item->slogan}}</p>
				@endforeach
			</div>
		</div>
		<!-- slider -->
		<div id="hero-slider" class="owl-carousel">
			@foreach ($bannerCarous as $item)
			<div class="item  hero-item" data-bg="{{asset('img/'.$item->imageCarous)}}"></div>
			@endforeach
		</div>
	</div>
	<!-- Intro Section -->


	<!-- About section -->
	<div class="about-section">
		<div class="overlay"></div>
		<!-- card section -->
		<div class="card-section">
			<div class="container">
				<div class="row">
					<!-- single card -->
					@foreach ($numbers as $item)
					@if ($loop->iteration <= 3) <div class="col-md-4 col-sm-6">
						<div class="lab-card">
							<div class="icon">
								<i class="{{ $servicesRapides->find($item)->icon }}"></i>
							</div>
							<h2>{{ $servicesRapides->find($item)->title }}</h2>
							<p>{{ $servicesRapides->find($item)->para }}</p>
						</div>
				</div>
				@endif
				@endforeach
			</div>
		</div>
	</div>
	<!-- card section end-->


	<!-- About contant -->
	<div class="about-contant">
		<div class="container">
			<div class="section-title">
				<h2>{{$start}}<span>{{$slice}}</span>{{$end}}</h2>
			</div>
			@foreach ($presentations as $item)
			<div class="row">
				<div class="col-md-6">
					<p>{{$item->para1}}</p>
				</div>
				<div class="col-md-6">
					<p>{{$item->para2}}</p>
				</div>
			</div>
			<div class="text-center mt60">
				<a href="/contact" class="site-btn">{{$item->button}}</a>
			</div>
			@endforeach
			<!-- popup video -->
			<div class="intro-video">
				<div class="row">
					<div class="col-md-8 col-md-offset-2">
						<img src="img/video.jpg" alt="">
						<a href="{{$linkVideo}}" class="video-popup">
							<i class="fa fa-play"></i>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
	<!-- About section end -->


	<!-- Testimonial section -->
	<div class="testimonial-section pb100">
		<div class="test-overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-4">
					<div class="section-title left">
						<h2>{{$testimonials[0]->title}}</h2>
					</div>
					<div class="owl-carousel" id="testimonial-slide">
						@foreach ($order as $item)
						<!-- single testimonial -->
						@if ($loop->iteration <= 6) <div class="testimonial">
							<span>‘​‌‘​‌</span>
							<p>{{$item->para}}</p>
							<div class="client-info">
								<div class="avatar">
									<img src="{{asset('img/'.$item->avatar)}}" alt="">
								</div>
								<div class="client-name">
									<h2>{{$item->fullName}}</h2>
									<p>{{$item->function}}</p>
								</div>
							</div>
					</div>
					@endif
					@endforeach
				</div>
			</div>
		</div>
	</div>
	</div>
	<!-- Testimonial section end-->


	<!-- Services section -->
	<div class="services-section spad" id="service">
		<div class="container">
			<div class="section-title dark">
				<h2>{{$startService}}<span>{{$sliceService}}</span>{{$endService}}</h2>
			</div>
			<div class="row">
				<!-- single service -->
				@foreach ($pagination as $item)
				<div class="col-md-4 col-sm-6">
					<div class="service">
						<div class="icon">
							<i class="{{$item->icon}}"></i>
						</div>
						<div class="service-text">
							<h2>{{ $item->title }}</h2>
							<p>{{ $item->para }}</p>
						</div>
					</div>
				</div>
				@endforeach
			</div>
			{{ $pagination->fragment('service')->links('vendor.pagination.bootstrap-4') }}
			<div class="text-center">
				<a href="/services" class="site-btn">{{$servicesRapides[0]->button}}</a>
			</div>
		</div>
	</div>
	<!-- services section end -->


	<!-- Team Section -->
	<div class="team-section spad">
		<div class="overlay"></div>
		<div class="container">
			<div class="section-title">
				<h2>{{$startTeam}}<span>{{$sliceTeam}}</span>{{$endTeam}}</h2>
			</div>
			<div class="row">
				<!-- single member -->
				@foreach ($random1 as $item)
				<div class="col-sm-4">
					<div class="member">
						<img src="{{asset('img/team/'.$item->imageTeam)}}" alt="">
						<h2>{{$item->fullName}}</h2>
						<h3>{{$item->function}}</h3>
					</div>
				</div>
				@endforeach
				<div class="col-sm-4">
					<div class="member">
						<img src="{{asset('img/team/'.$teamStatic[0]->home_teams->imageTeam)}}" alt="">
						<h2>{{$teamStatic[0]->home_teams->fullName}}</h2>
						<h3>{{$teamStatic[0]->home_teams->function}}</h3>
					</div>
				</div>
				@foreach ($random2 as $item)
				<div class="col-sm-4">
					<div class="member">
						<img src="{{asset('img/team/'.$item->imageTeam)}}" alt="">
						<h2>{{$item->fullName}}</h2>
						<h3>{{$item->function}}</h3>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
	<!-- Team Section end-->


	<!-- Promotion section -->
	<div class="promotion-section">
		<div class="container">
			<div class="row">
				@foreach ($readys as $item)
				<div class="col-md-9">
					<h2>{{$item->title}}</h2>
					<p>{{$item->sous_title}}</p>
				</div>
				<div class="col-md-3">
					<div class="promo-btn-area">
						<a href="/contact" class="site-btn btn-2">{{$item->button}}</a>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
	<!-- Promotion section end-->


	<!-- Contact section -->
	<div class="contact-section spad fix">
		<div class="container">
			<div class="row">
				<!-- contact info -->
				@foreach ($contacts as $item)
				<div class="col-md-5 col-md-offset-1 contact-info col-push">
					<div class="section-title left">
						<h2>{{$item->title}}</h2>
					</div>
					<p>{{$item->para}}</p>
					<h3 class="mt60">{{$item->mini_title}}</h3>
					<p class="con-item">{{$item->address}} <br> {{$item->postcode}} </p>
					<p class="con-item">{{$item->phone_number}}</p>
					<p class="con-item">{{$item->website}}</p>
				</div>
				@endforeach
				<!-- contact form -->
				<div class="col-md-6 col-pull">
					<form action="/store-contact" method="POST" class="form-class" id="con_form">
						@csrf
						<div class="row">
							<div class="col-sm-6">
								<input type="text" name="name" placeholder="Your name">
							</div>
							<div class="col-sm-6">
								<input type="text" name="email" placeholder="Your email">
							</div>
							<div class="col-sm-12">
								<input type="text" name="subject" placeholder="Subject">
								<textarea name="message" placeholder="Message"></textarea>
								<button type="submit" class="site-btn">{{$contacts[0]->buttonForm}}</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- Contact section end-->


	<!-- Footer section -->
	<footer class="footer-section">
		<h2 style="color: white !important;">{{$footers[0]->para}} <a href="https://colorlib.com"
				target="_blank">{{$footers[0]->author}}</a></h2>
	</footer>
	<!-- Footer section end -->




	<!--====== Javascripts & Jquery ======-->
	<script src="js/jquery-2.1.4.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/magnific-popup.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/circle-progress.min.js"></script>
	<script src="js/main.js"></script>
</body>

</html>