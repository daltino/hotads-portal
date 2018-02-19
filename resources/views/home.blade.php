@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading m-l-5">Live Ad</div>

				<div class="panel-body">
					@if(count($campaigns) > 0)
						@foreach($campaigns as $campaign)
							Now Showing at: <strong style="color: #007ee5;">{{ $campaign->locations }}</strong> |
							WiFi Name: <strong style="color: #007ee5">{{ $campaign->ssid }}</strong>
							<iframe style="width: 100%;" height="480" src="{{$campaign->livelink}}" frameborder="0" allowfullscreen></iframe>
							<br/><br/>
						@endforeach
					@endif
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
				<div class="panel-heading">View Your Ads Stats</div>

				<div class="panel-body">
					<a href="{{ url('/campaign/show-ad') }}" class="btn btn-success btn-block">Show My Stats</a>
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