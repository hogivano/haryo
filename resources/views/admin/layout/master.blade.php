<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/light-bootstrap-dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fullpage.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pe-icon-7-stroke.css') }}">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @yield('link')
</head>
<body>
    <div class="wrapper">
        <div class="sidebar" data-color="black" data-image="{{ asset('img/sidebar-5.jpg') }}">
        	<div class="sidebar-wrapper">
                <div class="logo text-center">
                    <img src="{{ asset('img/logo-putih.png') }}" height="80" alt="">
                </div>
                <ul class="nav">
                    <li id="nav-dashboard">
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="pe-7s-graph"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li id="nav-album">
                        <a href="{{ route('admin.album.index') }}">
                            <i class="pe-7s-photo-gallery"></i>
                            <p>Album</p>
                        </a>
                    </li>
                    <li id="nav-kategori">
                        <a href="{{ route('admin.kategori.index') }}">
                            <i class="pe-7s-ribbon"></i>
                            <p>Kategori</p>
                        </a>
                    </li>
                    <li id="nav-video">
                        <a href="{{ route('admin.video.index') }}">
                            <i class="pe-7s-video"></i>
                            <p>Video</p>
                        </a>
                    </li>
                    <li id="nav-slide-show">
                        <a href="{{ route('admin.slide-show.index') }}">
                            <i class="pe-7s-monitor"></i>
                            <p>Slide Show</p>
                        </a>
                    </li>
                    <li>
                        <a href="typography.html">
                            <i class="pe-7s-comment"></i>
                            <p>Comment</p>
                        </a>
                    </li>
                </ul>
        	</div>
        </div>
        <div class="main-panel">
            <nav class="navbar navbar-default navbar-fixed">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        @yield('brand')
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-left">
                            <li>
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <!-- <i class="fa fa-dashboard"></i> -->
                                    <p class="hidden-lg hidden-md">Dashboard</p>
                                </a>
                            </li>
                            <!-- <li class="dropdown">
                                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="fa fa-globe"></i>
                                        <b class="caret hidden-lg hidden-md"></b>
                                        <p class="hidden-lg hidden-md">
                                            5 Notifications
                                            <b class="caret"></b>
                                        </p>
                                  </a>
                                  <ul class="dropdown-menu">
                                    <li><a href="#">Notification 1</a></li>
                                    <li><a href="#">Notification 2</a></li>
                                    <li><a href="#">Notification 3</a></li>
                                    <li><a href="#">Notification 4</a></li>
                                    <li><a href="#">Another notification</a></li>
                                  </ul>
                            </li>
                            <li>
                               <a href="">
                                    <i class="fa fa-search"></i>
                                    <p class="hidden-lg hidden-md">Search</p>
                                </a>
                            </li> -->
                        </ul>

                        <ul class="nav navbar-nav navbar-right">
                            <!-- <li>
                               <a href="">
                                   <p>Account</p>
                                </a>
                            </li>
                            <li class="dropdown">
                                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <p>
                                            Dropdown
                                            <b class="caret"></b>
                                        </p>

                                  </a>
                                  <ul class="dropdown-menu">
                                    <li><a href="#">Action</a></li>
                                    <li><a href="#">Another action</a></li>
                                    <li><a href="#">Something</a></li>
                                    <li><a href="#">Another action</a></li>
                                    <li><a href="#">Something</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">Separated link</a></li>
                                  </ul>
                            </li> -->
                            <li>
                                <a href="{{ route('login.logout') }}">
                                    <p>Log out</p>
                                </a>
                            </li>
                            <li class="separator hidden-lg"></li>
                        </ul>
                    </div>
                </div>
            </nav>
            @yield('content')
            <footer class="footer">
                <div class="container-fluid">
                    <nav class="pull-left">
                        <ul>
                            <li>
                                <a href="hogivano.web.id">
                                    hogivano
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </footer>
        </div>
    </div>
</body>
<script src="{{ asset('js/jquery.3.2.1.min.js') }}" charset="utf-8"></script>
<script src="{{ asset('js/fullpage.js') }}" charset="utf-8"></script>
<script src="{{ asset('js/chartist.min.js') }}" charset="utf-8"></script>
<script src="{{ asset('js/bootstrap.min.js') }}" charset="utf-8"></script>
<script src="{{ asset('js/bootstrap-select.js') }}" charset="utf-8"></script>
<script src="{{ asset('js/bootstrap-notify.js') }}" charset="utf-8"></script>
<script src="{{ asset('js/light-bootstrap-dashboard.js') }}" charset="utf-8"></script>
<script src="{{ asset('js/style.js') }}" charset="utf-8"></script>
@yield('script')
</html>
