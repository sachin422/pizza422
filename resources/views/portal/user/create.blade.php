@section('content')

    <div class="container mt-80">
        <div class="row">
            <div class="col-sm-12 stage stage-white">

                <h3 class="stage-title text-left">Create User
                   <!--  <input type="button" value="Back to Listing" style="margin-left:10px" id="back-listing" class="btn btn-success pull-right"> -->
                    <a href="{{ URL::to('user') }}" class="btn btn-success pull-right">Back to Listing</a>
                    <!-- <input type="button" value="Save and Add New" style="margin-left:10px" id="add-new2" class="btn btn-success pull-right">
                    <button onclick="$('#create-user-form').submit()" class="btn btn-success pull-right hidden-xs hidden-sm">Save</button></h3> -->
                <h5 class="stage-title text-left">All Fields marked as &nbsp;<span style="color:red">*</span> &nbsp; are compulsory  </h5>
                <br>



                <form id="create-user-form" action="{{ URL::to('user/save') }}" method="post" class="form-horizontal"
                      enctype="multipart/form-data">
                    @include('partials.alert')

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="add_new" id="add_new" value="no">

                    <div class="form-group {{ $errors->has('firstname') ? 'has-error' : '' }}">
                        <label class="col-sm-12">Firstname:<span style="color:red">*</span></label>

                        <div class="col-sm-12">
                            <input type="text" name="firstname" class="form-control"
                                   value="{{ Input::old('firstname')  }}" placeholder="Enter Firstname"
                                   required>

                            <div class="help-block">{{ $errors->first('firstname') }}</div>
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('lastname') ? 'has-error' : '' }}">
                        <label class="col-sm-12">Lastname:</label>

                        <div class="col-sm-12">
                            <input type="text" name="lastname" class="form-control"
                                   value="{{ Input::old('lastname')  }}" placeholder="Enter Lastname">

                            <div class="help-block">{{ $errors->first('lastname') }}</div>
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                        <label class="col-sm-12">Email:<span style="color:red">*</span></label>

                        <div class="col-sm-12">
                            <input type="email" name="email" class="form-control" value="{{ Input::old('email')  }}"
                                   placeholder="Enter Email" required>

                            <div class="help-block">{{ $errors->first('email') }}</div>
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                        <label class="col-sm-12">Password:<span style="color:red">*</span></label>

                        <div class="col-sm-12">
                            <input type="password" name="password" class="form-control"
                                   value="{{ Input::old('password')  }}" placeholder="Enter Password"
                                   required>

                            <div class="help-block">{{ $errors->first('password') }}</div>
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                        <label class="col-sm-12">Phone:<span style="color:red">*</span></label>

                        <div class="col-sm-12">
                            <input type="text" name="phone" class="form-control" value="{{ Input::old('phone')  }}"
                                   placeholder="Enter Phone" required>

                            <div class="help-block">{{ $errors->first('phone') }}</div>
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('photo') ? 'has-error' : '' }}">
                        <label class="col-sm-12">Photo:    </label>

                        <div class="col-sm-12">
                            <input type="file" name="photo" class="form-control" value="{{ Input::old('photo')  }}"
                                   placeholder="Upload Photo">

                            <div class="help-block">{{ $errors->first('photo') }}</div>
                            <span class="field-info">Maximum photo size: 2 MB</span>
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('role') ? 'has-error' : '' }}">
                        <label class="col-sm-12">Role:<span style="color:red">*</span></label>

                        <div class="col-sm-12">

                            <select id="role_ids" name="role_ids[]" required class="form-control">


                                <option value="">-- select user role --</option>

                                @foreach ( \App\Models\Role::orderBy('name','asc')->get() as $i => $role_object)

                                    <option value="{{ $role_object->id  }}" {{ $role_object->id == Input::old("role_ids.$i") ? 'selected' : '' }}>{{ $role_object->name  }}</option>
                                @endforeach


                            </select>

                            <div class="help-block">{{ $errors->first('role') }}</div>
                        </div>
                    </div>
                    <?php
                        $old_rules = [];
                        if (is_array(Input::old('role_ids'))) {
                            $old_rules = Input::old('role_ids');
                        }

                    ?>
                    <div id="show-vendors" style="display:{{ in_array($user_defined_roles['vendor'], $old_rules ) ? 'block' : 'none' }}" class="form-group {{ $errors->has('selected_vendors') ? 'has-error' : '' }}">
                        <label class="col-sm-12">Select Vendors:<span style="color:red">*</span></label>

                        <div class="col-sm-12">

                            <input name="vendor_name" value="{{ Input::old('vendor_name')  }}" type="text" class="form-control" placeholder="Enter vendor name" id="vendors">

                            <input type="hidden" id="selected-vendors"  name="selected_vendors" class="form-control" value="{{ Input::old('selected_vendors')  }}">

                            <div class="help-block">{{ $errors->first('selected_vendors') }}</div>
                            <span class="field-info">Start Typing, We will generate vendor list for you to select.</span>
                        </div>
                    </div>


                    <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                        <label class="col-sm-12">Status:</label>

                        <div class="col-sm-12">

                            <select name="status" class="form-control">


                                @foreach ( \App\Models\User::getStatus() as $key => $value )
                                    <?php  if ($key == Input::old('status')) {
                                        $selected = "selected='selected'";
                                    } /* else if ($key == "inactive") {
                                        $selected = "selected='selected'";

                                    } */
                                    else {
                                        $selected = '';
                                    } ?>

                                    <option value = "{{ $key  }}"  {{ $selected }}>{{ $value  }}</option>
                                @endforeach


                            </select>

                            <div class="help-block">{{ $errors->first('status') }}</div>
                        </div>
                    </div>


                    <div class="form-group">

                        <div class="col-sm-12">
                            <input type="button" value="Save and Add New" style="margin-left:10px" id="add-new" class="btn btn-success pull-right">
                            <input type="submit" class="btn btn-success pull-right" value="Save">
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

            var availableVendors = {!! json_encode(\App\Models\Vendor::select('id')->selectRaw('business_name as label')->get())  !!};

            var selectedVendors = [];

            $("#vendors").autocomplete({
                source: availableVendors,
                select: function (event, ui) {

                    selectedVendors.push(ui.item.id);

                    $("#selected-vendors").val(selectedVendors.join());
                }
            });

            $("#role_ids").on('change', function() {

                var vendor_role_id = {{ $user_defined_roles['vendor']  }};

                if (this.value == vendor_role_id) {
                    $("#show-vendors").show('fade');
                } else {
                    $("#show-vendors").hide('fade');
                }
            });

            $("#add-new").click(function(){
                $("#add_new").val("yes");
                $("#create-user-form").submit();
            });

           /*  $("#add-new2").click(function(){
                $("#add_new").val("yes");
                $("#create-user-form").submit();
            }); */

        });
    </script>
    @stop

