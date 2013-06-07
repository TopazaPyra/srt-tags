<?php
function set_video($titre_video, $nom_fichier, $format_video) {
	global $bdd;
	
		$req = $bdd->prepare('INSERT INTO videos (titre, nom_fichier, format) VALUES (:titre, :nom_fichier, :format)');
		$req->bindParam(':titre', $titre_video);
		$req->bindParam(':nom_fichier', $nom_fichier);
		$req->bindParam(':format', $format_video);
		$req->execute();
}
