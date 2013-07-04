<?php	
include_once('../modeles/connexion.php');
include_once('../modeles/get_sequences_by_tag.php');

if (isset($_POST['tag'])) { 	
	$sequences = get_sequences_by_tag($_POST['tag']);

	if ($sequences) {
		$resultat = $sequences;
	} else {
		$resultat = 'Aucune vidéo ne correspond à ce tag.';
	}

	echo json_encode($resultat);
}
