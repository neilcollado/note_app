@csrf

  <div class="form-group row">
        {{-- <label for="old-password" class="col-md-4 col-form-label text-md-right">{{ __('Old Password') }}</label> --}}

        <div class="col-md-6">
            <input id="old-password" type="password" class="form-control" name="old_password" placeholder="Old Password" required>
        </div>
    </div>

    <div class="form-group row">
        {{-- <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label> --}}

        <div class="col-md-6">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="new-password" placeholder="New Password" required>

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        {{-- <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label> --}}

        <div class="col-md-6">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
        </div>
    </div>


<!-- Button section -->
<div class="form-group row mb-0">
    <div class="col-md-6 offset-md-4">
        <button type="submit" class="btn btn-success" style="white-space:nowrap; margin-left: -100px; height:50px">Update</button>    
        <a href="{{ route('users.profile') }}" type="button" class="btn btn-danger" style="height:50px; padding-top:12px">Cancel</a>
    </div>
</div>