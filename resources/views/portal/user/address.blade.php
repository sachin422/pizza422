@section('content')

    <div class="container mt-80">
        <div class="row">
            <div class="col-sm-12 stage stage-white">

                <h3 class="stage-title text-left">{{ @$useraddress->id ? 'Update ' : 'Create ' }}
                    User Address
                    <!--  <input type="button" value="Back to Listing" style="margin-left:10px" id="back-listing" class="btn btn-success pull-right"> -->
                    <a href="{{ URL::to('user/edit', [$user->id]) }}" class="btn btn-success pull-right">Back</a>
                    <!-- <input type="button" value="Save and Add New" style="margin-left:10px" id="add-new2" class="btn btn-success pull-right">
                    <button onclick="$('#create-user-form').submit()" class="btn btn-success pull-right hidden-xs hidden-sm">Save</button></h3> -->
                    <h5 class="stage-title text-left">All Fields marked as &nbsp;<span style="color:red">*</span> &nbsp; are compulsory  </h5>
                    <br>


                    <form id="create-user-form" action="{{ URL::to('user/address', [$user->id]) }}" method="post" class="form-horizontal"
                          enctype="multipart/form-data">
                        @include('partials.alert')

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="id" value="{{ @$useraddress->id ? @$useraddress->id : '' }}">

                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label class="col-sm-12">Name:<span style="color:red">*</span></label>

                            <div class="col-sm-12">
                                <input type="text" name="name" class="form-control"
                                       value="{{ Input::old('name') ? Input::old('name') : @$useraddress->name   }}" placeholder="Enter Name"
                                       required>

                                <div class="help-block">{{ $errors->first('name') }}</div>
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('location_id') ? 'has-error' : '' }}">
                            <label class="col-sm-12">Location:<span style="color:red">*</span></label>

                            <div class="col-sm-12">
                                <input type="text" name="location" class="form-control tags"
                                       value="{{ Input::old('location') ? Input::old('location') : !empty(@$useraddress) ? @$useraddress->location->area.",".@$useraddress->location->city: ''  }}" placeholder="Enter Location"
                                       required autocomplete>
                                <input type="hidden" name="location_id" id="location_id" value="{{ @$useraddress->location_id ? @$useraddress->location_id : '' }}">

                                <div class="help-block">{{ $errors->first('name') }}</div>
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('address_1') ? 'has-error' : '' }}">
                            <label class="col-sm-12">Address 1:<span style="color:red">*</span></label>

                            <div class="col-sm-12">
                                <input type="text" name="address_1" class="form-control"
                                       value="{{ Input::old('address_1') ? Input::old('address_1') : @$useraddress->address_1 }}" placeholder="Enter Address 1" required>

                                <div class="help-block">{{ $errors->first('address_1') }}</div>
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('address_2') ? 'has-error' : '' }}">
                            <label class="col-sm-12">Address 2:</label>

                            <div class="col-sm-12">
                                <input type="text" name="address_2" class="form-control"
                                       value="{{ Input::old('address_2') ? Input::old('address_2') : @$useraddress->address_2  }}" placeholder="Enter Address 2">

                                <div class="help-block">{{ $errors->first('address_2') }}</div>
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('company') ? 'has-error' : '' }}">
                            <label class="col-sm-12">Company:</label>

                            <div class="col-sm-12">
                                <input type="text" name="company" class="form-control"
                                       value="{{ Input::old('company') ? Input::old('company') : @$useraddress->company   }}" placeholder="Enter Company">

                                <div class="help-block">{{ $errors->first('company') }}</div>
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('phone_1') ? 'has-error' : '' }}">
                            <label class="col-sm-12">Phone 1:<span style="color:red">*</span></label>

                            <div class="col-sm-12">
                                <input type="text" name="phone_1" class="form-control" value="{{ Input::old('phone_1') ? Input::old('phone_1') : @$useraddress->phone_1  }}"
                                       placeholder="Enter Phone 1" required>

                                <div class="help-block">{{ $errors->first('phone_1') }}</div>
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('phone_2') ? 'has-error' : '' }}">
                            <label class="col-sm-12">Phone 2:</label>

                            <div class="col-sm-12">
                                <input type="text" name="phone_2" class="form-control" value="{{ Input::old('phone_2') ? Input::old('phone_2') : @$useraddress->phone_2 }}"
                                       placeholder="Enter Phone 2">

                                <div class="help-block">{{ $errors->first('phone_2') }}</div>
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('pincode') ? 'has-error' : '' }}">
                            <label class="col-sm-12">Pincode:</label>

                            <div class="col-sm-12">

                                <input type="text" name="pincode" class="form-control" value="{{ Input::old('pincode') ? Input::old('pincode') : @$useraddress->pincode }}"
                                       placeholder="Enter Pincode">

                                <div class="help-block">{{ $errors->first('pincode') }}</div>
                            </div>
                        </div>



                        <div class="form-group {{ $errors->has('type') ? 'has-error' : '' }}">
                            <label class="col-sm-12">Type:</label>

                            <div class="col-sm-12">
                                <?php $type = array('default'=>'default','home' =>'home','office'=>'office'); ?>

                                <select name="type" class="form-control">

                                    @foreach ($type as $key => $value )
                                        <?php  if ($key == Input::old('type') || $key == @$useraddress->type) {
                                            $selected = "selected='selected'";
                                        }
                                        else {
                                            $selected = '';
                                        } ?>

                                        <option value = "{{ $key  }}"  {{ $selected }}>{{ $value  }}</option>
                                    @endforeach


                                </select>

                                <div class="help-block">{{ $errors->first('type') }}</div>
                            </div>
                        </div>


                        <div class="form-group">

                            <div class="col-sm-12">
                                <input type="submit" value="{{ @$useraddress->id ? 'Update ' : 'Save ' }}" class="btn btn-success pull-right">

                            </div>
                        </div>

                    </form>

            </div>
        </div>
    </div>

@stop

@section('footer')

    <script>
        var availableTags = {!! json_encode($locations)  !!};

        $(function(){

            $(".tags").autocomplete({
                source: availableTags,
                select: function (event, ui) {
                    $("#location_id").val(ui.item.id);
                }
            });
        })

    </script>

@stop

