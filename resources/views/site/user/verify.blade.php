@section('before_content')
    @include('site.partials.banner-product')
@stop

@section('content')
<div class="content">
    <div class="container">

        @if ($screen == 'send-otp')

        <form id="send-otp" action="{{URL::to('auth/send-otp')}}" method="post">

            {{csrf_field()}}

            <div class="form-group">
                <label class="col-sm-12">Phone Number</label>
                <div class="col-sm-12">
                    <input type="text" name="phone" placeholder="Enter your phone number..">
                </div>
            </div>

        </form>
        @else

        <form id="verify-user" action="{{URL::to('auth/verify-account')}}" method="post">

            {{csrf_field()}}

            <p>Verficiation for {{$number}}</p>

            <div class="form-group">
                <label class="col-sm-12">Enter your otp</label>
                <div class="col-sm-12">
                    <input type="text" name="otp" placeholder="Enter your otp..">
                </div>
            </div>

        </form>

        @endif

    </div>
</div>
@stop
