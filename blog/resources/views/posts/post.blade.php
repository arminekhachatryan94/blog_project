

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
</div>