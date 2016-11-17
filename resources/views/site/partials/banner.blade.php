<div class="banner">

    <div class="check-it">
        <div class="container">
            <div class="right-collapse pull-right">
                <a href="#" class="rewards btn">REWARDS</a>
            </div>
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
                    <img src="{{ URL::to('assets/images/') }}" alt="mobileSliderImage">
                </div>
                <!--inline-image-->

                <div class="carousel-caption">
                    <div class="container">
                        <div class="center-align">
                            <div class="caption-text">
                                <h1>Order Groceries, Fresh Fruits & Vegetables and Food</h1>
                                <p>Select your location and order now</p>

                                <div class="location">
                                    <form method="post" action="{{ URL::to('/choose-location') }}" class="form-inline location-form" id="location_form">
                                        <input type="hidden" name="location_id" id="location_id">
                                        <div class="form-group {{$errors->has('location_id') ? 'has-error' : ''}}">
                                            <label class="sr-only" for="location">Location</label>
                                            <input type="text" value="" class="form-control" id="location" name="location" placeholder="Area, City">
                                            <div class="help-block">{{ $errors->first('location_id') }}</div>
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