<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="/css/app.css" type="text/css" rel="stylesheet">

        <title>Laravel</title>


    </head>
    <body>


        <div class="container">
            <div class="row">

                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">
                                <li><a href="/">Home</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>

                <div class="col-md-12">

                    @yield('content')

                </div>
            </div>
        </div>
        <script src="/js/app.js"></script>
    </body>

</html>
