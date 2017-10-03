@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-1">
                <h3>Your Ad Campaigns</h3>
                <br/><br/>

            </div>
            <div class="col-md-2">
                <div class="panel panel-default ">
                    <div class="panel-heading">Home</div>

                    <div class="panel-body">
                        <a href="{{ url('/home') }}" class="btn btn-primary btn-block">Live Ad</a>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">Pusblish Ad</div>

                    <div class="panel-body">
                        <a href="{{ url('/campaign/create-ad') }}" class="btn btn-success btn-block">Create Ad</a>
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