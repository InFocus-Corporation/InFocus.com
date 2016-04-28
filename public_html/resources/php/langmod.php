<?php

function langModification($mods,$tempFile){
	preg_match_all('/\//', $_SERVER['SCRIPT_FILENAME'],$matches, PREG_OFFSET_CAPTURE);  
	$rootdir = substr($_SERVER['SCRIPT_FILENAME'],$matches[0][2][1]+1,$matches[0][3][1]-$matches[0][2][1]-1);
	//require_once(str_replace($rootdir,"public_html",$_SERVER['SCRIPT_FILENAME']));
	$coreFile = str_replace($rootdir,"public_html",$_SERVER['SCRIPT_FILENAME']);
	if(file_exists($tempFile)){
	if(filemtime($coreFile)> filemtime($tempFile)){
	$fContents = file_get_contents($coreFile);
	
	foreach($mods as $mod){
		$fContents = modReplace($mod,$fContents);
	}
	file_put_contents($tempFile,$fContents);
	}
	
	}
	else{
		$fContents = file_get_contents($coreFile);
		foreach($mods as $mod){
			$fContents = modReplace($mod,$fContents);
		}
		file_put_contents($tempFile,$fContents);
	}
	
}

function modReplace($mod,$contents){
	return str_replace($mod['modReplace'],$mod['modCode'],$contents);
	
}

?>