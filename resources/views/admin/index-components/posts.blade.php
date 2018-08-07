<div id="post-manager">
  <!-- token for post forms -->
  <span id="token" token-value="{{ csrf_token() }}"></span>
  <!-- tiken for post forms -->
  <div class="header-component">
    <h3 class="text-center header-caption">Posts</h3>
  </div>

  <div class="component-body">
    <div class="menu-container-post">
      <div class="menu-elements">
        <button class="btn select-block-btn active" link="#new-post">New Post</button>
        <button class="btn select-block-btn" link="#list-of-posts">All Posts</button>
      </div>
    </div>

    <!-- creace new post -->
    <div id="new-post" class="post-manager-block">
      <p class="text-center"><b>New post</b></p>
      <form method="GET" action="/admin/add-post">
        
        <div class="form-group">
          <label>Title</label>
          <input type="text" class="form-control" name="title" id="add-post-title" name="title">
        </div>

        <div class="form-group">
          <label>Sub Title</label>
          <input type="text" class="form-control" name="subTitle" id="add-post-subtitle" name="subTitle">
        </div>
        
        <div class="form-group">
          <label for="comment">Text</label>
          <textarea class="form-control" rows="10" name="post" id="add-post-text" name="post"></textarea>
        </div> 

        <button class="btn btn-primary" id="add-btn-post">Add Post</button>
      </form>
    </div>
    <!-- end of create new post -->

    <!-- list of post -->
    <div id="list-of-posts" class="post-manager-block">
      <p class="text-center"><b>Posts</b></p>
      <table class="table-striped w-100" id="paginate-page">

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

      <div class="flexbox"><div id="paginator"></div></div>

      <script>
        $(function() {
          $('#paginator').pagination({
              items: {{ $countPosts }},
              itemsOnPage: 10,
              cssStyle: 'light-theme',
              onPageClick: function(pageNumber) {
                getPostsPerPage(pageNumber);
              }
          });
        });
        function getPostsPerPage(pageNumber) {
          $.ajax({
            url: '/admin/posts-pagination',
            type: 'GET',
            data: {
              pageNumber: pageNumber
            },
            success: function(page) {
              $('#paginate-page').html(page);
              getFullPost();
            }
          });
        }
      </script>
    </div>
    <!-- end list of post -->

    <!-- read selected post -->
    <div id="selected-post" class="post-manager-block">    
      <h4 id="selected-title-post"></h4>
      <span>(<a href="" id="to-edit-current-post">edit</a>, <a href="" id="drop-post-btn" id-post="">delete</a>)</span>
      <p id="selected-subtitle-post"></p>
      <p id="selected-post-text"></p>
    </div>
    <!-- end read selected post -->

    <!-- edit selected post -->
    <div id="selected-post-edit" class="post-manager-block">
      <h5>Edit Selected Post</h5>
      <form method="POST" action="/admin/update-post">
        
        <input type="hidden" id="update-form-id-field">
        <div class="form-group">
          <label>Title</label>
          <input type="text" class="form-control" id="update-form-title-field" value="">
        </div>

        <div class="form-group">
          <label>Sub Title</label>
          <input type="text" class="form-control" id="update-form-subtitle-field" value="">
        </div>
        
        <div class="form-group">
          <label for="comment">Post</label>
          <textarea class="form-control" rows="10" id="update-form-post-field" value=""></textarea>
        </div> 

        <input type="submit" class="btn btn-primary" id="update-post-btn">
      </form>
    </div>
  </div>
  <!-- end edit selected post -->
</div>