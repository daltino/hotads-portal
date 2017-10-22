@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-1">
                <h3>Contact Support</h3>
                <br/><br/>
                <form class="form-horizontal" enctype="multipart/form-data" role="form" method="POST" action="{{ url('/contact-support') }}">
                    {!! csrf_field() !!}

                    <div class="form-group">
                        <label class="col-md-4 control-label">Support Category*</label>
                        <div class="col-md-6">
                            <select name="scategory" id="scategory" class="select2">
                                <option>Ad Subscription Renewal</option>
                                <option>Change Ad Location</option>
                                <option>Change Graphic Ad</option>
                                <option>Add Video Ad</option>
                                <option>WiFi Network Downtime</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Phone No.</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="phone">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Subject</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="subject">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Message</label>
                        <div class="col-md-6">
                            <textarea rows="5" class="form-control" name="message"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Upload Attachment</label>
                        <div class="col-md-6">
                            <input type="file" class="form-control" id="sattach" name="sattach">
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
                    <div class="panel-heading">Pusblish Ad</div>

                    <div class="panel-body">
                        <a href="{{ url('/campaign/create-ad') }}" class="btn btn-warning btn-block">Create Ad</a>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">View Your Ads Stats</div>

                    <div class="panel-body">
                        <a href="{{ url('/campaign/show-ad') }}" class="btn btn-success btn-block">Show My Ads</a>
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