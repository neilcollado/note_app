@extends('layouts.app')

@section('content')

<div class="mdb-page-content text-center page-intro">
  <div class="text-center">
    <section class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6">
          <div class="card mb-4">
            <div class="card-body text-center p-0">
              <div class="color-custom-security"></div>
              <div class="form">
                  <form class="login-form" method="POST" action="{{ route('users.updateSecurity', $user->id)}}" enctype="multipart/form-data">
                      @method('PATCH')
                      @include('users.partials.security_form')
                  </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>
@endsection


