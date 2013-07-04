<?php
function decoupage_tags($string) {
	$reg = '/\[(\w+)\]/';
	preg_match_all($reg, $string, $matches);
	$tags = $matches[1];
	
	return $tags;
}
