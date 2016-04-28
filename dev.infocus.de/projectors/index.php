<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/resources/php/langmod.php");

$mods = array();
$mods[]['modCode'] = '$categories = array("ultra-portable","office-classroom","short-throw","large-venue","home-theater");';
$mods[count($mods)-1]['modReplace'] = '//DE-Mod1//';

$tempFile = __FILE__ . ".tmp";

langModification($mods,$tempFile);

require_once($tempFile);

die();

?>