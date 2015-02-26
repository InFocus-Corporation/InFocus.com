<!DOCTYPE html>
<html>
<head>
<style>
.highlighted { background: yellow; }
span + span .highlighted { background: magenta; }
form.filter + table { border: solid thin #aaa; }
form.filter + table th { margin: 2px; padding: 2px; border: solid thin #bbb; }
form.filter + table td { margin: 2px; padding: 2px; border: solid thin #ccc; }
table tr td
{
text-align:left !important;
}
</style>	
</head>
<body>
<?php

$dirname = "";
$images = glob($dirname."*.*");
$rownum =0;
echo '<table class="filterable" width="100px"><tr></tr><tr>';
foreach($images as $image) {
echo '<td style="width:300px">';
echo '<img src="'.$image.'" style="width:270px" /><br>';
echo '/resources/images/' . $image . '<br>';
echo cssifysize($image) . '<br>';
echo '</td>';
$rownum=$rownum+1;
if($rownum == 5){

echo '</tr><tr>';
$rownum=0;
}
}


echo ' 	</tr></table><script type="text/javascript"	src="/resources/js/filterTable.js"></script>';

function cssifysize($img) {
$dimensions = getimagesize($img);
$dimensions = str_replace("=\"", ":", $dimensions['3']);
$dimensions = str_replace("\"", "px;", $dimensions);
return $dimensions;
} 


?>
</body>
</html>