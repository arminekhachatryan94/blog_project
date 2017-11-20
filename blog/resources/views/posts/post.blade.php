

<div class="blog-post" style="background:#e6f7ff;">

  <h2 class="blog-post-title">
    <a href="/posts/{{ $post->id }}">
      {{ $post->title }}
    </a>
  </h2>

  <hr>
  <p class="blog-post-meta">
    {{ $post->user->name }} on
    <i>{{ $post->updated_at->toFormattedDateString() }}</i>
    
  </p>
  <p>
    {{ $post->body }}
  </p>
  <br>
  <div class="text-right h5">
    <a href="/posts/{{ $post->id }}">
      @if( $post->countComments() == 0 )
        no comments
      @endif
      @if( $post->countComments() == 1 )
        {{ $post->countComments() }} comment
      @endif
      @if( $post->countComments() > 1 )
        {{ $post->countComments() }} comments
      @endif

    </a>
  </div>
</div>