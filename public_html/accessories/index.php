<?php
require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/infocusscripts.php");

$categories = array("mpbtaccessories","cables","cases","lamps","lenses","misc","mounts","remotes","screens","software","networking","services");	

if(in_array($_SERVER['QUERY_STRING'],$categories)){

$category = $_SERVER['QUERY_STRING'];
echo PHP_EOL . '<link rel="canonical" href="http://' .  $_SERVER['SERVER_NAME'] . '/accessories/' . $category . '"/>' . PHP_EOL;
}
else{
echo PHP_EOL . '<link rel="canonical" href="http://' .  $_SERVER['SERVER_NAME'] . '/accessories/"/>' . PHP_EOL;
}
?>
<?php echo $pageText['meta'];?>

<script>
(function($){
    $.fn.reveal = function(){
        var args = Array.prototype.slice.call(arguments);
        return this.each(function(){
            var img = $(this),
                src = img.data("src");
            src && img.attr("src", src).load(function(){
                img[args[0]||"show"].apply(img, args.splice(1));
            });
        });
    }
}(jQuery));

var currentTallest = 0,
currentRowStart = 0,
rowDivs = new Array(),
$el,
topPosition = 0;

function resizeRows(){
$('#categories .floatList').children().each(function() {

$el = $(this);
// console.log($el);
$el.removeAttr('style');
// $el.attr('style', '');
if($el.height() == 0){return;}
topPostion = $el.position().top;

if (currentRowStart != topPostion) {
// we just came to a new row.  Set all the heights on the completed row
for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
rowDivs[currentDiv].height(currentTallest);
}
// set the variables for the new row
rowDivs.length = 0; // empty the array
currentRowStart = topPostion;
currentTallest = $el.height();
rowDivs.push($el);
} else {
// another div on the current row.  Add it to the list and check if it's taller
rowDivs.push($el);
currentTallest = (currentTallest < $el.height()) ? ($el.height()) : (currentTallest);
}
// do the last row
for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
rowDivs[currentDiv].height(currentTallest);
}
});
}	 


window.onresize = function(event) {
resizeRows();
}


</script>
<style>
a:hover{
cursor:pointer;
}

</style>

	</head>
	<body class="">
		<?php include($homedir . "/resources/html/mainmenu.html"); ?>

		<div class="content">
<div id="category" class="C9">

	<h2 id="cattitle" class="title" style=""><?php echo translate('Accessories');?></h2>

<?php 
echo '		<div class="C10 Col_child C5_child" >
				<div class="image-set" style="float:right;">' . PHP_EOL;
if($category == null){
echo '<image id="catimage" src="' . imagethumb('category-accessories','520') . '"/>' . PHP_EOL;
}
else{
echo '<image id="catimage" style="display:none" src="' . imagethumb('category-accessories','520') . '"/>
<image id="' . $category . 'image" src="' . imagethumb('category-' . $category . '-accessories','520') . '"/>';
}
foreach($categories as $hiddenCat){
if($hiddenCat != $category){
echo '<image id="' . $hiddenCat . 'image" style="display:none;" src="' . imagethumb('category-' . $hiddenCat . '-accessories','520') . '"/>';
}
}
echo '</div>
<div class="info">' . PHP_EOL;

if($category == null){
echo '					<h4 class="tagline" id="cattag">
' . $pageText['tagline'] . '
					</h4>';
}
else{
echo '					<h4 class="tagline" id="cattag" style="display:none">
' . $pageText['tagline'] . '
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
' . $pageText['description'] . '
					</div>';
}
else{
echo '					<div id="catdesc" style="display:none">
' . $pageText['description'] . '
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

echo '<ul class="action-links Col_child" style="padding:1em;text-align:left;"><li><a class="btn" href="/reseller-locator">
' . translate('Where to Buy') . '
					</a></li></ul>
						</div></div>';
?>
						


	<a id="categoriesstart"></a>


	<div id="details" class="C10 tabs-wrapper" style="min-height:600px;overflow:hidden;padding-top:50px;">
<!--		<div class="ui-dropdown">
			<h3 class="sub-title">Accessory Finder</span>
			<ul class="dropdown-list">
				<a href="#" class="btn selector">Select Your Model</a>
				<div class="wrapper">
					<li class="selected">Model #1</li>
					<li>Model #2</li>
					<li>Model #3</li>
					<li>Model #4</li>
				</div>
			</ul>
		</div>-->
	<div class="tab-shadow"></div>
			<div id="categories"  style="overflow:hidden;float:left; <?php  if(!empty($category)){echo "display:none;";} ?>">
		<ul class="floatList" style="overflow:hidden">
				<li><div>
				<a onclick="showCategory('mpbtaccessories');">
<div class="image-set categoryThumb"  ><img src="<?php echo imagethumb('mpbtaccessories','135');?>" alt="<?php echo translate('Accessories for');?><br>Mondopad <?php echo translate('and');?> BigTouch"/></div>
	<span id="mpbtaccessories" class="title"><?php echo translate('Accessories for');?><br>Mondopad <?php echo translate('and');?> BigTouch</span></a><div class="description"><?php echo $pageText['mpbtaccessories'];?></div>
	<span><a class="view-all" onclick="showCategory('mpbtaccessories');"><?php echo translate('View All');?></a>
	
	<?php if($lang != "de"){ 
echo '<br><a href="http://www.infocusstore.com/s?defaultSearchTextValue=Search&searchKeywords=mondopad&Action=submit&field_brandtextbin=&field_subjectbin=7448597011&field_color_map=&field_price=&field_size_name=&searchRank=salesrank&searchSize=12&searchPage=1&searchBinNameList=brandtextbin%2Csubjectbin%2Ccolor_map%2Cprice%2Csize_name" >'. translate('Go to Store') . '</a>';
			}
		?>
				</span></div></li><li><div>
					<a onclick="showCategory('cables');">
<div class="image-set categoryThumb"  ><img src="<?php echo imagethumb('cables','135');?>" alt="<?php echo translate('Cables and Adapters');?>"/></div>
	<span id="cables" class="title"><?php echo translate('Cables and Adapters');?></span></a><div class="description"><?php echo $pageText['cables'];?></div>
	<span><a class="view-all" onclick="showCategory('cables');"><?php echo translate('View All');?></a>
	
	<?php if($lang != "de"){ 
echo '<br><a href="http://www.infocusstore.com/Cables-Adapters-Accessories/b/7448598011?ie=UTF8&title=Cables+%26+Adapters" >'. translate('Go to Store') . '</a>';
			}
		?>
				</span></div></li><li><div>
					<a onclick="showCategory('cases');">
<div class="image-set categoryThumb"  ><img src="<?php echo imagethumb('cases','135');?>" alt="<?php echo translate('Cases');?>"/></div>
						<span id="cases" class="title"><?php echo translate('Cases');?></span></a>
						<div class="description"><?php echo $pageText['cases'];?></div>
						<span><a class="view-all" onclick="showCategory('cases');"><?php echo translate('View All');?></a>
						
						<?php if($lang != "de"){ 
echo '<br><a href="http://www.infocusstore.com/Cases-Accessories/b/7448599011?ie=UTF8&title=Cases" >'. translate('Go to Store') . '</a>';
			}
		?>
				</span></div></li><li><div>
					<a onclick="showCategory('lamps');">
<div class="image-set categoryThumb"  ><img src="<?php echo imagethumb('lamps','135');?>" alt="<?php echo translate('Lamps');?>"/></div>
						<span id="lamps" class="title"><?php echo translate('Lamps');?></span></a>
						<div class="description"><?php echo $pageText['lamps'];?></div>
						<span><a class="view-all" onclick="showCategory('lamps');"><?php echo translate('View All');?></a>
						
						<?php if($lang != "de"){ 
echo '<br><a href="http://www.infocusstore.com/Lamps-Accessories/b/7448620011?ie=UTF8&title=Lamps" >'. translate('Go to Store') . '</a>';
			}
		?>
				</span></div></li><li><div>
					<a onclick="showCategory('lenses');">
<div class="image-set categoryThumb"  ><img src="<?php echo imagethumb('lenses','135');?>" alt="<?php echo translate('Lenses');?>"/></div>
						<span id="lenses" class="title"><?php echo translate('Lenses');?></span></a>
						<div class="description"><?php echo $pageText['lenses'];?></div>
						<span><a class="view-all" onclick="showCategory('lenses');"><?php echo translate('View All');?></a>
						
						<?php if($lang != "de"){ 
echo '<br><a href="http://www.infocusstore.com/Lamps-Accessories/b/7448620011?ie=UTF8&title=Lamps" >'. translate('Go to Store') . '</a>';
			}
		?>
				</span></div></li><li><div>
					<a onclick="showCategory('misc');">
<div class="image-set categoryThumb"  ><img src="<?php echo imagethumb('misc','135');?>" alt="<?php echo translate('Miscellaneous');?>"/></div>
						<span id="misc" class="title"><?php echo translate('Miscellaneous');?></span></a>
						<div class="description"><?php echo $pageText['misc'];?></div>
						<span><a class="view-all" onclick="showCategory('misc');"><?php echo translate('View All');?></a>
						
						<?php if($lang != "de"){ 
echo '<br><a href="http://www.infocusstore.com/Filters-Accessories/b/7448619011?class=tier2" >'. translate('Go to Store') . '</a>';
			}
		?>
				</span></div></li><li><div>
					<a onclick="showCategory('mounts');">
<div class="image-set categoryThumb"  ><img src="<?php echo imagethumb('mounts','135');?>" alt="<?php echo translate('Mounts and Stands');?>"/></div>
						<span id="mounts" class="title"><?php echo translate('Mounts and Stands');?></span></a>
						<div class="description"><?php echo $pageText['mounts'];?></div>
						<span><a class="view-all" onclick="showCategory('mounts');"><?php echo translate('View All');?></a>
						
						<?php if($lang != "de"){ 
echo '<br><a href="http://www.infocusstore.com/Mounts-Stands-Accessories/b/7448623011?class=tier2" >'. translate('Go to Store') . '</a>';
			}
		?>
				</span></div></li><li><div>
					<a onclick="showCategory('remotes');">
<div class="image-set categoryThumb"  ><img src="<?php echo imagethumb('remotes','135');?>" alt="<?php echo translate('Remotes');?>"/></div>
						<span id="remotes" class="title"><?php echo translate('Remotes');?></span></a>
						<div class="description"><?php echo $pageText['remotes'];?></div>
						<span><a class="view-all" onclick="showCategory('remotes');"><?php echo translate('View All');?></a>
						
						<?php if($lang != "de"){ 
echo '<br><a href="http://www.infocusstore.com/Remotes-Accessories/b/7448624011?ie=UTF8&title=Remotes" >'. translate('Go to Store') . '</a>';
			}
echo '</span></div></li>';
 if($lang != "de"){ 
echo '
				<li><div>
					<a onclick="showCategory(' . "'screens'" . ');">
<div class="image-set categoryThumb"  ><img src="' . imagethumb('screens' , '135') . '" alt="'. translate('Screens') . '"/></div>
						<span id="screens" class="title">'. translate('Screens') . '</span></a>
						<div class="description">'. $pageText['screens'] . '</div>
						<span><a class="view-all" onclick="showCategory(' . "'screens'" . ');">'. translate('View All') . '</a><br><a href="http://www.infocusstore.com/Screens-Accessories/b/7448625011?ie=UTF8&title=Screens" >'. translate('Go to Store') . '</a></span>
				</div></li>';
			}
		?>
				<li><div>
					<a onclick="showCategory('software');">
<div class="image-set categoryThumb"  ><img src="<?php echo imagethumb('software','135');?>" alt="<?php echo translate('Software');?>"/></div>
						<span id="software" class="title"><?php echo translate('Software');?></span></a>
						<div class="description"><?php echo $pageText['software'];?></div>
						<span><a class="view-all" onclick="showCategory('software');"><?php echo translate('View All');?></a>
						<?php if($lang != "de"){ 
echo '<br><a href="http://www.infocusstore.com/Software-Accessories/b/7288445011?ie=UTF8&title=Software" >'. translate('Go to Store') . '</a>';
			}
		?>
				</span></div></li><li><div>
					<a onclick="showCategory('services');">
<div class="image-set categoryThumb"  ><img src="<?php echo imagethumb('services','135');?>" alt="<?php echo translate('Warranties and Services');?>"/></div>
						<span id="services" class="title"><?php echo translate('Warranties and Services');?></span></a>
						<div class="description"><?php echo $pageText['services'];?></div>
						<span><a class="view-all" onclick="showCategory('services');"><?php echo translate('View All');?></a>
						
						<?php if($lang != "de"){ 
echo '<br><a href="http://www.infocusstore.com/Warranties-Accessories/b/7448626011?class=tier2" >'. translate('Go to Store') . '</a>';
			}
		?>
				</span></div></li><li><div>
					<a onclick="showCategory('networking');">
<div class="image-set categoryThumb"  ><img src="<?php echo imagethumb('networking','135');?>" alt="<?php echo translate('Wireless and Networking');?>"/></div>
						<span id="networking" class="title"><?php echo translate('Wireless and Networking');?></span></a>
						<div class="description"><?php echo $pageText['networking'];?></div>
						<span><a class="view-all" onclick="showCategory('networking');"><?php echo translate('View All');?></a>
						
						<?php if($lang != "de"){ 
echo '<br><a href="http://www.infocusstore.com/Wireless-Accessories/b/7448627011?class=tier2" >'. translate('Go to Store') . '</a>';
			}
		?>
			</span></div></li></ul></div>
			
<script>
if("<?php echo $category;?>" != ""){
document.getElementById('cattitle').innerHTML = document.getElementById('<?php echo $category;?>').innerHTML.replace("<br>"," ");
}
resizeRows();

</script>
<?PHP

ini_set('default_charset', 'utf-8');
$localdir = dirname(__FILE__);
require($_SERVER['DOCUMENT_ROOT'] . "/login/ubvars.php");
require($_SERVER['DOCUMENT_ROOT'] . "/resources/php/connections.php");

mysqli_set_charset($connection, "utf8");
//$countryList = mysqli_real_escape_string($connection, strtoupper($_POST["countryList"]));
//$category = $_POST["category"];



$categories = array("mpbtaccessories","cables","cases","lamps","lenses","misc","mounts","remotes","screens","software","networking","services"); 

foreach($categories AS $category){
$result = mysqli_query($connection,'SELECT producttext.partnumber, listtitle, description, active FROM producttext WHERE category LIKE "%' . $category . '%" AND lang="' . $lang . '" AND (productgroup = "Accessory" OR productgroup = "Peripheral") AND active is not null AND active != 0');

echo '<div  id="-' . $category . '" style="';
if($category != $_SERVER['QUERY_STRING']){ echo 'display:none;';}
echo 'float:left;"><a style="font-size:110%;padding-bottom:5px;" onclick="backUp(' . "'" . $category . "'" . ');">Back</a>
<ul class="floatList">';

while($row = mysqli_fetch_array($result))
{
echo '<li><div><a href="' . $row[0] . '"><div><img ';
if($category != $_SERVER['QUERY_STRING']){ echo 'data-';}
echo 'src="' . imagethumb( $row[0], '132') . '" alt="InFocus ' . $row[0] . '" /></div><span  class="title">' . $row[1] . '</span></a><div>' . $row[2] . '</div></div></li>
';

}
echo '  </ul></div>';
}





?>
	</div>
</div>


				<footer id="site-info" >
				<?php include($homedir . "/resources/html/footer.html"); ?>
				</footer>
			</section>
		</div>
		<script>
function showCategory(catSelected){
			   $('#-' + catSelected + " img").reveal("show", 0);
			   $('.floatList').css({"width": $('#categories').outerWidth()});
			   $('#-' + catSelected).animate({width:0}, 0,function(){$('#-' + catSelected).show()});
			   $('#-' + catSelected).animate({width:"100%"}, 1000);
			   $('#categories').animate({width:0}, 990,function(){
			   
			   $('#categories').hide()

			   document.getElementById('cattitle').innerHTML = document.getElementById(catSelected).innerHTML.replace("<br>"," ");
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
			   $('#-' + catSelected).hide('slide', { direction: 'up' }, 1000);

			   document.getElementById('cattitle').innerHTML = "<?php echo translate('Accessories');?>";

			   window.history.pushState("string", "Title", "http://<?php echo $_SERVER['SERVER_NAME'];?>/accessories/");
			   $('#' + catSelected + 'tag').hide();
			   $('#cattag').show();
			   $('#' + catSelected + 'desc').hide();
			   $('#catdesc').show();
			   $('#' + catSelected + 'image').hide();
			   $('#catimage').show();
resizeRows();
}
</script>

	</body>
</html>