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
                        <div class="panel-body">
                            <p>Account has been created successfully.</p>
                            <a class="btn btn-primary" href="{{ url('/auth/login') }}">Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/welcome.js') }}"></script>
@endsection
