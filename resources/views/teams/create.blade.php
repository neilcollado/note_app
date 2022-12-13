@extends('layouts.app')

@section('content')
@include('partials.alerts')

<div class="mdb-page-content text-center page-intro">
  <div class="text-center">
    <section class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6">
          <div class="card mb-4">
            <div class="color-custom-team"></div>
            <h2 class="bg-light p-2 border-top text-center border-bottom">Create a Team</h2>
            <div class="card-body text-center p-6">
              <form method="POST" action="{{ route('teams.store') }}">
                @csrf
                <div class="form-outline mb-2">
                  <input type="text" id="team_name" name="team_name" class="form-control"/>
                  <label class="form-label" for="team_name">Team Name</label>
                </div>
          
                @if(Session::has('errors'))
                  @foreach ($errors as $err) 
                    <p class="text-danger mb-0">{{ $err }}</p>
                  @endforeach
                @endif
                
                <div class="container p-0">
                  <div class="row">
                    <div class="col-sm mt-2">
                        <button class="btn btn-primary btn-block">Create</button>
                      </div>
                      <div class="col-sm mt-2">
                          <a href="{{ route('teams.index') }}" class="btn btn-block btn-danger">{{ __('Cancel') }}</a>
                      </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>

@endsection
