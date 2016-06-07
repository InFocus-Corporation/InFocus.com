<?php
require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/infocusscripts.php");
require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/header.php");
echo PHP_EOL . '<link rel="canonical" href="http://' .  $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'] . '"/>' . PHP_EOL;



if(strlen($_SERVER['QUERY_STRING'])>0){
  echo "<script>window.history.pushState('', '', '/about#" . $_SERVER['QUERY_STRING'] . "');</script>";
}

$titles = array(
  'infocus-team'=> 'The Team',
  'news'=> 'News',
  'events'=> 'Events',
  'careers'=> 'Careers'
);
$title = 'About Overview';
if(in_array(array_keys($_SERVER['QUERY_STRING'], $titles))) {
  $title = $titles[$_SERVER['QUERY_STRING']];
}
echo '<title>InFocus | '.$title.'</title>';

?>
<style>
.read-more{
cursor:pointer;
}

.tabs > .active {
    text-align: left;
}
</style>
<script>
var title = 'About Overview';
  titles = {
    'infocus-team': 'The Team',
    'news': 'News',
    'events': 'Events',
    'careers': 'Careers'
  },
  hash = window.location.hash.replace('#', '');

function changeTitle(hash) {
  title = 'About Overview';
  if(titles[hash]) title = titles[hash];
  document.title = 'InFocus | '+title;
}
changeTitle(hash);

$(function () {
  $('nav a').click(function (e) {
    changeTitle(this.href.substr(this.href.indexOf('#')+1));
  });
});
</script>
</head>
<body class="about--page">
		<?php include($homedir . "/resources/html/mainmenu.html"); ?>
      	<h2 class="about--title title"><?php echo translate('About InFocus'); ?></h2>
        <div class="tabs">
          <nav role='navigation' class="C10 transformer-tabs tabs-wrapper">
            <div class="content">
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
              </div>
        	</nav>
      		<div id="overview" class="active">
      			  <div class="C10">
      					<!-- <?php echo $pageText['overview'];?> -->
                <div class="about--row first_row">
                    <div class="color_stripe white"></div>
                    <div class="content">
                      <div class="module--tag">
                        <span></span>
                      </div>
                      <h4>Our philosophy</h4>
                      <p class="lead-text">You do important work every day. Whether it’s monitoring traffic systems, deploying first responders, teaching or presenting your quarterly numbers, what you do matters. We respect that.</p>
                      <p>You rely on your digital tools to enable you to get work done faster and better. Your PC. Your smartphone. Dozens of apps. And when you need to connect with one person or a thousand anywhere, any time from any device, we have the right solution for you.
                      <p>More than just conference room, classroom, display wall and boardroom solutions, we offer tools that connect global enterprise infrastructures and employees from any and everywhere. And while technology innovation is important, sharing ideas, information and connecting with people beyond what you can do with a traditional conference call is what we care about. Because that’s how successful companies connect teams and monitor information. That’s how you do it better and faster.</p>
                      <p>We do important work every day, too – we work with a passion to provide you seamless solutions that enable you to share more, do more, work faster, be smarter and succeed beyond what you’d expect every single day. We’re powering great work. We’re InFocus.</p>
                      <p style="text-align:center;"><br><a class="btn" href="http://www.infocus.com/resources/documents/InFocus-Corporate-Brochure-EN.pdf">View InFocus Brochure</a></p>
                    </div>
                </div>
                <div class="about--row second_row">
                    <div class="content">
                      <div class="module--tag">
                        <span></span>
                      </div>
                      <h4>Our history</h4>
                      <p class="lead-text">In 1986, a team of engineers in Portland’s Silicon Forest imagined there must be a better way to share information. Founded on this belief, InFocus went on to create new ways to present information and collaborate beyond overhead projection, combining digital technology with light to advance how and what we can display in large, impactful ways.</p>
                      <p>InFocus is the inventor of the digital projector. Many firsts followed, including the first DLP projector, the first sub-five-pound projector, the first ultra-thin projection television, the first all-in-one interactive whiteboard with touch technology and videoconferencing, and many more milestones that have contributed to creating a multi-billion-dollar display industry.</p>
                      <p>But it wasn’t enough to just be first. InFocus also wanted to be the best. The best partner to our channel. The best provider to our customers. That’s why InFocus also forged the way with industry-defining channel and marketing programs as well as innovative products that are backed by US-based service and support. InFocus has grown and changed over the last three decades both organically as well as through acquisitions, such as Proxima/ASK in 1999 and recently with Jupiter Systems, Avistar and VIDCO in 2015.</p>
                      <p>Today, InFocus provides end-to-end display and videoconferencing solutions from video phones to projectors, DigiEasel and JTouch interactive touchscreens, the Mondopad all-in-one touch and videoconferencing solutions and ConX videoconferencing display walls. We also offer videoconferencing software and cloud services, a full array of accessories, tablets, Kangaroo pocket PC’s, display wall processors and visualization and collaboration products that enable anyone to see and connect anywhere at any time, even using personal and mobile devices. InFocus is privately owned and headquartered in Portland, Oregon with offices and employees all over the world.</p>
                    </div>
                </div>

                <img class="full_width_img" src="/resources/static/images/about/about--collage.jpg"/>
      				</div>
      		</div>
      		<div id="infocus-team">
            <div class="content">
        			<h2 class="sub-title" style="text-align:center;"><?php echo translate('Management Team'); ?></h2>
        			<ul class="staff-list">
        					<?php echo $pageText['bios'];?>
        			</ul>
            </div>
      		</div>
      		<div id="news" class="news">
              <div class="content">
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
      		</div>
      		<div id="events" class="news">
            <div class="content">
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
      		</div>
      		<div id="careers">
            <div class="content">
        			<div class="C2 Col" style="border-right: 1px solid grey">
        				<h2 class="title"><?php echo str_replace(" ","<br>", translate('Work With InFocus')); ?></h2>
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
