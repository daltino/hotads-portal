@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-1">
                <h3>Create Campaign</h3>
                <br/><br/>
                <form class="form-horizontal" enctype="multipart/form-data" role="form" method="POST" action="{{ url('/campaign/update-ad') }}">
                    {!! csrf_field() !!}

                    <div class="form-group">
                        <label class="col-md-4 control-label">Choose Location*</label>
                        <div class="col-md-6">
                            <select name="locations" id="locations" class="select2-container-multi">
                                <option value="Art Cafe" {{ ($campaign->locations == 'Art Cafe') ? 'selected' : '' }}>Art Cafe, VI, Lagos</option>
                                <option value="PH Mall" {{ ($campaign->locations == 'PH Mall') ? 'selected' : '' }}>Port Harcourt Mall</option>
                                <option value="Abuja Airport" {{ ($campaign->locations == 'Abuja Airport') ? 'selected' : '' }}>Abuja Airport</option>
                                <option value="Dolphin Highrise" {{ ($campaign->locations == 'Dolphin Highrise') ? 'selected' : '' }}>Dolphin Highrise, Ikoyi, Lagos</option>
                                <option value="Farm City" {{ ($campaign->locations == 'Farm City') ? 'selected' : '' }}>Farm City, Lekki, Lagos</option>
                                <option value="Lekki Library" {{ ($campaign->locations == 'Lekki Library') ? 'selected' : '' }}>Lekki Library</option>
                                <option value="Marco Polo" {{ ($campaign->locations == 'Marco Polo') ? 'selected' : '' }}>Marco Polo, Lekki, Lagos</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Upload Graphic Image 1</label>
                        <div class="col-md-6">
                            <input type="file" class="form-control" id="graphicad1" name="graphicad1">
                            <strong>Current Graphic Ad 1:</strong><br/>
                            <img src="{{ url($campaign->graphicad1) }}" class="inputImages" alt="Graphic Ad 1" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Upload Graphic Image 2</label>
                        <div class="col-md-6">
                            <input type="file" class="form-control" id="graphicad2" name="graphicad2">
                            <strong>Current Graphic Ad 2:</strong><br/>
                            <img src="{{ url($campaign->graphicad2) }}" class="inputImages" alt="Graphic Ad 2" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Video Link</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="videoad" value="{{ $campaign->videolink }}" />
                            <strong>Current Video Link:</strong><br/>
                            {{ $campaign->videoad }}
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