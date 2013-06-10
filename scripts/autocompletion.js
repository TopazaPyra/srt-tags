$(document).ready(function() {
	$("#tag").autocomplete({
		source: "../scripts/ajax/recherche_tags.php",
		minLength: 2,
	});                
});
