$(document).ready(function() {

  let 
      firstIdPostPerPage = 0,
      countPostsPerPage  = 5;

  const 
      $container         = $('#posts'),
      $showMore          = $('#show-more');

  const showPosts = () => {
    $.ajax({
      url: '/get-posts',
      type: 'GET',
      data: {
        firstIdPostPerPage,
        countPostsPerPage
      },
      success(response) {
        if (response === '') {
          alert('No more posts!');
        }
        $container.append(response);
      }
    });
  };

  const showMore = () => {
    $showMore.on('click.posts', e => {
      e.preventDefault();
      firstIdPostPerPage += countPostsPerPage;
      showPosts();
    });
  };

  //init  
  showPosts();
  showMore();
  
});