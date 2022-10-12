@csrf
<input placeholder="Name" type="text" class="@error('name') is-invalid @enderror" name="name" value="{{ old('name') }}@isset($user){{$user->name}}@endisset" required autocomplete="name" autofocus>
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

<input placeholder="E-mail Address" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}@isset($user){{$user->email}}@endisset" required autocomplete="email">
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

<div class="form-group row">

    <label for="profilePicture" class="col-md-4 col-form-label text-md-right" >Image</label>
    @isset($user)
    <div class="img-box">
        <img src="{{ asset('uploads/users/' . $user->profilePicture) }}" alt="profile image" 
        class="img-thumbnail rounded-circle" style="max-width: 40vh">
    </div>
    @endisset

    <div class="col-md-12 col-form-label text-center">
        <input id="profilePicture" type="file" class="btn btn-sm @error('profilePicture') is-invalid @enderror" 
        name="profilePicture">
        @error('profilePicture')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>                                           
</div>

<!-- Button section -->
<div class="form-group row mb-0">
    <div class="col-md-6 offset-md-4">
        <button type="submit" class="btn btn-warning" style="white-space:nowrap; margin-left: -100px; height:50px">Edit</button>    
        <a href="{{ route('users.profile') }}" type="button" class="btn btn-danger" style="height:50px; padding-top:12px">Cancel</a>
    </div>
</div>