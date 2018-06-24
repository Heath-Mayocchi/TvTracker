<?php
	/* 
	 *	assign posted search term
	 */
	
	$searchTerm = $_POST["searchText"];
	
	/* 
	 *	links for torrent site searches
	 */
	
	$piratebay = "https://thepiratebay.org/search/$searchTerm/0/99/0";
	$leetx = "https://1337x.to/search/$searchTerm/1/";
	$pirateiro = "https://pirateiro.com/torrents/?search=$searchTerm&orderby=seeders";
	
	/* 
	 *	get search result
	 */
	
	//$piratebayResult = file_get_contents($piratebay);
	//$leetxResult = file_get_contents($leetx);
	$pirateiroResult = file_get_contents($pirateiro);
	//print_r($pirateiroResult);
	
	/* 
	 *	regex patterns for torrent results
	 */
	
/* 	$piratebayPattern = "/(<td>
<div class=\"detName\">			<a href=\"\/torrent)(...+)(center>
		<\/td>)/"; */
		
	$pirateiroPattern = "/(<table class=\"main\")(...+)(<br \/><br \/><br \/>)/s";
		
	/* 
	 *	apply regex pattern to results
	 */
	
	//preg_match($piratebayPattern, $piratebayResult, $piratebayMatches);	
	preg_match($pirateiroPattern, $pirateiroResult, $pirateiroMatches);
	
	/* 
	 *	add torrent site domain to the page links
	 */
	
	//torrent links
	$pirateiroDomainPattern = "/(href=\"\/)/";
	$pirateiroDomainReplacePattern = "href=\"https://pirateiro.com/";			
	$pirateiroMatches = preg_replace($pirateiroDomainPattern, $pirateiroDomainReplacePattern, $pirateiroMatches);	
	//uploader links
	$pirateiroDomainPatternB = "/(href=\'\/)/";
	$pirateiroDomainReplacePatternB = "href='https://pirateiro.com/";			
	$pirateiroMatches = preg_replace($pirateiroDomainPatternB, $pirateiroDomainReplacePatternB, $pirateiroMatches);
	//magnet links
	$pirateiroMagnetPattern = "/( title=\"download this torrent using magnet link\">)/";
	$pirateiroMagnetReplacePattern = "><b>M</b></a>";			
	$pirateiroMatches = preg_replace($pirateiroMagnetPattern, $pirateiroMagnetReplacePattern, $pirateiroMatches);
	
	/* 
	 *	format list
	 */
	
	//print_r($piratebayMatches);
	//print_r($leetxMatches);
	print_r($pirateiroMatches[0]);
?>