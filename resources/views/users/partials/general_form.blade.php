@csrf

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Profile') }}</div>

                <div class="card-body">
                  <!-- First Name -->
                  <div class="row">
                    <div class="col-md-8">
                        <div class="row mb-3">
                            <label for="first_name" class="col-md-4 col-form-label text-md-end">{{ __('First Name') }}</label>
        
                            <div class="col-md-6">
                                <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="@isset($user){{$user->first_name}}@endisset" required autocomplete="first_name" autofocus>

                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <!-- Last Name -->
                        <div class="row mb-3">
                            <label for="last_name" class="col-md-4 col-form-label text-md-end">{{ __('Last Name') }}</label>

                            <div class="col-md-6">
                                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="@isset($user){{$user->last_name}}@endisset" required autocomplete="last_name">

                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="@isset($user){{$user->email}}@endisset" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                    <div class="form-group row">
                        {{-- Product picture --}}
                        <label for="profile_picture" class="col-md-4 col-form-label text-md-right" ></label>
                        @isset($user)
                        <div class="img-box">
                            <img src="{{ asset('uploads/users/' . $user->profile_picture) }}" alt="profile image" 
                            class="rounded-circle img-fluid" style="width: 150px; height: 150px; object-fit:cover" style="max-width: 40vh">
                        </div>
                        @endisset

                        <div class="col-md-12 col-form-label">
                            <input id="profile_picture" type="file" class="btn btn-sm @error('profile_picture') is-invalid @enderror" 
                            name="profile_picture">
                            @error('profile_picture')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>                                           
                    </div>
                    </div>
                  </div>

                  <div class="row mb-0">
                      <div class="col-md-6 offset-md-1 mt-3">
                          <button type="submit" class="btn btn-success me-2">
                              {{ __('Save Changes') }}
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
