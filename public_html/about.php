<!DOCTYPE html>
<?php
require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/infocusscripts.php");
echo PHP_EOL . '<link rel="canonical" href="http://' .  $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'] . '"/>' . PHP_EOL;

if(strlen($_SERVER['QUERY_STRING'])>0){
  echo "<script>window.history.pushState('', '', '/about#" . $_SERVER['QUERY_STRING'] . "');
  </script>";
}
 ?>

<style>
.read-more{
cursor:pointer;
}

</style>
	</head>
	<body>
		<?php include($homedir . "/resources/html/mainmenu.html"); ?>
		<div class="content">
<div class="C9">
	<h2 class="title"><?php echo translate('About InFocus'); ?></h2>
<div class="tabs">
  <nav role='navigation' class="C10 transformer-tabs tabs-wrapper">
    <ul>
				<li><a href="#overview" class="active"><?php echo translate('Overview'); ?></a></li>
				<li><a href="#infocus-team"><?php echo translate('The InFocus Team'); ?></a></li>
				<li><a href="#news"><?php echo translate('News'); ?></a></li>
				<?php if($lang == "de"){echo '<li><a href="/die-presse-uber-infocus">die-presse-uber-infocus</a></li>';} ?>
				<li><a href="#events"><?php echo translate('Events'); ?></a></li>
				<?php if($lang == "de"){echo '<li><a href="http://blog.infocus.info/">Blog</a></li>';} ?>
				<li><a href="#careers"><?php echo translate('Careers'); ?></a></li>
			</ul>
	<div class="tab-shadow"></div>
	</nav>
		<div id="overview" class="active">
			<div style="height:600px;">
				<iframe src="//www.youtube.com/embed/SNMjzPRQUA8?feature=player_embedded&controls=0&showinfo=0" style="width:100%;height:100%" frameborder="0" allowfullscreen ></iframe>
			</div>
			<div class="C2 Col" style="border-right: 1px solid grey">
					<h2 class="title"><?php echo translate('Turning Bright Ideas into Brilliant Results'); ?></h2>
				</div>
				<div class="C8 Col">
					<?php echo $pageText['overview'];?>
				</div>
		</div>
		<div id="infocus-team">
			<h2 class="sub-title" style="text-align:center;"><?php echo translate('Management Team'); ?></h2>
			<ul class="staff-list">
					<?php echo $pageText['bios'];?>
			</ul>
		</div>
		<div id="news" class="news">
			<ul class="col-l archive-list">
				<h3><?php echo translate('News'); ?></h3>
				<li>
					<ul class="paginator">
						<li><a onclick="moveNews(-1)">< <?php echo translate('previous page'); ?> | </a>
						<a onclick="moveNews(1)"> <?php echo translate('next page'); ?> > </a></li>
					</ul>
				</li>
			</ul>
			<ul id="newsarticles" class="col-r news-list">
			</ul>
		</div>
		<div id="events" class="news">
			<ul class="col-l archive-list">
				<h3><?php echo translate('Events'); ?></h3>
				<li>
					<ul class="paginator">
						<li><a onclick="moveEvent(-1)"> < <?php echo translate('previous page'); ?> | </a>
						<a onclick="moveEvent(1)"> <?php echo translate('next page'); ?> > </a></li>
					</ul>
				</li>
			</ul>
			<ul id="eventarticles" class="col-r news-list">
			</ul>
		</div>
		<div id="careers">
			<div class="C2 Col" style="border-right: 1px solid grey">
				<h2 class="title"><?php echo str_replace(" ","<br>",$translate['Work With Infocus']); ?></h2>
			</div>
			<div class="C8 Col">

					<?php echo $pageText['careers'];?>
					
				<p>
<!-- HiringThing Jobs Widget -->
<script type="text/javascript">
    var ht_settings = ( ht_settings || new Object() );
    ht_settings.site_url = "infocus";
</script>
<script src="//assets.hiringthing.com/javascripts/embed.js" type="text/javascript"></script>
<div id="hiringthing-jobs"></div>
<!-- widget stylesheet can be overridden or replaced for customization -->
<link rel="stylesheet" type="text/css" media="all" href="//assets.hiringthing.com/stylesheets/embed.css" />
<noscript>
    <a href="/about#careers"><!View our currently open positions.</a>
<br /><br />
    <small>Job listings brought to you by <a href="http://www.hiringthing.com">HiringThing</a>.</small>
</noscript>
<!-- end HiringThing Jobs Widget -->
					
					</p>

				<p><?php echo translate('InFocus is an equal opportunity employer'); ?>.</p>
				</div>
			</div>
		</div>
	</div>
</div>

				<footer id="site-info" >
				<?php include($homedir . "/resources/html/footer.html"); ?>
				</footer>

<script>
var newslimit = 0;
var eventlimit = 0;
var datestart = "2020-01-01";

	jQuery.post("/resources/php/fetcharticles.php",
		{category: "news",
		lang:"<?php echo $lang; ?>",
		limit: newslimit + ",5",
		datestart: datestart},
		function(response){
		document.getElementById('newsarticles').innerHTML = response;
	});
	

	jQuery.post("/resources/php/fetcharticles.php",
		{category: "event",
		lang:"<?php echo $lang; ?>",
		limit: eventlimit + ",5",
		datestart: datestart},
		function(response){
		document.getElementById('eventarticles').innerHTML = response;
	});

function moveNews(direction){

if(direction==-1){newslimit=newslimit-5;}
if(direction==1){newslimit=newslimit+5;}
if(newslimit<0){newslimit=0;}

	jQuery.post("/resources/php/fetcharticles.php",
		{category: "news",
		lang:"<?php echo $lang; ?>",
		limit: newslimit + ",5",
		datestart: datestart},
		function(response){
		document.getElementById('newsarticles').innerHTML = response;
	});

}




function moveEvent(direction){

if(direction==-1){eventlimit=eventlimit-5;}
if(direction==1){eventlimit=eventlimit+5;}
if(eventlimit<0){eventlimit=0;}

	jQuery.post("/resources/php/fetcharticles.php",
		{category: "event",
		lang:"<?php echo $lang; ?>",
		limit: eventlimit + ",5",
		datestart: datestart},
		function(response){
		document.getElementById('eventarticles').innerHTML = response;
	});

}



function readFull(article){
$(article).parent().slideUp(1000);
 var fullArticle = $(article).parent().next(".fullarticle");
    fullArticle.slideDown(1000);
}

function readLess(article){
$(article).parent().slideUp(1000);
 var snippet = $(article).parent().prev(".snippet");
    snippet.slideDown(1000);
}



</script>
	</body>
</html>