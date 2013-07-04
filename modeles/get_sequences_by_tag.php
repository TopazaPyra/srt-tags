<?php
function get_sequences_by_tag($tag) {
    global $bdd;
    
    $req = $bdd->prepare('SELECT videos.src, videos.titre, sequences.debut, sequences.fin
							FROM videos
							INNER JOIN sequences ON videos.id = sequences.id_video
							INNER JOIN tags_sequences ON sequences.id = tags_sequences.id_sequence
							INNER JOIN tags ON tags_sequences.id_tag = tags.id
							WHERE tags.tag LIKE :tag');
    $req->bindParam(':tag', $tag);
    $req->execute();
    $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
    
    return $resultat;
}
