<?php
if(isset ($_GET['value']) &amp;&amp; $_GET['value']!='')
{
	$value=$_GET['value'];
	$groups_allowed = "admin,Service";
	//require($_SERVER['DOCUMENT_ROOT'] . "/login/ublock.php");
	//require($_SERVER['DOCUMENT_ROOT'] . "/login/ubvars.php");

	$connection = mysqli_connect('67.43.0.33','InFocus','InF0cusP@ssw0rd', 'InFocus',3306);
	mysqli_set_charset($connection, "utf8");
	ini_set('default_charset', 'utf-8');

	$lang = "en";
	$localdir = dirname(__FILE__);
	$homedir = substr(dirname(__FILE__),0,stripos(dirname(__FILE__),"public_html")+11); 

	mysqli_set_charset($connection, "utf8");


	$sql = "SELECT * FROM projectors WHERE snprefix = '$value'";

	$results = mysqli_query($connection,$sql);
	or die(mysql_error());

	if(mysql_num_rows($results)&gt;0)
		{
			echo '<label class="negative">Username exists</label>';
		}
	else
		{
			echo '<label class="positive">Username available</label>';
		}
}

?>