<?php
require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/infocusscripts.php");
echo PHP_EOL . '<link rel="canonical" href="http://' .  $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'] . '"/>' . PHP_EOL;

?>
<style>
#main-video {
  height:96%;
  width: 100%;
  margin: 0 auto;
}
</style>
</head>
<body class="">
  <?php
  if(!empty($_SERVER['QUERY_STRING'])){
  	$result = mysqli_query($connection,'SELECT Summary, title, body, vidid, about, industry FROM videos WHERE vidid = "' . $_SERVER['QUERY_STRING'] . '"');
  	$x=0;
  	if(mysqli_num_rows ($result)>0){
  		while($row = mysqli_fetch_array($result)) {
  			echo '<div class="video">
  					<iframe id="main-video" src="//www.youtube.com/embed/' . $row[3] . '?vq=hd720&rel=0&modestbranding=1" frameborder="0" allowfullscreen ></iframe></div>
  				</div>';
  		}
  	} else {
  		echo 'Video not found.';
  	}
  	echo "</body></html>";
  	die();
  }?>
