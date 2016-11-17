@section('content')

    <div class="container mt-80">
        <div class="row">
            <div class="col-sm-12 stage stage-white">

                <h3 class="stage-title text-left">Update Product Category

                    <!-- <input type="button" value="Back to Listing" style="margin-left:10px" id="back-listing" class="btn btn-success pull-right"> -->
                    <a href="{{ URL::to('product/category') }}" class="btn btn-success pull-right">Back to Listing</a>
                    <!-- <button onclick="$('#create-category-form').submit()" class="btn btn-success pull-right hidden-xs hidden-sm">Update</button> -->

                </h3>
                <br>
                <h5 class="stage-title text-left">All field marked as &nbsp;<span style="color:red">*</span> are compulsory</h5>

                <form id="create-category-form" action="{{ URL::to('product/category/update', [$category->id]) }}" method="post" class="form-horizontal" enctype="multipart/form-data">

                    @include('partials.alert')

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                        <label class="col-sm-12">Title&nbsp;<span style="color:red">*</span> </label>

                        <div class="col-sm-12">
                            <input type="text" name="title" value="{{ Input::old('title', $category->title)  }}" class="form-control" placeholder="Enter product title" required>

                            <div class="help-block">{{ $errors->first('title') }}</div>
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('vendor_id') ? 'has-error' : '' }}">
                        <label class="col-sm-12">Vendor&nbsp;<span style="color:red">*</span> </label>

                        <div class="col-sm-12">
                            <select id="vendors-drop-down" name="vendor_id" class="form-control" required>
                                <option value="">Select Type</option>
                                @foreach(App\Models\Vendor::orderBy('business_name','asc')->get() as $vendor)
                                    <option value="{{ $vendor->id }}" {{ Input::old('vendor_id', $category->vendor_id) == $vendor->id ? 'selected' : ''  }} >{{ $vendor->business_name }}

                                    </option>
                                @endforeach
                            </select>

                            <div class="help-block">{{ $errors->first('vendor_id') }}</div>
                        </div>
                    </div>

                   <!-- <div class="form-group {{ $errors->has('type') ? 'has-error' : '' }}">
                        <label class="col-sm-12">Type&nbsp;<span style="color:red">*</span> </label>

                        <div class="col-sm-12">

                            <select id="top-level-category" name="type" class="form-control" required>
                                <option value="">-- select type --</option>

                            </select>

                            <div class="help-block">{{ $errors->first('type') }}</div>
                        </div>
                    </div> -->



                    <div id="parent-category-div" class="form-group {{ $errors->has('parent') ? 'has-error' : '' }}">
                        <label class="col-sm-12">Parent category </label>

                        <div class="col-sm-12">
                            <select id="parent-categories" name="parent" class="form-control" required>
                                <option value="0">- select parent category -</option>

                            </select>

                            <div class="help-block">{{ $errors->first('parent') }}</div>
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('visibility') ? 'has-error' : '' }}">
                        <label class="col-sm-12">Visibility&nbsp;<span style="color:red">*</span> </label>

                        <div class="col-sm-12">
                            <select name="visibility" class="form-control" required>
                                @foreach (\App\Models\Category::getStatus() as $key => $value)
                                    <option value="{{ $key  }}" {{ Input::old('visibility', $category->status) == $key ? 'selected' : ''  }}>{{ $value }}</option>
                                    @endforeach
                            </select>

                            <div class="help-block">{{ $errors->first('visibility') }}</div>
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
                        <label class="col-sm-12">Image<span style="color:red">*</span></label>

                        <div class="col-sm-8">
                            <input type="file" name="image" class="form-control">

                            <div class="help-block">{{ $errors->first('image') }}</div>
                            <span class="field-info">Maximum image size: 2 MB</span>
                        </div>
                        <div class="col-sm-4">
                            <img src="{{ URL::to($category->image) }}" width="200" alt="{{ $category->title  }}">
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                        <label class="col-sm-12">Description&nbsp;<span style="color:red">*</span> </label>

                        <div class="col-sm-12">
                            <textarea name="description" class="form-control">{{Input::old('description')}}</textarea>

                            <div class="help-block">{{ $errors->first('description') }}</div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12">
                            <input type="submit" value="Update" class="btn btn-success pull-right">
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>

@stop

@section('footer')
    <script src="{{ URL::to('assets/js/admin/product-category.js')  }}"></script>
    <script>

        var old_type_id = '{{ $category->type }}';
        var old_parent_category = '{{ $category->parent }}';

        $(function () {

            loadVendorCategories(function () {
                loadParentCategories();
            });



            $('#vendors-drop-down').on('change', function () {
                //loadVendorCategories();
                loadParentCategories();
            });

           /* $('#top-level-category').on('change', function () {
                loadParentCategories();
            }); */



        });

    </script>
@stop