@extends('layouts.app')

@section('content')

<div class="mdb-page-content text-center page-intro">
  <div class="text-center">
    <section class="container">
      <div class="row justify-content-center">
        <div class="col-lg-11">
          <div class="card">
            <div class="color-custom-view"></div>
            <div class="card-header">
              <h2 class="card-title text-center text-uppercase pt-1">{{ $task->name }}</h2>
            </div>
            <div class="card-body pb-0">
                <dl class="row">
                  <section class="table-responsive-sm">
                      <table class="table table-hover table-sm">
                        <tbody>
                          <tr>
                            <th class="text-end" scope="row">Priority Number</th>
                            <td class="text-start"><span class="text-success"> <span>{{ $task->priority }}</span> </span></td>
                          </tr>
                          <tr>
                            <th class="text-end" scope="row">Due Date</th>
                            <td class="text-start"><span class="text-success"> <span> {{$task->due_date->format('Y-m-d')}} at {{$task->due_time->format('h:iA')}}</span> </span></td>
                            
                          </tr>
                          <tr>
                            <th class="text-end" scope="row">Status</th>
                            <td class="text-start"><span class="text-success"> <span>{{ $task->status }}</span> </span></td>
                          </tr>
                          <tr>
                            <th class="text-end" scope="row">Created by</th>
                            <td class="text-start"><span class="text-success"> <span>{{ $user->name }}</span> </span></td>
                          </tr>
                          <tr>
                            <th class="text-end" scope="row">Sub Tasks</th>
                            <td class="text-start"><span class="text-success"> <span>
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
              <a href="{{ url()->previous() }}" class="btn btn-sm btn-block float-end text-white" style="background-color: #E57373;">Return</a>
            </div>
          </div> 
        </div>
      </div>
    </section>
  </div>
</div>



@endsection



