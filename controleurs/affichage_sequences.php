<?php	
include_once('../modeles/connexion.php');
include_once('../modeles/get_sequences_by_tag.php');

function parser_sequences($sequences) {
    $liste_sequences = '[';	
    foreach($sequences as $ligne) {
	$liste_sequences .= '{' . 'src: "' . $ligne['src'] . '", in: ' . $ligne['debut'] . ', out: ' . $ligne['fin'] . '},';
    }
    $liste_sequences = substr($liste_sequences, 0, -1);
    $liste_sequences .= ']';
	
    return $liste_sequences;
};

function lecture_sequences($sequences) {
    return 'sequence = Popcorn.sequence(
                \'container\',' . $sequences . ');
            $(\'video\').width(800);
            $(\'video\').height(640);
            sequence.play();';
}

function liste_lecture($tableau_sequences) {
    $liste_lecture = '<ul>';
    foreach($tableau_sequences as $ligne) {
        $sequence = '[{src: \'' . $ligne['src'] . '\', in: ' . $ligne['debut'] .', out: ' .$ligne['fin'] .'}]';
        $liste_lecture .= '<li><a href="#" onclick="javascript:'. '$(\'#container\').empty();' . lecture_sequences($sequence) .'">' . $ligne['titre'] . '</a></li>';
    }
    $liste_lecture .= '</ul>';
    
    return $liste_lecture;
}

if (isset($_POST['tag'])) {
	$resultat = get_sequences_by_tag($_POST['tag']);

	if ($resultat) {
		$liste_sequences = parser_sequences($resultat);
		
		$playlist = '$(document).ready(function() {var '. stripslashes(lecture_sequences($liste_sequences)) .'});';
                
                $liste_lecture = liste_lecture($resultat);
                
	} else {
            $erreur = 'Aucune vidéo ne correspond à ce tag.';
        }
} else {
    $erreur = 'Recherchez une vidéo en entrant un tag dans le formulaire.';
}

include_once('../vues/liste_lecture.php');
