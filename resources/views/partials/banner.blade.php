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
                                    <form action="{{ URL::to('/') }}" class="form-inline location-form" id="location_form" method="post">
                                        <div class="form-group">
                                            <label class="sr-only" for="exampleInputEmail3">Email address</label>
                                            <input name="location" type="text" value="" class="form-control" id="location" placeholder="Area, City">
                                            <input type="hidden" name="location_id" value="" id="location_id">
                                            <div class="help-block"></div>
                                        </div>
                                        <!--form-group-->

                                        <div class="form-group">
                                            <label class="sr-only" for="exampleInputPassword3">Password</label>
                                            <input type="text" class="form-control" id="exampleInputPassword3" placeholder="Sec">
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