@extends('layouts.app')

@section('content')
@include('partials.alerts')

<div class="mdb-page-content page-intro">
	<div class="px-3 py-5">
		{{-- Dashboard Header --}}
		<div class="">
			<p class="h2 pt-4 pb-0">List of Completed Tasks</p>
			<div class="row d-flex justify-content-center">
				<div class="col-md-10">
					<p class="fs-6 pt-0">Welcome <strong>{{ Auth::user()->first_name }}</strong>!</p>
				</div>
				<div class="col-md-2">
					<div class="d-flex flex-row-reverse">
						<button
							data-url="{{ route('task.destroy.bulk') }}"
							class="btn btn-sm btn-block btn-danger mx-1 mb-2 deleteRequest--bulk text-truncate
							" style="display: none;">
							Remove Selected
						</button>
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
			<div class="todoCards">
				@foreach ($tasks as $key => $task)
					<div class="card rounded-0 border border-2 border-success border-bottom-0 border-start-0 border-end-0 shadow-0 mb-2">
						<div class="row g-0">
							<div class="col-md-3" style="background-color: #DCE4F4;">
								<h5 class="card-title text-truncate py-3 px-3 fw-bold task-header-title">
									<input type="checkbox" class="form-check-input" id="cp{{ $task->id }}" value="{{ $task->id }}">
									<label class="form-check-label" for="cp{{ $task->id }}"></label>
									{{ $task->name }}
								</h5>
							</div>
							<div class="col-md-7">
								<div class="card-body py-2 due-date-card">
									@if($task->status != 'missing' )
										<p class="card-text fs-6 my-0 py-0">
											<i class="far fa-calendar"></i> <small>Due date: {{ $task->due_date->format('Y-m-d') }}</small>
										</p>
										<p class="card-text fs-6 my-0 py-0">
											<i class="far fa-clock"></i> <small><span class="fw-light">Time: {{$task->due_time->format('h:iA')}}</span></small>
										</p>
									@else
										<p class="card-text text-danger fs-6 my-0 py-0">
											<i class="far fa-calendar"></i> <small>Due date: {{ $task->due_date->format('Y-m-d') }}</small>
										</p>
										<p class="card-text text-danger fs-6 my-0 py-0">
											<i class="far fa-clock"></i> <small><span class="fw-light">Time: {{$task->due_time->format('h:iA')}}</span></small>
										</p>
									@endif
								</div>
							</div>
							<div class="col-sm pt-3 actions-dropdown">
								<p class="text-starts text-success text-uppercase fw-normal" style="padding-top: 3px;">{{ $task->status }}</p>
							</div>
							<div class="col-sm">
								<div class="actions-dropdown">
									<div class="d-flex justify-content-center">
										<div class="btn-group dropstart shadow-0 py-3">
											<button type="button" class="btn btn-transparent shadow-0 p-2 rounded-0" data-mdb-toggle="dropdown" aria-expanded="false">
												<i class="fas fa-lg fa-ellipsis-v"></i>
											</button>
											<ul class="dropdown-menu dropdown-menu-end">
												<li>
													<a href="{{ route('task.show', $task->id) }}" class="dropdown-item btn btn-sm shadow-0 btn-block" role="button" aria-pressed="true" >
														<span class="text-success">
															<i class="fas fa-eye text-success"></i> View
														</span> 
													</a>
												</li>
												<li>
													<button data-url="{{ route('task.destroy',$task->id) }}" class="dropdown-item btn btn-sm deleteRequest--btn">
														<span data-url="{{ route('task.destroy',$task->id) }}" class="text-danger">
															<i data-url="{{ route('task.destroy',$task->id) }}" class="fas fa-trash"></i> Remove
														</span>
													</button>
												</li>
											</ul>
										</div>
									</div>
								</div>
								<div class="actions-drop-header">
									<div class="row g-0">
										<div class="col">
											<a href="{{ route('task.show', $task->id) }}" class="btn btn-sm shadow-0 btn-block p-3 rounded-0" role="button" aria-pressed="true" >
												<span class="text-success">
													<i class="fas fa-eye text-success"></i> View
												</span>
											</a>
										</div>
										<div class="col">
											<button data-url="{{ route('task.destroy',$task->id) }}" class="btn btn-sm shadow-0 deleteRequest--btn btn-block p-3 rounded-0">
												<span data-url="{{ route('task.destroy',$task->id) }}" class="text-danger">
													<i data-url="{{ route('task.destroy',$task->id) }}" class="fas fa-trash"></i> Remove
												</span>
											</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				@endforeach
			</div>
		@endif
	</div>
</div>

@endsection
