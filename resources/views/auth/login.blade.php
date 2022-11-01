@extends('layouts.app')

@section('content')

<div class="mdb-page-content page-intro">
    <!-- Toggler -->
    <div class="bg-white text-center">
        <button
            id="toggler"
                data-mdb-toggle="sidenav"
                data-mdb-target="#sidenav-1"
                class="btn bg-transparent shadow-0 pt-3 pb-3"
                aria-controls="#sidenav-1"
                aria-haspopup="true"
            >
            <i class="fas fa-bars fa-5x"></i>
        </button>
    </div>
    <!-- Toggler -->
    <div class="text-center px-3 py-5">
        <div class="container py-5">
            <div class="row">
                <div class="col-md-6">
                    <div class="view overlay mb-5"
                        data-mdb-toggle="animation"
                        data-mdb-animation-reset="true"
                        data-mdb-animation-start="onHover"
                        data-mdb-animation="pulse">
                        <img src="/images/bg2.png" class="img-fluid" style="max-width: 80%;" alt="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="container">
                        <div class="card">
                            <div class="card-header" style="background-color: #C6D1E7;">
                                <p class="h1" style="color: #4C638F;">
                                    <i class="fas fa-user-circle"></i>
                                    {{ __('LOGIN') }}
                                </p>
                            </div>
        
                            <div class="card-body">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-outline mb-4">
                                                <i class="fas fa-envelope trailing"></i>
                                                <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" />
                                                <label class="form-label" for="email">Email address</label>
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-outline mb-4">
                                                <i class="fas fa-key trailing"></i>
                                                <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" />
                                                <label class="form-label" for="password">Password</label>
                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
        
                                    <div class="row mb-4">
                                        <div class="col d-flex justify-content-center">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} />
                                                <label class="form-check-label" for="remember">Remember me</label>
                                            </div>
                                        </div>
                                    
                                        <div class="col">
                                            @if (Route::has('password.request'))
                                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                                    {{ __('Forgot Your Password?') }}
                                                </a>
                                            @endif
                                        </div>
                                    </div>
        
                                    <button type="submit" class="btn btn-primary btn-block">Sign in</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Toggler -->
    </div>
</div>
@endsection
