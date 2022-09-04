@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    <div class="container-fluid my-4" >
		<div class="card shadow" style="min-height:90vh ">
			<div class="card-header">
				Task List
				<a href="/task/create" class="btn btn-sm btn-success float-end">Add</a>
				<button 
					data-url="{{ route('task.destroy.bulk') }}"
					class="btn btn-sm btn-danger mx-1 float-end deleteRequest--bulk
					" style="display: none;">Delete Selected</button>
					<button 
					data-url="{{ route('task.edit.bulk') }}"
					class="btn btn-sm btn-outline-info mx-1 float-end editRequest--bulk
					" style="display: none;">Edit Status/Priority Selected</button>
				
			</div>
			<div class="card-body ">

				@unless ($tasks->count())
					<div class="alert alert-danger">No data found in system</div>
				@endunless

		    	<div class="row todoCards">

		    		@foreach ($tasks as $key => $task)
					<div class="col-lg-4 col-md-6  ">

						<div class="card shadow mb-4">
				  			<div class="card-header">
				  				{{ $task->name }}

								<span class="badge float-end rounded-0 text-dark">{{ $task->status }}</span>
				  				<span class="badge float-end rounded-0 text-info mx-1">{{ $task->priority }}</span>
				  				
				  			</div>
					  		<div class="card-body">
			  					<table class="table  text-muted table-sm table-borderless">
			  						<tr><td>Time Left: </td> <td>{{ $task->due_date->diffForHumans() }}</td><tr>
			  						<tr><td>Due Date: </td> <td>{{ $task->due_date->format('Y-m-d') }}</td><tr>
			  						<tr><td>Created at: </td> <td>{{ $task->created_at }}</td><tr>
			  						<tr><td>Updated at: </td> <td>{{ $task->updated_at }}</td><tr>
			  					</table>

					  		</div>
					  		<div class="card-footer p-1">
					  			<span class="border px-2 py-1 text-muted">
					  				<input type="checkbox" id="cp{{ $task->id }}" value="{{ $task->id }}" class="mx-2">
					  			<label for="cp{{ $task->id }}">Select</label>
					  			</span>
					  			<button
						  				data-url="{{ route('task.destroy',$task->id) }}"
						  				class="btn btn-sm deleteRequest--btn btn-outline-danger mx-1 float-right "
						  			>Delete</button>

						  			<a
						  				href="{{ route('task.edit',$task->id) }}"
						  				class="btn btn-sm btn-outline-info float-right"
						  			>Edit</a>
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
@endsection
