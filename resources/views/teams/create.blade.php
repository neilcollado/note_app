@extends('layouts.app')

@section('content')
@include('partials.alerts')

<div class="mdb-page-content page-intro">
	<div class="px-3 py-5">
    <h1>Creat A Team Page</h1>
    <form method="POST" action="{{ route('teams.store') }}">
      @csrf
      <div>
        <label for="team_name">Team Name</label>
        <input type="text" name="team_name" id="team_name">
      </div>

      @if(Session::has('errors'))
        @foreach ($errors as $err) 
          <p class="text-danger">{{ $err }}</p>
        @endforeach
      @endif
      
      <button>submit</button>
    </form>
	</div>
</div>

@endsection
