<?php
function convertisseur_temps($variable) {
	$reg = '/([0-9]{2}):([0-9]{2}):([0-9]{2},[0-9]{3})/';
	preg_match($reg, $variable, $matches);
	
	$heures = $matches[1] * 3600;
	$minutes = $matches[2] * 60;
	$secondes = preg_replace('/,/', '.', $matches[3]);
	
	$total = $heures + $minutes + $secondes;
	
	return $total;
} 
