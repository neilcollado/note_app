<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Note App') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="fixed-sn">
    <div id="app">
        <a href="#" data-activates="slide-out" class="btn btn-secondary p-3 mt-5 button-collapse"><i
            class="fas fa-bars"></i></a>
        <header>
            <!-- Sidebar navigation -->
            <div id="slide-out" class="side-nav fixed wide sn-bg-1">
                <ul class="custom-scrollbar">
                    <!-- Logo -->
                    <li>
                        <div class="logo-wrapper sn-ad-avatar-wrapper">
                          <a href="{{ url('/') }}"><img src="https://images-platform.99static.com/kn-DqayrqvkIBJ-QxPj3dG-QKog=/423x192:1077x846/500x500/top/smart/99designs-contests-attachments/84/84609/attachment_84609024" class="rounded-circle">
                            <span class="h3">Note App</span></a>
                        </div>
                      </li>
                    <!--/. Logo -->

                    <!-- Side navigation links -->
                    <li>
                        <ul class="collapsible collapsible-accordion">
                            @guest
                                @if (Route::has('login'))
                                    </li> 
                                        <a href="{{ route('login') }}" class="waves-effect" style="text-decoration: none"><i class="sv-slim-icon fas fa-sign-in-alt"></i>
                                            Login
                                        </a> 
                                    </li>
                                @endif

                                @if (Route::has('register'))
                                    </li>
                                        <a href="{{ route('register') }}" class="waves-effect" style="text-decoration: none"><i class="sv-slim-icon fas fa-pen-square"></i>
                                            Register
                                        </a>
                                    </li>
                                @endif
                            @else
                                </li>
                                    <a href="{{ route('users.profile') }}" class="waves-effect" style="text-decoration: none"><i class="fas fa-user-circle"></i>
                                        {{ Auth::user()->name }}
                                    </a>
                                </li>
                                </li>
                                    <a href="/task/create" class="waves-effect" style="text-decoration: none"><i class="fas fa-plus"></i>
                                        Add task
                                    </a>
                                </li>
                                </li>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();" class="waves-effect" style="text-decoration: none"><i class="fas fa-sign-out-alt"></i>
                                        Logout
                                    </a>
                                </li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            @endguest
                            </li> <a id="toggle" class="waves-effect"><i class="sv-slim-icon fas fa-angle-double-left"></i>Minimize menu</a> </li>
                        </ul>
                    </li>
                    <!--/. Side navigation links -->
                </ul>
                <div class="sidenav-bg rgba-purple-strong lighten-1"></div>
            </div>
            <!--/. Sidebar navigation -->
        </header>
        <main>
            <div class="container-fluid">
                @yield('content')
            </div>
        </main>
    </div>
</body>
</html>
