<?php	
include_once('../../modeles/connexion.php');
include_once('../../modeles/get_tags.php');

$resultat = get_tags($_GET['term']);
	
foreach($resultat as $ligne) {
	foreach($ligne as $key=>$valeur) {
		$tableau[] = $valeur;
	}
}

echo json_encode($tableau);