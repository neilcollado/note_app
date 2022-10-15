@extends('layouts.app')

@section('content')

<div class="mdb-page-content page-intro">
    <div class="text-center px-5 py-5">
        <div style="margin-top: 7.5%">
            {{-- Display Card --}}
            <div class="row d-flex align-items-center justify-content-center">
                <div class="col-md-4">
					<p class="display-3 p-3 text-center">
						Manage your Task
                    </p>
                </div>
				<div class="col-md-7">
					<div class="card p-3" data-mdb-perfect-scrollbar="true" style="width: 100%; height: 460px;">
						<div class="card-body">
							<form method="POST" class="appForm" action="{{ route('task.update',$task->id) }}">
								@csrf
								@method('PUT')
								<div class="row">
									{{-- Task Name --}}
									<div class="col-12 form-group">
										<div class="form-outline mb-4">
											<input type="text" id="name" name="name" class="form-control" value="{{ $task->name }}"/>
											<label class="form-label" for="name">Task Name</label>
										</div>
									</div>
									
									{{-- Due Date --}}
									<div class="col-md-6 form-group">
										<div class="form-outline datepicker-disable-past mb-4">
											<input type="date" class="form-control" id="due_date" name="due_date" value="{{ $task->due_date->format('Y-m-d') }}"/>
											<label for="due_date" class="form-label">Select a date</label>
										</div>
									</div>
									
									{{-- Status --}}
									<div class="col-md-6 form-group mb-4">
										<select name="status" class="select" aria-label="status">
											<option value="{{ $task->status }}">{{ $task->status }}</option>
											<option value="completed">completed</option>
										</select>
										<label class="form-label select-label" for="status">Status</label>
									</div>
					
									{{-- Priority --}}
									<div class="col-md-12 form-group">
										<select class="select" name="priority">
											<option value="{{ $task->priority }}" hidden selected>{{ $task->priority }}</option>
											<option value="	">low</option>
											<option value="2">normal</option>
											<option value="3">medium</option>
											<option value="4">high</option>
										</select>
										<label class="form-label select-label">Current Priority Level: {{ $task->priority }}</label>
									</div>
									
									<div class="col-12 form-group text-center mt-4 mb-3">
										<p class="h5">
											<i class="fas fa-tasks"></i> Sub Tasks
										</p>
									</div>
						
									<div class="col-12 itemsContainer">
						
										@foreach ($task->items as $item)
											<div class="input-group item">
												<div class="md-form input-group mt-0 mb-3">
													<div class="input-group-text border-0">
														<input class="form-check-input mt-0" type="checkbox" id="chkbx" />
													</div>
													<input type="text" name="items[]" id="items" placeholder="New Task" aria-label="New Task" class="form-control rounded-start" value="{{ $item->title }}"/>
													<button class="btn btn-secondary deleteItem--btn" type="button">
														Delete
													</button>
												</div>
											</div>
										@endforeach
					
									</div>
						
									<div class="col-12 m-1">
										<div class="row">
											<div class="col-sm mb-2">
												<button class="btn btn-block btn-outline-success btn-sm addItem--btn" id="addItem--btn" type="button">
													Add Item
												</button>
											</div>
											<div class="col-sm mb-2">
												<button class="btn btn-block btn-outline-danger btn-sm removeSelected--btn" type="button" style="display: none;">
													Remove Selected
												</button>
											</div>
										</div>
									</div>
						
								</div>
								<div class="appForm--response my-2"></div>

								<div class="row">
                                    <div class="col-sm mb-2">
										<button class="btn btn-warning btn-block">Update</button>
                                    </div>
                                    <div class="col-sm mb-2">
										<a href="{{ url('/') }}" class="btn btn-danger btn-block">Cancel</a>
                                    </div>
                                </div>
							</form>
						</div>
					</div>
                </div>
			</div>
		</div>
	</div>
</div>
				
@endsection