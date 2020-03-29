<?php

class Format{

	// formating the date taken from browser and formatting them in order

	public function formatDates($date){
		return date('F j, Y, g:i a', strtotime($date));
	}

// formating the post texts that are too long to show them in display post page
	public function txtShortener($text,$limit){

		if ($limit==0) {
			$limit = 400;
		}
		else{
			$limit = $limit;
		}

		$text = $text." ";
		$text = substr($text, 0, $limit);
		$text = substr($text, 0, strrpos($text, " "));
		$text = $text."....";
		return $text;
	}

	public function validator($data){
		$data = trim($data);
		$data = stripcslashes($data);
		$data = htmlspecialchars($data);

		return $data;
	}


}


?>