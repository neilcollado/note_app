@extends('layouts.app')

@section('content')
@include('partials.alerts')

<div class="mdb-page-content page-intro">
	<div class="px-3 py-5">
    <h1>show task page</h1>
    <p>{{$teamtask}}</p>

    <form method="POST" action="{{ route('teamtasks.update', $teamtask->id) }}">
      @csrf
      @method('PUT')

      <div class="col-md-4 form-group mb-4">
        <select name="status" class="select" aria-label="status">
          <option value="{{ $teamtask->status }}" selected>{{ $teamtask->status }}</option>
          @foreach($otherstatus as $os) 
            <option value="{{$os}}">{{$os}}</option>
          @endforeach
        </select>
        <label class="form-label select-label" for="status">Status</label>
      </div>
      <div class="col-sm mb-2">
        <button class="btn btn-primary">Update</button>
      </div>
    </form>

    <!-- delete button -->
    <form method="POST" action="{{ route('teamtasks.destroy', $teamtask->id) }}">
      <input name="_method" type="hidden" value="DELETE">
      {{ csrf_field() }}
      <button type="submit" class="btn-danger">
        Delete Team
      </button>
    </form>
	</div>
</div>

@endsection
