@extends('layouts.app')

@section('content')
@include('partials.alerts')

<div class="mdb-page-content page-intro">
	<div class="px-3 py-5">
    <h1>Show Team Page</h1>

		Team Name: {{ $team->team_name }}

		<div class="d-flex justify-content-around mt-4">
			<div>
				<h3>Task List</h3>
				<ul>
					<li>do math</li>
					<li>play tennis</li>
				</ul>
			</div>
			<div>
				<h3>Members</h3>
				<ul>
					@foreach($members as $m)
						<li>{{$m->name}}</li>
					@endforeach
				</ul>
			</div>
		</div>

		<!-- this part should only appear if user is the owner -->
		@if ($isOwner == 1) 
			<div>
				<h4 class="text-sm">Team Owner Settings</h4>
				<div class="d-flex">
					<button>
						<a href="{{ route('members.index', ['team_id' => $team->id]); }}">
							Edit Members
						</a>
					</button>
					<form method="POST" action="{{ route('teams.destroy', $team->id) }}">
						<input name="_method" type="hidden" value="DELETE">
						{{ csrf_field() }}
						<button type="submit">
							Delete Team
						</button>
					</form>

				</div>
			</div>
		@endif

	</div>
</div>

@endsection
