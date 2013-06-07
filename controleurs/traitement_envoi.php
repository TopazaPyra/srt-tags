<?php
include_once('parser_srt.php');
include_once('set_nom_fichier.php');
include_once('../modeles/connexion.php');
include_once('../modeles/get_sequences.php');
include_once('../modeles/get_tag.php');
include_once('../modeles/get_video.php');
include_once('../modeles/set_sequence.php');
include_once('../modeles/set_tag_sequence.php');
include_once('../modeles/set_tag.php');
include_once('../modeles/set_video.php');

if (isset($_FILES['video']) && $_FILES['video']['error'] == 0) {
	$infos_video = pathinfo($_FILES['video']['name']);
	$extensions_autorisees = array('ogv', 'webm');
	$format_video = strtolower($infos_video['extension']);
	
	if (in_array($format_video, $extensions_autorisees)) {
		$titre_video = $infos_video['filename'];
                
                $nom_fichier = set_nom_fichier($titre_video);
                
                $presence_video = get_video($nom_fichier);
                
                if ($presence_video == false) {
                    $envoi_fichier = move_uploaded_file($_FILES['video']['tmp_name'], '../videos/' . $nom_fichier . '.' . $format_video);
                    
                    if ($envoi_fichier) {
                        set_video($titre_video, $nom_fichier, $format_video);
                        echo 'Vidéo envoyée avec succès.';
                    } else {
                        echo 'Erreur : impossible d\'envoyer la vidéo.';
                    }
                } else {                
                    echo 'La vidéo existe déjà.';
                }	
	}
}

if (isset($_FILES['srt']) && $_FILES['srt']['error'] == 0) {
	$fichier_srt = $_FILES['srt'];
	
	$sequences = parser_srt($fichier_srt);
	
	$video = get_video($sequences[0]['fichier']);
	
	if ($video) {
		$sequence_presente = count(get_sequences($video['id']));
		
		if ($sequence_presente > 0) {
			echo 'Des annotations correspondantes à cette vidéos existent déjà dans la base de données.';
		} else {
			foreach($sequences as $sequence) {
				$id_sequence = set_sequence($sequence, $video);
				
				foreach($sequence['tags'] as $tag) {
					$tag_present = get_tag($tag);
					$id_tag = $tag_present['id'];
					
					if($tag_present == false) {
						$id_tag = set_tag($tag);
					}
					set_tag_sequence($id_tag, $id_sequence);
				}
			}
			echo 'Annotations envoyées dans la base de données.';
		}
		
	} else {
		echo 'Erreur : la vidéo n\'existe pas.';
	}
}
