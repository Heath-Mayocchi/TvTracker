<?php

/* 
	search Piratebay
	regex results and magnet links
	display list
*/
	// assign posted search term
	$searchTerm = $_POST["searchText"];
	
	// links for torrent site searches
	$piratebay = "https://thepiratebay.org/search/$searchTerm/0/99/0";
	
	// add these sites later
	//$leetx = "https://1337x.to/search/$searchTerm/1/";
	//$pirateiro = "https://pirateiro.com/torrents/?search=$searchTerm";
	
	// get search result
	$piratebayResult = file_get_contents($piratebay);
	
	// regex pattern for torrent results
	$piratebayPattern = "/(<td>
<div class=\"detName\">			<a href=\"\/torrent)(...+)(center>
		<\/td>)/su";
		
	// apply regex pattern to results
	preg_match($piratebayPattern, $piratebayResult, $piratebayMatches);
	
	// remove array text
	
	// add https://thepiratebay.org to the torrent, category and uploader links
	
	// format list
	
	print_r($piratebayMatches);
?>