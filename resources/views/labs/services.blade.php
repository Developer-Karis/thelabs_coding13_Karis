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
	<link rel="stylesheet" href="css/owl.carousel.css" />
	<link rel="stylesheet" href="css/style.css" />


	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

	<style>
		* {
			scroll-behavior: smooth;
		}
	</style>

</head>

<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader">
			<img src="{{asset('img/logo.png')}}" alt="">
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
				<li><a href="/">{{$item->link1}}</a></li>
				<li class="active"><a href="/services">{{$item->link2}}</a></li>
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


	<!-- Page header -->
	<div class="page-top-section">
		<div class="overlay"></div>
		<div class="container text-right">
			<div class="page-info">
				<h2>{{$bannerHeader[0]->title}}</h2>
				<div class="page-links">
					<a href="/">{{$bannerHeader[0]->lienPrecedent}}</a>
					<span>{{$bannerHeader[0]->lienActuel}}</span>
				</div>
			</div>
		</div>
	</div>
	<!-- Page header end-->


	<!-- services section -->
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
				<a href="#servicePrimes" class="site-btn">Browse</a>
			</div>
		</div>
	</div>
	<!-- services section end -->


	<!-- features section -->
	<div class="team-section spad" id="servicePrimes">
		<div class="overlay"></div>
		<div class="container">
			<div class="section-title">
				<h2>{{$start}}<span>{{$slice}}</span>{{$end}}</h2>
			</div>
			<div class="row">
				<!-- feature item -->
				<div class="col-md-4 col-sm-4 features">
					@foreach ($servicesPrimes as $item)
					<div class="icon-box light left">
						<div class="service-text">
							<h2>{{$item->title}}</h2>
							<p>{{$item->para}}</p>
						</div>
						<div class="icon">
							<i class="{{$item->icon}}"></i>
						</div>
					</div>
					@endforeach
				</div>
				<!-- Devices -->
				<div class="col-md-4 col-sm-4 devices">
					<div class="text-center">
						<img src="img/device.png" alt="">
					</div>
				</div>
				<!-- feature item -->
				<div class="col-md-4 col-sm-4 features">
					@foreach ($servicesPrimes2 as $item)
					<div class="icon-box light">
						<div class="icon">
							<i class="{{$item->icon}}"></i>
						</div>
						<div class="service-text">
							<h2>{{$item->title}}</h2>
							<p>{{$item->para}}</p>
						</div>
					</div>
					@endforeach
				</div>
			</div>
			<div class="text-center mt100">
				<a href="#blog_rapides" class="site-btn">{{$servicesRapides[0]->button}}</a>
			</div>
		</div>
	</div>
	<!-- features section end-->


	<!-- services card section-->
	<div class="services-card-section spad" id="blog_rapides">
		<div class="container">
			<div class="row">
				<!-- Single Card -->
				@foreach ($blogArticles as $item)
				<div class="col-md-4 col-sm-6">
					<div class="sv-card">
						<div class="card-img">
							<img src="{{asset('img/blog/'.$item->image)}}" alt="" height="180">
						</div>
						<div class="card-text">
							<h2>{{$item->titre}}</h2>
							<p>{{$item->description}}</p>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
	<!-- services card section end-->


	<!-- newsletter section -->
	<div class="newsletter-section spad">
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<h2>Newsletter</h2>
				</div>
				<div class="col-md-9">
					<!-- newsletter form -->
					@if ($errors->any())
					<div class="alert alert-danger">
						<ul>
							@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
					@endif
					<form action="/store-newsletter" method="POST" class="nl-form">
						@csrf
						<input type="text" placeholder="Your e-mail here" name="email">
						<button type="submit" class="site-btn btn-2">Newsletter</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- newsletter section end-->


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