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

/*
$(document).ready(function() {
  getPostManager();
});

function init() {    
  showSelectedBlock();
  getFullPost();
  updatePost();
  dropPost();
  addPost();
}

function getPostManager() {
  $.ajax({
    'url': '/admin/get-post-manager',
    'type': 'GET',
    'data': {
      'pageName': 'index'
    },
    'success': function(component) {
      $('#posts').html(component);      
      init();
    }
  });
}

function showSelectedBlock() {
  showDefaultBlock();
  showBlockByClick();
}

function getFullPost() {
  $('.show-full-post').click(function(e) {
    e.preventDefault();
    var idPost = $(this).attr('link');
    $.ajax({
      'url': '/admin/get-post',
      'type': 'GET',
      'dataType': 'json',
      'data': {
        'idPost': idPost
      },
      'success': function(post) {
        setFullPostElements(post);
        showReadPostBlock();
        updatePostFormBlock();
      }
    });
  });
}

function showReadPostBlock(post) {
  $('.post-manager-block').hide();
  $('#selected-post').show();
}

function updatePostFormBlock() {
  $('#to-edit-current-post').click(function(e) {
    e.preventDefault();
    $('.post-manager-block').hide();
    $('#selected-post-edit').show();
  }); 
}

function showDefaultBlock() {
  $('#new-post').show();
}

function showBlockByClick() { 
  $('.select-block-btn').click(function() {
    $('.post-manager-block').hide();
    var selectedBlock = $(this).attr('link');
    $(selectedBlock).show();
  });
}

function setFullPostElements(post) {
  $('#selected-title-post').text(post.title);
  $('#selected-subtitle-post').text(post.subTitle);
  $('#selected-post-text').text(post.post);

  $('#update-form-title-field').val(post.title);
  $('#update-form-subtitle-field').val(post.subTitle);
  $('#update-form-post-field').val(post.post);
  $('#update-form-id-field').val(post.id);

  $('#drop-post-btn').attr('id-post', post.id);
}

function addPost() {
  $('#add-btn-post').click(function(e) {
    e.preventDefault();
    var title = $('#add-post-title').val();
    var subTitle = $('#add-post-subtitle').val();
    var post = $('#add-post-text').val();

    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('#token').attr('token-value')
      }
    });   

    $.ajax({
      'url': '/admin/add-post',
      'type': 'POST',
      'data': {
        'title': title,
        'subTitle': subTitle,
        'post': post
      },
      'success': function() {
        getPostManager();
      }
    });
  });
}

function updatePost() {
  $('#update-post-btn').click(function(e) {
    e.preventDefault();
    var id = $('#update-form-id-field').val();
    var title = $('#update-form-title-field').val();
    var subTitle = $('#update-form-subtitle-field').val();
    var post = $('#update-form-post-field').val();

    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('#token').attr('token-value')
      }
    });

    $.ajax({
      'url': '/admin/update-post',
      'type': 'POST',
      'data': {
        'id': id,
        'title': title,
        'subTitle': subTitle,
        'post': post
      },
      'success': function() {
        getPostManager();
      }
    });
  });
}

function dropPost() {
  $('#drop-post-btn').click(function(e) {
    e.preventDefault();

    let dropConfirm = confirm("Are You Sure?");

    if ( dropConfirm == false ) {
      return;
    }

    let id = $('#drop-post-btn').attr('id-post');
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('#token').attr('token-value')
      }
    });   

    $.ajax({
      'url': '/admin/drop-post',
      'type': 'POST',
      'data': {
        'id': id
      },
      'success': function() {
        getPostManager();
      }
    });
  });
}*/