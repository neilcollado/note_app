@csrf

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
              <div class="card-header">{{ __('Security') }}</div>
                <div class="card-body">

                  <!-- Old Password -->
                  <div class="row mb-3">
                    <label for="old_password" class="col-md-3 col-form-label text-md-end">{{ __('Old Password') }}</label>
                    <div class="col-md-8">
                        <input id="old_password" type="password" class="form-control @error('old_password') is-invalid @enderror" name="old_password" autofocus>

                        @error('old_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  </div>
                  
                  <!-- New Password -->
                  <div class="row mb-3">
                    <label for="password" class="col-md-3 col-form-label text-md-end">{{ __('New Password') }}</label>
                    <div class="col-md-8">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autofocus>

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  </div>
                  
                  <!-- Confirm Password -->
                  <div class="row mb-3">
                    <label for="password-confirm" class="col-md-3 col-form-label text-md-end">{{ __('Confirm Password') }}</label>
                    <div class="col-md-8">
                    <input type="password" id="password-confirm"  class="form-control @error('password-confirm') is-invalid @enderror" name="password_confirmation" required/>

                        @error('password-confirm')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  </div>                                                

                  <div class="row mb-0 justify-content-end">
                      <div class="col-md-6 mt-3">
                          <button type="submit" class="btn btn-success me-2">
                              {{ __('Update Password') }}
                          </button>
                          <a href="{{ route('users.profile') }}" class="btn btn-danger">
                              {{ __('Cancel') }}
                          </a>
                      </div>
                  </div>
              </div>
            </div>
        </div>
    </div>
</div>
