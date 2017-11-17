@extends ('layouts.master')

@section('content')
	<div class="col-sm-8 blog-main">
		<br>
        @foreach ($tasks as $task)
            <li>
            	<a href="/tasks/{{ $task->id }}" class="h5">
            		{{ $task->body }}
            	</a>
            </li>
        @endforeach
    </div>
@endsection