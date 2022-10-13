@extends('layouts.app')

@section('content')


<div class="mdb-page-content page-intro">
    <div class="px-3 py-5">
        <div class="container row justify-content-center py-5">
            <div class="card col-md-8">
                <div class="m-3">
                    <p class="h2">
                        Create a Task
                        <a href="{{ url('/') }}" class="btn btn-success float-end">Back</a>
                    </p>
                </div>
                <div class="card-body">
                    <form method="POST" class="appForm" action="{{ route('task.store') }}">
                        @csrf
                        <div class="row">
        
                            <div class="col-12 form-group">
                                <div class="form-outline mb-4">
                                    <input type="text" id="name" name="name" class="form-control form-control-sm"/>
                                    <label class="form-label" for="name">Task Name</label>
                                </div>
                            </div>

                            <div class="col-md-6 form-group">
                                <div class="form-outline datepicker-disable-past mb-4">
                                    <input type="date" class="form-control form-control-sm" id="due_date" name="due_date" value="{{ date('Y-m-d') }}"/>
                                    <label for="due_date" class="form-label">Select a date</label>
                                </div>
                            </div>

                            <div class="col-md-6 form-group">
                                <div class="form-outline mb-4">
                                    <select name="status" class="form-select" aria-label="status">
                                        @foreach($status as $stat)
                                            <option value="$stat">{{ $stat }}</option>
                                        @endforeach
                                    </select>
                                    <label class="form-label" for="status">Status</label>
                                </div>
                            </div>

                            <div class="col-md-12 form-group">
                                <label class="form-label" for="priority">Priority</label>
                                <div class="range">
                                    <input type="range" class="form-range" min="1" max="10" value="1" id="priority" name="priority" />
                                </div>
                            </div>
        
                            <div class="col-12 form-group text-center mt-4 mb-3">
                                <p class="h5">
                                    <i class="fas fa-tasks"></i> Sub Tasks
                                </p>
                            </div>
        
                            <div class="col-12 itemsContainer">
                                
                                <div class="input-group item">
                                    <div class="md-form input-group mt-0 mb-3">
                                        <div class="input-group-text border-0">
                                            <input class="form-check-input mt-0" type="checkbox" id="chkbx" />
                                        </div>
                                        <input type="text" name="items[]" id="items" placeholder="New Task" aria-label="New Task" class="form-control rounded-start"/>
                                        <button class="btn btn-secondary deleteItem--btn" type="button">
                                            Delete
                                        </button>
                                    </div>
                                </div>

                            </div>
        
                            <div class="col-12">
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
        
                        <button class="btn btn-success btn-block">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection