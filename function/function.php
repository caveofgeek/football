<?php
function func($detail)  
	{
		$detail=str_replace(chr(13), "<br>", $detail);
		$detail=str_replace(" ", "&nbsp;", $detail); 
		return $detail;
	}

function rewrite($url)  
	{
		$url=str_replace(" ", "-", $url);
		return $url;
	}

function rewrite2($url2)  
	{
		$url2=str_replace("-", " ", $url2); 
		return $url2;
	}
?>