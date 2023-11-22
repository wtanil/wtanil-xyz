<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>William's Portfolio</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-darkgreen">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'William') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a href="{{ url('/') }}#project-section" class="nav-link">Projects</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/') }}#profile-section" class="nav-link">About me</a>
                        </li>

                    </ul>
                </div>
                

            </div>
        </div>
    </nav>

    <main class="">
        @yield('content')
    </main>



    <row>
        {{--<div class="col-12 text-center">
                            <a href="https://twitter.com/wtanil_dev" target="_blank"><img src="https://www.wtanil.xyz/storage/asset/twitter-logo.svg" class="social-icon"></a>
                
                            <a href="https://gitlab.com/wtanil" target="_blank"><img src="https://www.wtanil.xyz/storage/asset/gitlab-logo-700.svg" class="social-icon-lg"></a>
                
                            <a href="https://github.com/wtanil" target="_blank"><img src="https://www.wtanil.xyz/storage/asset/github-mark-white.svg" class="social-icon"></a>
                
                            <a href="https://youtube.com" class="disabled-link" target="_blank"><img src="https://www.wtanil.xyz/storage/asset/youtube-white.svg" class="social-icon-lg"></a>
                            <hr style="background-color: #DDDFDC;">
                        </div>--}}
        <div class="col-12 text-center">
            <hr style="background-color: #000;">
            <p>Copyright {{ date('Y') }} | Designed and built by William Tanil</p>
        </div>
    </row>

</div>
</body>
</html>
