@section('content')

    <div class="container mt-80">
        <div class="row">
            <div class="col-sm-12 stage stage-white mt-50">
                <h3 class="stage-title text-left">Manage Product Categories
                </h3>
                <br>

                <div class="col-sm-12">


                        <form class="form-inline" action="{{ URL::to('vendor/product-category/view') }}" method="post">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">


                        <select name="vendor_id" class="form-control" onchange="this.form.submit()">
                            <option value="0">--select vendor--</option>
                            @foreach($vendors as $vendor)
                                <option value="{{ $vendor->id }}" {{ $vendor->id == $vendor_id  ? 'selected' : Input::old('vendor_id') }}>{{ $vendor->business_name }}</option>
                                @endforeach
                        </select>
                        </form>

                    </div>
                <div class="clearfix"></div>

                <br>
                @include('partials.alert')
                <br>

                <div class="col-sm-12" id="category_view" style="display:{{ $vendor_id!=0 ? 'block' : 'none' }}">



                    <form id="category-form" action="{{ URL::to('vendor/product-category/delete') }}" method="post">



                        <table class="table">

                            <tbody>


                            @if(!empty($vendor_product_category))
                                <?php $c_row = 1; ?>
                                <tr>
                                @foreach($vendor_product_category as $prod_catg)

                                    <td>
                                        <?php

                                        echo $prod_catg->master_category->title;
                                            $catg_arr[] =$prod_catg->master_category->title;
                                            ?>
                                                &nbsp; &nbsp;&nbsp;<a title="Delete Category" vendor_id="{{ $vendor_id }}" href="{{ URL::to('vendor/product-category/delete/'.$prod_catg->master_category->id.'/?vendor_id='.$vendor_id) }}" class="delete_category">
                                                    <i class="glyphicon glyphicon-remove"></i></a>
                                        </td>

                                        <?php $c_row++;

                                            if ($c_row >= 6)
                                                {
                                                    $c_row = 1;

                                                    ?>
                                </tr>
                                <tr>
                                    <?php
                                                }

                                        ?>
                                @endforeach
                                </tr>


                                @if(empty($catg_arr))

                                    <tr><td>No category found</td></tr>
                                    @endif

                                @endif

                            </tbody>



                        </table></form>



               </div>




                <div class="clearfix"></div>



            </div></div></div>



@stop

@section('footer')
    <script>
        $(function(){

            $(".delete_category").click(function(e){
                var conf = confirm("Are You sure You want to delete this Category, all the Products associated with it will be deleted");
                if(conf){

                    //window.location = $(this).attr('href');
                    return true;

                }else {
                    e.preventDefault();
                    return false;
                }
            });
        });
    </script>
@stop