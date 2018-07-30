@extends('layouts.main')

@section('content')
<div class="container content-top">
  <div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">

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

      <!-- Pager -->
      <div class="clearfix">
        <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
      </div>
    </div>
  </div>
</div>
<hr>
@endsection