<?PHP

require_once($_SERVER['DOCUMENT_ROOT'] . "/resources/php/connections.php");

mysqli_set_charset($connection, "utf8");

?>


<?PHP
if(substr($_SERVER['SERVER_NAME'], -2)=="de"){
$lang = "de";
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


$result = mysqli_query($connection,'SELECT title, body, teaser, postdate, id FROM articles WHERE categories LIKE "%' . $category . '%" AND lang="' . $lang . '" AND (postdate <= CURDATE() OR postdate is null) ORDER BY postdate DESC, date DESC LIMIT ' . $limit);
		
while($row = mysqli_fetch_array($result))
{
if($category != "event"){$dateText = date("F d, Y",strtotime($row[3]));}

echo '
					<li style="margin-top:40px;border-top:1px solid grey;padding-top:10px;">
					<div class="">
						
					</div>
					<div class="snippet">
						<a class="read-more" onclick="readFull(this)"><h5>' . $row[0] . '</h5></a>
						<h6 style="color:black">' . $dateText . '</h6>

						<p>' . str_replace("/n","<br>",$row[2]) . '</p>

						<a class="btn read-more" onclick="readFull(this)">' . $translate['Read More'] . '</a>
					</div>
					<div class="snippet fullarticle" style="display:none">
						<h5>' . $row[0] . '</h5>
						<h6 style="color:black">' . $dateText . '</h6>
					<p>' . $row[1] . '</p>
					<p><small><a href="/articles?' . $row[4] . '">link to this article</a></small></p>
						<a class="btn read-more" onclick="readLess(this)">' . $translate['Collapse'] . '</a>
					</div>
					</li>';

				
				
}



?>
		





