<?php

/* 
	search Piratebay
	regex results and magnet links
	display list
*/
	// assign search term
	$searchTerm = $_POST["searchText"];
	// get search result
	$searchResult = file_get_contents("https://thepiratebay.org/search/$searchTerm/0/99/0");
	// regex pattern for torrent results
	$torrentPattern = "/(<td>
<div class=\"detName\">			<a href=\"\/torrent)(...+)(center>
		<\/td>)/su";
	// apply regex pattern to results
	preg_match($torrentPattern, $searchResult, $matches);
	// add https://thepiratebay.org to the torrent and category links
	// format list
	
	print_r($matches);
?>