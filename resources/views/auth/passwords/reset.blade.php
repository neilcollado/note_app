@extends('layouts.app')

@section('content')
<div class="mdb-page-content page-intro">
	<div class="px-3 py-5">
        <div class="container" style="margin-top: 10%">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header text-center">
                            <p class="h3">
                                {{ __('Reset Password') }}
                            </p>
                        </div>
        
                        <div class="card-body">
                            <form method="POST" action="{{ route('password.update') }}">
                                @csrf
        
                                <input type="hidden" name="token" value="{{ $token }}">

                                <!-- Email Address -->
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <div class="form-outline">
                                            <i class="fas fa-envelope trailing"></i>
                                            <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required readonly autocomplete="email"/>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
       
                                <!-- New Password -->
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <div class="form-outline">
                                            <i class="fas fa-shield-alt trailing"></i>
                                            <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" autofocus/>
                                            <label class="form-label" for="password">{{ __('New Password') }}</label>
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
        
                                <!-- Confirm Password -->
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <div class="form-outline">
                                            <i class="fas fa-shield-alt trailing"></i>
                                            <input type="password" id="password-confirm" class="form-control @error('password-confirm') is-invalid @enderror" name="password_confirmation" required/>
                                            <label class="form-label" for="password-confirm">{{ __('Confirm Password') }}</label>
                                            @error('password-confirm')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div> 
        
                                <div class="row px-2">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        {{ __('Reset Password') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
