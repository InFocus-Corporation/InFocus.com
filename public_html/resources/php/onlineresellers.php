<?PHP

ini_set('default_charset', 'utf-8');
$lang = "en";
$localdir = dirname(__FILE__);
require($_SERVER['DOCUMENT_ROOT'] . "/resources/php/connections.php");

mysqli_set_charset($connection, "utf8");
//$countryList = mysqli_real_escape_string($connection, strtoupper($_POST["countryList"]));
$countryList = $_POST["countryList"];

$result = mysqli_query($connection,'SELECT * FROM resellers WHERE ' . $countryList . ' AND latitude = "Online" AND products LIKE "%' . $_POST['products'] . '%"');
$currentCountry="";
while($row = mysqli_fetch_array($result))
{
if($currentCountry == $row[6]){
echo '<li style="padding-top:10px;"><a target="blank" href="' . $row[8] . '"><div class="image-set"><img src="/resources/images/Logo-' . $row[0] . '" /></div></a></li>';
}
else{
$currentCountry = $row[6];
echo '<li style="padding:10px;">' . $currentCountry . '<br>';
echo '<a target="blank" href="' . $row[8] . '"><div class="image-set"><img src="/resources/images/Logo-' . $row[0] . '" /></div></a></li>';
}
}
?>


