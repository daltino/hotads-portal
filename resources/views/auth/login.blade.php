@extends('app')

@section('content')
	<link href="{{asset ('css/welcome.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset ('css/auth.css')}}" rel="stylesheet" type="text/css">
	<div class="homepage-hero-module">
		<div class="video-container">
			<div class="filter hidden-xs"></div>
			<video autoplay loop class="fillWidth">
				<source src="{{ asset('cover/ground-zero/MP4/Ground-Zero.mp4') }}" type="video/mp4" />Your browser does not support the video tag. I suggest you upgrade your browser.
				<source src="{{ asset('cover/ground-zero/WEBM/Ground-Zero.webm') }}" type="video/webm" />Your browser does not support the video tag. I suggest you upgrade your browser.
			</video>
			<div class="poster hidden">
				<img src="{{ asset('cover/ground-zero/Snapshots/Ground-Zero.jpg') }}" alt="HOTADS">
			</div>
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-8 col-md-offset-2">
						<div class="panel panel-default">
							<div class="panel-heading">Login into Hotads Campaign Portal</div>
							<div class="panel-body">
								@if (isset($errors) && count($errors) > 0)
									<div class="alert alert-danger">
										<strong>Sorry!</strong> There were some problems with your input.<br><br>
										<ul>
											@foreach ($errors->all() as $error)
												<li>{{ $error }}</li>
											@endforeach
										</ul>
									</div>
								@endif

								<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
									{!! csrf_field() !!}

									<div class="form-group">
										<label class="col-md-4 control-label">E-Mail Address</label>
										<div class="col-md-6">
											<input type="email" class="form-control" name="email" value="{{ old('email') }}">
										</div>
									</div>

									<div class="form-group">
										<label class="col-md-4 control-label">Password</label>
										<div class="col-md-6">
											<input type="password" class="form-control" name="password">
										</div>
									</div>

									<div class="form-group">
										<div class="col-md-6 col-md-offset-4">
											<div class="checkbox">
												<label>
													<input type="checkbox" name="remember"> Remember Me
												</label>
											</div>
										</div>
									</div>

									<div class="form-group">
										<div class="col-md-6 col-md-offset-4">
											<button type="submit" class="btn btn-primary">Login</button>

											<a class="btn btn-link" href="{{ url('/auth/reset') }}">Forgot Your Password?</a>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="{{ asset('js/jquery-2.1.0.min.js') }}"></script>
	<script src="{{ asset('js/welcome.js') }}"></script>
@endsection
