@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-1">
                <h3>Create Campaign</h3>
                <br/><br/>
                <form class="form-horizontal" enctype="multipart/form-data" role="form" method="POST" action="{{ url('/campaign/create-ad') }}">
                    {!! csrf_field() !!}

                    <div class="form-group">
                        <label class="col-md-4 control-label">Choose Location*</label>
                        <div class="col-md-6">
                            <select name="locations" id="locations" class="select2-container-multi">
                                <option value="Art Cafe">Art Cafe, VI, Lagos</option>
                                <option value="PH Mall">Port Harcourt Mall</option>
                                <option value="Abuja Airport">Abuja Airport</option>
                                <option>Dolphin Highrise, Ikoyi, Lagos</option>
                                <option value="Farm City">Farm City, Lekki, Lagos</option>
                                <option>Lekki Library</option>
                                <option value="Marco Polo">Marco Polo, Lekki, Lagos</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Upload Graphic Image 1</label>
                        <div class="col-md-6">
                            <input type="file" class="form-control" id="graphicad1" name="graphicad1">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Upload Graphic Image 2</label>
                        <div class="col-md-6">
                            <input type="file" class="form-control" id="graphicad2" name="graphicad2">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Video Link</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="videoad">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-2">
                <div class="panel panel-default ">
                    <div class="panel-heading">Home</div>

                    <div class="panel-body">
                        <a href="{{ url('/home') }}" class="btn btn-primary btn-block">Live Ad</a>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">View Your Ads Stats</div>

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