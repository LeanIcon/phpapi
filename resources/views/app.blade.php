<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Nnuro Admin</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Admin & Dashboard" name="description" />
        <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
        <meta content="nnuro" name="author" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favico.png">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto" type="text/css" ><script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        {{--  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>  --}}


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
