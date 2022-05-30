<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<link rel="icon" href="{{ URL::asset('images/cac_icon.ico') }}" >
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>

        <!-- Fonts -->
        
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <!-- Scripts -->
        <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/survey-css.css') }}">
        <!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"> -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
        <script src="https://unpkg.com/v-tooltip@2.1.3/dist/v-tooltip.min.js"></script>
        <script src="{{asset('js/jquery.min.js')}}"></script>
        

        <style>
            .body{
                font-family: 'Nunito', sans-serif;
            }

            [class*="col-"] {
            width: 100%;
            }

            @media only screen and (max-width: 768px) {
            /* For desktop: */
            .col-1 {width: 8.33%;}
            .col-2 {width: 16.66%;}
            .col-3 {width: 25%;}
            .col-4 {width: 33.33%;}
            .col-5 {width: 41.66%;}
            .col-6 {width: 50%;}
            .col-7 {width: 58.33%;}
            .col-8 {width: 66.66%;}
            .col-9 {width: 75%;}
            .col-10 {width: 83.33%;}
            .col-11 {width: 91.66%;}
            .col-12 {width: 100%;}
            }

            @media only screen and (max-width: 600px) {
            /* For tablets: */
            .col-s-1 {width: 8.33%;}
            .col-s-2 {width: 16.66%;}
            .col-s-3 {width: 25%;}
            .col-s-4 {width: 33.33%;}
            .col-s-5 {width: 41.66%;}
            .col-s-6 {width: 50%;}
            .col-s-7 {width: 58.33%;}
            .col-s-8 {width: 66.66%;}
            .col-s-9 {width: 75%;}
            .col-s-10 {width: 83.33%;}
            .col-s-11 {width: 91.66%;}
            .col-s-12 {width: 100%;}
            }
            @media (max-width: 600px), (max-width: 1000px) {
                .login-form {
                    width: 100%;
                    margin: 50px auto;
                    padding:30px
                }
            }

        </style>
    </head>

    <body>
        <div class="container-fluid overflow-hidden" >
            <div class="container-bg">
                <div class="fcta-header">
                    <img src="{{ asset('images/cac-logo.png') }}" class = "img-responsive" height="100%" />
                    <img src="{{ asset('images/coat-of-arms.png') }}" align="right" class = "img-responsive" height="100%" />
                </div>

                <div id="app" style="margin-top: 0px">
                    <noscript><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
                        <h1 valign="middle"><center>Please enable javaScript in order to be able to run this application</center></h1>
                    </noscript>
                    @yield('content')
                </div>
                

                <!-- Footer -->
                <footer class="page-footer font-small fixed-bottom font-small" >
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