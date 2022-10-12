@extends('layouts.app')

@section('content')
@include('partials.alerts')

<section class="container" style="margin-top: 5%;">
      <div class="row justify-content-center mt-3">
        <div class="col-lg-6">
          <div class="card mb-4">
            <div class="card-body text-center">
              <img src="{{ asset('uploads/users/' . $user->profile_picture) }}" alt="profile picture"
                class="rounded-circle img-fluid" style="width: 150px; height: 150px; object-fit:cover">
                <p class="text-muted mb-1">Employee</p>
                <div class="d-flex justify-content-center mb-2">
                  <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">General Settings</a>
                  <a href="{{ route('users.security') }}" class="btn btn-outline-primary ms-1">Security</a>
                </div>
              </div>
            </div> 

            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Name</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">{{ $user->name }}</p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Email</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">{{ $user->email }}</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>



@endsection