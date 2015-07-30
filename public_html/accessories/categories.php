<?php
require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/infocusscripts.php");
require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/header.php");

$categories = array("mpbtaccessories","cables","cases","lamps","lenses","misc","mounts","remotes","screens","software","networking","services");	

if(in_array($_SERVER['QUERY_STRING'],$categories)){

$category = $_SERVER['QUERY_STRING'];
echo PHP_EOL . '<link rel="canonical" href="http://' .  $_SERVER['SERVER_NAME'] . '/accessories/' . $category . '"/>' . PHP_EOL;
}

?>
<?php echo $pageText[$category.'meta'];?>

<script>

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
	<body class="accsr-sub">
		<?php include($homedir . "/resources/html/mainmenu.html"); ?>

		<div class="content">
<div id="category" class="C9">

	<h2 id="cattitle" class="title" style=""><?= $pageText[$category . 'title'];?></h2>

<div class="C10 Col_child C5_child" >
				<div class="image-set" style="float:right;">

<image id="<?= $category;?>image" src="<?= imagethumb('category-' . $category . '-accessories','520');?>"/>
</div>
<div class="info">


					<h4 class="tagline" id="<?= $category;?>tag">
<?= $pageText[$category . 'tag'];?>
					</h4>

					<div class="subprod-desc" id="<?= $category;?>desc">
<?= $pageText[$category . 'desc'];?>
					</div>

<ul class="action-links Col_child" style="padding:1em;text-align:left;"><li><a class="btn" href="/reseller-locator">
<?= translate('Where to Buy');?>
					</a></li></ul>
						</div></div>				


	<a id="categoriesstart"></a>


	<div id="details" class="C10 tabs-wrapper" style="min-height:600px;overflow:hidden;padding-top:50px;">
	<div class="tab-shadow"></div>
			


<div  id="-<?= $category;?>" style="float:left;"><a style="font-size:110%;padding-bottom:5px;cursor:pointer;" onclick="window.location='/accessories'"> &lt;Back</a>
<ul class="floatList">

<?PHP

$result = mysqli_query($connection,'SELECT producttext.partnumber, listtitle, description, active FROM producttext WHERE category LIKE "%' . $category . '%" AND lang="' . $lang . '" AND (productgroup = "Accessory" OR productgroup = "Peripheral") AND active is not null AND active != 0');

while($row = mysqli_fetch_array($result))
{
echo "<li><div><a href='$category/{$row[0]}'><section class='stretch-wrap60'><div><img ";
echo 'src="' . imagethumb( $row[0], '192') . '" alt="InFocus ' . $row[0] . '" /></div></section><span  class="title">' . $row[1] . '</span></a><div class="subprod-desc">' . $row[2] . '</div></div></li>
';

}
?>
</div>
	</div>
</div>


				<footer id="site-info" >
				<?php include($homedir . "/resources/html/footer.html"); ?>
				</footer>
			</section>
		</div>
		<script>
		$('.inbound').click(function(e) {
			e.preventDefault();		
		})
		
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