<?php
	$categories = array("ultra-portable","office-classroom","short-throw","large-venue","home-theater","interactive");	
	if(in_array($_REQUEST['cat'],$categories)){	$category = $_REQUEST['cat'];}

if($_REQUEST['content']=='true'){
require($_SERVER['DOCUMENT_ROOT'] . "/resources/php/connections.php");
require($_SERVER['DOCUMENT_ROOT'] . "/resources/php/langchk.php");
require($_SERVER['DOCUMENT_ROOT'] . "/resources/php/transfunc.php");
}
else{
	require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/infocusscripts.php");
	require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/header.php");

	$categories = array("ultra-portable","office-classroom","short-throw","large-venue","home-theater","interactive");	
	if(!empty($category)){echo PHP_EOL . '<link rel="canonical" href="http://' .  $_SERVER['SERVER_NAME'] . '/projectors/' . $category . '"/>' . PHP_EOL;}
	else{echo PHP_EOL . '<link rel="canonical" href="http://' .  $_SERVER['SERVER_NAME'] . '/projectors/"/>' . PHP_EOL;}	
 echo $pageText[$category.'meta'] .'

<base target="_parent" />
</head>
<body class="proj">';
?>


<?php
 include($_SERVER['DOCUMENT_ROOT']. "/resources/html/mainmenu.html"); 
 echo "<div class='content'>
		<div id='category' class='C9' style='overflow:hidden;'>";}
 $mTitle = substr($pageText[$category.'meta'],7,strpos($pageText[$category.'meta'],"</title>")-7);
$mDesc = substr($pageText[$category.'meta'],strpos($pageText[$category.'meta'],'<meta name="description" content="')+34,strpos($pageText[$category.'meta']," />")-(strpos($pageText[$category.'meta'],'<meta name="description" content="')+34));
echo "
 <script id='metaValues'>
var mTitle = '$mTitle';
var mDesc = '$mDesc';
 </script>";
$catarray['ultra-portable']=array('alt'=>'Ultra Portable','url'=>'Mobile-Projectors/b/7448589011');
$catarray['office-classroom']=array('alt'=>'Office/Classroom','url'=>'Office-Classroom-Projectors/b/7288437011');
$catarray['short-throw']=array('alt'=>'Short Throw','url'=>'Short-Throw-Projectors/b/7288438011');
$catarray['large-venue']=array('alt'=>'Large Venue','url'=>'Large-Venue-Projectors/b/7448590011');
$catarray['home-theater']=array('alt'=>'Home Theater','url'=>'Home-Theater-Projectors/b/7920742011');
$catarray['interactive']=array('alt'=>'Interactive','url'=>'Interactive-Projectors/b/7288439011');
?>
<style>
.title{
transition:right 1s ease-out;
webkit-transition:right 1s ease-out;
moz-transition:right 1s ease-out;
text-transform:capitalize;
position:relative;
}
#catdesc{
transition:right 1s ease-out;
webkit-transition:right 1s ease-out;
moz-transition:right 1s ease-out;
}
#details{
transition:right 1s ease-out;
webkit-transition:right 1s ease-out;
moz-transition:right 1s ease-out;
}
</style>
		<h2 id="cattitle" class="title" style="text-transform:capitalize;"><?= $catarray[$category]['alt'] .' '. translate('Projectors');?></h2>
		<div class="C10 Col_child C5_child" id="catdesc">
			<div class="image-set" style="float:right;"><image src="<?= imagethumb("category-$category-projectors",'520');?>"/></div>
			<div class="info">
				<h4 class="tagline"><?= $pageText[$category . 'tag'];?></h4>
				<div><?= $pageText[$category . 'desc'];?></div>
				<ul class="action-links Col_child" style="padding:1em;text-align:left;">
					<li><a class="btn form-box" href="/resources/forms/projectioncalculator"><?= translate('Projection Calculator');?></a></li>
					<li><a class="btn" href="/product-finder"><?= translate('Product Finder');?></a></li>
				</ul></div></div>
		<a id="categoriesstart"></a>
		<div id="details" class="C10 tabs-wrapper" style="min-height:600px;overflow:hidden;">
		<h6 class="sub-title" id="choosetitle"><?= $pageText['choosecategory'];?></h6>
		<div class="tab-shadow"></div>
<?php 
if(empty($category)) : ?>
	<div id="categories" class="" style="overflow:hidden;float:left;">
		<ul class="floatList" style="overflow:hidden">
			<?php 
				foreach($categories as $category):	?>
				<li class="model">
					<div class="d_<?= $category ?>">
						<a href="/projectors/<?= $category ?>" class="inbound"  id="<?= $category ?>"  onclick="showCategory('<?= $category ?>');">
							<section class='stretch-wrap60'>
							<div class=""  >
								<img src="<?= imagethumb("category-$category-projectors",NULL,'125');?>" alt="<?= $catarray[$category]['alt'] ?> Projectors"/>
							</div>
							</section>
							<span  class="title">
							<?= translate($catarray[$category]['alt']) . "<br>" . translate('Projectors');?>
							</span>
						</a>
						<div class="description"><?= $pageText["$category-short"];?></div>
						<span>
							<a href="/projectors/<?= $category ?>" class="inbound view-all" onclick="showCategory('<?= $category ?>');"><?= translate('View All');?></a>
							<?php if($lang != "de"){echo "<a href='http://www.infocusstore.com/{$catarray[$category]['alt']}'>". translate('Shop Now') . '</a>';} ?>
						</span>
					</div>
				</li>
			<?php endforeach; ?>

		</ul>
	</div><!--/.categories-->
<?php else: 

		$result = mysqli_query($connection,'SELECT producttext.partnumber, listtitle, description, category FROM producttext WHERE `active` != 0 and `active` IS NOT NULL  and category LIKE "%' . $category . '%" AND lang="' . $lang . '" ORDER BY partnumber');
		
		echo '<div  id="catlist"><a style="font-size:110%;padding-bottom:5px;" onclick="backUp();">&lt;' . translate('Back') . '</a>
		<ul class="floatList">';
		
		while($row = mysqli_fetch_array($result))
		{
					$subject = $row[0];
			        $subject = strtoupper(str_replace('-Series','',$subject));
			        $cat = explode(",",str_replace(", ",",",$row[3]));
		echo '<li class="model">
							<div class="meta">
			<a href="' . $cat[0] . '/' . $row[0] . '"><section class="stretch-wrap60">
							<div class=""  ><img src="' . imagethumb( $subject , '132') . '" alt="InFocus ' . $row[0] . ' Projector" /></div></section>
			<span  class="title">' . $row[1] . '</span></a>
			<div class="description">' . $row[2] . '
			</div></div></li>';
				}
		echo '		</ul></div>';

endif;

if($_REQUEST['content']!='true'){
echo	'</div>
	</div>
	</div>
				<footer id="site-info" >';
 include($homedir . "/resources/html/footer.html"); }?>

<?php if($_REQUEST['content']!='true') : ?>
				</footer>
			</section>
		</div>
<script>

	//anchor tags have relevant links, but won't reload the page. Content is instead dynamically populated
$( document ).ready(function() {
	$('.inbound').click(function(e) {
		e.preventDefault();	
			})
});		

	function showCategory(catSelected){		
		$.post("index.php",
		{content: "true",
		cat:catSelected},
		function(response){
			bodyElements = $('#category').children().fadeOut(200);
	        bodyElements.promise().done(function(){
			document.getElementById('category').innerHTML = response;
	        $('#cattitle').attr('style','right:2000px');
	        $('#catdesc').attr('style','right:-2000px');
	        $('#details').attr('style','right:2000px');

		    setTimeout( function(){
	        $('#cattitle').css('right','0');
	        $('#catdesc').css('right','0');
	        $('#details').css('right','0');
		    },100);
			console.log(bodyElements);
				$('.inbound').click(function(e) {
				e.preventDefault();	
		})		        
		eval(document.getElementById('metaValues').innerHTML);
		$('meta[name=description]').remove();
		$('head').append('<meta name="description" content="' + mDesc + '">');
		document.title = mTitle;

		}); });					
		window.history.pushState("string", "Title", catSelected);

	    //if user clicks back button in browser
	    window.onpopstate = function(event) {
			$.post("index.php",
			{content: "true"},
			function(response){
				document.getElementById('category').innerHTML = response;
				$('.inbound').click(function(e) {e.preventDefault();})
			});					
			window.history.pushState("string", "Title", "http://<?php echo $_SERVER['SERVER_NAME'];?>/projectors/");
			document.title = "HD Projectors - DLP, 3D, and LCD Projectors | InFocus";
			resizeRows();
		    window.onpopstate = function(event) {
				var terminus = "<?php echo $_SERVER['HTTP_REFERER'] ?>";
			   	window.location = terminus;
			}					   
		}//end onpopstate
	}
		
	function backUp(catSelected){
	//user uses the back link on page
			$.post("index.php",
			{content: "true"},
			function(response){
				bodyElements = $('#category').children().fadeOut(200);
		        bodyElements.promise().done(function(){
					document.getElementById('category').innerHTML = response;
			       	$('#category').children().fadeIn(200);
					$('.inbound').click(function(e) {e.preventDefault();})
				});});					
				   var stateObjB;
				   window.history.pushState(stateObjB, "Title", "http://<?php echo $_SERVER['SERVER_NAME'];?>/projectors/");
				   document.title = "HD Projectors - DLP, 3D, and LCD Projectors | InFocus";
				   $('meta[name=description]').remove();
				   $('head').append('<meta name="description" content="DLP projectors provide superior quality for HDTVs and digital cinemas. Choose from new innovative projectors from InFocus.">');				   
			resizeRows();
	}

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

</body>
</html>
<?php endif; ?>