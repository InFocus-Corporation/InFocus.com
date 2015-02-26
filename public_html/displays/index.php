<?php
require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/infocusscripts.php");

echo PHP_EOL . '<link rel="canonical" href="http://' .  $_SERVER['SERVER_NAME'] . '/displays/"/>' . PHP_EOL;

?>

<?php echo $pageText['meta'];?>

<script type="text/javascript">

  
$(document).ready(function() {
  var hash = window.location.hash;
  hash = hash.substring(1);
  if(hash.length>0){

  showCategory(hash);
  
  }
});


</script>
<style>
.model{
height:350px;
}
a:hover{
cursor:pointer;
}
	</style>
	<base target="_parent" />
	</head>
	<body>
		<?php include($homedir . "/resources/html/mainmenu.html"); ?>

		<div class="content">
<div id="category" class="C9">
	<h2 id="cattitle" class="title" style="text-transform:capitalize;">
	
<?php echo $translate['Touchscreen Solutions'];?>

</h2>

		<div class="C10 Col_child C5_child" >
				<div class="image-set" style="float:right;">
						<image  src="<?php echo imagethumb('cat-hero-displays','520');?>" />
				</div>
				<div class="info">
					<h5 class="tagline"><?php echo $pageText['tagline'];?>
</h5><div><?php echo $pageText['description'];?>
<br>
<br><a href="/resources/documents/InFocus-Touchscreen-Solutions-Datasheet-<?php echo strtoupper($lang);?>.pdf" class="btn"><?php echo $translate['Download Touchscreen Brochure'];?></a>
					</div></div></div>
	<a id="categoriesstart"></a>
	<div id="details" class="C10 tabs-wrapper" style="min-height:600px;overflow:hidden;">
<h6 class="sub-title"><?php echo $pageText['choose'];?></h6>
	<div class="tab-shadow"></div>
<style>

.displaylist {
margin:0 auto;
}

.displaylist img {
max-width:100%;

}

.displaylist > li {
padding-left:2%;
width:30%;
float:left;
padding-bottom: 60px;
}

.image-set{
margin:auto;
}
.categoryThumb {
margin:auto;
}

.image-set img{
margin:auto;
}
</style>

<?PHP

ini_set('default_charset', 'utf-8');

mysqli_set_charset($connection, "utf8");

$category = "display";

$sortorder[0] = "MONDOPAD";
$sortorder[1] = "BIGTOUCH";
$sortorder[2] = "JTOUCH";

$arrayKey = array();

$result = mysqli_query($connection,'SELECT producttext.partnumber, listtitle, description FROM producttext WHERE `active` != 0 and `active` IS NOT NULL and category LIKE "%' . $category . '%" AND lang="' . $lang . '"');
  
echo '<div >
<ul class="displaylist">';

while($row = mysqli_fetch_array($result))
{
 $subject = $row[0];
         $subject = str_replace('-Series','',$subject);
   
 $sortableArray[$subject]= array($row[0],$row[1],$row[2],$subject);
 array_push($arrayKey,$subject);

}

usort($arrayKey,"listcmp");

foreach($arrayKey as $row){
 echo '
    <li class="model">
     <div class="meta">
 <a href="' . $sortableArray[$row][0] . '"><div class="image-set categoryThumb"><img src="' . imagethumb($sortableArray[$row][3], '500') . '" /></div>
 <span  class="title">' . $sortableArray[$row][1] . '</span></a>
 <div class="description">' . $sortableArray[$row][2] . '
 </div>
     </div>
    </li>';
}

echo '  </ul></div>';






function listcmp($a, $b) 
{ 
  global $sortorder; 

  foreach($sortorder as $key => $value) 
    { 
      if($a==$value) 
        { 
          return 0; 
          break; 
        } 

      if($b==$value) 
        { 
          return 1; 
          break; 
        } 
    } 
} 


?>
  	</div>
		
		
	</div>
</div>

<style>
</style>
				<footer id="site-info" >
				<?php include($homedir . "/resources/html/footer.html"); ?>
				</footer>
			</section>
		</div>



</body></html>