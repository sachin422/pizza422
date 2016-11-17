@section('content')

    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1 stage stage-white mt-50">

                <h3 class="stage-title">pizza Portal</h3>
                <br>

                <form action="{{ URL::to('login') }}" method="post" class="form-horizontal">

                    @include('partials.alert')

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                        <label class="col-sm-4 col-xs-12">Email:</label>

                        <div class="col-sm-8 col-xs-12">
                            <input type="text" name="email" value="{{ Input::old('email')  }}" class="form-control" placeholder="Enter your email">

                            <div class="help-block">{{ $errors->first('email') }}</div>
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                        <label class="col-sm-4 col-xs-12">Password:</label>

                        <div class="col-sm-8 col-xs-12">
                            <input type="password" name="password" class="form-control" placeholder="Your password">

                            <div class="help-block">{{ $errors->first('password') }}</div>
                        </div>
                    </div>


                    <div class="form-group">

                        <div class="col-sm-8 col-sm-offset-4 col-xs-12">

                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember"> Remember Me
                                </label>
                                <label>
                                    <a href="forgot-password">Forgot Password</a>
                                </label>

                            </div>


                        </div>

                    </div>

                    <div class="form-group">

                        <div class="col-sm-8 col-sm-offset-4 col-xs-12">
                            <input type="submit" class="btn btn-success" value="Login">
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>

@stop
