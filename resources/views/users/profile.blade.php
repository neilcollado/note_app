@extends('layouts.app')

@section('content')

<div class="mdb-page-content text-center page-intro">
  <div class="text-center">
    <section class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6">
          <div class="card mb-4">
            <div class="card-body text-center p-0">
              <div class="color-custom-profile"></div>
              @if(isset($user->profile_picture))
                <img src="{{ asset('uploads/users/' . $user->profile_picture) }}" alt="profile picture"
                class="rounded-circle img-fluid" style="width: 180px; height: 180px; object-fit:cover; margin-top:-70px; border: 20px solid #FFFFFF;"/>
              @else
                <img src="{{ asset('/uploads/users/default.png') }}" alt="profile_picture" 
                class="rounded-circle img-fluid" style="width: 180px; height: 180px; object-fit:cover; margin-top:-70px; border: 20px solid #FFFFFF;"/>
              @endif
            </div>
            <p class="h3" style="margin-top: -12px">{{ $user->name }}</p>
            <p class="lead" style="margin-top: -12px">{{ $user->email }}</p>
          </div> 
  
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <div class="container pb-0">
                  @include('partials.alerts')
                  <div class="row">
                    <div class="col-sm mb-2 mt-2">
                      <a href="{{ route('users.edit', $user->id) }}" class="btn btn-block btn-primary"><i class="fas fa-user-cog"></i> General Settings</a>
                    </div>
                    <div class="col-sm mb-2 mt-2">
                      <a href="{{ route('users.security') }}" class="btn btn-block btn-outline-primary"><i class="fas fa-shield-alt"></i> Security</a>
                    </div>
                  </div>
                  <div class="mt-2 mb-2">
                    <a href="{{ url('/') }}" class="btn btn-block btn-danger">Home</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>



@endsection