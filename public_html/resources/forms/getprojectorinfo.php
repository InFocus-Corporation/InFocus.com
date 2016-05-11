<?php
require($_SERVER['DOCUMENT_ROOT'] . "/resources/php/connections.php");

$response = "no reply";
$value=$_GET['value'];
$type=$_GET['type'];
$groups_allowed = "admin,Service";

mysqli_set_charset($connection, "utf8");
ini_set('default_charset', 'utf-8');

$lang = "en";
$localdir = dirname(__FILE__);
$homedir = substr(dirname(__FILE__),0,stripos(dirname(__FILE__),"public_html")+11); 

mysqli_set_charset($connection, "utf8");

$sql = "SELECT * FROM projectors WHERE partnumber = '$value'";

$result = mysqli_query($connection,$sql);

if($row = mysqli_fetch_assoc($result))
{
	if($value != "")
	{
		if ($type == "lumens")
		{
		$response = $row['lumenshigh'];
		}
		if ($type == "aspect ratio")
		{
		$response = $row['nativeaspect'];
		}
		if ($type == "contrast")
		{
		$response = $row['contrast'];
		}
		if ($type == "lens shift")
		{
		$response = "N/A";
		}
		if ($type == "offset")
		{
		$response = $row['offset'];
		}
		if ($type == "throw_low")
		{
		$response = $row['throwl'];
		}
		if ($type == "throw_high")
		{
		$response = $row['throwh'];
		}
		if ($type == "originalremote")
		{
		$response = $row['originalremote'];
		}
		if ($type == "currentremote")
		{
		$response = $row['currentremote'];
		}
		if ($type == "lamp")
		{
		$response = $row['lamppn'];
		}
		if ($type == "snprefix")
		{
		$response = $row['snprefix'];
		}
		if($response == "")
		{
			$response = "N/A";
		}
		echo $response;
		exit(0);
	}
}
else
{
}

header('HTTP/1.0 400 Bad Request');
echo 'Bad Request';