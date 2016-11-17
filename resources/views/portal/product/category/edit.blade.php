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
                            <input type="text" id="title" name="title" value="{{ Input::old('title', $category->title)  }}" class="form-control" placeholder="Enter product category title" required>

                            <div class="help-block">{{ $errors->first('title') }}</div>
                        </div>
                    </div>

                    <div id="parent-category-div" class="form-group {{ $errors->has('parent') ? 'has-error' : '' }}">
                        <label class="col-sm-12">Parent category </label>

                        <div class="col-sm-12">
                            <select id="parent-categories" name="parent" class="form-control" required>
                                <option value="0">- select parent category -</option>

                                    @foreach(\App\Models\ProductCategory::getVendorParentCategories() as $cpobject))
                                    <option value="{{$cpobject->id}}">{{$cpobject->title}}</option>
                                    @endforeach


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
                        <label class="col-sm-12">Image</label>

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
                            <textarea name="description" class="form-control">{{Input::old('description', $category->description)}}</textarea>

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

    <script>

        $(function () {


            $("#title").on('focusout', function() {

                $("#title").actionAjax({
                    url: "{{URL::to('product/category/match')}}",
                    method:'get',
                    data: {title: $("#title").val()},
                    trigger: false,
                    container:null,
                    success: function (o) {
                        $("#duplicate-title").remove();
                        if (o.success) {
                            $("#master_category_id").val(o.item.id);
                            $("#force_create").val(0);
                            var clone_url = base_url + '/product/category/clone?product_category_id=' + o.item.id;
                            var dom = '<p style="color:red" id="duplicate-title">'
                            dom += 'Product category with same name already exists.';
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