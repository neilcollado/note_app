@extends('layouts.app')

@section('content')
@include('partials.alerts')

<div class="mdb-page-content page-intro">
	<div class="px-3 py-5">
    <h1>Members Page </h1>

    <ul>
      @foreach($members as $m)
      <li>
				{{$m->user_id}}
				{{$m->name}}
				{{$m->email}}
				@if (!$m->isOwner) 
					<form method="POST" action="{{ route('members.destroy', $m->member_id) }}">
						<input name="_method" type="hidden" value="DELETE">
						{{ csrf_field() }}
						<button type="submit">
							Remove
						</button>
					</form>
				@endif
      </li>
      @endforeach
    </ul>
		<div>
			<form method="POST" action="{{ route('members.store', $_SERVER['QUERY_STRING']); }}">
				@csrf
				<h2>add a new member</h2>
				<span>email:</span> <input type="email" name="email" id="email" placeholder="enter member's email">
				<button>Submit</button>

				
				@if(Session::has('errors'))
					@foreach ($errors as $err) 
						<p class="text-danger">{{ $err }}</p>
					@endforeach
				@endif
      
			</form>
		</div>
    
	</div>
</div>

@endsection
