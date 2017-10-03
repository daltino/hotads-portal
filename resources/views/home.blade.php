@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Live Ad</div>

				<div class="panel-body">
					<iframe width="716" height="480" src="https://www.youtube.com/embed/videoseries?list=PLZYCEy0R3lipWrnLEiNM9n_PS5Lktrxkj" frameborder="0" allowfullscreen></iframe>
				</div>
			</div>
		</div>
		<div class="col-md-2">
			<div class="panel panel-default">
				<div class="panel-heading">Pusblish Ad</div>

				<div class="panel-body">
					<a href="{{ url('/campaign/create-ad') }}" class="btn btn-primary btn-block">Create Ad</a>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">View Your Ads</div>

				<div class="panel-body">
					<a href="{{ url('/campaign/show-ad') }}" class="btn btn-success btn-block">Show My Ads</a>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">Support</div>

				<div class="panel-body">
					<a href="{{ url('/support') }}" class="btn btn-info btn-block">Contact Support</a>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-body">
					<a href="{{ url('/auth/logout') }}" class="btn btn-danger btn-block">Sign Out</a>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection