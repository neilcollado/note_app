<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <form method="POST" class="appForm" action="">
            @csrf
            @method('DELETE')
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Task</h5>
                </button>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name = "task_delete_id" id = "task_delete">
            <h5> Are you sure you want to delete this Task with all its subtasks? </h5>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger">Yes Delete</button>
            </div>
        </form>
    </div>
  </div>
</div>