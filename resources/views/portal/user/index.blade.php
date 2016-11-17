@section('content')

    <div class="container mt-80">
        <div class="row">
            <div class="col-sm-12 stage stage-white mt-50">

                <h3 class="stage-title text-left"> {{ isset($_GET['role']) && $_GET['role']==4 ? 'Customers' :  'Users' }}

                    <a class="btn btn-default btn-success pull-right" href="{{ URL::to('user/create') }}">Create User</a>
                </h3>

                <br>
                <br>

                <div class="col-sm-12">
                    <div class="col-sm-6">
                        <ul class="nav nav-pills" role="tablist">
                            <li class="{{ Input::get('role') == "" ? 'active':'' }}" role="presentation"><a href="{{  URL::to('user') }}">All</a></li>

                            @foreach(App\Models\Role::all() as $id => $value)

                                <li class="{{ Input::get('role') == $value->id ? 'active':'' }}" role="presentation"><a href="{{  URL::to('user') }}?role={{$value->id}}">{{ $value->name."s" }}</a>
                                </li>


                            @endforeach

                        </ul>
                    </div>
                    <div class="col-sm-2">

                        <select name="multipleAction" class="form-control multipleAction">
                            <option value="">Select Action</option>
                            <option value="delete">Delete</option>
                        </select>


                    </div>
                    <div class="col-sm-4">
                        <form class="form-inline pull-right" action="{{ URL::to('user') }}" role="search">

                            @if (Input::has('role'))
                                <input type="hidden" name="role" value="{{ Input::get('role') }}">
                            @endif

                            <div class="form-group">
                                <input type="text" name="q" class="form-control" placeholder="Search by Title, Email">
                            </div>
                            <button type="submit" class="btn btn-default btn-success">Search</button>
                        </form>
                    </div>
                </div>

                <div class="clearfix"></div>
                @include('partials.alert')
                <div class="clearfix"></div>

                @if(!empty($users->all()))
                    <div class="table-responsive mt-50">
                        <form id="users-form" action="{{ URL::to('user/delete') }}" method="post">
                            @include('partials.alert')

                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th><input class="allcheck" type="checkbox" value=""></th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Photo</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($users as $user)

                                    <tr>
                                        <td><input class="checkable" name="ids[]" type="checkbox"
                                                   value="{{ $user->id }}"></td>
                                        <td>
                                            {{ ($user->properties) ? $user->properties->firstname . ' ' . $user->properties->lastname : '' }}
                                        </td>
                                        <td>
                                            {{ $user->email }}
                                        </td>
                                        <td>
                                            {{ $user->phone }}
                                        </td>
                                        <td>
                                            <img src='{{ ($user->properties) ? $user->properties->photo : $user->getPhotoPlaceholder() }}' width="100px">
                                        </td>
                                        <td>
                                            <?php

                                            $uroles_lits = [];

                                            $urole_keys = [];

                                            ?>

                                             @foreach ($user->roles as $urole)
                                                 <?php

                                                    array_push($uroles_lits, $urole->system_roles->name);
                                                    array_push($urole_keys, $urole->system_roles->key_name)
                                                    ?>
                                             @endforeach
                                            {{  implode(',', $uroles_lits) }}
                                        </td>
                                        <td>
                                            <a title="Edit User" href="{{ URL::to('user/edit', [$user->id]) }}"><i
                                                        class="glyphicon glyphicon-pencil"></i></a>&nbsp;&nbsp;

                                            <a title="Delete User" href="{{ URL::to('user/delete', [$user->id]) }}"
                                                    class="delete_user">
                                                <i class="glyphicon glyphicon-remove"></i></a>



                                        </td>
                                    </tr>
                                @endforeach


                                </tbody>
                                <tfoot>
                                <tr>
                                    <th><input class="allcheck" type="checkbox" value=""></th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Photo</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>

                            </table>
                        </form>



                    </div>
                    {!!$users->render()!!}
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
        $(".delete_user").click(function (e) {
            e.preventDefault();
            var conf = confirm("Are You sure you want to delete this user?");
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
                var conf = confirm("Are You sure you want to delete these users?");
                if (conf) {
                    $("#users-form").submit();
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