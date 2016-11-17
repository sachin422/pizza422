<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width; initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <link href="{{ URL::to('vendor/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,700,500,300italic,100,100italic,400italic,900,900italic,300,500italic,700italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="{{ URL::to('assets/css/style.css') }}" media="screen">
    <title>{{ isset($title) ? $title : 'pizza'  }}</title>
</head>
<body>
<div class="canvas">
    <header>
        <div class="container">
            <div class="inner-header">
                <div class="brand pull-left">
                    <a href="index.html" alt="logo">
                        <img src="{{ URL::to('assets/images/logo.png') }}" alt="logo">
                    </a>
                </div>
                <!--brand-->

                <div class="sign-up pull-right">
                    <ul>
                        <li><a href="#">Help</a></li>
                        <li class="join"><a href="#">Sign up</a></li>
                        <li class="or">or</li>
                        <li><a href="#">Login</a></li>
                        <li><a class="bg" href="#"><span>5</span></a></li>
                    </ul>
                </div>
                <!--sign-up-->
            </div>
            <!--inner-header-->
        </div>
        <!--container-->
    </header>

    <div class="banner">

        <div class="check-it">
            <div class="container">
                <a href="#" class="rewards btn pull-right">REWARDS</a>
            </div>
            <!--container-->
        </div>
        <!--check-it-->

        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

            <!--   <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
               </ol>-->

            <div class="carousel-inner" role="listbox">

                <div class="item active" style="background-image:url({{URL::to('assets/images/home-page-banner.png') }})">

                    <div class="inline-image visible-mobile">
                        <img src="assets/images/" alt="mobileSliderImage">
                    </div>
                    <!--inline-image-->

                    <div class="carousel-caption">
                        <div class="container">
                            <div class="center-align">
                                <div class="caption-text">
                                    <h1>Order Groceries, Fresh Fruits & Vegetables and Food</h1>
                                    <p>Select your location and order now</p>

                                    <div class="location">
                                        <form class="form-inline">
                                            <div class="form-group">
                                                <label class="sr-only" for="city">City</label>
                                                <input name="city" type="text" class="form-control" id="city" placeholder="City">
                                                <div class="help-block"></div>
                                            </div>
                                            <!--form-group-->

                                            <div class="form-group">
                                                <label class="sr-only" for="area">Password</label>
                                                <input name="area" type="text" class="form-control" id="area" placeholder="Sec">
                                                <div class="help-block"></div>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                                <!--caption-text div ends here-->
                            </div>
                            <!--center-align-->
                        </div>
                        <!--container-->
                    </div>
                    <!--carousel-caption div ends here-->
                </div>
                <!--item-->

            </div>
            <!--carousel-inner div ends here-->

            <!--<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
              <span class="sr-only">Previous</span>
            </a>

            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
              <span class="sr-only">Next</span>
            </a> -->
        </div>
        <!--carousel-->
    </div>
    <!--banner-->

    <div class="content">
        <div class="container">
            <div class="inner-content">
                <div class="order">
                    <h2>Order in 4 simple steps</h2>
                </div>
                <!--order-->

                <div class="options">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="select">
                                <a href="#"><img src="{{ URL::to('assets/images/search.png') }}" alt="search"></a>
                                <span class="shadow"><img src="{{ URL::to('assets/images/bootom-shadow.png') }}" alt="shadow"></span>
                                <h4>1. Search</h4>
                            </div>
                            <!--select-->
                        </div>
                        <!--col-md-3-->

                        <div class="col-md-3">
                            <div class="select">
                                <a href="#"><img src="{{ URL::to('assets/images/choose.png') }}" alt="choose"></a>
                                <span class="shadow"><img src="{{ URL::to('assets/images/bootom-shadow.png') }}" alt="shadow"></span>
                                <h4>2. Choose</h4>
                            </div>
                            <!--select-->
                        </div>
                        <!--col-md-3-->

                        <div class="col-md-3">
                            <div class="select">
                                <a href="#"><img src="{{ URL::to('assets/images/pay.png') }}" alt="pay"></a>
                                <span class="shadow"><img src="{{ URL::to('assets/images/bootom-shadow.png') }}" alt="shadow"></span>
                                <h4>3. Pay</h4>
                            </div>
                            <!--select-->
                        </div>
                        <!--col-md-3-->

                        <div class="col-md-3">
                            <div class="select">
                                <a href="#"><img src="{{ URL::to('assets/images/enjoy.png') }}" alt="enjoy"></a>
                                <span class="shadow"><img src="{{ URL::to('assets/images/bootom-shadow.png') }}" alt="shadow"></span>
                                <h4>4. Enjoy</h4>
                            </div>
                            <!--select-->
                        </div>
                        <!--col-md-3-->
                    </div>
                    <!--row-->
                </div>
                <!--options-->

                <div class="weak-offer">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="click-here">
                                <a href="#">
                                    <img src="{{ URL::to('assets/images/offer.png') }}" alt="offer">
                                </a>
                            </div>
                            <!--click-here-->
                        </div>
                        <!--col-md-8-->

                        <div class="col-md-4">
                            <div class="click-here">
                                <a href="#">
                                    <img src="{{ URL::to('assets/images/parents-day.png') }}" alt="parents-day">
                                </a>
                            </div>
                            <!--click-here-->
                        </div>
                        <!--col-md-4-->
                    </div>
                    <!--row-->
                </div>
                <!--weak-offer-->

            </div>
            <!--inner-content-->
        </div>
        <!--container-->

        <div class="last-section">
            <div class="container">
                <div class="fresh-fruit">
                    <div class="row">
                        <div class="col-md-5">

                        </div>
                        <!--col-md-6-->

                        <div class="col-md-7">
                            <div class="download-app">
                                <h2>Order fresh veggies, fruit and groceries easily, anywhere, anytime!</h2>

                                <div class="app-store">
                                    <a href="#" class="apple">App Stores</a>
                                    <a href="#" class="google-play">Google Play</a>
                                </div>
                                <!--app-store-->
                            </div>
                            <!--download-app-->
                        </div>
                        <!--col-md-6-->
                    </div>
                    <!--row-->
                </div>
                <!--fresh-fruit-->
            </div>
            <!--container-->
        </div>
        <!--last-section-->


    </div>
    <!--content-->


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
<!--canvas-->
</body>

<script src="{{  URL::to('vendor/jquery/dist/jquery.min.js')  }}"></script>
<script src="{{ URL::to('vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ URL::to('assets/js/scripts.js') }}"></script>

</html>
