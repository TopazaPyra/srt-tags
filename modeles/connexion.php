<?php

try {
	$bdd = new PDO('mysql:host=localhost;dbname=srt-tags', 'srt-tags', 'srt-tags');
}
catch(Exception $e) {
	die('Erreur : ' . $e->getMessage());
}
