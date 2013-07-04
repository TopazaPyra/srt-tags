<?php
function set_tag($tag) {
	global $bdd;
	
	$req = $bdd->prepare('INSERT INTO tags (tag) VALUES (:tag)');
	$req->bindParam(':tag', $tag);
	$req->execute();
	
	$id_tag = $bdd->lastInsertId();
	
	return $id_tag;
}
