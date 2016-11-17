@section('content')

    <div class="container mt-80">
        <div class="row">
            <div class="col-sm-12 stage stage-white">

                <h3 class="stage-title text-left">Create Product

                    <a href="{{ URL::to('product') }}" class="btn btn-success pull-right">Back to Listing</a>
                    <!--<input type="button" value="Save and Add New" style="margin-left:10px" id="add-new2" class="btn btn-success pull-right">
                    <button class="btn btn-success pull-right hidden-xs hidden-sm" onclick="$('#create-product-form').submit()">Save</button> -->

                </h3>
                <br>
               <h5> All field marked as &nbsp;<span style="color:red">*</span> &nbsp;are compulsory</h5>
                <br>

                <form id="create-product-form" action="{{ URL::to('product/save') }}" method="post" class="form-horizontal" enctype="multipart/form-data">

                    @include('partials.alert')

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="add_new" id="add_new" value="no">

                    <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                        <label class="col-sm-12">Product Title&nbsp;&nbsp;<span style="color:red">*</span></label>

                        <div class="col-sm-12">
                            <input type="text" id="title" name="title" value="{{ Input::old('title')  }}" class="form-control"
                                   placeholder="Enter product title">

                            <div class="help-block">{{ $errors->first('title') }}</div>
                            <span class="field-info">Enter Your Product Title ( Characters allowed:  a-z, A-Z, 0-9, - ) </span>
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('sku') ? 'has-error' : '' }}">
                        <label class="col-sm-12">Product SKU&nbsp;&nbsp;<span style="color:red">*</span></label>

                        <div class="col-sm-12">
                            <input type="text" id="sku" name="sku" value="{{ Input::old('sku')  }}" class="form-control"
                                   placeholder="Enter product sku">

                            <div class="help-block">{{ $errors->first('sku') }}</div>
                            <span class="field-info">Product sku must be unique ( Characters allowed:  a-z, A-Z, 0-9, - ).</span>
                        </div>
                    </div>


                    <div class="form-group {{ $errors->has('category') ? 'has-error' : '' }}">
                        <label class="col-sm-12">Product Category&nbsp;&nbsp;<span style="color:red">*</span></label>

                        <div class="col-sm-12">
                            <select id="product-categories" name="category" class="form-control">
                                <option> - please select product category - </option>
                                @if (!empty($product_categories->all()))
                                    @foreach ($product_categories as $product_category)
                                        @if (!empty($product_category->sub_categories->all()))
                                            <optgroup label="{{$product_category->title}}">
                                            @foreach($product_category->sub_categories as $sub_category)
                                                <option value="{{$sub_category->id}}" {{Input::old('category') == $sub_category->id ? 'selected' : ''}}>{{$sub_category->title}}</option>
                                            @endforeach
                                            </optgroup>
                                        @else
                                            <option value="{{$product_category->id}}" {{Input::old('category') == $product_category->id ? 'selected' : ''}}>{{$product_category->title}}</option>
                                        @endif
                                    @endforeach
                                @endif
                            </select>

                            <div class="help-block">{{ $errors->first('category') }}</div>
                            <span class="field-info">Choose Your Product Category  </span>
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
                        <label class="col-sm-12">Product Price&nbsp;&nbsp;<span style="color:red">*</span></label>

                        <div class="col-sm-12">
                            <input type="text" name="price" value="{{ Input::old('price')  }}" class="form-control"
                                   placeholder="Enter product price">

                            <div class="help-block">{{ $errors->first('price') }}</div>
                            <span class="field-info">Enter Your Product Price, Currency: INR  </span>
                        </div>
                    </div>


                    <div class="form-group {{ $errors->has('weight') || $errors->has('unit') ? 'has-error' : '' }}">
                        <label class="col-sm-12">Product Weight&nbsp;&nbsp;<span style="color:red">*</span></label>

                        <div class="col-sm-6">
                            <input type="text" name="weight" value="{{ Input::old('weight')  }}" class="form-control"
                                   placeholder="Enter product weight">

                            <div class="help-block">{{ $errors->first('weight') }}</div>
                            <span class="field-info">Enter Your Product Weight and Choose Unit  </span>
                        </div>
                        <div class="col-md-1 col-sm-3">
                            <select name="unit" class="form-control">
                                @foreach(\App\Models\Product::getWeightUnits() as $unit => $name)
                                    <option value="{{ $unit  }}" {{Input::old('unit') == $unit ? 'selected' : ''}}>{{ $name  }}</option>
                                @endforeach
                            </select>

                            <div class="help-block">{{ $errors->first('unit') }}</div>
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
                        <label class="col-sm-12">Product Image&nbsp;&nbsp;<span style="color:red">*</span></label>

                        <div class="col-sm-12">
                            <input type="file" name="image" value="{{ Input::old('image')  }}" class="form-control">

                            <div class="help-block">{{ $errors->first('image') }}</div>
                            <span class="field-info">Upload Your Product image, Maximum image size: 2 MB </span>
                        </div>

                    </div>


                    <div class="form-group {{ $errors->has('status') || $errors->has('status') ? 'has-error' : '' }}">
                        <label class="col-sm-12">Status&nbsp;&nbsp;<span style="color:red">*</span></label>

                        <div class="col-sm-12">
                            <select name="status" class="form-control">
                                @foreach(\App\Models\Product::getStatus() as $key => $name)
                                    <option value="{{ $key  }}" {{Input::old('status') == $key ? 'selected' : ''}}>{{ $name  }}</option>
                                @endforeach
                            </select>

                            <div class="help-block">{{ $errors->first('status') }}</div>
                            <span class="field-info">Choose Your Product status  </span>
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                        <label class="col-sm-12">Description</label>

                        <div class="col-sm-12">
                            <textarea name="description" class="form-control">{{ Input::old('description')  }}</textarea>

                            <div class="help-block">{{ $errors->first('description') }}</div>
                            <span class="field-info">Enter Your Product description ( Characters allowed:  a-z, A-Z, 0-9, _ ) </span>
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('notes') ? 'has-error' : '' }}">
                        <label class="col-sm-12">Notes</label>

                        <div class="col-sm-12">
                            <textarea name="notes" class="form-control">{{ Input::old('notes')  }}</textarea>

                            <div class="help-block">{{ $errors->first('notes') }}</div>
                            <span class="field-info">Enter Your Product Notes  ( Characters allowed:  a-z, A-Z, 0-9, - )</span>
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('schedule_order') ? 'has-error' : '' }}">
                        <label class="col-md-4">Make order schedule compulsory for this product.</label>


                        <div class="col-sm-1">
                            <input type="checkbox" name="schedule_order" value="yes">

                            <div class="help-block">{{ $errors->first('schedule_order') }}</div>

                        </div>
                        <span class="field-info">Order Schedule will be Compulsory for this Product if Tick mark  </span>

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

    <script>

    $(function () {


        $("#add-new").click(function(){
            $("#add_new").val("yes");
            $("#create-product-form").submit();
        });

        $("#title").on('focusout', function() {

            $("#title").actionAjax({
                url: "{{URL::to('product/match')}}",
                method:'get',
                data: {title: $("#title").val()},
                trigger: false,
                container:null,
                success: function (o) {
                    $("#duplicate-title").remove();
                    if (o.success) {
                        var dom = '<p style="color:red" id="duplicate-title">'
                        dom += 'Product with same name already exists.';
                        dom += '</p>';
                        $("#title").after(dom);
                    }

                }
            });
        });

        $("#sku").on('focusout', function() {

            $("#sku").actionAjax({
                url: "{{URL::to('product/match-sku')}}",
                method:'get',
                data: {sku: $("#sku").val()},
                trigger: false,
                container:null,
                success: function (o) {
                    $("#duplicate-sku").remove();
                    if (o.success) {
                        var dom = '<p style="color:red" id="duplicate-sku">'
                        dom += 'Duplicate product sku.';
                        dom += '</p>';
                        $("#sku").after(dom);
                    }

                }
            });
        });

    });


    </script>

@stop