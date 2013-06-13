<?php	
include_once('../modeles/connexion.php');
include_once('../modeles/get_sequences_by_tag.php');

function parser_sequences($sequences) {
	$liste_sequences = '[';	
	foreach($sequences as $ligne) {
		$liste_sequences .= '{' . 'src: "' . $ligne['src'] . '", in: ' . $ligne['debut'] . ', out: ' . $ligne['fin'] . '},';
	}
	$liste_sequences = substr($liste_sequences, 0, -1);
	$liste_sequences .= ']';
	
	return $liste_sequences;
};

if (isset($_POST['tag'])) {
	$resultat = get_sequences_by_tag($_POST['tag']);

	if ($resultat) {
		$liste_sequences = parser_sequences($resultat);
		
		$playlist = '$(document).ready(
						function() {
							var sequence = Popcorn.sequence(
								"container",' . $liste_sequences . ');
							$("video").width(800);
							$("video").height(640);
							sequence.play();
						}
					);';	
	}
}

include_once('../vues/liste_lecture.php');
