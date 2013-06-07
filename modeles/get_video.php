<?php
function get_video($nom_fichier) {
    global $bdd;
    
    $req = $bdd->prepare('SELECT * FROM videos WHERE nom_fichier = :nom_fichier');
    $req->bindParam(':nom_fichier', $nom_fichier);
    $req->execute();
    $resultat = $req->fetch();
    
    return $resultat;
}
