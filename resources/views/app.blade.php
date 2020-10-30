<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Nnuro Admin</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Admin & Dashboard" name="description" />
        <meta content="nnuro" name="author" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favico.png">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto" type="text/css" >

    </head>
    <body data-sidebar="dark">
        <div id="app">
            <div  id="layout-wrapper" >
                <router-view></router-view>
            </div>
        </div>
        <script type="text/javascript" src="{{mix('/js/app.js')}}"></script>
        <script src="{{asset('assets/libs/jquery/jquery.min.js')}}" ></script>
        <script src="{{asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}" ></script>
        <script src="{{asset('assets/libs/metismenu/metisMenu.min.js')}}" ></script>
        <script src="{{asset('assets/libs/node-waves/waves.min.js')}}" ></script>
        <script src="{{asset('assets/js/app.js')}}" ></script>
    </body>
</html>
