@extends('layouts.app')

@section('content')
  
  <div class="container mt-5">

<div class="container mt-5 w-50 mx-auto">

<div class="card" style="width: 100%;">
  <div class="card-body">
    <h2 class="card-title">{{ $task->name }}</h2>
    <p class="card-text">Priority: {{ $task->priority }}</p>
    <p class="card-text">Due Date: {{ $task->due_date }}</p>
    <p class="card-text"> Status: {{ $task->status }} </p>
    <p class="card-text"> Created by: {{ $user->name }} </p>
  </div>

  <div class="card-body">
    <h5 class="card-title">Sub Tasks</h5>
    @foreach ($task->items as $item)
    <p class="card-text">{{ $item->title }}</p>
    
    @endforeach
  </div>
  <div class="card-body d-flex justify-content-end">
  <a href="{{ url('/') }}" class="btn btn-sm btn-success float-end">Back</a>
  </div>
</div>
</div>
  
@endsection



