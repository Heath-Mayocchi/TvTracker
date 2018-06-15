<?php

/* 
	search Piratebay
	regex results and magnet links
	display list
*/
	$searchTerm = $_POST["searchText"];
	echo file_get_contents("https://thepiratebay.org/search/$searchTerm/0/99/0");
?>