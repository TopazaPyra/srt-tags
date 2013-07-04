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

function traitement_video($fichier_video) {
	
	$infos_video = pathinfo($fichier_video['name']);
	$extensions_autorisees = array('ogv', 'webm');
	$format_video = strtolower($infos_video['extension']);
		
	if (in_array($format_video, $extensions_autorisees)) {
		$titre_video = $infos_video['filename'];
				
		$source = '../videos/' . set_nom_fichier($titre_video) . '.' .$format_video;
				
		$presence_video = get_video($titre_video);
				
		if ($presence_video == false) {
			$envoi_fichier = move_uploaded_file($fichier_video['tmp_name'], $source);
						
			if ($envoi_fichier) {
				set_video($titre_video, $source);
				return 'Vidéo envoyée avec succès.';
			} else {
				return 'Erreur : impossible d\'envoyer la vidéo.';
			}
			
		} else {                
				return 'La vidéo existe déjà.';
		}	
		
	} else {
		return 'Type de fichier non autorisé.';
	}
}

function traitement_srt($fichier_srt) {
	
	$infos_fichier = pathinfo($fichier_srt['name']);
	$extensions_autorisees = array('srt');
	$format_fichier = strtolower($infos_fichier['extension']);
	
	if (in_array($format_fichier, $extensions_autorisees)) {
		$titre_fichier = $infos_fichier['filename'];
				
		$source = '../fichiers_srt/' . set_nom_fichier($titre_fichier) . '.' .$format_fichier;
				
		$video = get_video($titre_fichier);
				
		if ($video == false) {
			return 'Erreur : la vidéo n\'existe pas.';
			
		} else {
			$sequence_presente = count(get_sequences($video['id']));
				
			if ($sequence_presente > 0) {
				return 'Des annotations correspondantes à cette vidéos existent déjà dans la base de données.';
				
			} else {
				$envoi_fichier = move_uploaded_file($fichier_srt['tmp_name'], $source);
					
				if ($envoi_fichier) {
					
					$sequences = parser_srt($source);
					
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
					return 'Annotations envoyées avec succès.';
				
				} else {
					return 'Erreur : impossible d\'envoyer le fichier.';
				}
			}
		}
	 
	} else {
		return 'Type de fichier non autorisé.';
	}
}


if (isset($_FILES['video']) && $_FILES['video']['error'] == 0) {
	$resultat_traitement_video = traitement_video($_FILES['video']);
}

if (isset($_FILES['srt']) && $_FILES['srt']['error'] == 0) {
	$resultat_traitement_srt = traitement_srt($_FILES['srt']);
}

include_once('../vues/traitement_envoi.php');
