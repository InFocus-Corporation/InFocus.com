<!DOCTYPE html>
<?php
require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/infocusscripts.php");

$categories = array("mobile","meeting","short-throw","large-venue","home-theater","interactive");	

if(in_array($_SERVER['QUERY_STRING'],$categories)){

$category = $_SERVER['QUERY_STRING'];

echo PHP_EOL . '<link rel="canonical" href="http://' .  $_SERVER['SERVER_NAME'] . '/projectors/' . $category . '"/>' . PHP_EOL;
}
else{
echo PHP_EOL . '<link rel="canonical" href="http://' .  $_SERVER['SERVER_NAME'] . '/projectors/"/>' . PHP_EOL;
}
		
?>
<?php echo $pageText['meta'];?>


<style>
.model{
height:450px;
position:relative;
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

	<h2 id="cattitle" class="title" style="text-transform:capitalize;"><?php echo $translate['Projectors'];?></h2>

<?php 
echo '		<div class="C10 Col_child C5_child" >
				<div class="image-set" style="float:right;">' . PHP_EOL;
if($category == null){
echo '<image id="catimage" src="' . imagethumb('category-projectors','520') . '"/>' . PHP_EOL;
}
else{
echo '<image id="catimage" style="display:none" src="' . imagethumb('category-projectors','520') . '"/>
<image id="' . $category . 'image" src="' . imagethumb('category-' . $category . '-projectors','520') . '"/>';
}
foreach($categories as $hiddenCat){
if($hiddenCat != $category){
echo '<image id="' . $hiddenCat . 'image" style="display:none;" src="' . imagethumb('category-' . $hiddenCat . '-projectors','520') . '"/>';
}
}
echo '</div>
<div class="info">' . PHP_EOL;

if($category == null){
echo '					<h4 class="tagline" id="cattag">
' . $pageText['pagetag'] . '
					</h4>';
}
else{
echo '					<h4 class="tagline" id="cattag" style="display:none">
' . $pageText['pagetag'] . '
					</h4>
					<h4 class="tagline" id="' . $category . 'tag">
' . $pageText[$category . 'tag'] . '
					</h4>';
}
foreach($categories as $hiddenCat){
if($hiddenCat != $category){
echo '					<h4 class="tagline" id="' . $hiddenCat . 'tag" style="display:none">
' . $pageText[$hiddenCat . 'tag'] . '
					</h4>';
}
}

if($category == null){
echo '					<div id="catdesc">
' . $pageText['pagedesc'] . '
					</div>';
}
else{
echo '					<div id="catdesc" style="display:none">
' . $pageText['pagedesc'] . '
					</div>
					<div id="' . $category . 'desc">
' . $pageText[$category . 'desc'] . '
					</div>';
}
foreach($categories as $hiddenCat){
if($hiddenCat != $category){
echo '					<div id="' . $hiddenCat . 'desc" style="display:none">
' . $pageText[$hiddenCat . 'desc'] . '
					</div>';
}
}

echo '<ul class="action-links Col_child" style="padding:1em;text-align:left;"><li><a class="btn form-box" href="/resources/forms/projectioncalculator">
' . $translate['Projection Calculator'] . '</a></li>
<li><a class="btn" href="/product-finder">' . $translate['Product Finder']. '</a></li></ul>
						</div></div>';
?>
						

	<a id="categoriesstart"></a>
	<div id="details" class="C10 tabs-wrapper" style="min-height:600px;overflow:hidden;">
	<h6 class="sub-title" id="choosetitle"><?php echo $pageText['choosecategory'];?></h6>
	<div class="tab-shadow"></div>

<style>

.floatList {margin:0 auto;}

.floatList img {
max-height:100%;

}

.floatList > li {
max-width:220px;
min-width:125px;
padding-left:10px;
width:18%;
float:left;
height: 450px;
position:relative;
}


.floatList > li > span{
position: absolute;
bottom: 30px;
width: 100%;
left: 0;
}

@media only screen and (min-width: 1001px) and (max-width: 1400px) {
.floatList > li {
max-width:220px;
min-width:125px;
padding-left:10px;
width:18%;
float:left;
height: 370px;
}
}


@media only screen and (min-width: 640px) and (max-width: 1000px) {
.floatList > li {
max-width:220px;
min-width:125px;
padding-left:10px;
width:18%;
float:left;
height: 320px;
}
}


@media only screen and (max-width: 639px) {
.floatList > li {
max-width:220px;
min-width:125px;
padding-left:10px;
width:18%;
float:left;
height: 350px;
}
}

.image-set{
margin:auto;
}
.categoryThumb {
margin:auto;
height:90px;
}

.image-set img{
margin:auto;
}
</style>
	<div id="categories" class="" style="overflow:hidden;float:left; <?php  if(!empty($category)){echo "display:none;";} ?>">
		<ul class="floatList" style="overflow:hidden">
				<li class="model">
					<div class="meta"><a onclick="showCategory('mobile');">
	<div class="image-set categoryThumb"  ><img src="<?php echo imagethumb('category-mobile-projectors','135');?>" alt="Mobile Projectors"/></div>
	<span  class="title" id="mobile"><?php echo $translate['Ultra Portable'] . "<br>" . $translate['Projectors'];?></span></a>
	<div class="description"><?php echo $pageText['mobile-short'];?></div>
	</div>
	<span><a class="view-all" onclick="showCategory('mobile');"><?php echo $translate['View All'];?></a>
<?php if($lang != "de"){ 
echo '<br><a class="view-all" href="http://www.infocusstore.com/Mobile-Projectors/b/7448589011 " >'. $translate['Go to Store'] . '</a></span>
				</li>';
			}
		?>
				<li class="model">
					<div class="meta"><a  onclick="showCategory('meeting');">
	<div class="image-set categoryThumb" ><img src="<?php echo imagethumb('category-meeting-projectors','135');?>" alt="Meeting Projectors" /></div>
	<span  class="title" id="meeting"><?php echo $translate['Office/Classroom'] . "<br>" . $translate['Projectors'];?></span></a>
	<div class="description"><?php echo $pageText['meeting-short'];?>
	</div>
	
					</div>
					<span><a class="view-all" onclick="showCategory('meeting');"><?php echo $translate['View All'];?></a>
	<?php if($lang != "de"){ 
echo '<br><a class="view-all" href="http://www.infocusstore.com/Office-Classroom-Projectors/b/7288437011" >'. $translate['Go to Store'] . '</a></span>
				</li>';
			}
		?>
				<li class="model">
					<div class="meta"><a  onclick="showCategory('short-throw');">
	<div class="image-set categoryThumb" ><img src="<?php echo imagethumb('category-short-throw-projectors','135');?>" alt="Short-Throw Projectors" /></div>
	<span  class="title" id="short-throw"><?php echo $translate['Short Throw'] . "<br>" . $translate['Projectors'];?></span></a>
	<div class="description"><?php echo $pageText['short-throw-short'];?>	
</div>
	
					</div>
					<span><a class="view-all" onclick="showCategory('short-throw');"><?php echo $translate['View All'];?></a>
	<?php if($lang != "de"){ 
echo '<br><a class="view-all" href="http://www.infocusstore.com/Short-Throw-Projectors/b/7288438011" >'. $translate['Go to Store'] . '</a></span>
				</li>';
			}
		?>
				<li class="model" >
					<div class="meta"><a onclick="showCategory('large-venue');">
	<div class="image-set categoryThumb" ><img src="<?php echo imagethumb('category-large-venue-projectors','135');?>" alt="Large-Venue Projectors" /></div>
	<span  class="title" id="large-venue"><?php echo $translate['Large Venue'] . "<br>" . $translate['Projectors'];?></span></a>
	<div class="description"><?php echo $pageText['large-venue-short'];?> 
	</div>
	
					</div>
					<span><a class="view-all" onclick="showCategory('large-venue');"><?php echo $translate['View All'];?></a>
	<?php if($lang != "de"){ 
echo '<br><a class="view-all" href="http://www.infocusstore.com/Large-Venue-Projectors/b/7448590011" >'. $translate['Go to Store'] . '</a></span>
				</li>';
			}
		?>
				<li class="model">
					<div class="meta"><a onclick="showCategory('home-theater');">
	<div class="image-set categoryThumb" ><img src="<?php echo imagethumb('category-home-theater-projectors','135');?>" alt="Home-Theater Projectors" /></div>
	<span  class="title" id="home-theater"><?php echo $translate['Home Theater'] . "<br>" . $translate['Projectors'];?></span></a>
	<div class="description"><?php echo $pageText['home-theater-short'];?>
	</div>
	
					</div>
					<span><a class="view-all" onclick="showCategory('home-theater');"><?php echo $translate['View All'];?></a>
	<?php if($lang != "de"){ 
echo '<br><a class="view-all" href="http://www.infocusstore.com/Home-Theater-Projectors/b/7920742011" >'. $translate['Go to Store'] . '</a></span>
				</li>';
			}
		?>
				<li class="model">
					<div class="meta"><a onclick="showCategory('interactive');">
	<div class="image-set categoryThumb" ><img src="<?php echo imagethumb('category-interactive-projectors','135');?>" alt="Interactive Projectors" /></div>
	<span  class="title" id="interactive"><?php echo $translate['Interactive'] . "<br>" . $translate['Projectors'];?></span></a>
	<div class="description"><?php echo $pageText['interactive-short'];?>
	</div>
	
					</div>
					<span><a class="view-all" onclick="showCategory('interactive');"><?php echo $translate['View All'];?></a>
<?php if($lang != "de"){ 
echo '<br>
	<a class="view-all" style="" href="http://www.infocusstore.com/Interactive-Projectors/b/7288439011" >'. $translate['Go to Store'] . '</a></span>
				</li>';
			}
		?>
	
	</ul></div>
	
<script>

if("<?php echo $category;?>" != ""){
document.getElementById('cattitle').innerHTML = document.getElementById('<?php echo $category;?>').innerHTML.replace("<br>"," ");
document.getElementById('choosetitle').innerHTML = "<?php echo $pageText['choosefamily'];?>"
}
</script>
		
<?PHP


require_once($_SERVER['DOCUMENT_ROOT'] . "/resources/php/connections.php");
mysqli_set_charset($connection, "utf8");
ini_set('default_charset', 'utf-8');
foreach($categories AS $category){
$result = mysqli_query($connection,'SELECT producttext.partnumber, listtitle, description FROM producttext WHERE `active` != 0 and `active` IS NOT NULL  and category LIKE "%' . $category . '%" AND lang="' . $lang . '" ORDER BY partnumber');
		
echo '<div  id="-' . $category . '" style="';
if($category != $_SERVER['QUERY_STRING']){ echo 'display:none;';}
echo 'float:left;width:100%"><a style="font-size:110%;padding-bottom:5px;" onclick="backUp(' . "'" . $category . "'" . ');">&lt;' . $translate['Back'] . '</a>
<ul class="floatList">';

while($row = mysqli_fetch_array($result))
{

			$subject = $row[0];
	        $subject = str_replace('-Series','',$subject);

echo '
				<li class="model">
					<div class="meta">
	<a href="' . $row[0] . '"><div class="image-set categoryThumb" ><img src="' . imagethumb( $subject , '132') . '" alt="InFocus ' . $row[0] . ' Projector" /></div>
	<span  class="title">' . $row[1] . '</span></a>
	<div class="description">' . $row[2] . '
	</div>
					</div>
				</li>';

}
echo '		</ul></div>';
}


?>
		






	</div></div></div>
				<footer id="site-info" >
				<?php include($homedir . "/resources/html/footer.html"); ?>
				</footer>
			</section>
		</div>
<script>



function showCategory(catSelected){
			   $('.floatList').css({"width": $('#categories').outerWidth()});
			   $('#-' + catSelected).animate({width:0}, 0,function(){$('#-' + catSelected).show()});
			   $('#-' + catSelected).animate({width:"100%"}, 1000);
			   $('#categories').animate({width:0}, 990,function(){
			   $('#categories').hide();
			   document.getElementById('cattitle').innerHTML = document.getElementById(catSelected).innerHTML.replace("<br>"," ");
			   if(catSelected == "home-theater"){
					document.getElementById('choosetitle').innerHTML = "<?php echo $pageText['chooseprojector'];?>"
				}
				else{
					document.getElementById('choosetitle').innerHTML = "<?php echo $pageText['choosefamily'];?>"
				}
				window.history.pushState("string", "Title", catSelected);
			   $('#cattag').hide();
			   $('#' + catSelected + 'tag').show();
			   $('#catdesc').hide();
			   $('#' + catSelected + 'desc').show();
			   $('#catimage').hide();
			   $('#' + catSelected + 'image').show();
			   $('.floatList').css({"width": 'auto'});
			    });
	}
function backUp(catSelected){
			   $('#categories').animate({width:"100%",height:"100%"}, 0);
			   $('#categories').slideDown(1000);
			   $('#-' + catSelected).hide('slide', { direction: 'up' }, 1000,function(){
			   });
			   document.getElementById('cattitle').innerHTML = "Projectors";
			   document.getElementById('choosetitle').innerHTML = "<?php echo $pageText['choosecategory'];?>"

				window.history.pushState("string", "Title", "http://<?php echo $_SERVER['SERVER_NAME'];?>/projectors/");
			   $('#' + catSelected + 'tag').hide();
			   $('#cattag').show();
			   $('#' + catSelected + 'desc').hide();
			   $('#catdesc').show();
			   $('#' + catSelected + 'image').hide();
			   $('#catimage').show();
}



</script>
</body></html>