@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-1">
                <h3>Your Ad Campaigns</h3>
                <br/><br/>
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Location</th>
                        <th>Graphic Ad 1</th>
                        <th>Graphic Ad 2</th>
                        <th>Video Ad</th>
                        <th>Impressions (CPM)</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                        {{--{{ var_dump($campaigns[0]->graphicad1) }}--}}
                        @if(count($campaigns) > 0)
                            @foreach($campaigns as $campaign)
                                <tr  class="idea_row">
                                    <td></td>
                                    <td class="">{{ $campaign->locations }}</td>
                                    <td>
                                        <a href="{{ url($campaign->graphicad1) }}" data-lightbox="image-1" data-title="Graphic Image 1"><img src="{{ url($campaign->graphicad1) }}" alt="Graphic Ad 1" /></a>
                                    </td>
                                    <td>
                                        <a href="{{ url($campaign->graphicad2) }}" data-lightbox="image-2" data-title="Graphic Image 2"><img src="{{ url($campaign->graphicad2) }}" alt="Graphic Ad 2" /></a>
                                    </td>
                                    <td>
                                        @if($campaign->videolink != "")
                                            <a href="{{ url($campaign->videolink) }}" alt="Video Ad" />Play Video</a>
                                        @else
                                            No video
                                        @endif
                                    </td>
                                    <td> Today: <strong>{{ $campaign->today_connections }}</strong><br/>Total: <strong>{{ $campaign->used_connections }}</strong></td>
                                    <td>
                                        @if(auth()->user()->role == 'ADMIN')
                                            <a href="{{ url('/campaign/edit-ad/'.$campaign->id) }}"><i class="fa fa-lg fa-edit"></i></a>
                                            <a onclick="return window.confirm('Do you want to delete this ad?')" href="{{ url('/campaign/delete-ad/'.$campaign->id) }}"><i class="fa fa-lg fa-trash p-l-r-10"></i></a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr><td colspan="7">You currently have no advert campaigns!</td></tr>
                        @endif
                    </tbody>
                </table>
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