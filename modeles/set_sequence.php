<?php
function set_sequence($sequence, $video) {
    global $bdd;       
    
	$req = $bdd->prepare('INSERT INTO sequences (id_video, debut, fin) VALUES (:id_video, :debut, :fin)');
	$req->bindParam(':id_video', $video['id']);
	$req->bindParam(':debut', $sequence['debut']);
	$req->bindParam(':fin', $sequence['fin']);
	$req->execute();
	
	$id_sequence = $bdd->lastInsertId();
	
	return $id_sequence;
}
