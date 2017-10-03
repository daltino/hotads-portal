<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Hotads</title>
	<link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}">
	<link href="{{asset ('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset ('css/core.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset ('css/components.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset ('css/icons.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset ('css/pages.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset ('css/app.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset ('css/welcome.css')}}" rel="stylesheet" type="text/css">

	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="{{ url('/') }}">
					<img src="{{ asset('img/logo-n1.png') }}" style="height: 35px; margin-top: -7px;" alt="Hotads" />
				</a>
			</div>

			<div class="collapse navbar-collapse" id="navbar">
				{{--<ul class="nav navbar-nav">--}}
					{{--<li><a href="{{ url('/') }}">Home</a></li>--}}
				{{--</ul>--}}

				<ul class="nav navbar-nav navbar-right">
					@if(auth()->guest())
						@if(!Request::is('auth/login'))
							<li><a href="{{ url('/auth/login') }}">Login</a></li>
						@endif
						@if(!Request::is('auth/register'))
							<li><a href="{{ url('/auth/register') }}">Register</a></li>
						@endif
					@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ auth()->user()->firstname }} {{ auth()->user()->lastname }} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="{{ url('/auth/logout') }}">Logout</a></li>
							</ul>
						</li>
					@endif
				</ul>
			</div>
		</div>
	</nav>

	@yield('content')

	<!-- Scripts -->
	<script src="{{ asset('js/jquery-2.1.0.min.js') }}"></script>
	<script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
</body>
</html>
