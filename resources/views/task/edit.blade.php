@extends('layouts.navbar')
@extends('layouts.app')
@section('content')
		
	<div class="container my-4">
		<div class="card p-3">
			<div class="class m-3">
				<p class="h2">
					Edit Task
					<a href="{{ url('/') }}" class="btn btn-sm btn-success float-end">Back</a>
				</p>
			</div>
			<div class="card-body">
		    	<form method="POST" class="appForm" action="{{ route('task.update',$task->id) }}">
		    		@csrf
		    		@method('PUT')
		    		<div class="row">
						<div class="col-12 form-group">
							<div class="md-form">
								<input type="text" id="name" name="name" class="form-control form-control-sm"  value="{{ $task->name }}">
								<label for="name" class="">Task Name</label>
							</div>
						</div>
						<div class="col-md-6 form-group">
							<div class="md-form md-outline input-with-post-icon datepicker">
								<input placeholder="Due Date" type="date" id="due_date" name="due_date" class="form-control" value="{{ $task->due_date->format('Y-m-d') }}">
								<label for="due_date">Due Date</label>
							</div>
						</div>
						<div class="col-md-6 form-group">
							<div class="md-form">
								<input type="text" id="status" name="status" value="{{ $task->status }}" class="form-control form-control-sm">
								<label for="status" class="">Status</label>
							</div>
						</div>

						<div class="col-md-12 form-group">
							<div class="md-form">
								<input type="number" id="priority" name="priority" min="1" value="{{ $task->priority }}" class="form-control form-control-sm">
								<label for="priority" class="">Priority</label>
							</div>
						</div>

		    			<div class="col-12 form-group text-center">
							<p class="h4">
								Sub Tasks:
							</p>
						</div>

		    			<div class="col-12 itemsContainer">

		    				@foreach ($task->items as $item)
								<div class="input-group mb-1 item">
									<div class="md-form input-group mt-0 mb-3">
										<div class="input-group-prepend">
											<div class="input-group-text md-addon">
											<input class="form-check-input" type="checkbox" value="" id="chkbx" >
											<label class="form-check-label" for="chkbx">
											</label></div>
										</div>
										<input type="text" name="items[]" class="form-control form-control-sm" id="items" value="{{ $item->title }}">
										<div class="input-group-append">
											<button class="btn btn-secondary btn-sm deleteItem--btn"
												type="button">Delete</button>
										</div>
									</div>
								</div>	
		    				@endforeach

		    				{{-- <div class="input-group mb-1 item">
								<div class="md-form input-group mt-0 mb-3">
									<div class="input-group-prepend">
										<div class="input-group-text md-addon">
										<input class="form-check-input" type="checkbox" value="" id="chkbx" >
										<label class="form-check-label" for="chkbx">
										</label></div>
									</div>
									<input type="text" name="items[]" class="form-control form-control-sm" id="items">
									<div class="input-group-append">
										<button class="btn btn-secondary btn-sm deleteItem--btn"
											type="button">Delete</button>
									</div>
								</div>
							</div> --}}
		    			</div>

		    			<div class="col-12">
		    				<button class="btn btn-outline-success btn-sm addItem--btn"  type="button">Add Item</button>
		    				<button class="btn btn-outline-danger btn-sm removeSelected--btn"  type="button" style="display: none;">Remove Selected</button>
		    			</div>

		    		</div>
		    		<div class="appForm--response my-2"></div>
		    		<button class="btn btn-success btn-sm float-end ">Update</button>
		    	</form>
			</div>
		</div>	
	</div>

@endsection