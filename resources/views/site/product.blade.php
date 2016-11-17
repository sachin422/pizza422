@section('header')
    <link type="text/css" href="{{ URL::to('vendor/jScrollPane/style/jquery.jscrollpane.css') }}" rel="stylesheet" media="all" />
@stop
@section('before_content')
    @include('site.partials.banner-product')
@stop

@section('content')
<?php
$current_product_category = null;
        ?>
<div class="content">
        	<div class="container">
            	
                <div class="page-indication">
                    <ol class="breadcrumb">
                      <li><a>Home</a></li>
                      <li><a href="{{ URL::to('/') }}#/{{ $category->slug }}">{{ $category->title  }}</a></li>
                      <li class="active"><a>{{ $vendor->business_name  }}</a></li>
                    </ol>
                    <!--breadcrumb-->
                </div>
                <!--page-indication-->
                
                <div class="rating">
                    <div class="media">
                      <div class="media-left">
                        <a>
                          <img width="112" class="media-object" src="{{ $vendor->logo  }}" alt="{{ $vendor->business_name  }}">
                        </a>
                      </div>
                      <!--media-left-->
                      <div class="media-body">
                        <h4 class="media-heading"> 
                        	<span class="text">{{ $vendor->business_name  }}</span>
                        	<span class="star"><img src="{{ URL::to('assets/images/rated-star.png') }}" alt="rated-star"></span>
                            <span class="star"><img src="{{ URL::to('assets/images/rated-star.png') }}" alt="rated-star"></span>
                            <span class="star"><img src="{{ URL::to('assets/images/rated-star.png') }}" alt="rated-star"></span>
                            <span class="star"><img src="{{ URL::to('assets/images/without-rated.png') }}" alt="rated-star"></span>
                            <span class="star"><img src="{{ URL::to('assets/images/without-rated.png') }}" alt="rated-star"></span>
                        </h4>
                        
                        <p>{{ $vendor->slogan }}</p>
                      </div>
                      <!--media-body-->
                    </div>
                    <!--media-->
                </div>
                <!--rating--> 
                
                <div class="stores">
					<div class="row">
                    	<div class="col-md-8">
                        	<div class="left-part">
                            	<div class="left-menu">
                                	<div class="back-to">
                                    	<a href="{{ URl::to('/')  }}">< Back to Stores</a>
                                    </div>
                                    <!--back-to-->
                                    
                                    <div class="items-listing">
                                    	<h2 class="item-heading">Menu</h2>
                                        <!--if ($vendor->multi_level_categories == 'yes')-->

                                        <div class="multi-links">
                                        	<ul>

                                                @foreach ($product_categories as $ci => $product_category)
                                                    <?php
                                                    if ($ci <= 0) {
                                                    $current_product_category = $product_category->slug;
                                                        }
                                                    ?>
                                            	<li class="{{ $ci == 0 ? 'active' : '' }}">
                                                	<a class="product-cat-item {{ $product_category->slug }}" href="#/{{ $product_category->slug }}">{{ $product_category->title  }}</a>
                                                    @if (!empty($product_category->sub_categories))

                                                    <ul class="sub-menu">
                                                    	@foreach ($product_category->sub_categories as $si => $sub_category)
                                                            <?php
                                                                if ($si <= 0) {
                                                            $current_product_category = $sub_category->slug;
                                                                    }
                                                            ?>
                                                            <li><a class="product-cat-item {{ $sub_category->slug }}" href="#/{{ $sub_category->slug }}">{{ $sub_category->title }}</a></li>
                                                        @endforeach
                                                    </ul>
                                                    @endif
                                                    <!--sub-menu-->
                                                </li>
                                                @endforeach
                                                <!--
                                                <li class="active">
                                                	<a href="#">FOOD</a>                                                	
                                                    <ul class="sub-menu">
                                                    	<li><a href="#">Wraps</a></li>
                                                        <li class="active"><a href="#">Burgers</a></li>
                                                        <li><a href="#">Sandwiches</a></li>                                                        <li><a href="#">Snacks</a></li>
                                                    </ul>

                                                </li>
                                                
                                               -->
                                            </ul>
                                        </div>
                                        <!--multi-links-->



                                    </div>
                                    <!--items-listing-->
                                    
                                    <div class="back-to">
                                    	<a href="{{ URl::to('/')  }}">< Back to Stores</a>
                                    </div>
                                    <!--back-to-->
                                </div>
                                <!--left-menu-->
                                
                                <div ng-view>

                                    Loading please wait...

                                </div>
                                <!--product-description-->
                                
                            </div>
                            <!--left-part-->
                        </div>
                        <!--col-md-8-->
                        
                        <div class="col-md-4">
                        	<div class="right-part">
                            	<div class="search">
                                	<input type="text" ng-model="query" placeholder="Search">
                                </div>
                                <!--search--> 
                                
                                <div class="my-cart">
                                    <div class="cart-heading">
                                    	<h2>My cart</h2>
                                        <a href="javascript:void(0)" class="cart-bucket">
                                        	<span class="cart-total-products">{{ count(Session::get('cart.items')) }}</span>
                                        </a>
                                    </div>
                                    <!--cart-heading-->
                                    
                                    <div class="free-note">
										<p>Yeh! Free Home Delivery</p>
                                    </div>
                                    <!--free-note-->
                                    

                                    <div class="scroll-pane">
                                        @include('site.cart.mini-cart')
                                    </div>
                                    
                                    <div class="sub-total">
                                    	<p><span class="left-label pull-left">Sub Total</span>
                                        <span class="right-label pull-right red" id="cart-sub-total"><i class="rupee-sign"></i> {{ Session::get('cart.sub_total', 0) }}</span></p>
                                        
                                       <!-- <p><span class="left-label pull-left">Delivery Charges</span>
                                        <span class="right-label pull-right green">FREE</span></p>-->
                                    </div>
                                    <!--sub-total-->
                                    
                                    <div class="sub-total bold">
                                    	<p><span class="left-label pull-left">Total</span>
                                        <span class="right-label pull-right"><i class="rupee-sign"></i>900.00</span></p>
                                        
                                    </div>
                                    <!--sub-total-->
                                    
                                    <div class="check-out">
                                    	<a href="javascript:void(0)" class="btn btn-yellow">Checkout</a>
                                    </div>
                                    <!--check-out-->
                                </div>
                                <!--my-cart--> 
                                
                                <div class="detail">
                                	<h2>details</h2>
                                    <p>Min. Delivery:<i class="rupee-sign"></i>{{ $vendor->minimum_order }}</p>
                                    <p>Delivery Fee:

                                        @if (empty($vendor->shipping_config))
                                        <span class="green">FREE</span>
                                        @else
                                            <span class="red"><i class="rupee-sign"></i>{{ $vendor->free_shipping_order->minimum_shipping_charges }}</span>

                                        @endif
                                    </p>
                                    @if (!empty($vendor->shipping_config) && $vendor->free_shipping_order->free_shipping_order > 0)
                                    <p>Free Shipping Upto:

                                            <span class="green"><i class="rupee-sign"></i>{{$vendor->free_shipping_order->free_shipping_order}}</span>

                                    </p>
                                    @endif
                                    <p>Online Payment: Available</p>
                                    <p>Voucher: Accepted</p>                                	
                                </div>
                                <!--detail-->                          	
                            </div>
                            <!--right-part-->
                        </div>
                        <!--col-md-4-->
                    </div>
                    <!--row-->
                </div>
                <!--stores--> 
                  
            </div>
            <!--container-->     	
        </div>
        <!--content-->
        
@stop

@section('footer')
    <script src="{{ URL::to('vendor/jScrollPane/script/jquery.mousewheel.js')  }}"></script>
    <script src="{{ URL::to('vendor/jScrollPane/script/mwheelIntent.js')  }}"></script>
    <script src="{{ URL::to('vendor/jScrollPane/script/jquery.jscrollpane.min.js')  }}"></script>

    <script>
        $(function()
        {
            $('.scroll-pane').jScrollPane();
        });
        </script>
    <script>
        var current_product_category = '{{ $current_product_category }}';
        var current_vendor = {{ $vendor->id }};
        var current_category = {{ $category->id }};
        var current_category_name = '{{ $category->title }}';
        pizza.config(['$routeProvider',
            function($routeProvider) {
                $routeProvider.
                        when('/:category', {
                            templateUrl: "{{ URL::to('/templates/products.html') }}",
                            controller: "productController"
                        }).otherwise({
                            redirectTo: '/{{ $current_product_category}}'
                        });
            }]);
    </script>


    @stop