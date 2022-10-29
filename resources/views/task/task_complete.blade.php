@extends('layouts.app')

@section('content')
@include('partials.alerts')

<div class="mdb-page-content page-intro">
	<div class="px-3 py-5">
		{{-- Dashboard Header --}}
		<div class="">
			<p class="h2 pt-4 pb-0">List of Completed Tasks</p>
			<div class="row d-flex justify-content-center">
				<div class="col-md-6">
					<p class="fs-6 pt-0">Welcome <strong>{{ Auth::user()->first_name }}</strong>!</p>
				</div>
				<div class="col">
					<div class="row">
						<div class="col">
						</div>
						<div class="col">
							<button
								data-url="{{ route('task.destroy.bulk') }}"
								class="btn btn-sm btn-block btn-danger mx-1 mb-2 float-end deleteRequest--bulk text-truncate
								" style="display: none;">
								Delete Selected
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		{{-- Dashboard Container--}}
		@if ($tasks->count() == 0)
			<div class="alert alert-warning" role="alert" data-mdb-color="warning">
				<p><i class="fas fa-exclamation-triangle me-3"></i>No completed tasks yet.</p>
				<hr>
				<p class="mb-0">Start by creating and finishing a task!</p>
			</div>
		@else
			<div class="card">
				<div class="container mt-2" style="margin-left: 0">
					<div class="card-body">
						<div class="row todoCards">
							@foreach ($tasks as $key => $task)
								{{-- Card --}}
								<div class="col-12 col-md-6 col-lg-3">
									<div class="card w-100 border border-success shadow-0 mb-3 card-custom">
										<div class="card-header border-success bg-success">
											<div class="form-check">
												<input type="checkbox" class="form-check-input" id="cp{{ $task->id }}" value="{{ $task->id }}">
												<label class="form-check-label" for="cp{{ $task->id }}"></label>
											</div>
										</div>
										{{-- Card Body --}}
										<div class="card-body pb-3 pt-3">
											<h5 class="card-title text-truncate pb-1">{{ $task->name }}</h5>
											<p class="card-text text-primary text-truncate" style="font-family:Arial, Helvetica, sans-serif">
												<small>Due Date: {{ $task->due_date->format('Y-m-d') }}</small><br>
											</p>
										</div>
										{{-- Card Footer --}}
										<div class="card-footer bg-transparent border-success">
											<button class="btn btn-sm deleteRequest--btn btn-danger btn-floating">
												<i data-url="{{ route('task.destroy',$task->id) }}" class="fas fa-trash"></i>
											</button>
											<a href="{{ route('task.show', $task->id) }}" class="btn btn-sm bg-success btn-floating p-0">
												<i class="fas fa-eye fa-lg p-0 text-white"></i>
											</a>
										</div>
									</div>
								</div>

							@endforeach
						</div>
					</div>
				</div>
			</div>
		@endif
	</div>
</div>

@endsection
