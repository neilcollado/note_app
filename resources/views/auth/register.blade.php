@extends('layouts.app')

@section('content')
<div class="mdb-page-content page-intro">
    <div class="text-center px-3 py-5">
        <!-- Toggler -->
        <button
            id="toggler"
                data-mdb-toggle="sidenav"
                data-mdb-target="#sidenav-1"
                class="btn btn-dark mt-5 mb-5"
                aria-controls="#sidenav-1"
                aria-haspopup="true"
            >
            <i class="fas fa-bars"></i>
        </button>
        <!-- Toggler -->
        <div class="row py-5">
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
                <div class="row justify-content-center">
                    <div class="col-md-11">
                        <div class="card">
                            <div class="card-header">
                                <p class="h1">
                                    <i class="fas fa-file-signature"></i>
                                    {{ __('REGISTER') }}
                                </p>
                            </div>
                    
                            <div class="card-body">
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                    
                                    <!-- First Name -->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-outline mb-4">
                                                <i class="fas fa-user-tag trailing"></i>
                                                <input type="text" id="first_name" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" />
                                                <label class="form-label" for="name">First Name</label>
                                                @error('first_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Last Name -->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-outline mb-4">
                                                <i class="fas fa-user-tag trailing"></i>
                                                <input type="text" id="last_name" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" />
                                                <label class="form-label" for="name">Last Name</label>
                                                @error('last_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Email -->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-outline mb-4">
                                                <i class="fas fa-envelope trailing"></i>
                                                <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" />
                                                <label class="form-label" for="email">Email Address</label>
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
                                                <i class="fas fa-unlock trailing"></i>
                                                <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" />
                                                <label class="form-label" for="password">Password</label>
                                                @error('password')
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
                                                <i class="fas fa-unlock-alt trailing"></i>
                                                <input type="password" id="password-confirm" class="form-control" name="password_confirmation" required autocomplete="new-password" />
                                                <label class="form-label" for="password-confirm">Re-enter Password</label>
                                            </div>
                                        </div>
                                    </div>
                    
                    
                                    <button type="submit" class="btn btn-primary btn-block">Create Account</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
