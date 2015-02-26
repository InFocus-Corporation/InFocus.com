<?php
require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/infocusscripts.php");
echo PHP_EOL . '<link rel="canonical" href="http://' .  $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'] . '"/>' . PHP_EOL;
?>

 <style>
.custom-dropdownbox {
position: relative;
display: inline-block;
}
.custom-dropdownbox-toggle {
position: absolute;
top: 0;
bottom: 0;
margin-left: -1px;
padding: 5.5px;
/* support: IE7 */
*height: 1.7em;
*top: 0.1em;
}
.custom-dropdownbox-input {
margin: 0;
padding: 0.3em;
}
.ui-widget{
margin-bottom:1em;
}
.resultsList > li {
max-width:290px;
min-width:125px;
padding-left:10px;
width:18%;
display:inline-block;
vertical-align:top;
}
</style>

	</head>

	<body class="">
		<?php include($homedir . "/resources/html/mainmenu.html"); ?>
		<div class="content">
<div class="C9">

<?php

if(!empty($_SERVER['QUERY_STRING'])){


			$result = mysqli_query($connection,'SELECT title, body, teaser, id FROM articles WHERE id = "' . $_SERVER['QUERY_STRING'] . '"');

			if(mysqli_num_rows ($result)>0){
			while($row = mysqli_fetch_array($result))
				{
					

					echo '	<title>' . $row[0] . ' | InFocus</title>
							<meta name="description" content="' . preg_replace("/<.*?>/","",$row[2]) . '" />
							<h5>' . $row[0] . '</h5>
							<p >' . $row[1] . '</p>
							

							';

				}
				}
				else{
				echo 'Article not found.
				
				<script>
							window.location= "/about#news";
				</script>

				';}
}
				else{
				echo 'Article not found.
				
				<script>
							window.location= "/about#news";
				</script>

				';}
?>

</div>


		</div>

				<footer id="site-info" >
				<?php include($homedir . "/resources/html/footer.html"); ?>
				</footer>

<script>

</script>

	</body>
</html>