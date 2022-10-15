@csrf
<div class="container p-4">
    <!-- Old Password -->
    <div class="row mb-3">
        <div class="col-md-12">
            <div class="form-outline">
                <i class="fas fa-lock trailing"></i>
                <input type="password" id="old_password" class="form-control @error('old_password') is-invalid @enderror" name="old_password" />
                <label class="form-label" for="old_password">{{ __('Old Password') }}</label>
                @error('old_password')
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
                <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" />
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
    
    <div class="container p-0">
        <div class="row">
            <div class="col-sm mb-2 mt-2">
                <button type="submit" class="btn btn-block btn-warning me-2">{{ __('Update Password') }}</button>
            </div>
            <div class="col-sm mb-2 mt-2">
                <a href="{{ route('users.profile') }}" class="btn btn-block btn-danger">{{ __('Cancel') }}</a>
            </div>
        </div>
    </div>
</div>
