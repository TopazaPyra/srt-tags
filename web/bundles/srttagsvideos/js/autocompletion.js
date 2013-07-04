$(document).ready(function() {
	$("#tag").typeahead({
		minLength: 2,
		source: function (query, process) {
			return $.getJSON(
				'search',
				{ query: query },
				function (data) {
					return process(data);
				});
		}
	});             
});
