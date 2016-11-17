@section('before_content')
    @include('site.partials.banner-vendor')
@stop

@section('content')



    <div class="content flat">
        <div class="container">
            <div class="tabs-section">
                <div class="bs-example-tabs" data-example-id="togglable-tabs">
                    <!-- Nav tabs -->

                    <ul class="nav nav-tabs" role="tablist">


                    </ul>

                    <!-- Tab content start-->

                    <div class="tab-content">

                        <!-- Tab panel start-->

                        <div role="tabpanel" class="tab-pan">
                            <!-- <div class="minimum-order">
                                 <p>Minimum Order is ₹250/-</p>
                             </div>-->
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

        pizza.config(['$routeProvider',
            function($routeProvider) {
                $routeProvider.templateUrl: "{{ URL::to('/templates/settings.html') }}",
                            controller: "userController"

            }]);

    </script>
@stop



