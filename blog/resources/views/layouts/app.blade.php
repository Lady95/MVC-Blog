<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel sticky-top ">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    My Blog 
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif

                            
                        @else

                            @if (Auth::user()->hasAnyRole('admin'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.index') }}">{{ __('Home admin') }}</a>
                                </li>
                                
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.users') }}">{{ __('List users') }}</a>
                                </li>
                                
                            @endif

                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/billet') }}">
                                            {{ __('Show Posts') }}
                                        </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/billet/new') }}">
                                            {{ __('Add Post') }}
                                        </a>
                            
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                <a class="dropdown-item" href="{{ route('user.show', Auth::user()->id) }}" onclick="event.preventDefault();
                                                     document.getElementById('profile-form').submit();">
                                        My Profil
                                    </a>

                                    <a class="dropdown-item" href="{{ route('user.edit', Auth::user()->id) }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('update-form').submit();">
                                        {{ __('Update profile') }}
                                    </a>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="profile-form" action="{{ route('user.show', Auth::user()->id) }}" method="GET" style="display: none;">
                                        @csrf
                                    </form>

                                    <form id="update-form" action="{{ route('user.edit', Auth::user()->id) }}" method="GET" style="display: none;">
                                        @csrf
                                    </form>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>

                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
