@extends('layouts.app')

@section('content')
@include('partials.alerts')

<div class="mdb-page-content page-intro">
	<div class="px-3 py-5">
		{{-- Dashboard Header --}}
		<p class="h2 pt-4 pb-0">Dashboard</p>
		<div class="row">
			<div class="col-md-7">
				<p class="fs-6 pt-0">Welcome <strong>{{ Auth::user()->first_name }}</strong>!</p>
			</div>
			<div class="col-md-5">
				<div class="row">
					<div class="col-md-7">
						<button
							data-url="{{ route('task.edit.bulk') }}"
							class="btn btn-sm btn-block btn-info mb-2 editRequest--bulk text-truncate
							" style="display: none;">
							Edit Status / Priority Selected
						</button>
					</div>
					<div class="col-md-5">
						<button
							data-url="{{ route('task.destroy.bulk') }}"
							class="btn btn-sm btn-block btn-danger mb-2 deleteRequest--bulk text-truncate
							" style="display: none;">
							Delete Selected
						</button>
					</div>
				</div>
			</div>
		</div>
		{{-- Dashboard Container--}}
		@if ($tasks->count() == 0)
			<div class="alert alert-warning" role="alert" data-mdb-color="warning">
				<p><i class="fas fa-exclamation-triangle me-3"></i>There are no tasks assigned to you at this time.</p>
				<hr>
				<p class="mb-0">Start by creating a task!</p>
			</div>
		@else
			<div class="todoCards">
				@foreach ($tasks as $key => $task)
					@if($task->status == 'missing' )
						<div class="card rounded-0 border border-2 border-danger border-bottom-0 border-start-0 border-end-0 shadow-0 mb-2">
					@else
						<div class="card rounded-0 border border-2 border-primary border-bottom-0 border-start-0 border-end-0 shadow-0 mb-2">
					@endif
						<div class="row g-0">
							<div class="col-md-3" style="background-color: #DCE4F4;">
								<h5 class="card-title text-truncate py-3 px-3 fw-bold task-header-title">
									@if($task->status != 'missing' )
										<input type="checkbox" class="form-check-input" id="cp{{ $task->id }}" value="{{ $task->id }}">
										<label class="form-check-label" for="cp{{ $task->id }}"></label>
									@else
										<i class="fas fa-exclamation-circle text-danger" style="padding-right: 13px;"></i>
									@endif
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
								@if($task->status != 'missing' )
									<p class="text-starts text-primary text-uppercase fw-normal" style="padding-top: 3px;">{{ $task->status }}</p>
								@else
									<p class="text-starts text-danger text-uppercase fw-normal" style="padding-top: 3px;">{{ $task->status }}</p>
								@endif
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
												@if($task->status != 'missing' )
													<li>
														<a href="{{ route('task.edit',$task->id) }}" class="dropdown-item btn btn-sm shadow-0 btn-block" role="button" aria-pressed="true" >
															<span class="text-info">
																<i class="fas fa-marker text-info"></i> Edit
															</span>
														</a>
													</li>
												@endif
												<li>
													<button data-url="{{ route('task.destroy',$task->id) }}" class="dropdown-item btn btn-sm deleteRequest--btn">
														<span data-url="{{ route('task.destroy',$task->id) }}" class="text-danger">
															<i data-url="{{ route('task.destroy',$task->id) }}" class="fas fa-trash"></i> Delete
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
										@if($task->status != 'missing' )
											<div class="col">
												<a href="{{ route('task.edit',$task->id) }}" class="btn btn-sm shadow-0 btn-block p-3 rounded-0" role="button" aria-pressed="true" >
													<span class="text-info">
														<i class="fas fa-marker text-info"></i> Edit
													</span>
												</a>
											</div>
										@endif
										<div class="col">
											<button data-url="{{ route('task.destroy',$task->id) }}" class="btn btn-sm shadow-0 deleteRequest--btn btn-block p-3 rounded-0">
												<span data-url="{{ route('task.destroy',$task->id) }}" class="text-danger">
													<i data-url="{{ route('task.destroy',$task->id) }}" class="fas fa-trash"></i> Delete
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

@include('task.modals.edit-bulk')
@endsection
