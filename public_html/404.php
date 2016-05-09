<?php
header("HTTP/1.0 404 Not Found");
//require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/infocusscripts.php");
require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/header.php");
if( substr($_SERVER['DOCUMENT_ROOT'],-11) == "public_html"){$lang = "en";}
else{$lang = substr($_SERVER['DOCUMENT_ROOT'],-2);}
?>
<link rel="stylesheet" href="/resources/css/vendor/foundation.min.css" />
<link rel="stylesheet" href="/resources/css/infocus.min.css" />
<link rel="stylesheet" href="/resources/css/page-404.min.css" />

</head>
<body class="page--404">
  <?php include($_SERVER['DOCUMENT_ROOT'] . "/resources/html/mainmenu.html"); ?>
  <div class="hero_row hero-row--404 row--full-height">
    <div class="row">
      <div class="small-10 small-offset-1 medium-8 medium-offset-2 columns">
        <h2 class="text-center text--orange">404 Error</h2>
        <h3 class="text-center text--white">&#8212;</h3>
        <h2 class="lead_text--secondary_headline text-center text--white">We regret this page is missing or unavailable.</h2>
        <p class="text-center text--white">You might try searching for a keyword(s) in the navigation above.</p>
      </div>
    </div>
  </div>


  <footer id="site-info" >
    <?php include($_SERVER['DOCUMENT_ROOT'] ."/resources/html/footer.html"); ?>
  </footer>
</body>
</html>
