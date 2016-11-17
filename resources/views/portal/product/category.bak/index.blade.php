@section('content')

    <div class="container mt-80">
        <div class="row">
            <div class="col-sm-12 stage stage-white mt-50">

                <h3 class="stage-title text-left">Product Categories

                    <a class="btn btn-default btn-success pull-right" href="{{ URL::to('product/category/create') }}">Create Product Category</a>
                </h3>

                <br>
                <br>

                <div class="col-sm-12">

                    <div class="col-sm-2">

                        <select name="multipleAction" class="form-control multipleAction">
                            <option value="">Select Action</option>
                            <option value="delete">Delete</option>
                        </select>


                    </div>

                    <div class="col-sm-10">
                        <form class="form-inline pull-right" action="{{ URL::to('product/category') }}" role="search">



                            <div class="form-group">
                                <select name="vendor_text" class="form-control">
                                    <option value="">Select Vendor</option>
                                    @foreach(\App\Models\Vendor::orderBy('business_name','asc')->get() as $vend)
                                        <option value="{{ $vend->id }}" {{  Input::get('vendor_text')== $vend->id ? 'selected': ''   }}>{{ $vend->business_name }}</option>

                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                           
                                <input type="text" name="q" class="form-control" placeholder="Search by Title">
                                <button type="submit" class="btn btn-default btn-success">Search</button>
                                </div>




                        </form>
                    </div>
                </div>

                <div class="clearfix"></div>
                <br>
                @include('partials.alert')
                <div class="clearfix"></div>

                @if(!empty($categories->all()))
                    <div class="table-responsive mt-50">
                        <form id="categories-form" action="{{ URL::to('product/category/delete') }}" method="post">

                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th><input class="allcheck" type="checkbox" value=""></th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Products</th>
                                    <th>Vendor</th>
                                    <th>Category</th>

                                    <th>Visibility</th>
                                    <th>Created at</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($categories as $category)



                                    <tr>
                                        <td><input class="checkable" name="ids[]" type="checkbox"
                                                   value="{{ $category->id }}">
                                        </td>
                                        <td><img src="{{ $category->image  }}" alt="product-category-image" width="100"></td>

                                        <td>
                                            {{ $category->title }}
                                        </td>
                                        <td>
                                            {{ $category->products }}
                                        </td>
                                        <td>
                                            {{ @$category->vendor->business_name }}
                                        </td>
                                        <td>
                                            {{ empty($category->parent_category) ? '-' : $category->parent_category->title }}
                                        </td>

                                        <td>
                                            {{ $category->status }}
                                        </td>
                                        <td>
                                            {{ $category->created_at }}
                                        </td>

                                        <td><a href="{{ URL::to('product/category/edit', [$category->id]) }}"><i
                                                        class="glyphicon glyphicon-pencil"></i></a>&nbsp;&nbsp;<a
                                                    href="{{ URL::to('product/category/delete', [$category->id]) }}"
                                                    class="delete_category"><i
                                                        class="glyphicon glyphicon-remove"></i></a></td>
                                    </tr>
                                @endforeach


                                </tbody>
                                <tfoot>
                                <tr>
                                    <th><input class="allcheck" type="checkbox" value=""></th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Products</th>
                                    <th>Vendor</th>
                                    <th>Category</th>

                                    <th>Visibility</th>
                                    <th>Created at</th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>

                            </table>
                        </form>


                        <div class="col-sm-8">
                            {!! $categories->render() !!}
                        </div>

                    </div>

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
    <script>
        $(".delete_category").click(function (e) { 
            e.preventDefault();
            var conf = confirm("Are You sure you want to delete this category?");
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
                $(".allcheck").prop("checked",false);

            }

        });
        $(".multipleAction").click(function (e) {
            if ($(this).val() == "delete" && $(".checkable").is(":checked")) {
                e.preventDefault();
                var conf = confirm("Are You sure you want to delete these categories?");
                if (conf) {
                    $("#categories-form").submit();
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
    </script>
@stop