<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="{{ URL::to('icon.ico') }}">

    <title>{{ isset($title) ? $title : 'pizza Portal'  }}</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ URL::to('vendor/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">

    <link href="{{ URL::to('vendor/jquery-ui/themes/smoothness/jquery-ui.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ URL::to('assets/css/portal.css') }}" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script>
        var base_url = '{{ URL::to('/') }}';
        </script>

    @yield('header')

</head>

<body class="portal {{ isset($body_classes) ? $body_classes : ''  }}">

@if (Auth::check())
@include('portal.partials.nav')
@endif

@yield('content')

@yield('after_content')

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
@if(Auth::check())
<script src="{{  URL::to('vendor/jquery/dist/jquery.min.js')  }}"></script>
<script src="{{ URL::to('vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places"></script>
<script src={{ URL::to('vendor/action-ajax/action-ajax.js') }}></script>
<script src={{ URL::to('vendor/jquery-ui/jquery-ui.min.js') }}></script>
<script src={{ URL::to('vendor/shortkit/shortkit.js') }}></script>
<script src="{{ URL::to('assets/js/main.js')  }}"></script>
<!--<script src="{{ URL::to('assets/js/admin/shortkit-common.js')  }}"></script>-->
@endif


@yield('footer')

</body>
</html>
