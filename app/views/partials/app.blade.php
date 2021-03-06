<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ APP_NAME . " | " . $title }}</title>
    <!-- CSS file -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('imgs/icons/favicon.ico') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('bootstrap/css/bootstrap.min.css') }}"/>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}"/>
    <style> .no-js #loader { display: none;  }  .js #loader { display: block; position: absolute; left: 100px; top: 0; }
        .se-pre-con {position: fixed;left: 0;top: 0;width: 100%;height: 100%;z-index: 9999;background: url({{asset('imgs/site/preloader.gif')}}) center no-repeat #fff;
        }.list-group {overflow-x: auto;}.footer-link {text-decoration: none;}.footer-link:hover {color: #FFFFFF;text-decoration: none;}
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @yield('css')
</head>
<body>
    <div class="se-pre-con"></div>
    <main class="container">
        @section('content')
            
        @show
    </main>
    <div class="container-fluid bg-light text-dark mt-3">
        <br/>
        <div class="d-flex justify-content-between">
            <p>Copyright &copy; {{date('Y') }} Inmate</p>
            <div class="d-flex justify-content-end">
                <a href="#" class="footer-link text-muted mr-3">Privacy Policy</a>
                <a href="#" class="footer-link text-muted">Terms & Conditions</a>
            </div>
        </div>
        <br/>
    </div>
    <script src="{{asset('jquery/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('bootstrap/js/popper.min.js')}}"></script>
    <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/script.js')}}"></script>
    <script src="{{asset('js/auth.js')}}"></script>
    <script>
        $(window).on('load', function() {
            // Animate loader off screen
            $(".se-pre-con").fadeOut("slow");;
        });
    </script>
    @yield('scripts')
</body>