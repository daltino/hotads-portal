<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Hotads</title>
        <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="{{asset ('boostrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset ('css/core.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset ('css/components.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset ('css/icons.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset ('css/pages.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset ('css/app.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset ('css/welcome.css')}}" rel="stylesheet" type="text/css">

        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="{{ asset('js/modernizr.min.js') }}"></script>
    </head>
    <body>
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
                    <!--                    <div class="account-pages"></div>-->
                    <div class="clearfix"></div>
                    <div class="wrapper-page">
                        <div class=" card-box">
                            <div class="panel-heading">
                                <h3 class="text-center"><strong class="text-primary"><img src="{{ asset('img/logo-hor.png') }}" alt="Hotads" style="height:50px;" /></strong> </h3>
                            </div>
                            <div class="panel-body">
                                <h5 style="text-align: center; font-family: 'Open Sans','lucida grande','Segoe UI',arial,verdana,'lucida sans unicode',tahoma,sans-serif;">Sign In</h5>
                                <form class="form-horizontal m-t-20" action="{{ url('/auth/login') }}" method="post">
                                    {{ csrf_field() }}
                                    <div class="form-group ">
                                        <div class="col-xs-12">
                                            <input class="form-control" type="text" name="USERNAME" required="" placeholder="Username">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-12">
                                            <input class="form-control" type="password" name="PASSWORD" required="" placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="form-group text-center m-t-20">
                                        <div class="col-xs-12">
                                            <button class="btn btn-primary btn-block text-uppercase waves-effect waves-light" type="submit">Sign In</button>
                                        </div>
                                    </div>
                                    <div class="form-group m-t-30 m-b-0">
                                        <div class="col-sm-12">
                                            <a href="{{ url('/auth/register') }}" class="text-dark"><i class="fa fa-briefcase m-r-5 btn btn-pink"></i> Create your Hotads account</a>
                                        </div>
                                        <br/><br/>
                                        <div class="col-sm-12">
                                            <a href="{{ url('') }}" class="text-dark"><i class="fa fa-unlock m-r-5 btn btn-info"></i> Lost your password?</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 text-center">
                                <p>Hotads &COPY; <?php echo date('Y', time()); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script src="{{ asset('js/jquery-2.1.0.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/detect.js') }}"></script>
    <script src="{{ asset('js/fastclick.js') }}"></script>
    <script src="{{ asset('js/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('js/jquery.blockUI.js') }}"></script>
    <script src="{{ asset('js/waves.js') }}"></script>
    <script src="{{ asset('js/wow.min.js') }}"></script>
    <script src="{{ asset('js/jquery.nicescroll.js') }}"></script>
    <script src="{{ asset('js/jquery.scrollTo.min.js') }}"></script>
    <script src="{{ asset('js/jquery.core.js') }}"></script>
    <script src="{{ asset('plugins/notifyjs/dist/notify.min.js') }}"></script>
    <script src="{{ asset('plugins/notifications/notify-metro.js') }}"></script>
    <script src="{{ asset('js/welcome.js') }}"></script>
</html>
