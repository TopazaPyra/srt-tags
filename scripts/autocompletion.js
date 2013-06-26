$(document).ready(function() {
	$("#tag").typeahead({
		minLength: 2,
		source: function (query, process) {
			return $.getJSON(
				'../scripts/ajax/recherche_tags.php',
				{ query: query },
				function (data) {
					return process(data);
				});
		}
	});             
});
