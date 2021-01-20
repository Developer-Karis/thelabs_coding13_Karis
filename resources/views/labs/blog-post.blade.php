<!DOCTYPE html>
<html lang="en">

<head>
	<title>Labs - Design Studio</title>
	<meta charset="UTF-8">
	<meta name="description" content="Labs - Design Studio">
	<meta name="keywords" content="lab, onepage, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->
	<link href="{{asset('img/favicon.ico')}}" rel="shortcut icon" />

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Oswald:300,400,500,700|Roboto:300,400,600" rel="stylesheet">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" />
	<link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}" />
	<link rel="stylesheet" href="{{asset('css/flaticon.css')}}" />
	<link rel="stylesheet" href="{{asset('css/owl.carousel.css')}}" />
	<link rel="stylesheet" href="{{asset('css/style.css')}}" />

	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

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
	<div class="page-section spad">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-sm-7 blog-posts">
					<!-- Single Post -->
					<div class="single-post">
						<div class="post-thumbnail">
							<img src="{{asset('img/blog/'.$blogArticle->image)}}" alt="">
							<div class="post-date">
								<h2>{{$blogArticle->date_jour}}</h2>
								<h3>{{$blogArticle->date_mois_annee}}</h3>
							</div>
						</div>
						<div class="post-content">
							<h2 class="post-title">{{$blogArticle->titre}}</h2>
							<div class="post-meta">
								@foreach ($blogArticle->categorie as $cat)
								<a>{{$cat->nom}}</a>
								@endforeach

								<a>
									@foreach ($blogArticle->tag as $elem)
									@if ($elem == $blogArticle->tag->last())
									{{$elem->nom}}
									@else
									{{$elem->nom}},
									@endif
									@endforeach
								</a>
								<a>{{$countCommentaries}} Comments</a>
							</div>
							<p>{{$blogArticle->texte}}</p>
						</div>
						<!-- Post Author -->
						<div class="author">
							<div class="avatar">
								<img src="{{asset('img/team/'.$blogArticle->photo_profil)}}" alt="">
							</div>
							<div class="author-info">
								<h2>{{$blogArticle->auteur}}, <span>{{$blogArticle->fonction}}</span></h2>
								<p>{{$blogArticle->texte_auteur}}</p>
							</div>
						</div>
						<!-- Post Comments -->
						<div class="comments">
							<h2>Comments ({{$countCommentaries}})</h2>
							@foreach ($commentaries as $elem)
							@if ($elem->article_id == $blogArticle->id)
							<ul class="comment-list">
								<li>
									<div class="avatar">
										@if ($elem->photo_profil == '01.jpg' || $elem->photo_profil == '02.jpg')
										<img src="{{asset('img/avatar/'.$elem->photo_profil)}}" alt="">
										@else
										<img src="{{asset('img/avatar/'.$elem->users->photo)}}" alt="">
										@endif
									</div>
									<div class="commetn-text">
										<h3>{{$elem->fullname . ' |'}} {{$elem->title}}</h3>
										<p>{{$elem->message}}</p>
									</div>
								</li>
							</ul>
							@endif
							@endforeach
						</div>
						<!-- Commert Form -->
						@if (Auth::check() == false)
						@if (Route::has('login'))
						<a class="btn btn-primary btn-lg" href="{{ route('login') }}">{{ __('Login') }}</a>
						@endif
						@endif

						@auth
						<div class="row">
							<div class="col-md-9 comment-from">
								<h2>Leave a comment</h2>
								<form action="/store-commentary" method="post" class="form-class">
									@csrf
									<div class="row">
										<div class="col-sm-12">
											<input type="text" name="article_id" style="display: none !important;"
												value="{{$blogArticle->id}}">
											<textarea name="message" placeholder="Message"
												style="resize: none;"></textarea>
											<button type="submit" class="site-btn">send</button>
										</div>
									</div>
								</form>
							</div>
						</div>
						@endauth
					</div>
				</div>
				<!-- Sidebar area -->
				<div class="col-md-4 col-sm-5 sidebar">
					<!-- Single widget -->
					<div class="widget-item">
						<h2 class="widget-title">Categories</h2>
						<ul>
							@foreach ($categories as $item)
							<li><a>{{$item->nom}}</a></li>
							@endforeach
						</ul>
					</div>
					<!-- Single widget -->
					<div class="widget-item">
						<h2 class="widget-title">Tags</h2>
						<ul class="tag">
							@foreach ($tags as $item)
							<li><a>{{$item->nom}}</a></li>
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
	<script src="{{asset('js/jquery-2.1.4.min.js')}}"></script>
	<script src="{{asset('js/magnific-popup.min.js')}}"></script>
	<script src="{{asset('js/owl.carousel.min.js')}}"></script>
	<script src="{{asset('js/circle-progress.min.js')}}"></script>
	<script src="{{asset('js/main.js')}}"></script>
</body>

</html>