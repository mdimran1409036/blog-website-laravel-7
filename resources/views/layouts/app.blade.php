<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Scripts -->
    <script src="https://cdn.ckeditor.com/ckeditor5/<version>/classic/ckeditor.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


    @yield('styles')
</head>
<body>

    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ route('homeFront') }}">
                    {{ config('app.name', 'Laravel') }}
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
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
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
            <div class="container">
                <div class="row">
                   @if(Auth::check())
                        <div class="col-lg-4">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <a href="{{route('dashboard')}}">Home</a>
                                </li>
                                @if(auth()->user()->admin)
                                    <li class="list-group-item">
                                        <a href="{{route('user.create')}}">Create User</a>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="{{route('user.index')}}">Show User</a>
                                    </li>
                                @endif
                                <li class="list-group-item">
                                    <a href="{{route('profile.index')}}">My Profile</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="{{route('post.create')}}">Create Post</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="{{route('post.index')}}">Show Posts</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="{{route('post.trashed')}}">Show Trashed Posts</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="{{route('category.create')}}">Create Category</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="{{route('category.index')}}">Show Category</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="{{route('tag.create')}}">Create Tag</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="{{route('tag.index')}}">Show Tags</a>
                                </li>
                                @if(Auth::user()->admin)
                                    <li class="list-group-item">
                                        <a href="{{route('settings.index')}}">Change Settings</a>
                                    </li>
                                @endif


                            </ul>   {{--   navabar/menu created   --}}
                        </div>
                   @endif
                    <div  class="{{Auth::check() ? 'col-lg-8' : 'col-lg-12'}}">
                        @yield('content')
                    </div>


                </div>
            </div>
        </main>
    </div>

    @yield('scripts')

</body>
</html>
