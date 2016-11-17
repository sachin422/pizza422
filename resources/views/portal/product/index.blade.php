@section('content')

    <div class="container mt-80">
        <div class="row">
            <div class="col-sm-12 stage stage-white mt-50">

                <h3 class="stage-title text-left"> Products

                    <a class="btn btn-default btn-success pull-right" href="{{ URL::to('product/create') }}">Create Product</a>
                </h3>

                <br><br>

                <div class="col-sm-12">




                    <div class="col-sm-2">

                        <select name="multipleAction" class="form-control multipleAction">
                            <option value="">Select Action</option>
                            <option value="delete">Delete</option>
                        </select>


                    </div>



                        <div class="col-sm-10">
                        <form class="form-inline pull-right" action="{{ URL::to('product/index') }}" role="search">

                            <div class="form-group">
                                <!-- <select id="vendors-drop-down" name="vendor_text" class="form-control">
                                    <option value="">Select Vendor</option>
                                    @foreach(\App\Models\Vendor::orderBy('business_name','asc')->get() as $vend)
                                        <option value="{{ $vend->id }}" {{  Input::get('vendor_text')== $vend->id ? 'selected': ''   }}>{{ $vend->business_name }}</option>

                                    @endforeach
                                </select> -->
                            </div>
                            <div class="form-group">
                                <select id="product-categories" name="category_text" class="form-control" style="display:none">

                                </select>
                            </div>

                            <div class="form-group">


                                <input type="text" name="q" style="max-width:250px" value="{{ Input::get('q')  }}" class="form-control" placeholder="Search by Title">

                            </div>
                            <button type="submit" class="btn btn-default btn-success">Search</button>

                        </form>


                    </div>






                </div>

                <div class="clearfix"></div>
                <br>
                @include('partials.alert')
                <div class="clearfix"></div>

                @if(!empty($products->all()))
                    <div class="table-responsive mt-50">
                        <form id="products-form" action="{{ URL::to('product/delete') }}" method="post">

                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th><input class="allcheck" type="checkbox" value=""></th>
                                    <th>Image</th>
                                    <th>Title</th>

                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Created at</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($products as $product)

                                    <tr>
                                        <td><input class="checkable" name="ids[]" type="checkbox"
                                                   value="{{ $product->id }}">
                                        </td>
                                        <td><img src="{{ $product->image  }}" alt="product-image" width="100"></td>
                                        <td>
                                            {{ $product->title }}
                                        </td>


                                        <td>
                                            {{ $product->product_category->title }}
                                        </td>
                                        <td>
                                            {{ $product->price }}
                                        </td>
                                        <td>
                                            {{ $product->created_at }}
                                        </td>

                                        <td><a href="{{ URL::to('product/edit', [$product->id]) }}"><i
                                                        class="glyphicon glyphicon-pencil"></i></a>&nbsp;&nbsp;<a
                                                    href="{{ URL::to('product/delete', [$product->id]) }}"
                                                    class="delete_product"><i
                                                        class="glyphicon glyphicon-remove"></i></a></td>
                                    </tr>
                                @endforeach


                                </tbody>
                                <tfoot>
                                <tr>
                                    <th><input class="allcheck" type="checkbox" value=""></th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Created at</th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>

                            </table>
                        </form>



                    </div>

                    {!!$products->render()!!}

                @else
                    <div class="col-sm-12">
                        <p class="mt-50">No records found.</p>
                    </div>
                @endif


            </div>
        </div>
    </div>

@stop

@section('footer')

    <script src="{{ URL::to('assets/js/admin/product.js')  }}"></script>



    <script>

        var old_product_category = 0;

        $(function () {


            $(".delete_product").click(function (e) {
                e.preventDefault();
                var conf = confirm("Are You sure you want to delete this product?");
                if (conf) {
                    window.location = $(this).attr('href');
                }
                else {
                    return false;
                }
            });

            $(".allcheck").click(function () {
                if ($(this).is(":checked")) {
                    $(".checkable").prop("checked", true);
                }
                else {
                    $(".checkable").prop("checked", false);
                    $(".allcheck").prop("checked", false);

                }

            });
            $(".multipleAction").click(function (e) {
                if ($(this).val() == "delete" && $(".checkable").is(":checked")) {
                    e.preventDefault();
                    var conf = confirm("Are You sure you want to delete these products?");
                    if (conf) {
                        $("#products-form").submit();
                    }
                    else {
                        return false;
                    }
                }
                else if ($(this).val() == "delete") {
                    alert("Please select record to delete");
                    $(".multipleAction").val("");
                }
            });

            $('#vendors-drop-down').on('change', function () {
                //loadVendorCategories();
                loadProductCategories();
                $("#product-categories").show();
            });



        });

    </script>
@stop