(function( $ ){

  const 
      $document      = $(document),
      $postComponent = $('#posts');

  const initComponent = () => {
    $.ajax({
      url: '/admin/get-post-manager',
      type: 'GET',
      success: function(response) {
        $postComponent.html(response);
        initEvents();
      }
    });
  };

  const initEvents = () => {
    showDefaultBlockEvent();
    showSelectedBlockEvent();
    updatePostEvent();
    dropPostEvent();
    addPostEvent();
  };

  const showDefaultBlockEvent = () => {
    $('#new-post').show();
  };

  const showSelectedBlockEvent = () => {
    $('.select-block-btn').click(function() {
      $('.post-manager-block').hide();
      let selectedBlock = $(this).attr('link');
      $(selectedBlock).show();
    });
    //if clicked post
    selectSomePostEvent();
    //if clicked edit
    updatePostFormBlock();
  };

  const selectSomePostEvent = () => {
    $('.show-full-post').click(function(e) {
      e.preventDefault();
      let idPost = $(this).attr('link');
      $.ajax({
        url: '/admin/get-post',
        type: 'GET',
        dataType: 'json',
        data: { idPost },
        success: function(response) {
          setPostDetailsElements(response);
          showSelectedPost();
        }
      });    
    });
  };

  const showSelectedPost = () => {
    $('.post-manager-block').hide();
    $('#selected-post').show();
  }

  const $headerAjax = () => {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('#token').attr('token-value')
      }
    });
  };

  const setPostDetailsElements = (post) => {
    $('#selected-title-post').text(post.title);
    $('#selected-subtitle-post').text(post.subTitle);
    $('#selected-post-text').text(post.post);

    $('#update-form-title-field').val(post.title);
    $('#update-form-subtitle-field').val(post.subTitle);
    $('#update-form-post-field').val(post.post);
    $('#update-form-id-field').val(post.id);

    $('#drop-post-btn').attr('id-post', post.id);
  };

  const updatePostFormBlock = () => {
    $('#to-edit-current-post').click(function(e) {
      e.preventDefault();
      $('.post-manager-block').hide();
      $('#selected-post-edit').show();
    }); 
  };

  const addPostEvent = () => {
    $('#add-btn-post').click(function(e) {
      e.preventDefault();
      let 
          title = $('#add-post-title').val();
          subTitle = $('#add-post-subtitle').val();
          post = $('#add-post-text').val();      

      $headerAjax();
      $.ajax({
        url: '/admin/add-post',
        type: 'POST',
        data: {
          title,
          subTitle,
          post
        },
        success: function() {
          initComponent();
        }
      });
    });
  };

  const updatePostEvent = () => {
    $('#update-post-btn').click(function(e) {
      e.preventDefault();
      let 
          id = $('#update-form-id-field').val();
          title = $('#update-form-title-field').val();
          subTitle = $('#update-form-subtitle-field').val();
          post = $('#update-form-post-field').val();

      $headerAjax();
      $.ajax({
        url: '/admin/update-post',
        type: 'POST',
        data: {
          id,
          title,
          subTitle,
          post
        },
        success: function() {
          initComponent();
        }
      });
    });
  };

  const dropPostEvent = () => {
    $('#drop-post-btn').click(function(e) {
      e.preventDefault();
      let dropConfirm = confirm("Are You Sure?");

      if ( dropConfirm == false ) {
        return;
      }

      let id = $('#drop-post-btn').attr('id-post');
      $headerAjax();
      $.ajax({
        url: '/admin/drop-post',
        type: 'POST',
        data: { id },
        success: function() {
          initComponent();
        }
      });
    });
  };    

  //
  $(document).ready(function() {
    initComponent();
  });

})( jQuery );