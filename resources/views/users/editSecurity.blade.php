@extends('layouts.app')

@section('content')
  <div class="container" style="margin-top: 5%;">
    <div class="form">
      <form class="login-form" method="POST" action="{{ route('users.updateSecurity', $user->id)}}" enctype="multipart/form-data">
          @method('PATCH')
          @include('users.partials.security_form')
      </form>
    </div>
  </div>
@endsection


