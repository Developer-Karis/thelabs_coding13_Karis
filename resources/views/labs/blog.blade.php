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
				<li><a href="/">{{$item->link1}}</a></li>
				<li><a href="/services">{{$item->link2}}</a></li>
				<li class="active"><a href="/blog">{{$item->link3}}</a></li>
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
				<h2>{{$bannerHeader[1]->title}}</h2>
				<div class="page-links">
					<a href="/">{{$bannerHeader[1]->lienPrecedent}}</a>
					<span>{{$bannerHeader[1]->lienActuel}}</span>
				</div>
			</div>
		</div>
	</div>
	<!-- Page header end-->


	<!-- page section -->
	<div class="page-section spad" id="article">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-sm-7 blog-posts">
					<!-- Post item -->
					@foreach ($blogArticles as $item)
					@if ($item->confirmer == true)
					<div class="post-item">
						<div class="post-thumbnail">
							<img src="{{asset('img/blog/'.$item->image)}}" alt="" height="280" width="600">
							<div class="post-date">
								<h2>{{$item->date_jour}}</h2>
								<h3>{{$item->date_mois_annee}}</h3>
							</div>
						</div>
						<div class="post-content">
							<h2 class="post-title">{{$item->titre}}</h2>
							<div class="post-meta">
								<a>{{$item->auteur}}</a>

								<a>
									@foreach ($item->tag as $item3)
									@if ($item3 == $item->tag->last())
									{{$item3->nom}}
									@else
									{{$item3->nom}},
									@endif
									@endforeach
								</a>

								<div style="display: none !important;">{{$a=0}}</div>
								@foreach ($commentaires as $elem)
								@if ($elem->article_id == $item->id)
								<div style="display: none !important;">{{$a++}}</div>
								@endif
								@endforeach
								<a>Comments ({{$a}})</a>
							</div>
							<p>{{$item->description}}</p>
							<a href="/blog-post/{{$item->id}}" class="read-more">Read More</a>
						</div>
					</div>
					@endif
					@endforeach
				</div>
				<!-- Sidebar area -->
				<div class="col-md-4 col-sm-5 sidebar">
					<!-- Single widget -->
					<div class="widget-item">
						<h2 class="widget-title">Categories</h2>
						<ul>
							@foreach ($numbers as $item)
							<li><a>{{$categories->find($item)->nom}}</a></li>
							@endforeach
						</ul>
					</div>
					<!-- Single widget -->
					<div class="widget-item">
						<h2 class="widget-title">Tags</h2>
						<ul class="tag">
							@foreach ($numbers2 as $item)
							<li><a>{{$tags->find($item)->nom}}</a></li>
							@endforeach
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- page section end-->


	<!-- newsletter section -->
	<div class="newsletter-section spad">
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<h2>Newsletter</h2>
				</div>
				<div class="col-md-9">
					<!-- newsletter form -->
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