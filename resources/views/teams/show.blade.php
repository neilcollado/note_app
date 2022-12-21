@extends('layouts.app')

@section('content')
@include('partials.alerts')

<div class="mdb-page-content text-center page-intro">
	<div class="text-center">
		<section class="container">
			<div class="row justify-content-center">
				<div class="col-lg-11">
					<div class="card mb-4 bg-transparent shadow-0">
					<div class="color-custom-team-dashboard"></div>
					<h2 class="bg-light p-2 border-top text-center border-bottom p-0 rounded-bottom">{{ $team->team_name }}</h2>

					{{-- Main Card --}}
					<div class="card-body px-0">
						<div class="container px-0">
							<div class="row g-3">
								{{-- Card for Not started --}}
								<div class="col-md">
									<div class="card rounded-3">
										<div class="card-header py-2">
											<h5 class="mb-0 text-truncate">Not Started</h5>
										</div>
										<div class="card-body py-2 px-2 pb-0 rounded-bottom" style="background-color: #CFD8DC">
											@empty($notstarted)
												<div class="alert rounded-0 text-center m-0 py-2 pt-0 text-truncate" role="alert" style="background-color: #CFD8DC; font-size: 10pt;">
													<i class="fas fa-info-circle me-3"></i>Nothing started yet.
												</div>
											@endempty
											@foreach($notstarted as $ns)
												<div class="card rounded-2 mb-2">
													<div class="card-body p-0 pt-1 px-2">
														<div class="card-text">
															<div class="text-start">
																<div class="row">
																	<div class="col-auto me-auto">
																		<h6>{{$ns['name']}}</h6>
																	</div>
																	<div class="col-auto">
																		<a href="{{ route('teamtasks.edit', $ns['id']) }}" style="color: inherit">
																			<i class="fas fa-sliders-h"></i>
																		</a>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											@endforeach 
											<div class="pb-2">
												<div class="text-start">
													<a href="{{ route('teamtasks.create', ['team_id' => $team->id]); }}" class="btn btn-sm btn-block btn-success text-white" style="color: inherit">
														new task
													</a>
												</div>
											</div>
										</div>
									</div>
								</div>

								{{-- Card for In Progress --}}
								<div class="col-md">
									<div class="card rounded-3">
										<div class="card-header py-2">
											<h5 class="mb-0 text-truncate">In Progress</h5>
										</div>
										<div class="card-body py-2 px-2 pb-0 rounded-bottom" style="background-color: #CFD8DC">
											@empty($inprogress)
												<div class="alert rounded-0 text-center m-0 py-2 pt-0 text-truncate" role="alert" style="background-color: #CFD8DC; font-size: 10pt;">
													<i class="fas fa-info-circle me-3"></i>Nothing in progress yet.
												</div>
											@endempty
											@foreach($inprogress as $ip)
												<div class="card rounded-2 mb-2">
													<div class="card-body p-0 pt-1 px-2">
														<div class="card-text">
															<div class="text-start">
																<div class="row">
																	<div class="col-auto me-auto">
																		<h6>{{$ip['name']}}</h6>
																	</div>
																	<div class="col-auto">
																		<a href="{{ route('teamtasks.edit', $ip['id']) }}" style="color: inherit">
																			<i class="fas fa-sliders-h"></i>
																		</a>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											@endforeach 
										</div>
									</div>
								</div>

								{{-- Card for Completed --}}
								<div class="col-md">
									<div class="card rounded-3">
										<div class="card-header py-2">
											<h5 class="mb-0 text-truncate">Completed</h5>
										</div>
										<div class="card-body py-2 px-2 pb-0 rounded-bottom" style="background-color: #CFD8DC">
											@empty($completed)
												<div class="alert rounded-0 text-center m-0 py-2 pt-0 text-truncate" role="alert" style="background-color: #CFD8DC; font-size: 10pt;">
													<i class="fas fa-info-circle me-3"></i>Nothing Completed yet.
												</div>
											@endempty
											@foreach($completed as $com)
												<div class="card rounded-2 mb-2">
													<div class="card-body p-0 pt-1 px-2">
														<div class="card-text">
															<div class="text-start">
																<div class="row">
																	<div class="col-auto me-auto">
																		<h6>{{$com['name']}}</h6>
																	</div>
																	<div class="col-auto">
																		<a href="{{ route('teamtasks.edit', $com['id']) }}" style="color: inherit">
																			<i class="fas fa-sliders-h"></i>
																		</a>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											@endforeach 
										</div>
									</div>
								</div>

								{{-- Members --}}
								<div class="col-md">
									<div class="card rounded-3">
										<div class="card-body py-2 px-2 pb-0 rounded-bottom">
											<div class="card-title text-truncate">
												<h5 class="mb-0 text-truncate">Members</h5>
											</div>
											<hr class="hr p-0 m-0">
											<ul class="list-group list-group-light">
												@foreach($members as $m)
													<li class="list-group-item p-0 py-2 mt-0 bg-transparent">
														<div class="text-muted" style="font-size: 11pt;">
															{{ $m->name }}
														</div>
													</li>
												@endforeach
											</ul>

											@if ($isOwner == 1)
												<a href="{{ route('members.index', ['team_id' => $team->id]); }}" class="btn btn-block btn-secondary mb-2 btn-sm" style="color: inherit">
													Edit Members
												</a>
												<form method="POST" action="{{ route('teams.destroy', $team->id) }}">
													<input name="_method" type="hidden" value="DELETE">
													{{ csrf_field() }}
													<button type="submit" class="btn btn-block btn-danger mb-2 btn-sm">
														Delete Team
													</button>
												</form>
											@endif

										</div>
									</div>
									<div class="card bg-transparent shadow-0">
										<div class="card-body py-0 px-2 rounded-bottom">
											<a href="{{ route('teams.index') }}" class="btn btn-sm btn-block btn-primary mt-2" role="button">
												Dashboard
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
</div>

@endsection
