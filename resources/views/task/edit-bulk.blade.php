<form action="{{ route('task.edit.bulk.submit') }}" class="appForm">
	@csrf
	@method('PUT')
	<div class="row">
		@foreach ($tasks as $task)
			<div class="card-header">{{ $task->name }}</div>
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
					<option value="1">low</option>
					<option value="2">normal</option>
					<option value="3">medium</option>
					<option value="4">high</option>
				</select>
				<label class="form-label select-label">Current Priority Level: {{ $task->priority }}</label>
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