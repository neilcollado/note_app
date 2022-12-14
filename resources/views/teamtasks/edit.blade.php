@extends('layouts.app')

@section('content')
@include('partials.alerts')

<div class="mdb-page-content text-center page-intro">
  <div class="text-center">
    <section class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6">
          <div class="card mb-4">
            <div class="color-custom-team"></div>
            <h2 class="bg-light p-2 border-top text-center border-bottom mb-3">View Team Task</h2>

            {{-- <p>{{$teamtask}}</p> --}}
            <section class="table-responsive-sm mt-0 pt-0">
              <table class="table table-hover table-sm mb-0">
                <thead class="bg-light">
                  <th class="text-start text-truncate" scope="row">Task Name</th>
                  <th class="text-start" scope="row">Status</th>
                  <th class="text-start" scope="row">Event</th>
                </thead>
                <tbody>
                  <tr>
                    <td class="text-start fs-6"> {{ $teamtask->name }} </td>
                    <td class="text-start">
                      <form method="POST" action="{{ route('teamtasks.update', $teamtask->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <select class="select" name="status">
                              <option value="{{ $teamtask->status }}" selected>{{ $teamtask->status }}</option>
                              @foreach($otherstatus as $os) 
                                <option value="{{$os}}">{{$os}}</option>
                              @endforeach
                            </select>
                            <label class="form-label select-label">Status</label>
                        </div>
                    </td>
                    <td>
                        <button class="btn btn-secondary">Update</button>
                      </form>
                    </td>

                  </tr>
                </tbody>
              </table>
            </section>

            <div class="card-body text-center">

              <div class="row">
                <div class="col-sm">

                  <!-- delete button -->
                  <form method="POST" action="{{ route('teamtasks.destroy', $teamtask->id) }}">
                    <input name="_method" type="hidden" value="DELETE">
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-block btn-danger">
                      Delete Task
                    </button>
                  </form>
                  
                </div>
                <div class="col-sm">
                  <a href="{{ route('teams.show', $teamtask->team_id) }}" class="btn btn-block btn-primary">{{ __('Return') }}</a>
                </div>

              </div>
              
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>

@endsection
