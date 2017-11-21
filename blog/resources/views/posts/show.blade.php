@extends ('layouts.master')

@section('pagename')
<div>Posts<div>
<a href="/posts" class="btn-primary text-white h5" style="padding:6px;">
			Back
</a>
@endsection

@section('content')
	<div class="col-sm-8 blog-main">

		<h1>{{ $post->title }}</h1>

		{{ $post->body }}

		<br><br>

		<div>
			@if (count($post->tags))
					@foreach ($post->tags as $tag)
							<a href="/posts/tags/{{ $tag->name }}">#{{ $tag->name }}</a>
					@endforeach
			@endif

			<div class="text-right h4 text-primary">
				<u>
      			@if( $post->countTags() == 0 )
        			no tags
      			@endif
      			@if( $post->countTags() == 1 )
        			{{ $post->countTags() }} tag
      			@endif
			    @if( $post->countTags() > 1 )
			    	{{ $post->countTags() }} tags
			    @endif
				</u>
			</div>
		</div>
		<hr>
		<div class="comments">
			<div class="text-right h4 text-primary">
				<u>
      			@if( $post->countComments() == 0 )
        			no comments
      			@endif
      			@if( $post->countComments() == 1 )
        			{{ $post->countComments() }} comment
      			@endif
			    @if( $post->countComments() > 1 )
			    	{{ $post->countComments() }} comments
			    @endif
				</u>
			</div>

			<ul class="list-group">
			@foreach ( $post->comments as $comment )
				<li class="list-group-item">
					<i>
						{{ $comment->created_at->diffForHumans() }}
					</i>
					<br>
					<strong>
						{{ $comment->user->name }}:&nbsp;
					</strong>
					{{ $comment->body }}
				</li>
			@endforeach
			</ul>
		</div>

		{{-- Add a comment--}}
		@if( Auth::check() )
		<hr>
		<div class="card">
			<div class="card-block">
				<form method="POST" action="/posts/{{ $post->id }}/comments">
					{{ csrf_field() }}

					<div class="form-group">
						<textarea name="body" placeholder="Your comment here." class="form-control" required></textarea>
					</div>
					
					<div class="form-group">
						<button type="submit" class="btn btn-primary">Add Comment</button>
					</div>
				</form>
				@include ('layouts.errors')
			</div>
		</div>
		@else
		<div class="h4"><a href="\login">Login</a> to leave a comment!</div>
		@endif
	</div>
@endsection