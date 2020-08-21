<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Admin Panel</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Admin & Dashboard" name="description" />
        <meta content="nnuro" name="author" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favico.png">

        <!-- Bootstrap Css -->
        {{-- <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" /> --}}
        {{-- <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}" type="text/css" > --}}
        <link rel="stylesheet" href="{{mix('/assets/css/bootstrap.css')}}" type="text/css" >
        <!-- Icons Css -->
        {{-- <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" /> --}}
        {{-- <link rel="stylesheet" href="{{asset('assets/css/icons.min.css')}}" type="text/css" > --}}
        <link rel="stylesheet" href="{{mix('/assets/css/icons.css')}}" type="text/css" >
        <!-- App Css-->
        {{-- <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" /> --}}
        <link rel="stylesheet" href="{{mix('/assets/css/app.css')}}" type="text/css" id="app-style" >
        {{-- <link rel="stylesheet" href="{{asset('assets/css/app.css')}}" type="text/css" id="app-style" > --}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@2.3.0/fonts/remixicon.css" type="text/css" id="app-style" >
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto" type="text/css" >
        {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css" >  --}}

    </head>
    <body data-sidebar="dark">
        <div id="app">
            <div  id="layout-wrapper" >
                <router-view></router-view>
            </div>
        </div>
        <script type="text/javascript" src="{{mix('/assets/js/app.js')}}"></script>
        {{--  <script type="text/javascript" src="{{asset('assets/tempjs/app.js')}}"></script>  --}}
        <script type="text/javascript" src="{{asset('assets/tempjs/metismenu/metisMenu.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('assets/tempjs/simplebar/simplebar.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('assets/tempjs/node-waves/waves.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('assets/tempjs/app.js')}}"></script>

    </body>
</html>