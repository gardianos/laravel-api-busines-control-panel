<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>Laravel</title>

        <!-- bootstrap v4.1.1 -->
        <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" />

        <!-- fontawesome v5 -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

        <!-- customstyles -->
        @yield('customstyles')

        <!-- utility css -->
        <link href="{{asset('css/utility.css')}}" rel="stylesheet" />

        <!--- defaultStyle -->
        <link href="{{asset('css/defaultStyle.css')}}" rel="stylesheet" />

    </head>
    <body>
    
    <!-- main container -->
    <div class="container-fluid">
        @yield('maincontent')
    </div>

    <!-- jquery -->
    <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>

    <!-- popper -->
    <script src="{{asset('js/popper.js')}}"></script>

    <!-- bootstrap -->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>

    <!-- custom scripts -->
    @yield('customscripts')

    </body>
</html>
