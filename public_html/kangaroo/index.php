<?php
require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/infocusscripts.php");
require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/header.php");
echo PHP_EOL . '<link rel="canonical" href="http://' .  $_SERVER['SERVER_NAME'] . '"/>' . PHP_EOL;
?>
<title>InFocus / Kangaroo</title>

<script src="/resources/js/vendor/foundation.min.js"></script>
<script type="text/Javascript" src="/resources/js/tagSort.js"></script>
<script type="text/Javascript" src="/resources/js/InFocusCollection.js"></script>
<script type="text/Javascript" src="/resources/js/jquery.colorbox.js"></script>
<link rel="stylesheet" href="/resources/css/colorbox.css" />

<link rel="stylesheet" href="/resources/css/vendor/foundation.min.css" />
<link rel="stylesheet" href="/resources/css/infocus.min.css" />
<link rel="stylesheet" href="/resources/css/core.css" />

<script type="text/Javascript" src="/resources/js/jquery.hoverIntent.min.js"></script>
<script src="/resources/js/jquery.fitvids.js"></script>
<link rel="stylesheet" href="/resources/css/font-awesome.min.css" />
<!--[if IE]>
  <link href="/resources/css/ie.css" media="screen, projection" rel="stylesheet" type="text/css" />
<![endif]-->
<style type="text/css">
    #info {
        padding: 12% 0 0% 0;
        text-align: center;
    }

    #info h2 {
    	color:#414042;
    	font-size:38px;
    	font-weight:100;
    	padding:0 0 22px;
        text-align: center;
    }

    #info h3 {
    	color:#00aeef;
    	font-size:34px;
    	text-transform:none;
    	font-weight:100;
    	padding:0 0 65px;
    }


    .box h2 {
    	font-weight:bold;
    	color:#414042;
    	font-size:28px;
    	border-bottom:1px solid #414042;
    	padding:0 0 5px 0;
    	margin:0 auto;
    	text-align:center;
    	text-transform:uppercase;
    }

    .box p {
    	color:#414042;
    	font-size:22px;
    	line-height:33px;
    	font-weight:100;
    	text-transform:none;
    	margin-top:40px;
    }
/*
    .kangaroo-content a {
    	display:block;
    	border:2px solid #0089cf;
    	color:#0089cf;
    	padding:10px 0px;
    	text-decoration:none;
    	width:163px;
    	margin:66px auto 120px;
    }

    .kangaroo-content a:hover {
    	background:#0089cf;
    	color:#fff;
        -webkit-transition: background-color 500ms ease-out;
        -moz-transition: background-color 500ms ease-out;
        -o-transition: background-color 500ms ease-out;
        transition: background-color 500ms ease-out;}
*/

    .logo {
        text-align: center;
        padding-top: 12%;
    }
    .container {
        margin: 0 auto;
        text-align: center;
    }
    .logo h1 span {
        color: white;
        font-weight: 400;
        text-transform: capitalize;
    	margin-top: -0.3em;
    }
    .logo h4 {
        color: white;
        text-transform: uppercase;
    	margin-bottom:-0.8em;
    	margin-top:0.4em;
    }
    .logo h1 {
        text-transform: uppercase;
        font-weight: 900;
    	margin-bottom:0em;
    }
    .bgslide{
        position: absolute;
        top: 9%;
        width: 100%;
        height: 900px;
        background-size: 100%, 100%;
        background-repeat: no-repeat;
        left: 0px;
        z-index: -10;
    	transition: opacity 2s linear;
    	-webkit-transition: opacity 2s linear;
    	-ms-transition: opacity 2s linear;
    	-moz-transition: opacity 2s linear;
    	-o-transition: opacity 2s linear;
    }
</style>
<script>
    $( document ).ready(function() {
        var elem = document.createElement("span");
        elem.className = "bgslide"
        elem.style.backgroundImage = "url('/resources/images/kangaroo-banner-3.jpg')";
        document.getElementsByClassName("content")[0].appendChild(elem)
        elem = document.createElement("span");
        elem.className = "bgslide"
        elem.style.backgroundImage = "url('/resources/images/kangaroo-banner-2.jpg')";
        document.getElementsByClassName("content")[0].appendChild(elem)
        elem = document.createElement("span");
        elem.className = "bgslide"
        elem.style.backgroundImage = "url('/resources/images/kangaroo-banner-1.jpg')";
        document.getElementsByClassName("content")[0].appendChild(elem)
        var bgslide = 2;

        function changeSlide(){
            document.getElementsByClassName("content")[0].getElementsByClassName("bgslide")[bgslide].style.opacity = 0;
            if(bgslide==2){bgslide=0;}
            else{bgslide = bgslide+1;}
            document.getElementsByClassName("content")[0].getElementsByClassName("bgslide")[bgslide].style.opacity = 1;
        }
        setInterval(changeSlide, 6000);
    });
</script>

</head>

<body id="kangaroo_page">
    <?php include($homedir . "/resources/html/mainmenu.html"); ?>

	<div class="content" id="kangaroo_hero">
		<div class="C9 cmsedit">
            <div>
                <div class="logo">
                    <img alt="logo" src="/resources/images/kangaroo-logo.png" style="width: 22%;" title="Kangaroo Logo">
                    <h4>Introducing</h4>

                    <h1>
                        <span>InFocus</span> Kangaroo
                    </h1>
                    <a class="scrollto" href="#" onclick="$('html, body').animate({scrollTop: $('#info').offset().top}, 2000);"><img alt="" src="/resources/images/kangaroo-down-arrow.png" style="width: 10%;"></a>
                </div>
            </div>
        </div>
    </div>
    <!-- /.banner -->
    <div class="container">
        <div class="intro-content" id="info">
            <h2>THE WORLD'S SMALLEST PERSONAL, POWERFUL, PORTABLE PC.</h2>

            <h3>Your Windows 10 computer anywhere on any screen.</h3>
            <img alt="InFocus Kangaroo Mobile Desktop PC" src="/resources/images/kangaroo-device.jpg" title="Kangaroo Device">
        </div>
        <!-- /#intro /.intro-content -->

        <div class="C3_child Col_child kangaroo-content">
            <div class="box image-set"><img alt="InFocus Kangaroo mobile PC on the go" src="/resources/images/kangaroo-device-image-1.jpg" title="">
                <h2>Kangaroo on the go</h2>
                <p>Small enough to carry in your pocket or purse with up to 4 hours of battery life. When you want to access your files, Kangaroo can OS Linx to iPad device screens to interact with Windows via USB cable.</p>
            </div>
            <!-- /.box-1 -->

            <div class="box image-set"><img alt="InFocus Kangaroo mobile PC at home" src="/resources/images/kangaroo-device-image-2.jpg" title="">
                <h2>Kangaroo at home</h2>
                <p>Use your TV or any screen to watch movies and recorded videos, play games, or access your work files just by plugging the cable into your kangaroo.</p>
            </div>
            <!-- /.box-2 -->

            <div class="box image-set"><img alt="InFocus Kangaroo mobile PC at work" src="/resources/images/kangaroo-device-image-3.jpg" title="">
                <h2>Kangaroo at work</h2>
                <p>Using the latest quad-core Intel CPU, you can create or work on your standard Office documents, access the web, and enjoy any type of media.</p>
            </div>
            <!-- /.box-3 -->

            <div class="clear">&nbsp;</div>
            <br>
            <a href="http://www.kangaroo.cc/" class="button button--primary"target="_blank">LEARN MORE and WHERE TO BUY</a>
            <br><br>
        </div>
        <!-- /.container -->
        <a href="http://www.newegg.com/Product/Product.aspx?Item=N82E16883722001" target="_blank">Buy Kangaroo from NewEgg</a><br>
        <a href="http://www.microsoftstore.com/store/msusa/en_US/pdp/InFocus-Kangaroo-Signature-Edition-Mobile-Desktop/productID.328073600" target="_blank">Buy Kangaroo from Microsoft</a><br>
        <a href="https://www.infocusdirect.com/peripherals/kangaroo-mobile-desktop-pro">Buy Kangaroo Pro from InFocusDirect.com (US only)</a><br>
        <a href="http://www.amazon.com/Kangaroo-MD2B-HD1B-Mobile-Desktop/dp/B01CZM679I">Buy Kangaroo Pro from Amazon</a><br>
        <!-- /.content -->
    </div>
    <footer id="site-info" >
	<?php include($homedir . "/resources/html/footer.html"); ?>
	</footer>
</body>
</html>
