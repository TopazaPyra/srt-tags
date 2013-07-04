<?php

namespace SrtTags\VideosBundle\ParserSrt;

class ParserSrt
{
	public function parseSrt($file)
	{
		$content = file_get_contents($file);
		$content = preg_replace('/\r\n/',' ', $content);
		
		$i = 0;
		$sequences = array();
		
		// First split based on the sequence number and sequence time
	
		$reg = "/([0-9]{1,4}\s(?:[0-9]{2}:){2}[0-9]{2},[0-9]{3} --> (?:[0-9]{2}:){2}[0-9]{2},[0-9]{3})/";
		$sections = preg_split($reg, $content, -1, PREG_SPLIT_DELIM_CAPTURE);
		unset($sections[0]); // remove empty first line
	
		// Second split for storing the elements in a double dimension array
	
		foreach($sections as $section) {
			$reg2 = "/[0-9]{1,4}\s((?:[0-9]{2}:){2}[0-9]{2},[0-9]{3}) --> ((?:[0-9]{2}:){2}[0-9]{2},[0-9]{3})/";
			if (preg_match ($reg2, $section, $matches)) {
				$sequences[$i]['debut'] = $this->timeConverter($matches[1]);
				$sequences[$i]['fin'] = $this->timeConverter($matches[2]);
			} else {
				$sequences[$i]['tags'] = $this->tagsSplit($section);
				$i++;
			}
		}
	
		return $sequences;
	}
	
	
	private function timeConverter($time)
	{
		$reg = '/([0-9]{2}):([0-9]{2}):([0-9]{2},[0-9]{3})/';
		preg_match($reg, $time, $matches);
	
		$hours = $matches[1] * 3600;
		$minutes = $matches[2] * 60;
		$seconds = preg_replace('/,/', '.', $matches[3]);
	
		$total = $hours + $minutes + $seconds;
	
		return $total;
	}
	
	
	private function tagsSplit($string)
	{
		$reg = '/\[(\w+)\]/';
		preg_match_all($reg, $string, $matches);
		$tags = $matches[1];
		$tags = array_map('strtolower', $tags);
	
		return $tags;
	}
}
