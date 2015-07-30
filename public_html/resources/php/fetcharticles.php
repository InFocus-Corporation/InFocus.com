<?PHP
require_once($_SERVER['DOCUMENT_ROOT'] . "/resources/php/connections.php");
mysqli_set_charset($connection, "utf8");
if(strpos($_SERVER['DOCUMENT_ROOT'], ".de")>0){
$lang = "de";
}
elseif(strpos($_SERVER['DOCUMENT_ROOT'], ".fr")>0){
$lang = "fr";
}
elseif(strpos($_SERVER['DOCUMENT_ROOT'], ".nl")>0){
$lang = "nl";
}
else{
$lang = "en";
} 
$sql = "SELECT keygroup, transtext FROM (SELECT transkey as keygroup FROM InFocus.labeltranslation GROUP BY transkey) as KeyList LEFT JOIN (SELECT transkey, transtext FROM InFocus.labeltranslation where labeltranslation.lang = '" . $lang . "') as labeltrans ON keygroup = transkey;";
$results = mysqli_query($connection,$sql);
while($row = mysqli_fetch_array($results)){
if($row[1] == null){$translate[$row[0]] = $row[0];}
else{$translate[$row[0]] = $row[1];}
}
ini_set('default_charset', 'utf-8');
$lang = $_POST['lang'];
$category = $_POST['category'];
$limit = $_POST['limit'];
$datestart = $_POST['datestart'];
$model = $_POST['model'];
if($category == "review"){
	$cattype="review";
	$category = '(categories LIKE "%Story%" OR categories LIKE "%Customer Review%" OR categories LIKE "%Press Review%") AND products LIKE "%' . $model . ';%" ';
}
else{$category = 'categories LIKE "%'. $_POST['category'] .'%"';}
$sql = 'SELECT title, body, teaser, postdate, id, Rating, categories FROM articles WHERE ' . $category . ' AND lang="' . $lang . '" AND (postdate <= CURDATE() OR postdate is null) ORDER BY postdate DESC, date DESC LIMIT ' . $limit;
$result = mysqli_query($connection,$sql);
while($row = mysqli_fetch_array($result))
{
if($category != "event" AND $cattype != "review"){$dateText = '<h6 style="color:black">' . date("F d, Y",strtotime($row[3])) . '</h6>';}

if($cattype == "review"){
	echo '
					<li class="review"><div>'. $row[6] .'</div>';
}
else{
echo '
					<li class="article" style="">
';
}
	echo '
					<div class="snippet">
';
if($cattype == "review" AND $row[5] != 0){
	echo '
					<img style="position: absolute;
  right: 20px;
  max-width: 15%;" src="/resources/images/' . $row[5] . 'star.png">';
}
echo '						<a class="read-more" onclick="readFull(this)"><h5>' . $row[0] . '</h5></a>
						' . $dateText . '

						<p>' . str_replace("/n","<br>",$row[2]) . '</p>

						<a class="btn read-more" onclick="readFull(this)">' . $translate['Read More'] . '</a>
					</div>
					<div class="snippet fullarticle" style="display:none">
';
if($cattype == "review" AND $row[5] != 0){
	echo '
					<img style="position: absolute;
  right: 20px;
  max-width: 15%;" src="/resources/images/' . $row[5] . 'star.png">';
}
echo '						<h5>' . $row[0] . '</h5>
						<h6 style="color:black">' . $dateText . '</h6>
					<p>' . $row[1] . '</p>';
if($cattype != "review"){
	echo '
					<p><small><a href="/articles?' . $row[4] . '">link to this article</a></small></p>';
}
echo '
						<a class="btn read-more" onclick="readLess(this)">' . $translate['Collapse'] . '</a>
					</div>
					</li>';
}
?>
		





