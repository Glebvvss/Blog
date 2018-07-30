$(document).ready(function() {
    showListOfPosts();
});

function showListOfPosts() {
    $.ajax({
        'url': '/get-list-of-posts-component',
        'type': 'GET',
        'success': function(component) {
            $('#list-of-posts').html(component);
        }
    });
}