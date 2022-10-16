@extends('layouts.app')

@section('content')
@include('partials.alerts')

<div class="mdb-page-content page-intro">
	<div class="px-3 py-5">
		{{-- Dashboard Header --}}
		<p class="h2 pt-4 pb-0 header-custom">Dashboard
			<button
				data-url="{{ route('task.destroy.bulk') }}"
				class="btn btn-sm btn-danger mx-1 float-end deleteRequest--bulk
				" style="display: none;">
				Delete Selected
			</button>

			<button
				data-url="{{ route('task.edit.bulk') }}"
				class="btn btn-sm btn-info mx-1 float-end editRequest--bulk
				" style="display: none;">
				Edit Status / Priority Selected
			</button>
		</p>
		<p class="fs-6 pt-0 header-custom">Welcome <strong>{{ Auth::user()->name }}</strong>!</p>
		{{-- Dashboard Container--}}
		@if ($tasks->count() == 0)
			<div class="alert alert-warning" role="alert" data-mdb-color="warning">
				<p><i class="fas fa-exclamation-triangle me-3"></i>There are no tasks assigned to you at this time.</p>
				<hr>
				<p class="mb-0">Start by creating a task!</p>
			</div>
		@else
			<div class="card">
				<div class="container mt-2" style="margin-left: 0">
					<div class="card-body">
						<div class="row todoCards">
							@foreach ($tasks as $key => $task)
								{{-- Card --}}
								<div class="col-12 col-md-6 col-lg-3">
									<div class="card w-100 border border-secondary shadow-0 mb-3 card-custom">
										<div class="card-header border-secondary" style="background-color: #9FA8DA;">
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
										<div class="card-footer bg-transparent border-secondary">
											<button class="btn btn-sm deleteRequest--btn btn-danger btn-floating">
												<i data-url="{{ route('task.destroy',$task->id) }}" class="fas fa-trash"></i>
											</button>
											<a href="{{ route('task.edit',$task->id) }}" class="btn btn-sm btn-info btn-floating" role="button" aria-pressed="true">
												<i class="fas fa-marker"></i>
											</a>
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

@include('task.modals.edit-bulk')
@endsection
