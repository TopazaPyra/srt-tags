<?php
function get_video($titre_video) {
    global $bdd;
    
    $req = $bdd->prepare('SELECT * FROM videos WHERE titre = :titre');
    $req->bindParam(':titre', $titre_video);
    $req->execute();
    $resultat = $req->fetch();
    
    return $resultat;
}
