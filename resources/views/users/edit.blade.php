@extends('layouts.app')

@section('content')

<div class="login-page" style="margin-top: -100px; margin-bottom: -60px">
<div style="font-size: 25px; margin-top: 100px; color:white">{{ __('Edit Profile') }}</div>
  <div class="form">
    <form class="login-form" method="POST" action="{{ route('users.update', $user->id)}}" enctype="multipart/form-data">
        @method('PATCH')
        @include('users.partials.form')
    </form>
  </div>
</div>

@endsection

