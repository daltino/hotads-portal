@extends('app')

@section('content')
	<link href="{{asset ('css/welcome.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset ('css/auth.css')}}" rel="stylesheet" type="text/css">
	<div class="homepage-hero-module">
		<div class="video-container">
			<div class="filter"></div>
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
							<div class="panel-heading">Register to Publish an Ad</div>
							<div class="panel-body">
								@if (isset($errors) && count($errors) > 0)
									<div class="alert alert-danger">
										<strong>Whoops!</strong> There were some problems with your input.<br><br>
										<ul>
											@foreach ($errors->all() as $error)
												<li>{{ $error }}</li>
											@endforeach
										</ul>
									</div>
								@endif

								<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/register') }}">
									{!! csrf_field() !!}

									<div class="form-group">
										<label class="col-md-4 control-label">First Name</label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="firstname" value="{{ old('firstname') }}">
										</div>
									</div>

									<div class="form-group">
										<label class="col-md-4 control-label">Last Name</label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="lastname" value="{{ old('lastname') }}">
										</div>
									</div>

									<div class="form-group">
										<label class="col-md-4 control-label">E-Mail Address</label>
										<div class="col-md-6">
											<input type="email" class="form-control" name="email" value="{{ old('email') }}">
										</div>
									</div>

									<div class="form-group">
										<label class="col-md-4 control-label" for="country_id">Country</label>
										<div class="col-md-6">
											<select class="form-control" id="country_id" name="country_id">
												<option value="0">Select Country</option>
												@if(isset($countries))
													@foreach($countries as $country)
														<option value="{{ $country->id }}" title="{{ $country->country_code }}">{{ $country->name }}</option>
													@endforeach
												@endif
											</select>
										</div>
									</div>

									<div class="form-group">
										<label class="col-md-4 control-label">Password</label>
										<div class="col-md-6">
											<input type="password" class="form-control" name="password">
										</div>
									</div>

									<div class="form-group">
										<label class="col-md-4 control-label">Confirm Password</label>
										<div class="col-md-6">
											<input type="password" class="form-control" name="password_confirmation">
										</div>
									</div>

									<div class="form-group">
										<div class="col-md-6 col-md-offset-4">
											<button type="submit" class="btn btn-primary">
												Register
											</button>
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
	<script src="{{ asset('js/welcome.js') }}"></script>
@endsection
