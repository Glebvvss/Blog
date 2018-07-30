@extends('layouts.main')

@section('content')
<article id="blog-post" post-number="{{ $post->id }}">
  <div class="container content-top-extention">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        {{ $post->post }}
      </div>
    </div>
  </div>	
</article>
<hr>

<div id="comments"></div>

@endsection