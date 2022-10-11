@extends('layouts.app')

@section('content')
@include('partials.alerts')
<div class="mdb-page-content page-intro">
	<div class="px-3 py-5">
    <div class="login-page" style="margin-top: -100px; margin-bottom: -60px">
    <div style="font-size: 25px; margin-top: 100px; color:white">{{ __('Edit Profile') }}</div>
      <div class="form">
        <form class="login-form" method="POST" action="{{ route('users.updateSecurity', $user->id)}}" enctype="multipart/form-data">
            @method('PATCH')
            @include('users.partials.form2')
        </form>
      </div>
    </div>
  </div>
</div>


@endsection

