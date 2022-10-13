<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Note App') }}</title>

    <link rel="icon" href="/images/icon.png" sizes="16x16 32x32">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap"/>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
    <link rel="stylesheet" href="{{asset('mdb/css/mdb.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">
    
    <!-- Scripts -->
    @vite(['resources/js/app.js'])
</head>
<body>
    <div id="app">
        <div class="container">
            <!-- Sidenav -->
            <nav id="sidenav-1" class="sidenav" data-mdb-hidden="false">
                <a href="/" class="ripple d-flex justify-content-center py-4 mb-3" style="border-bottom: 2px solid #f5f5f5" href="#!" data-mdb-ripple-color="primary">
                    <img id="MDB-logo" src="/images/logo.png" alt="Note App" draggable="true"/>
                </a>
                
                <ul class="sidenav-menu">
                    @guest
                        @if (Route::has('login'))
                            <li class="sidenav-item">
                                <a href="{{ route('login') }}" class="sidenav-link"> <i class="fas fa-sign-in-alt" style="padding-right: 15px;"></i>Log in</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="sidenav-item">
                                <a href="{{ route('register') }}" class="sidenav-link"> <i class="fas fa-pen-square" style="padding-right: 15px;"></i>Register</a>
                            </li>
                        @endif
                    @else
                        <li class="sidenav-item">
                            <a href="{{ route('users.profile') }}" class="sidenav-link"> 
                                <i style="padding-right: 15px;">
                                    @if(isset(Auth::user()->profile_picture))
                                        <img src="{{ asset('uploads/users/' . Auth::user()->profile_picture) }}" alt="avatar"  class="rounded-circle img-fluid" style="width:35px; height:35px; object-fit:cover"/>
                                    @else
                                        <img src="{{ asset('/uploads/users/default.png') }}" alt="profile_picture" class="rounded-circle img-fluid" style="max-width: 35px;"/>
                                    @endif
                                </i>
                                {{ Auth::user()->name }}
                            </a>
                        </li>
                        <li class="sidenav-item">
                            <a href="/task/create" class="sidenav-link"> <i class="fas fa-plus" style="padding-right: 15px;"></i>Create Task</a>
                        </li>
                        <li class="sidenav-item">
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();" 
                                class="sidenav-link"> 
                                <i class="fas fa-sign-out-alt" style="padding-right: 15px;"></i>Log out</a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </nav>
                <!-- Sidenav -->

                {{-- Navbar --}}
                @include('layouts.navbar')
                @endguest
            </div>

        <main class="">
            @yield('content')
        </main>
    </div>
    <script src="{{asset('mdb/js/mdb.min.js')}}"></script>
    <script src="{{asset('js/custom.js')}}"></script>
</body>
</html>
