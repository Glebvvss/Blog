<div id="list-of-posts">
  @foreach( $posts as $post )
  <div class="post-preview">
    <a href="/single-post/{{ $post->id }}">
      <h2 class="post-title">
        {{ ucfirst($post->title) }}
      </h2>
      <h3 class="post-subtitle">
        {{ ucfirst($post->sub_title) }}
      </h3>
    </a>
    <p class="post-meta">Posted by
      <a href="#">{{ $post->user->name }}</a>
      on {{ $post->date_post }}
    </p>
  </div>
  <hr>
  @endforeach

  <div class="clearfix">
    <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
  </div>
</div>