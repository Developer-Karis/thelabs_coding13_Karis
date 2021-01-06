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
		<div class="logo" style="padding-top: 5px !important;">
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
					@if (Auth::user()->role_id == 1)
					<a href="{{ url('/home') }}"><span class="text-capitalize">{{Auth::user()->name}}</span></a>
					@endif
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
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec
								elementum id, suscipit id nulla..</p>
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
			@foreach ($presentations as $item)
			<div class="section-title">
				<h2>{{$start}}<span>{{$slice}}</span>{{$end}}</h2>
			</div>
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
	<div class="services-section spad">
		<div class="container">
			<div class="section-title dark">
				<h2>Get in <span>the Lab</span> and see the services</h2>
			</div>
			<div class="row">
				<!-- single service -->
				<div class="col-md-4 col-sm-6">
					<div class="service">
						<div class="icon">
							<i class="flaticon-023-flask"></i>
						</div>
						<div class="service-text">
							<h2>Get in the lab</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec
								elementum id, suscipit id nulla..</p>
						</div>
					</div>
				</div>
				<!-- single service -->
				<div class="col-md-4 col-sm-6">
					<div class="service">
						<div class="icon">
							<i class="flaticon-011-compass"></i>
						</div>
						<div class="service-text">
							<h2>Projects online</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec
								elementum id, suscipit id nulla..</p>
						</div>
					</div>
				</div>
				<!-- single service -->
				<div class="col-md-4 col-sm-6">
					<div class="service">
						<div class="icon">
							<i class="flaticon-037-idea"></i>
						</div>
						<div class="service-text">
							<h2>SMART MARKETING</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec
								elementum id, suscipit id nulla..</p>
						</div>
					</div>
				</div>
				<!-- single service -->
				<div class="col-md-4 col-sm-6">
					<div class="service">
						<div class="icon">
							<i class="flaticon-039-vector"></i>
						</div>
						<div class="service-text">
							<h2>Social Media</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec
								elementum id, suscipit id nulla..</p>
						</div>
					</div>
				</div>
				<!-- single service -->
				<div class="col-md-4 col-sm-6">
					<div class="service">
						<div class="icon">
							<i class="flaticon-036-brainstorming"></i>
						</div>
						<div class="service-text">
							<h2>Brainstorming</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec
								elementum id, suscipit id nulla..</p>
						</div>
					</div>
				</div>
				<!-- single service -->
				<div class="col-md-4 col-sm-6">
					<div class="service">
						<div class="icon">
							<i class="flaticon-026-search"></i>
						</div>
						<div class="service-text">
							<h2>Documented</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec
								elementum id, suscipit id nulla..</p>
						</div>
					</div>
				</div>
				<!-- single service -->
				<div class="col-md-4 col-sm-6">
					<div class="service">
						<div class="icon">
							<i class="flaticon-018-laptop-1"></i>
						</div>
						<div class="service-text">
							<h2>Responsive</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec
								elementum id, suscipit id nulla..</p>
						</div>
					</div>
				</div>
				<!-- single service -->
				<div class="col-md-4 col-sm-6">
					<div class="service">
						<div class="icon">
							<i class="flaticon-043-sketch"></i>
						</div>
						<div class="service-text">
							<h2>Retina ready</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec
								elementum id, suscipit id nulla..</p>
						</div>
					</div>
				</div>
				<!-- single service -->
				<div class="col-md-4 col-sm-6">
					<div class="service">
						<div class="icon">
							<i class="flaticon-012-cube"></i>
						</div>
						<div class="service-text">
							<h2>Ultra modern</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec
								elementum id, suscipit id nulla..</p>
						</div>
					</div>
				</div>
			</div>
			<div class="text-center">
				<a href="" class="site-btn">Browse</a>
			</div>
		</div>
	</div>
	<!-- services section end -->


	<!-- Team Section -->
	<div class="team-section spad">
		<div class="overlay"></div>
		<div class="container">
			<div class="section-title">
				<h2>Get in <span>the Lab</span> and meet the team</h2>
			</div>
			<div class="row">
				<!-- single member -->
				<div class="col-sm-4">
					<div class="member">
						<img src="img/team/1.jpg" alt="">
						<h2>Christinne Williams</h2>
						<h3>Project Manager</h3>
					</div>
				</div>
				<!-- single member -->
				<div class="col-sm-4">
					<div class="member">
						<img src="img/team/2.jpg" alt="">
						<h2>Christinne Williams</h2>
						<h3>Junior developer</h3>
					</div>
				</div>
				<!-- single member -->
				<div class="col-sm-4">
					<div class="member">
						<img src="img/team/3.jpg" alt="">
						<h2>Christinne Williams</h2>
						<h3>Digital designer</h3>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Team Section end-->


	<!-- Promotion section -->
	<div class="promotion-section">
		<div class="container">
			<div class="row">
				<div class="col-md-9">
					<h2>Are you ready to stand out?</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est.</p>
				</div>
				<div class="col-md-3">
					<div class="promo-btn-area">
						<a href="" class="site-btn btn-2">Browse</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Promotion section end-->


	<!-- Contact section -->
	<div class="contact-section spad fix">
		<div class="container">
			<div class="row">
				<!-- contact info -->
				<div class="col-md-5 col-md-offset-1 contact-info col-push">
					<div class="section-title left">
						<h2>Contact us</h2>
					</div>
					<p>Cras ex mauris, ornare eget pretium sit amet, dignissim et turpis. Nunc nec maximus dui, vel
						suscipit dolor. Donec elementum velit a orci facilisis rutrum. </p>
					<h3 class="mt60">Main Office</h3>
					<p class="con-item">C/ Libertad, 34 <br> 05200 Arévalo </p>
					<p class="con-item">0034 37483 2445 322</p>
					<p class="con-item">hello@company.com</p>
				</div>
				<!-- contact form -->
				<div class="col-md-6 col-pull">
					<form class="form-class" id="con_form">
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
								<button class="site-btn">send</button>
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
		<h2>2017 All rights reserved. Designed by <a href="https://colorlib.com" target="_blank">Colorlib</a></h2>
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