@extends('layouts.app')

@section('content')
@include('partials.alerts')
<div class="container mt-5">
  <div class="row">
    <div class="col-md-4">
      
    </div>
    <div class="col-md-6">
      <div class="card" style="width: 18rem;">
        <img src="{{ asset('uploads/users/' . $user->profilePicture) }}" class=" rounded" alt="Profile Picture">
        <div class="card-body">
          <p class="card-text"><strong>Name:</strong> {{ $user->name }}</p>
          <p class="card-text"><strong>Email:</strong> {{ $user->email }}</p>
          <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">Edit</a>
          <a href="{{ route('users.security', $user->id) }}" class="btn btn-warning">Security</a>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection