$(document).ready(function() {
	getMenuManager();
});

function getMenuManager() {
	$.ajax({
		'url': '/admin/get-menu-manager',
		'type': 'GET',
		'success': function(component) {
			$('#menu').html(component);
		}
	});
}