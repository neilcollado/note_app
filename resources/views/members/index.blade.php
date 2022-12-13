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
					
					<h2 class="bg-light p-2 border-top text-center border-bottom p-0">The Team</h2>
					
					<section class="table-responsive-sm">
						<table class="table table-hover table-sm">
							<thead class="bg-light">
							<th class="text-start" scope="row">Full name</th>
							<th class="text-start" scope="row">Email Address</th>
							<th class="text-start" scope="row">Event</th>
							</thead>
							<tbody>
							@foreach($members as $m)
								<tr>
									<td class="text-start"><span class=""> <span>{{ $m->name }}</span> </span></td>
									<td class="text-start"><span class=""> <span> {{$m->email}}</span> </span></td>
									<td class="text-start"><span class=""> <span> 
										@if (!$m->isOwner) 
											<form method="POST" action="{{ route('members.destroy', $m->member_id) }}">
												<input name="_method" type="hidden" value="DELETE">
												{{ csrf_field() }}
												<button type="submit" class="btn btn-sm btn-danger">
													<i class="fas fa-ban"></i> Remove </button>
											</form>
										@else
											Owner											
										@endif
									</span></span></td>
								</tr>
							@endforeach
							</tbody>
						</table>
					</section>

					<h5 class="bg-light p-2 border-top text-center border-bottom p-0">Add a member</h5>
					<div class="card-body text-center p-6">
						<div>
							<form method="POST" action="{{ route('members.store', $_SERVER['QUERY_STRING']); }}">
								@csrf
								<div class="form-outline mb-2">
									<input type="email" id="email" name="email" class="form-control"/>
									<label class="form-label" for="email">Member's Email Address</label>
								</div>
								
								@if(Session::has('errors'))
									@foreach ($errors as $err) 
										<p class="text-danger">{{ $err }}</p>
									@endforeach
								@endif

								<div class="container p-0">
									<div class="row">
										<div class="col-sm mt-2">
											<button class="btn btn-primary btn-block">Submit</button>
										</div>
										<div class="col-sm mt-2">
											<a href="{{ route('teams.show', $_GET['team_id']) }}" class="btn btn-block btn-danger">{{ __('Cancel') }}</a>
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
