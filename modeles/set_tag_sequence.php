<?php
function set_tag_sequence ($id_tag, $id_sequence) {
	global $bdd;
	
	$req = $bdd->prepare('INSERT INTO tags_sequences (id_tag, id_sequence) VALUES (:id_tag, :id_sequence)');
	$req->bindParam(':id_tag', $id_tag);
	$req->bindParam(':id_sequence', $id_sequence);
	$req->execute();
}
