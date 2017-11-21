

<div class="blog-post" style="background:#e6f7ff;">

  <h2 class="blog-post-title">
    <a href="/posts/{{ $post->id }}">
      {{ $post->title }}
    </a>
  </h2>

  <hr>
  <p class="blog-post-meta">
    {{ $post->user->name }} on
    <i>{{ $post->updated_at->toFormattedDateString() }} at {{ $post->updated_at->format('g:i:s A') }}</i>
  </p>
  <p>
    {{ $post->body }}
  </p>
  <br>
  <div class="text-right h5">
    <a href="/posts/{{ $post->id }}">
      <!-- number of tags -->
      @if( $post->countTags() == 0 )
        no tags
      @endif
      @if( $post->countTags() == 1 )
        {{ $post->countTags() }} tag
      @endif
      @if( $post->countTags() > 1 )
        {{ $post->countTags() }} tags
      @endif

      <br>
      
      <!-- number of comments -->
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