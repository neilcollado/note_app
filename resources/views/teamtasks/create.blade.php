@extends('layouts.app')

@section('content')
@include('partials.alerts')

<div class="mdb-page-content page-intro">
	<div class="px-3 py-5">
    <h1>Creat A Team Task</h1>
    <form method="POST" action="{{ route('teamtasks.store', $_SERVER['QUERY_STRING']); }}">
      @csrf
      <div>
        <label for="task_name">Task Name</label>
        <input type="text" name="task_name" id="task_name">
      </div>

      @if(Session::has('errors'))
        @foreach ($errors as $err) 
          <p class="text-danger">{{ $err }}</p>
        @endforeach
      @endif

      @if(Session::has('msg'))
        <p class="text-success">{{ session('msg') }}</p>
      @endif
      
      <button>submit</button>
    </form>
	</div>
</div>

@endsection
