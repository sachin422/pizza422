@section('before_content')
    @include('site.partials.banner-vendor')
@stop

@section('content')

    <?php

    $top_level_category_first = null;
    $top_level_categories = [];

    ?>

    <div class="content flat">
        <div class="container">
            <div class="tabs-section">
                <div class="bs-example-tabs" data-example-id="togglable-tabs">
                    <!-- Nav tabs -->

                    <ul class="nav nav-tabs" role="tablist">
                        @foreach($products as $i => $product)
                            <?php
                            if ($i == 0) {
                                $top_level_category_first = $category->slug;
                            }
                            array_push($top_level_categories, ['slug' => $category->slug, 'id' => $category->id]);
                            ?>
                            <li role="presentation" class="vendor-top-categories {{ $top_level_category == $category->id ? 'active' : ''  }}">
                                <a href="#/vendor/{{ $category->slug }}" class="top-level-category-item {{ $category->slug  }}" aria-controls="home"
                                   role="tab"> {{ $category->title }}  </a></li>
                        @endforeach

                    </ul>

                    <!-- Tab content start-->

                    <div class="tab-content">

                        <!-- Tab panel start-->

                        <div role="tabpanel" class="tab-pan">
                            <div class="minimum-order">
                                <p>Minimum Order is ₹250/-</p>
                            </div>
                            <!--minimum-order-->

                            <div class="row first-row" ng-view>



                            </div>
                            <!--row-->

                        </div>
                        <!--tabpanel end-->

                    </div>
                    <!--tab-content-->


                </div>
                <!--bs-example-tabs-->
            </div>
            <!--tabs-section div ends here-->
        </div>
        <!--container-->
    </div>
    <!--content-->


@stop

@section('footer')
    <script>
        var top_level_categories = {!! json_encode($top_level_categories) !!};

        pizza.config(['$routeProvider',
            function($routeProvider) {
                $routeProvider.
                        @foreach ($top_level_categories as $category)
                        when('/{{$category['slug']}}', {
                            templateUrl: 'http://dev.pizza/templates/vendor.html',
                            controller: 'vendorController'
                        }).
                        @endforeach
                        otherwise({
                            redirectTo: '/{{ $top_level_category_first  }}'
                        });
            }]);

    </script>
@stop



