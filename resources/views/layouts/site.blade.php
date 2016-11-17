<!doctype html>
<html ng-app="pizza" ng-csp>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width; initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="X-CSRF-Token" content="{{ csrf_token()  }}">
    <title>{{ isset($title) ? $title : 'pizza'  }}</title>
    <link href="{{ URL::to('vendor/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::to('vendor/jquery-ui/themes/smoothness/jquery-ui.min.css') }}" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,700,500,300italic,100,100italic,400italic,900,900italic,300,500italic,700italic'
          rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="{{ URL::to('assets/css/style.css') }}" media="screen">
    <link rel='stylesheet' href="{{ URL::to('vendor/angular-loading-bar/build/loading-bar.min.css') }}" rel='stylesheet' type='text/css' media='all'>
    <link rel="stylesheet"  href="{{ URL::to('assets/css/horizontal.css') }}" type="text/css"media="screen">
    @yield('header')
    <script>
        var base_url = '{{ URL::to('/')  }}';
    </script>
</head>
<body class="{{ isset($body_classes) ? $body_classes : ''  }}">
<!--<script>
   /*window.fbAsyncInit = function() {
        FB.init({
            appId      : '810772459036386',
            xfbml      : true,
            version    : 'v2.4'
        });
    };

    (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));*/
</script>-->
<div class="canvas">
    <header>
        <div class="container">
            <div class="inner-header">
                <div class="brand pull-left">
                    <a href="{{ URL::to('/') }}#/home" alt="logo">
                        <img src="{{ URL::to('assets/images/logo.png') }}" alt="logo">
                    </a>
                </div>
                <!--brand-->

                <div class="sign-up pull-right">
                    <ul>
                        <li><a href="#">Help</a></li>

                        @if (Auth::check())
                            <li class="dropdown">
                                <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" role="button" >Welcome <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ URL::to('user/settings') }}">Account Settings</a>
                                    </li>
                                    <li>
                                        <a href="{{ URL::to('user/change-password') }}">Change Password</a>
                                    </li>
                                    <li>
                                        <a href="{{ URL::to('user/address') }}">My Address</a>
                                    </li>
                                    <li>
                                        <a href="{{ URL::to('user/points') }}">My Points</a>
                                    </li>
                                    <li>
                                        <a href="{{ URL::to('user/orders') }}">My Orders</a>
                                    </li>
                                    <li>
                                        <a href="{{ URL::to('user/logout') }}">Logout</a>
                                    </li>
                                </ul>
                            </li>
                            @else

                        <li class="join"><a href="javascript:void(0)" class="ax-load-modal" data-modal="signup" data-remote="true" role="button">Sign up</a></li>
                        <li class="or">or</li>
                        <li><a href="javascript:void(0)" class="ax-load-modal" data-modal="login" data-remote="true" role="button">Login</a></li>

                        @endif
                        <li class="cart-count-header"><a class="bg" href="#"><span class="cart-total-products">{{ count(Session::get('cart.items')) }}</span></a></li>
                    </ul>
                </div>
                <!--sign-up-->
            </div>
            <!--inner-header-->
        </div>
        <!--container-->
    </header>


    @yield('before_content')

    <div class="main-content">

        @yield('content')

    </div>


    @yield('after_content')

    <footer>
        <div class="container">
            <div class="inner-footer">
                <div class="row">
                    <div class="col-md-5">
                        <div class="outer-cover">
                            <h3>Cart Meal</h3>
                            <ul class="divide">
                                <li><a href="#">About us</a></li>
                                <li><a href="#">Become A Partner</a></li>
                                <li><a href="#">terms</a></li>
                                <li><a href="#">Contact Us</a></li>
                                <li><a href="#">Privacy</a></li>
                                <li><a href="#">FAQ</a></li>
                                <li><a href="#">Stories</a></li>
                                <li><a href="#">Career</a></li>
                            </ul>
                        </div>
                        <!--outer-cover-->
                    </div>
                    <!--col-md-5-->


                    <div class="col-md-3">
                        <div class="outer-cover cities">
                            <h3>Cities</h3>
                            <ul>

                                <li><a href="#">Chandigarh</a></li>
                                <li><a href="#">Panchkula</a></li>
                                <li><a href="#">Zirakpur</a></li>
                                <li><a href="#">Mohali </a></li>
                            </ul>
                        </div>
                        <!--outer-cover-->
                    </div>
                    <!--col-md-3-->

                    <div class="col-md-4">
                        <div class="outer-cover icons">
                            <h3>Get In touch</h3>
                            <ul>
                                <li class="twitter"><a target="_blank" href="#"></a></li>
                                <li class="facebook"><a target="_blank" href="#"></a></li>
                                <li class="linkedin"><a target="_blank" href="#"></a></li>
                            </ul>
                            <p class="copy-right">&copy;2015 pizza</p>
                        </div>
                        <!--outer-cover-->
                    </div>
                    <!--col-md-4-->
                </div>
                <!--row-->
            </div>
            <!--inner-footer-->
        </div>
        <!--container-->
    </footer>
    <!--end:footer-->
</div>

<div id="ax-ajax-loader-bg"></div>
<div id="ax-ajax-loader"></div>

<!-- alert box -->
<div id="alert-screen">
    <div class="alert-stage">
        <div class="alert-content">
            <p>Service not available in your area.</p>
        </div>
    </div>
</div>
<!-- alert box ends -->
<div ax-modal>
</div>


</body>

<script src="{{  URL::to('vendor/jquery/dist/jquery.min.js')  }}"></script>
<script src="{{ URL::to('vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ URL::to('assets/js/scripts.js') }}"></script>
<script src="{{ URL::to('vendor/jquery-ui/jquery-ui.min.js')  }}"></script>
<script src="{{ URL::to('vendor/action-ajax/action-ajax.js') }}"></script>
<script src="{{ URL::to('vendor/angular/angular.min.js') }}"></script>
<script src="{{ URL::to('vendor/angular-loading-bar/build/loading-bar.min.js') }}"></script>
<script src={{ URL::to('vendor/angular-route/angular-route.min.js') }}></script>
<script src={{ URL::to('assets/js/angular-modules.js') }}></script>

@yield('footer')

</html>
