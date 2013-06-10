<?php
function get_tags($tag) {
	global $bdd;
	
	$term = '%'.$tag.'%';
	$req = $bdd->prepare('SELECT tag FROM tags WHERE tag LIKE :tag');
	$req->bindParam(':tag', $term);
	$req->execute();
	$resultat = $req->fetchAll(PDO::FETCH_ASSOC);
		
	return $resultat;
}
