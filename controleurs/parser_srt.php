<?php
include_once('convertisseur_temps.php');
include_once('decoupage_tags.php');

function parser_srt($fichier) {
	$contenu = file_get_contents($fichier['tmp_name']);
	$contenu = preg_replace('/\r\n/',' ', $contenu);
	$i = 0;
	$sequences = array();
        
    $infos_fichier = pathinfo($fichier['name']);
    $titre_video = $infos_fichier['filename'];
	
	// Premier découpage en fonction du numéro de séquence suivi des temps de la séquence
	
	$reg = "/([0-9]{1,4}\s(?:[0-9]{2}:){2}[0-9]{2},[0-9]{3} --> (?:[0-9]{2}:){2}[0-9]{2},[0-9]{3})/";
	$decoupages = preg_split($reg, $contenu, -1, PREG_SPLIT_DELIM_CAPTURE);
	unset($decoupages[0]); // on supprime la première ligne vide du tableau
	
	// Second découpage pour stockage chaque élément dans un tableau à deux dimensions
	
	foreach($decoupages as $decoupage) {
		$reg2 = "/[0-9]{1,4}\s((?:[0-9]{2}:){2}[0-9]{2},[0-9]{3}) --> ((?:[0-9]{2}:){2}[0-9]{2},[0-9]{3})/";
		if (preg_match ($reg2, $decoupage, $matches)) {
			$sequences[$i]['debut'] = convertisseur_temps($matches[1]);
			$sequences[$i]['fin'] = convertisseur_temps($matches[2]);
		} else {
			$sequences[$i]['tags'] = decoupage_tags($decoupage);
            $sequences[$i]['fichier'] = $titre_video;
			$i++;
		}
	}
	
	return $sequences;
}
