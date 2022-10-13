@extends('layouts.app')

@section('content')

<div class="mdb-page-content page-intro">
  <div class="gradient-custom-outer shadow-5" data-mdb-toggle="animation" data-mdb-animation-start="onLoad" data-mdb-animation="fade-in-down"></div>
  <div class="gradient-custom-inner shadow-5 rounded-5" data-mdb-toggle="animation" data-mdb-animation-start="onLoad" data-mdb-animation="zoom-in"></div>
  <div class="px-3 py-5">
    <div class="container w-75" style="margin-top: -300px;" data-mdb-toggle="animation" data-mdb-animation-start="onLoad" data-mdb-animation="fade-in-up">
        <div class="card" style="width: 100%;">
          <div class="card-header">
            <h2 class="card-title text-center pt-1">{{ $task->name }}</h2>
          </div>
          <div class="card-body pb-0">
              <dl class="row">
                <section class="table-responsive-sm">
                    <table class="table table-hover table-sm">
                      <tbody>
                        <tr>
                          <th class="text-end" scope="row">Priority Number</th>
                          <td><span class="text-success"> <span>{{ $task->priority }}</span> </span></td>
                        </tr>
                        <tr>
                          <th class="text-end" scope="row">Due Date</th>
                          <td><span class="text-success"> <span>{{ $task->due_date }}</span> </span></td>
                        </tr>
                        <tr>
                          <th class="text-end" scope="row">Status</th>
                          <td><span class="text-success"> <span>{{ $task->status }}</span> </span></td>
                        </tr>
                        <tr>
                          <th class="text-end" scope="row">Created by</th>
                          <td><span class="text-success"> <span>{{ $user->name }}</span> </span></td>
                        </tr>
                        <tr>
                          <th class="text-end" scope="row">Sub Tasks</th>
                          <td><span class="text-success"> <span>
                            <ol class="list-group list-group-light list-group-numbered">
                                @foreach ($task->items as $key => $item)
                                  <li class="list-group-item border-0 bg-transparent p-0">{{ $item->title }}</li>
                                @endforeach
                            </ol>
                          </span> </span></td>
                        </tr>
                      </tbody>
                    </table>
                </section>
              </dl>
          </div>
          <div class="card-footer">
            <a href="{{ url('/') }}" class="btn btn-sm btn-block float-end text-white" style="background-color: #E57373;">Return</a>
          </div>
        </div>
      </div>
  </div>
</div>



@endsection



