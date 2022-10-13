


<form action="{{ route('task.edit.bulk.submit') }}" class="appForm">
	@csrf
	@method('PUT')
	<div class="row">
		@foreach ($tasks as $task)
			<div class="card-header">{{ $task->name }}</div>
			<div class="form-group">
				<div class="form-outline mb-4">
					<!-- <input type="text" id="status" name="status[{{ $task->id }}]" class="form-control form-control-sm" value="{{ $task->status }}"/>
					<label class="form-label" for="status">Status</label> -->
					<div class="col-md-6 form-group">
								<div class="form-outline mb-4">
									<label class="form-label" for="status">Status</label>
									<select name="status[{{ $task->id }}]" >
                                        <option value = "ongoing" {{ $task->status == "ongoing" ?'selected' : '' }}> Ongoing
										</option>
										<option value = "completed" {{ $task->status == "completed" ? 'selected' : '' }}> Completed
										</option>
                                        <option value = "missing" {{ $task->status == "missing" ? 'selected' : '' }}> Missing
										</option>
                                    </select>
								</div>
					</div>

				</div>
			</div>

			<!-- <div class="form-group">
				<label class="form-label" for="priority">Current Priority Level: {{ $task->priority }}</label>
				<div class="range">
					<input type="range" class="form-range" min="1" max="10" id="priority" name="priority[{{ $task->id }}]" value="{{ $task->priority }}"/>
				</div>
			</div> -->

			<div class="col-md-12 form-group">
                                <label class="form-label" for="priority">Priority</label>
                                    <select name="priority[{{ $task->id }}]">
										<option value = "low" {{ $task->priority == "low" ? 'selected' : '' }}> Low
										</option>
										<option value = "normal" {{ $task->priority == "normal" ? 'selected' : '' }}> Normal
										</option>
										<option value = "medium" {{ $task->priority == "medium" ? 'selected' : '' }}> Medium
										</option>
                                        <option value = "high" {{ $task->priority == "high" ? 'selected' : '' }}> High
										</option>
                                    </select>
                            </div>

		@endforeach
		<div class="col-12 my-2 appForm--response"></div>
		<div class="col-12">
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
			<button class="btn btn-dark btn-submit appForm--submit btn-sm float-right">Update</button>
		</div>
	</div>
</form>