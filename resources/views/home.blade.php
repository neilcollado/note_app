@extends('layouts.navbar')
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
		<div class="card-header">
			<p class="h2 pb-4">Task List
			<button 
				data-url="{{ route('task.destroy.bulk') }}"
				class="btn btn-sm btn-danger mx-1 float-end deleteRequest--bulk
				" style="display: none;">Delete Selected</button>
				<button 
				data-url="{{ route('task.edit.bulk') }}"
				class="btn btn-sm btn-info mx-1 float-end editRequest--bulk
				" style="display: none;">Edit Status / Priority Selected</button>
			</p>
		</div>
		<div class="card-body ">

			@unless ($tasks->count())
				<div class="alert alert-danger">No data found in system</div>
			@endunless

			<div class="row todoCards">

				@foreach ($tasks as $key => $task)
				<div class="col-lg-4 col-md-6  ">
					<a href="{{ route('task.show', $task->id) }}" style="text-decoration: none; color: black;" >
						<div class="card">
							<img class="card-img-top mb-0" src="https://mdbootstrap.com/img/Photos/Others/images/43.webp" alt="Card image cap">
					</a>
							<div class="card-body mb-0">
								<h4 class="card-title"><a>{{ $task->name }}</a></h4>
								<p class="card-text">
									<small>Due Date: {{ $task->due_date->format('Y-m-d') }}</small><br>
								</p>
							</div>
							<div class="card-footer text-muted mt-0">
								<div class="btn-group" role="group" aria-label="Basic example">
									<div class="form-check mt-2">
										<input type="checkbox" class="form-check-input" id="cp{{ $task->id }}" value="{{ $task->id }}">
										<label class="form-check-label" for="cp{{ $task->id }}"></label>
									</div>

									<button data-url="{{ route('task.destroy',$task->id) }}" class="btn btn-sm deleteRequest--btn btn-danger mx- float-right ">
										Delete
									</button>
									<a href="{{ route('task.edit',$task->id) }}" class="btn btn-sm btn-info float-right" role="button" aria-pressed="true">
										Edit
									</a>
								</div>
							</div>
						</div>
				</div>
				@endforeach
		</div>
	</div>
</div>
	
@include('task.modals.edit-bulk')
@endsection
