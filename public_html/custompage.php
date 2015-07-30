<?php

require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/infocusscripts.php");
require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/header.php");



if($_GET['edit']=="true" OR $_COOKIE["cmsedit"] == "Activate Edit Mode"){CMSscript("/resources/html/education-$lang.html", "", $homedir.'/resources/html/', 'admin,salespublisher,saleseditor,marketingpublisher,marketingeditor,editor', ".src", "education", "false", "SavePage","body");}

 

echo '

</head>

<body>

';

 if($_GET['edit']=="true" OR $_COOKIE["cmsedit"] == "Activate Edit Mode"){CMSHTML("SavePage",'admin,salespublisher,saleseditor,marketingpublisher,marketingeditor');}

if($_GET['pagetype']!="blank"){include($homedir . "/resources/html/mainmenu.html");}



if($_GET['pagetype']!="full"){

echo '	<div class="content">

		<div class="C9 cmsedit">

		';

	}

if(empty($_GET['pagename'])){$_GET['pagename'] = $_SERVER['QUERY_STRING'];}



		$sql = "SELECT pagecontent FROM pages WHERE pagename = '" . $_GET['pagename'] . "' AND lang = '" . $lang . "'";

		$results = mysqli_query($connection,$sql);

		while($row = mysqli_fetch_array($results)){echo $row['pagecontent'];}

if($_GET['pagetype']!="full"){

echo '		</div>

	</div>';

	}



	if($_GET['pagetype']!="blank"){

echo '			<footer id="site-info" >';

include($homedir . "/resources/html/footer.html");

echo '			</footer>';

	}

	echo '	</body>

</html>

';