<table class="table-striped" style="width: 100%;" id="paginate-page">

  @foreach($posts as $post)
  <tr class="paginate-element">
    <td>
      <a href="" link="{{ $post->id }}" class="show-full-post">{{ $post->id }}</a>
    </td>

    <td>
      <a href="" link="{{ $post->id }}" class="show-full-post">{{ ucfirst($post->title) }}</a>
    </td>

    <td>
      <a href="" link="{{ $post->id }}" class="show-full-post">{{ ucfirst($post->sub_title) }}</a>
    </td>

    <td>
      <a href="" link="{{ $post->id }}" class="show-full-post">{{ $post->date_post }}</a>
    </td>
  </tr>
  @endforeach

</table>