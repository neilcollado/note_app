@extends('layouts.app')

@section('content')
@include('partials.alerts')

<div class="mdb-page-content page-intro">
  <section class="container">
    <div class="row justify-content-center">
      <div class="col-lg-6">
        <div class="card mb-4">
          <div class="color-custom-team"></div>
          <h2 class="bg-light p-2 border-top text-center border-bottom p-0">Your Teams</h2>
          
          <div class="card-body p-6 pt-0">
            <ul class="list-group list-group-light list-group-small">
              @foreach($teams as $team)
                <li class="list-group-item d-flex justify-content-center text-start">
                  <div class="d-flex align-items-center">
                    <i class="fas fa-lg fa-project-diagram"></i>
                    <div class="ms-3">
                      <a href="{{ route('teams.show', $team->id) }}">
                        {{$team->team_name}}
                      </a>
                    </div>
                  </div>
                </li>
              @endforeach
            </ul>
            <a href="/teams/create" class="btn btn-block btn-primary" role="button">
              Create a Team
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

@endsection
