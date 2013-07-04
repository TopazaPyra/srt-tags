<?php
function set_nom_fichier($fichier) {
    $nom_fichier = strtolower($fichier);
    $accents = array('à','â','ä','á','ã','å','é','è','ê','ë','î','ï','ì','í','ô','ö','ò','ó','õ','ø','ù','û','ü','ú','ÿ','ý','ç','ñ');
    $caractères_valides = array('a','a','a','a','a','a','e','e','e','e','i','i','i','i','o','o','o','o','o','o','u','u','u','u','y','y','c','n');
    $nom_fichier = str_replace($accents, $caractères_valides, $nom_fichier);
    $nom_fichier = str_replace(' ', '_', $nom_fichier);
    $nom_fichier = preg_replace('/[\W]/', '', $nom_fichier);
    
    return $nom_fichier;
}