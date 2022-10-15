@csrf

<div class="card-body text-center p-0">
    <div class="color-custom-general"></div>
    {{-- PROFILE PICTURE CONTAINER --}}
    <div class="container pl-3 pb-5">
        <div class="float-start">
            @if(isset($user->profile_picture))
                <img src="{{ asset('uploads/users/' . $user->profile_picture) }}" alt="profile picture" id="chosen-image"
                class="rounded-circle img-fluid" style="width: 180px; height: 180px; object-fit:cover; margin-top:-70px; border: 20px solid #FFFFFF;"/>
            @else
                <img src="{{ asset('/uploads/users/default.png') }}" alt="profile_picture" id="chosen-image"
                class="rounded-circle img-fluid" style="width: 180px; height: 180px; object-fit:cover; margin-top:-70px; border: 20px solid #FFFFFF;"/>
                @endif
            </div>
        </div>
    </div>
    {{-- FILE --}}
    <a class="btn btn-warning btn-md pb-0 btn-floating float-start border border-3 border-white shadow-0" role="button" style="margin-left: -60px;">
        <label class="form-label upload-profile text-white" for="profile_picture"><i class="fas fa-camera fa-lg" style="margin-left: -2px; margin-top: -3px"></i></label>
    </a>
    <input type="file" accept=".jpg, .jpeg" class="form-control @error('profile_picture') is-invalid @enderror" name="profile_picture" id="profile_picture" />
    @error('profile_picture')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror

    <div class="container mb-4 pb-1" style=" margin-top: -20px;">
        <p class="small text-start text-uppercase">Hey {{ $user->first_name }}! Always keep your profile updated!</p>
    </div>

    {{-- FORM CONTAINER --}}
    <div class="container p-4">
        <!-- First Name -->
        <div class="row mb-3">
            <div class="col-md-12">
                <div class="form-outline">
                    <i class="fas fa-user-tag trailing"></i>
                    <input type="text" id="first_name" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="@isset($user){{$user->first_name}}@endisset" required autocomplete="first_name" />
                    <label class="form-label" for="first_name">{{ __('First name') }}</label>
                    @error('first_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>
        
        <!-- Last Name -->
        <div class="row mb-3">
            <div class="col-md-12">
                <div class="form-outline">
                    <i class="fas fa-user-tag trailing"></i>
                    <input type="text" id="last_name" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="@isset($user){{$user->last_name}}@endisset" required autocomplete="last_name" />
                    <label class="form-label" for="last_name">{{ __('Last name') }}</label>
                    @error('last_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>
    
        <!-- Email -->
        <div class="row mb-3">
            <div class="col-md-12">
                <div class="form-outline">
                    <i class="fas fa-envelope trailing"></i>
                    <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="@isset($user){{$user->email}}@endisset" required autocomplete="email"/>
                    <label class="form-label" for="email">{{ __('Email address') }}</label>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>
        {{-- Button --}}
        <div class="container p-0">
            <div class="row">
                <div class="col-sm mb-2 mt-2">
                    <button type="submit" class="btn btn-block btn-warning">{{ __('Save Changes') }}</button>
                </div>
                <div class="col-sm mb-2 mt-2">
                    <a href="{{ route('users.profile') }}" class="btn btn-block btn-danger">{{ __('Cancel') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
    
