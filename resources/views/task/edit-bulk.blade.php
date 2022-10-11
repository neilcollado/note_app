<form action="{{ route('task.edit.bulk.submit') }}" class="appForm">
	@csrf
	@method('PUT')
	<div class="row">
		@foreach ($tasks as $task)
			<div class="card-header">{{ $task->name }}</div>
			<div class="form-group">
				<div class="form-outline mb-4">
					<input type="text" id="status" name="status[{{ $task->id }}]" class="form-control form-control-sm" value="{{ $task->status }}"/>
					<label class="form-label" for="status">Status</label>
				</div>
			</div>

			<div class="form-group">
				<label class="form-label" for="priority">Current Priority Level: {{ $task->priority }}</label>
				<div class="range">
					<input type="range" class="form-range" min="1" max="10" id="priority" name="priority[{{ $task->id }}]" value="{{ $task->priority }}"/>
				</div>
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