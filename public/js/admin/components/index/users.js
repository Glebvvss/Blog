$(document).ready(function() {
	getUserManager();
});

function getUserManager() {
	$.ajax({
		'url': '/admin/get-user-manager',
		'type': 'GET',
		'success': function(component) {
			$('#users').html(component);
		}
	});
}