<?php
function get_sequences($id_video) {
    global $bdd;
    
    $req = $bdd->prepare('SELECT * FROM sequences WHERE id_video = :id_video');
    $req->bindParam(':id_video', $id_video);
    $req->execute();
    $resultat = $req->fetchAll();
    
    return $resultat;
}
