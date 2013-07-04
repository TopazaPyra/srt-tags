<?php
function get_tag($tag) {
	global $bdd;
	
	$req = $bdd->prepare('SELECT * FROM tags WHERE tag = :tag');
	$req->bindParam(':tag', $tag);
	$req->execute();
	$resultat = $req->fetch();
		
	return $resultat;
}
