<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="{{ URL::to('icon.ico') }}">

    <title>Cart Meal Api Guide</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ URL::to('vendor/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">

    <link href="{{ URL::to('vendor/schematic/schematic.css') }}" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


</head>

<body class="portal api-help">

<!-- Fixed navbar -->
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" id="brand-name" href="javascript:void(0)">Schematic v2.0</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">

        </div><!--/.nav-collapse -->
    </div>
</nav>

<div id="schematic-page" class="schematic-page">
</div>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="{{  URL::to('vendor/jquery/dist/jquery.min.js')  }}"></script>
<script src="{{  URL::to('vendor/schematic/schematic.js')  }}"></script>
<script src="{{  URL::to("api/menu.js")  }}"></script>
<script src="{{  URL::to("api/$module.js")  }}"></script>
<script>

    var schematic = new SchematicPlugin({
        title: "pizza",
        url: "{{ URL::to('help/api')  }}",
        api: "http://{{ Config::get('pizza.domains.api') }}",
        subTitle: "pizza Api Guide"
    });

    schematic.menu(menu);

    schematic.init(page);



</script>

</body>
</html>
