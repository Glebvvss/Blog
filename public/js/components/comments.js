$('document').ready(function() {
	showComments();
});

function showComments() {
	var idPost = $('#blog-post').attr('post-number');
	$.ajax({
		'url': '/get-comments-component',
		'type': 'GET',
		'data': {
			'idPost': idPost
		},
		'success': function(component) {
			$('#comments').html(component);
			hideAndShowSubCommentForm();
			dropComment();
			addComment();
		}
	});
}

function hideAndShowSubCommentForm() {
	$('.reply').click(function(e) {
		e.preventDefault();
		var idComment = $(this).attr('id-comment-form-show');
		$('#show-form-' + idComment).show();							
	});

	$(document).mouseup(function (e) {
		var container = $('.sub-comment-form');
			if (container.has(e.target).length === 0) {
				container.hide();
			}
	});
}

function addComment() {
	$('.add-btn-comment').click(function(e) {
		e.preventDefault();
		var idParentComment = $(this).attr('id-parent-comment');
		var comment = textComment(idParentComment);
		var postId = $('#blog-post').attr('post-number');

		$.ajaxSetup({
			headers: {
					'X-CSRF-TOKEN': $('#token').attr('token-value')
			}
		});		

		$.ajax({
			'url': '/add-comment',
			'type': 'POST',
			'data': {
				'idParentComment': idParentComment,
				'comment': comment,
				'postId': postId,
			},
			'success': function() {
				showComments();
			}
		});
	});
}

function dropComment() {
	$('.delete-comment').click(function(e) {
		e.preventDefault();
		var idComment = $(this).attr('id-delete-comment');		

		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('#token').attr('token-value')
			}
		});

		$.ajax({
			'url': '/drop-comment',
			'type': 'POST',
			'data': {
				'idComment': idComment
			},
			'success': function() {
				showComments();
			}
		});

	});
}

function textComment(idParentComment) {
	if ( idParentComment == 0 ) {
		return $('#main-comment').val();
	}
	return $('#subcomment-by-' + idParentComment).val();
}