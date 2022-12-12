@extends('layouts.app')

@section('content')
@include('partials.alerts')

<div class="mdb-page-content page-intro">
	<div class="px-3 py-5">
    <h1>Team: {{ $team->team_name }}</h1>

		<div id="teamtask-wrapper"> <!-- Main Wrapper -->
			<main>
				<div id="status-divider">

					<div class="box">
						<h4>Not Started</h4>
						@foreach($notstarted as $ns)
							<a href="{{ route('teamtasks.edit', $ns['id']) }}">
								<div class="teamtask">
									<h6>{{$ns['name']}}</h6>
								</div>
							</a>
						@endforeach 
					</div>

					<div class="box">
						<h4>In Progress</h4>
						@foreach($inprogress as $ip)
							<a href="{{ route('teamtasks.edit', $ip['id']) }}">
								<div class="teamtask">
									<h6>{{$ip['name']}}</h6>
								</div>
							</a>
						@endforeach 
					</div>

					<div class="box">
						<h4>Completed</h4>
						@foreach($completed as $com)
							<a href="{{ route('teamtasks.edit', $com['id']) }}">
								<div class="teamtask">
									<h6>{{$com['name']}}</h6>
								</div>
							</a>
						@endforeach 
					</div>

				</div>

				<div id="new-task">
					<button>
						<a href="{{ route('teamtasks.create', ['team_id' => $team->id]); }}">
							new task
						</a>
					</button>
				</div>
			</main>

			<aside>
				<div>
					<h3>Members</h3>
					<ul>
						@foreach($members as $m)
							<li>{{$m->name}}</li>
						@endforeach
					</ul>
				</div>

				<!-- this part should only appear if user is the owner -->
				@if ($isOwner == 1) 
					<div>
						<h4>Team Owner Settings</h4>
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
			</aside>
			
		</div> <!-- End of Main Wrapper -->

	</div>
</div>

@endsection
