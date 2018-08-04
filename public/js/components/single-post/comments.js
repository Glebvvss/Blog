(function( $ ) {
  $(document).ready(function() {

    const
        $idPost           = $('#blog-post').attr('post-number'),
        $document         = $(document),
        $commentsElement  = $('#comments');

    //initialization component function call at the end of the module
    const initComponent = () => {
      $.ajax({
        url: '/get-comments',
        type: 'GET',
        data: {
          idPost: $idPost
        },
        success: function(response) {
          $commentsElement.html(response);
          initEvents();
        }
      });
    };

    //all functions of initialization events have have postfix named Event
    const initEvents = () => {
      showSubCommentFormEvent();
      hideSubCommentFormEvent();
      dropCommentEvent();
      addCommentEvent();
    }

    const $headersAjax = () => {
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('#token').attr('token-value')
        }
      });
    };

    const textComment = (idParentComment) => {
      if ( idParentComment == 0 ) {
        return $('#main-comment').val();
      }
      return $('#subcomment-by-' + idParentComment).val();
    };

    const showSubCommentFormEvent = () => {
      $('.reply').click(function(e) {
        e.preventDefault();
        let idComment = $(this).attr('id-comment-form-show');
        $('#show-form-' + idComment).show();              
      });
    };

    const hideSubCommentFormEvent = () => {
      $document.mouseup(function (e) {
        let container = $('.sub-comment-form');      
        if (container.has(e.target).length === 0) {
          container.hide();
        }
      });
    };  

    const addCommentEvent = () => {
      $('.add-btn-comment').click(function(e) {
        e.preventDefault();
        let 
            idParentComment = $(this).attr('id-parent-comment'),
            comment = textComment(idParentComment);

        $headersAjax();
        $.ajax({
          url: '/add-comment',
          type: 'POST',
          data: {
            idParentComment: idParentComment,
            comment: comment,
            postId: $idPost,
          },
          success: function() {
            initComponent();
          }
        });
      });
    };

    const dropCommentEvent = () => {
      $('.delete-comment').click(function(e) {
        e.preventDefault();
        let idComment = $(this).attr('id-delete-comment');

        $headersAjax();
        $.ajax({
          url: '/drop-comment',
          type: 'POST',
          data: {
            idComment
          },
          success: function() {
            initComponent();
          }
        });
      });
    };

    //defaulr init component start
    initComponent();
  });
})( jQuery );