@section('content')

    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1 stage stage-white mt-50">

                <h3 class="stage-title">Forgot Password</h3>
                <br>

                <form action="{{ URL::to('forgot-password') }}" method="post" class="form-horizontal">

                    @include('partials.alert')

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                        <label class="col-sm-4 col-xs-12">Email:</label>

                        <div class="col-sm-8 col-xs-12">
                            <input type="text" name="email" value="{{ Input::old('email')  }}" class="form-control" placeholder="Enter your email">

                            <div class="help-block">{{ $errors->first('email') }}</div>
                        </div>
                    </div>






                    <div class="form-group">

                        <div class="col-sm-8 col-sm-offset-4 col-xs-12">
                            <input type="submit" class="btn btn-success" value="Submit">
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>

@stop
