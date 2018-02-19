@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-1">
                <h3>Your Ad Campaigns</h3>
                <br/><br/>
                <table class="table" id="userTable">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Location</th>
                        <th>Email Address</th>
                        <th>Phone</th>
                        <th>Registration Date</th>
                        {{--<th>Session Time</th>--}}
                        {{--<th>Data Used</th>--}}
                    </tr>
                    </thead>
                    <tbody>
                    {{--{{ dd($users) }}--}}
                    @if(count($users) > 0)
                        @foreach($users as $user)
                            <tr  class="idea_row">
                                <td></td>
                                <td class="">{{ $location->name }}</td>
                                <td class="">
                                    {{ $user['email'] }}
                                </td>
                                <td class="">
                                    {{ $user['phone'] }}
                                </td>
                                <td class="">
                                    {{ $user['registered_at'] }}
                                </td>
                                {{--<td></td>--}}
                                {{--<td></td>--}}
                            </tr>
                        @endforeach
                    @else
                        <tr><td colspan="7">You currently have no users subscribed!</td></tr>
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
                    <div class="panel-heading">View Your Ads Stats</div>

                    <div class="panel-body">
                        <a href="{{ url('/campaign/show-ad') }}" class="btn btn-warning btn-block">Show My Stats</a>
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