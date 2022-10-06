@extends('layouts.app')

@section('content')
<div class="container-fluid mt-5">
    <div class="row">
        <div class="col-md-6">
            <div class="view overlay zoom animated zoomIn">
                <img src="/images/bg2.png" class="img-fluid" alt="">
            </div>
        </div>
        <div class="col-md-6">
            <div class="card mx-xl-5 p-4 purple lighten-5">
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <p class="h1 text-center text-body">LOGIN</p>
                        <div class="md-form form-sm ">
                            <i class="fas fa-envelope prefix"></i>
                            <input type="email" id="email" class="form-control form-control-sm validate @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                            <label data-error="wrong" data-success="right" for="email">Your email</label>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    
                        <div class="md-form form-sm ">
                            <i class="fas fa-lock prefix"></i>
                            <input type="password" id="password" class="form-control form-control-sm validate @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            <label data-error="wrong" data-success="right" for="password">Your password</label>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <div class="text-center">
                            <button class="btn btn-secondary waves-effect waves-light">Log in <i class="fas fa-sign-in ml-1"></i></button>
                        </div>
                    </form>
                    
                    <!--Footer-->
                    <div class="modal-footer display-footer p-0">
                        <div class="mx-auto">
                            <p class="text-center mt-2">Forgot
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}" class="blue-text">Password?</a>
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
