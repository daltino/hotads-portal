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

			<div id="formdiv">
				<!--<div class="account-pages"></div>-->
				<div class="clearfix"></div>
				<div class="wrapper-page" style="width: 600px;">
					<div class=" card-box">
						<div class="panel-heading">Register to Publish an Ad</div>
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
										<label class="col-md-4 control-label">Company Name</label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="companyname" value="{{ old('companyname') }}">
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
										<div class="col-md-4 col-md">
											<a href="{{ url('/auth/login') }}" class="btn btn-block btn-warning">
												<i class="fa fa-arrow-left"></i> Login
											</a>
										</div>
										<div class="col-md-6 col-md">
											<button type="submit" class="btn btn-block btn-primary">
												Register <i class="fa fa-arrow-right"></i>
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
	<script src="{{ asset('js/jquery-2.1.0.min.js') }}"></script>
	<script src="{{ asset('js/welcome.js') }}"></script>
@endsection
