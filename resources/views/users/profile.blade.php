@extends('layouts.navbar')
@extends('layouts.app')

@section('content')
@include('partials.alerts')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <img src="{{ asset('uploads/images/' . $user->profilePicture) }}" class="rounded-circle img-profile" alt="Profile Picture">
      <p class="h1">{{ $user->name }}</p>
      <p class="card-text"><strong>Email:</strong> {{ $user->email }}</p>
      <a href="{{ route('users.security') }}" class="btn btn-warning">Security</a>
      <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">Edit</a>
    </div>
  </div>
</div>

@endsection