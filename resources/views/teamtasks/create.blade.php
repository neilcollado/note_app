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
            <h2 class="bg-light p-2 border-top text-center border-bottom p-0">Creat a Team Task</h2>
            <div class="card-body text-center p-6">
              <form method="POST" action="{{ route('teamtasks.store', $_SERVER['QUERY_STRING']); }}">
                @csrf
                <div class="form-outline mb-2">
                  <input type="text" id="task_name" name="task_name" class="form-control"/>
                  <label class="form-label" for="task_name">Task Name</label>
                </div>
          
                @if(Session::has('errors'))
                  @foreach ($errors as $err) 
                    <div class="alert alert-danger mt-3 mb-2" role="alert" data-mdb-color="danger">
                      <i class="fas fa-times-circle me-3"></i>{{ $err }}
                    </div>
                  @endforeach
                @endif
          
                @if(Session::has('msg'))
                  <div class="alert alert-success mt-3 mb-2" role="alert" data-mdb-color="success">
                    <i class="fas fa-check-circle me-3"></i>{{ session('msg') }}
                  </div>
                @endif
                <div class="container p-0">
                  <div class="row">
                    <div class="col-sm mt-2">
                      <button class="btn btn-primary btn-block">Create</button>
                      </div>
                    <div class="col-sm mt-2">
                      <a href="{{ route('teams.show', $_GET['team_id']) }}" class="btn btn-block btn-danger">{{ __('Return') }}</a>
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
