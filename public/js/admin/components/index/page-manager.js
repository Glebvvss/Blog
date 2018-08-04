$(document).ready(function() {
	getPageManager();
});

function getPageManager() {
	$.ajax({
		'url': '/admin/get-page-manager',
		'type': 'GET',
		'data': {
			'pageName': 'index'
		},
		'success': function(component) {
			$('#pages').html(component);
		}
	});
}