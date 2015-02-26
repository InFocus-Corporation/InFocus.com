<?PHP

ini_set('default_charset', 'utf-8');
$lang = "en";
$localdir = dirname(__FILE__);
require($_SERVER['DOCUMENT_ROOT'] . "/login/ubvars.php");
require($_SERVER['DOCUMENT_ROOT'] . "/resources/php/connections.php");

mysqli_set_charset($connection, "utf8");


saveJSON("resellers_mondopad.json","Mondopad");
saveJSON("resellers_projector.json","");




function saveJSON($file,$pn){
global $connection;
$result = mysqli_query($connection,'SELECT * FROM resellers WHERE products LIKE "%' . $pn . '%" AND latitude != "Online" AND latitude != "" AND latitude is not null ORDER BY country,state ');

$cData = '{
   "type":"FeatureCollection",
   "features":[';
$i=0;
while($row = mysqli_fetch_array($result))
{
if($i>0){
$cData .= ',';
}
$i=$i+1;
$cData .= '
      {
         "type":"Feature",
         "properties":{
            "NAME":"' . $row[1] . '",
            "STREET":"' . $row[2] . '",
            "CITY":"' . $row[3] . '",
            "STATE":"' . $row[4] . '",
            "ZIP":"' . $row[5] . '",
            "COUNTRY":"' . $row[6] . '",
            "PHONE":"' . $row[7] . '",
            "WEBSITE":"' . $row[8] . '",
            "PREMIUM":"' . $row[12] . '"
         },
         "geometry":{
            "type":"Point",
            "coordinates":[
               ' . $row[10] . ',
               ' . $row[11] . '
            ]
         }
      }';

}
$cData .= '
   ]
}';

$file = $_SERVER['DOCUMENT_ROOT'] . '/resources/misc/' . $file;
file_put_contents($file, $cData);
}

?>


