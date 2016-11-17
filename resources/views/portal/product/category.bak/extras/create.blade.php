@section('content')

    <div class="container mt-80">
        <div class="row">
            <div class="col-sm-12 stage stage-white">

                <h3 class="stage-title text-left">Create Product Category
                    <!-- <input type="button" value="Back to Listing" style="margin-left:10px" id="back-listing" class="btn btn-success pull-right"> -->
                    <a href="{{ URL::to('product/category') }}" class="btn btn-success pull-right">Back to Listing</a>
                    <!--<input type="button" value="Save and Add New" style="margin-left:10px" id="add-new2" class="btn btn-success pull-right">
                    <button onclick="$('#create-category-form').submit()" class="btn btn-success pull-right hidden-xs hidden-sm">Save</button></h3> -->

                    <br>
                    <h5 class="stage-title text-left">All field marked as &nbsp;<span style="color:red">*</span> are compulsory</h5>

                    <form id="create-category-form" action="{{ URL::to('product/category/save') }}" method="post" class="form-horizontal" enctype="multipart/form-data">

                        @include('partials.alert')

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="add_new" id="add_new" value="no">


                        <input type="hidden" id="force_create" name="force_create" value="{{Input::old('force_create', 1)}}">
                        <input type="hidden" id="master_category_id" name="master_category_id" value="{{Input::old('master_category_id', 0)}}">

                        <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                            <label class="col-sm-12">Title&nbsp;<span style="color:red">*</span> </label>

                            <div class="col-sm-12">
                                <input type="text" id="title" name="title" value="{{ Input::old('title')  }}" class="form-control" placeholder="Enter product title" required>

                                <div class="help-block">{{ $errors->first('title') }}</div>
                            </div>
                        </div>

                        <?php print_r(Session::get('user.roles')); ?>
                        <div class="form-group {{ $errors->has('vendor_id') ? 'has-error' : '' }}">
                            <label class="col-sm-12">Vendor&nbsp;<span style="color:red">*</span> </label>

                            <div class="col-sm-12">
                                <select id="vendors-drop-down" name="vendor_id" class="form-control" required>
                                    <option value=""> - Select Vendor - </option>
                                    @foreach(App\Models\Vendor::orderBy('business_name','asc')->get() as $vendor)
                                        <option value="{{ $vendor->id }}">{{ $vendor->business_name }}

                                        </option>
                                    @endforeach
                                </select>

                                <div class="help-block">{{ $errors->first('vendor_id') }}</div>
                            </div>
                        </div>

                        <!-- <div class="form-group {{ $errors->has('type') ? 'has-error' : '' }}">
                        <label class="col-sm-12">Type&nbsp;<span style="color:red">*</span> </label>

                        <div class="col-sm-12">
                            <select id="top-level-category"  name="type" class="form-control" required>
                                <option value="">-- select vendor first --</option>

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
                                        <option value="{{ $key  }}">{{ $value }}</option>
                                    @endforeach
                                </select>

                                <div class="help-block">{{ $errors->first('visibility') }}</div>
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
                            <label class="col-sm-12">Image<span style="color:red">*</span></label>

                            <div class="col-sm-12">
                                <input type="file" name="image" class="form-control">

                                <div class="help-block">{{ $errors->first('image') }}</div>

                                <span class="field-info">Maximum image size: 2 MB</span>
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
                                <input type="button" value="Save and Add New" style="margin-left:10px" id="add-new" class="btn btn-success pull-right">
                                <input type="submit" value="Save" class="btn btn-success pull-right">
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

        var old_type_id = '{{ Input::old('vendor_id') }}';
        var old_parent_category = '{{ Input::old('vendor_id') }}';

        $(function () {

            $('#vendors-drop-down').on('change', function () {
                loadParentCategories();
                //loadVendorCategories();
            });

            /* $('#top-level-category').on('change', function () {
             loadParentCategories();
             }); */

            $("#add-new").click(function(){
                $("#add_new").val("yes");
                $("#create-category-form").submit();
            });
            /* $("#add-new2").click(function(){
             $("#add_new").val("yes");
             $("#create-category-form").submit();
             }); */


            $("#title").on('focusout', function() {

                $("#title").actionAjax({
                    url: "{{URL::to('product/category/match')}}",
                    method:'get',
                    data: {title: $("#title").val()},
                    trigger: false,
                    container:null,
                    success: function (o) {
                        if (o.success) {
                            $("#master_category_id").val(o.item.id);
                            $("#force_create").val(0);
                            var clone_url = base_url + '/product/category/clone/' + o.item.id;
                            var dom = '<p style="color:red">'
                            dom += 'Product category with same name already exists, <a href="'+ clone_url +'">Click to clone existing.</a>.';
                            dom += '</p>';
                            $("#title").after(dom);
                        } else {
                            $("#force_create").val(0);
                            $("#master_category_id").val(0);
                        }

                    }
                });
            });




        });

    </script>
@stop