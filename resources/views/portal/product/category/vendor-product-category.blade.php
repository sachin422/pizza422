@section('content')

    <div class="container mt-80">
        <div class="row">
            <div class="col-sm-12 stage stage-white">

                <h3 class="stage-title text-left">Add Product Categories</h3>
                <br>

                <form id="create-vendor-product-category-form" action="{{ URL::to('vendor/product-category/save') }}"
                      method="post" class="form-horizontal" enctype="multipart/form-data">

                    @include('partials.alert')

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                        <label class="col-sm-6">Vendors</label>

                        <label class="col-sm-6">Product Category</label>

                        <br>
                        <span class="field-info"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Please choose Vendors, Product Category will be auto loaded.</span>


                    </div>

                    <div class="form-group {{ $errors->has('vendor_id') ? 'has-error' : '' }}">


                        <div class="col-sm-5 vendor-list-create">


                            <ul style="list-style-type: none">
                            @foreach(\App\Models\Vendor::all() as $vendor)
                                <li>

                                    <input type="radio" id="vendor_id_{{ $vendor->id }}" name="vendor_id" onclick="loadProductCategory({{ $vendor->id  }})" value="{{ $vendor->id  }}" {{ $vendor->id==$vendor_default_id ? 'checked' : '' }}>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    {{ $vendor->business_name }}


                                </li>


                            @endforeach
                            </ul>
                        </div>


                        <div class="col-sm-7">

                            <?php
                            $vendor_selected_categories = [];
                            if(!empty($vendor_selected_catg)){

                                foreach($vendor_selected_catg as $vendor_catg){
                                    array_push($vendor_selected_categories, $vendor_catg->category_id);

                                } } ?>

                            <select name="category_ids[]" class="form-control category-list-create" multiple>

                                @if(!empty($product_categories))

                                    @foreach($product_categories as $product_catg)

                                        <option value="{{ $product_catg->id }}" {{ in_array($product_catg->id,$vendor_selected_categories) ? 'selected' : '' }}>{{ $product_catg->title }}</option>

                                    @endforeach

                                @else

                                    <option value="">No Category Found</option>

                                    @endif



                            </select>

                        </div>




                    </div>


                    <div class="form-group">
                        <div class="col-sm-12">

                            <input type="submit" value="Save" class="btn btn-success pull-right">
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>

@stop

@section('footer')
    <script>


        function loadProductCategory(vendor_id){

            window.location =  "{{ URL::to('vendor/product-category/category') }}/" + vendor_id;
        }

    </script>
@stop