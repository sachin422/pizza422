@section('before_content')
    @include('site.partials.banner')
@stop
@section('content')
    <div class="content flat">
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
                            <span class="shadow"><img src="{{ URL::to('assets/images/bootom-shadow.png') }}"
                                                      alt="shadow"></span>
                            <h4>1. Search</h4>
                        </div>
                        <!--select-->
                    </div>
                    <!--col-md-3-->

                    <div class="col-md-3">
                        <div class="select">
                            <a href="#"><img src="{{ URL::to('assets/images/choose.png') }}" alt="choose"></a>
                            <span class="shadow"><img src="{{ URL::to('assets/images/bootom-shadow.png') }}"
                                                      alt="shadow"></span>
                            <h4>2. Choose</h4>
                        </div>
                        <!--select-->
                    </div>
                    <!--col-md-3-->

                    <div class="col-md-3">
                        <div class="select">
                            <a href="#"><img src="{{ URL::to('assets/images/pay.png') }}" alt="pay"></a>
                            <span class="shadow"><img src="{{ URL::to('assets/images/bootom-shadow.png') }}"
                                                      alt="shadow"></span>
                            <h4>3. Pay</h4>
                        </div>
                        <!--select-->
                    </div>
                    <!--col-md-3-->

                    <div class="col-md-3">
                        <div class="select">
                            <a href="#"><img src="{{ URL::to('assets/images/enjoy.png') }}" alt="enjoy"></a>
                            <span class="shadow"><img src="{{ URL::to('assets/images/bootom-shadow.png') }}"
                                                      alt="shadow"></span>
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
@stop

@section('footer')
    <script>
    updateChangeLocationsSource();
    </script>
@stop