<?php
function set_video($titre_video, $source) {
	global $bdd;
	
		$req = $bdd->prepare('INSERT INTO videos (titre, src) VALUES (:titre, :source)');
		$req->bindParam(':titre', $titre_video);
		$req->bindParam(':source', $source);
		$req->execute();
}
