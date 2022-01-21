<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<link rel="icon" href="{{ URL::asset('images/cac_icon.ico') }}" >
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <!-- Scripts -->
        <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
        <script src="{{asset('js/app.js')}}"></script>
        <script src="{{asset('js/jquery.min.js')}}"></script>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/survey-css.css') }}">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>

        <style>
            .body{
                font-family: 'Nunito', sans-serif;
            }
        </style>
        <script>
            $(document).ready(function(){
	            $('[data-toggle="tooltip"]').tooltip();
            });
        </script>
    </head>

    <body>
        <div class="container-fluid overflow-hidden" >
            <div class="container-bg">
                <div class="fcta-header">
                    <img src="{{ asset('images/cac-logo.png') }}" class = "img-responsive" height="100%" />
                    <img src="{{ asset('images/coat-of-arms.png') }}" align="right" class = "img-responsive" height="100%" />
                </div>

                <div style="margin-top: 0px">
                    <main>
                        @yield('content')
                    </main>
                </div>

                <!-- Footer -->
                <footer class="page-footer font-small font-small" >
                    <!-- Copyright -->
                    <div class="footer-copyright text-center text-white py-4 font-pref14">
                        © 2022 Copyright - Corporate Affairs Commission: ICT Department
                    </div>
                    <!-- Copyright -->
                </footer>
                <!-- Footer -->

            </div>
        </div>
    </body>

</html>