@extends('layouts.app')

@section('content')
@include('partials.alerts')

<div class="mdb-page-content page-intro">
	<div class="px-3 py-5">
    <h1>Teams Page</h1>

    <button>
      <a href="/teams/create">
        create team

      </a>
    </button>
    
    <h3>your teams</h3>
    <ul>
      @foreach($teams as $team)
      <li>
        <a href="{{ route('teams.show', $team->id) }}">
          {{$team->team_name}}
        </a>
      </li>
      @endforeach
    </ul>
	</div>
</div>

@endsection
