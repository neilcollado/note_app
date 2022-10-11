@extends('layouts.app')
@extends('layouts.navbar')


@section('content')
<div
	class="alert fade mt-3 alert-dismissible"
	id="placement-example"
	data-mdb-position="top-center"
	data-mdb-hidden="true"
	role="alert"
	data-mdb-color="danger"
	>
	<strong>Oops!</strong> Error in deleting contact support
	<button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close"></button>
</div>
<div class="mdb-page-content page-intro">
	<div class="px-3 py-5">
		<div class="container">
			<div class="row justify-content-center">
				{{-- Card Header --}}
				<div class="card-header">
					<p class="h2 pt-4 header-custom">Your Tasks
						<button 
							data-url="{{ route('task.destroy.bulk') }}"
							class="btn btn-sm btn-danger mx-1 float-end deleteRequest--bulk
							" style="display: none;">
							<i class="fas fa-trash" ></i>
							Delete Selected
						</button>
							
						<button 
							data-url="{{ route('task.edit.bulk') }}"
							class="btn btn-sm btn-info mx-1 float-end editRequest--bulk
							" style="display: none;">
							<i class="fas fa-marker" ></i>
							Edit Status / Priority Selected
						</button>
					</p>
				</div>
				{{-- Card Body --}}
				<div class="card-body ">
		
					@unless ($tasks->count())
						<div class="alert alert-danger">No data found in system</div>
					@endunless
		
					<div class="row todoCards">
						@foreach ($tasks as $key => $task)
							{{-- Card --}}
							<div class="col-lg-3 col-md-6">
								<div class="card border border-secondary shadow-0 mb-3 card-custom" style="max-width: 18rem;">
									<div class="card-header bg-transparent border-secondary">
										<div class="form-check">
											<input type="checkbox" class="form-check-input" id="cp{{ $task->id }}" value="{{ $task->id }}">
											<label class="form-check-label" for="cp{{ $task->id }}"></label>
										</div>
									</div>
									
										<div class="card-body pb-3 pt-3">
											<h5 class="card-title text-truncate pb-1">{{ $task->name }}</h5>
											<p class="card-text text-primary text-truncate" style="font-family:Arial, Helvetica, sans-serif">
												<small>Due Date: {{ $task->due_date->format('Y-m-d') }}</small><br>
											</p>
										</div>
									
									<div class="card-footer bg-transparent border-secondary">
										<button 
											data-url="{{ route('task.destroy',$task->id) }}" 
											class="btn btn-sm deleteRequest--btn btn-danger btn-floating">
											<i class="fas fa-trash" ></i>
										</button>
										
										<a href="{{ route('task.edit',$task->id) }}" class="btn btn-sm btn-info btn-floating" role="button" aria-pressed="true">
											<i class="fas fa-marker"></i>
										</a>
										<a href="{{ route('task.show', $task->id) }}" class="btn btn-sm btn-success btn-floating" role="button" aria-pressed="true">
											<i class="fas fa-eye"></i>
										</a>
									</div>
								</div>
							</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
	
@include('task.modals.edit-bulk')
@include('task.modals.delete-task')
@endsection
