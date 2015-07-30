<!DOCTYPE html>
<?php
$groups_allowed = "admin,editor,saleseditor,marketingeditor";
require($_SERVER['DOCUMENT_ROOT'] . "/login/ublock.php");

require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/infocusscripts.php");
require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/header.php");
$localdir = dirname(__FILE__);

require($_SERVER['DOCUMENT_ROOT'] . "/resources/cmsmainmenu.html");
mysqli_set_charset($connection, "utf8");


$pn = $_GET['pn'];
if(!empty($_GET['lang'])){$lang = $_GET['lang'];}

?>
<script type="text/Javascript" src="/resources/js/jquery.mousewheel.js"></script>

<Script>
$(function ()
{
  var   gesturesX = 0
    ,   gesturesY = 0
    ,      startX = 0
    ,      startY = 0
    , isMouseDown = false
  $('html').mousemove(function (e)
  {
    gesturesX = parseInt(e.pageX, 10)
    gesturesY = parseInt(e.pageY, 10)
    if (isMouseDown)
    {
      window.scrollBy(startX - gesturesX, startY - gesturesY)
      return false
    }

  }
  )
  $('html').mousedown(function ()
  {
    startX = gesturesX
    startY = gesturesY
    isMouseDown = true
    return false
  }
  )
  $('html').mouseup(function ()
  {
    isMouseDown = false
    return false
  }
  )
}
)
var divScale=1;
$('html').on('mousewheel', function(event) {
divScale = divScale + (event.deltaY/5);
if(divScale<.2){divScale=.20;}
if(divScale>5){divScale=5;}
$('#testing').css("-moz-transform","scale("+divScale+")");
event.preventDefault();
    console.log(event.deltaX, event.deltaY, event.deltaFactor);
});

 // $(function() {
// $( ".Node" ).draggable();
// });
</script>
<style>

div {
     -webkit-transition: font-size 1s ease-in-out, width 1s ease-in-out, height 1s ease-in-out,-webkit-transform 1s ease-in-out;  
    transition: font-size 1s ease-in-out, width 1s ease-in-out, height 1s ease-in-out, transform 1s ease-in-out;

} 


.large{
border-radius:100%;
width:200px;
height:100px;
background-color:red;
margin:auto;
text-align:center;
position:absolute;
opacity:1;
line-height: 2;
z-index:1002;
}
.large:hover{
width:500px;
height:500px;
font-size:16px;
-ms-transform: translate(-150px,-100px); /* IE 9 */
-webkit-transform: translate(-150px,-100px); /* Chrome, Safari, Opera */
transform: translate(-150px,-100px);
}


.medium{
border-radius:100%;
width:50px;
height:50px;
background-color:blue;
font-size:8px;
margin:auto;
text-align:center;
position:absolute;
line-height: 2;
z-index:1001;
}
.small{
border-radius:100%;
width:70px;
height:70px;
background-color:green;
font-size:10px;
margin:auto;
text-align:center;
position:absolute;
z-index:1001;
}
.small:hover{
width:220px;
height:220px;
left:20px;
font-size:16px;
-ms-transform: translate(-75px,-75px); /* IE 9 */
-webkit-transform: translate(-75px,-75px); /* Chrome, Safari, Opera */
transform: translate(-75px,-75px);
}
.dev:hover:after{
content:"Any changes to the code pages here will not effect alternate language sites, or the dev sites."
}
.devcore:hover:after{
content:"The core development site houses documents,\A php files, css, images, header and footer, etc.  These are the \A main files that are required for the pages below to function.  \AThese files are shared between ALL language versions, but not with \A production.  This site is for testing major site changes before moving to \A production.";
white-space: pre;
}
.prodcore:hover:after{
content:"The core production site houses documents, \A php files, css, images, header and footer, etc. These are the \A main files that are required for the pages below to function. These files \A are shared between ALL language versions, but not with development. \A Changes here will generally be done infrequently and are not done through \A the CMS (other than uploading documents and images).";
white-space: pre;
}
.prod:hover:after{
content:"Any changes to the code pages here will not effect alternate language sites, or the production sites."
}
.page{
border-radius:100%;
width:40px;
height:20px;
background-color:darkgrey;
font-size:12px;
margin:auto;
text-align:center;
position:absolute;
}
.line{
background-color:black;
height:3.5px;
width:140px;
position:absolute;
}
</style>
</head>




<div id="testing" style="position:relative;color:white;">











<div class="Node ui-draggable" style="border-radius: 100%; background-color: darkblue; width: 200px; height: 200px; top: 448px; left: 806px; position: relative;">Site Server</div>



















<div class="line Node ui-draggable" style="top: 632.333px; left: 1081.03px; transform: rotate(120deg);">

</div>
<div class="line Node ui-draggable" style="top: 669.317px; left: 738.05px; transform: rotate(150deg);"></div>

<div class="line Node ui-draggable" style="top: 1964.62px; left: 1735.9px; transform: rotate(180deg);"></div>

<div class="line Node ui-draggable" style="top: 487.65px; left: 684.317px; transform: rotate(195deg);"></div>

<div class="line Node ui-draggable" style="top: 454.017px; left: 705.083px; transform: rotate(210deg);"></div>

<div class="line Node ui-draggable" style="top: 426.933px; left: 730.917px; transform: rotate(225deg);"></div>

<div class="line Node ui-draggable" style="top: 404.85px; left: 768.517px; transform: rotate(240deg);"></div>

<div class="line Node ui-draggable" style="top: 391.35px; left: 835.083px; transform: rotate(270deg);"></div>

<div class="line Node ui-draggable" style="top: 404.35px; left: 899.55px; transform: rotate(300deg);"></div>

<div class="line Node ui-draggable" style="top: 427.917px; left: 941.65px; transform: rotate(315deg);"></div>

<div class="line Node ui-draggable" style="top: 459.55px; left: 970.083px; transform: rotate(330deg);"></div>

<div class="line Node ui-draggable" style="top: 491.6px; left: 990.25px; transform: rotate(345deg);"></div>


<div class="line Node ui-draggable" style="top: 666.85px; left: 922.95px; transform: rotate(35deg);"></div>

<div class="line Node ui-draggable" style="top: 720px; left: 1165.62px; transform: rotate(-15deg);"></div>

<div class="line Node ui-draggable" style="top: 681.75px; left: 1153.08px; transform: rotate(-30deg);"></div>

<div class="line Node ui-draggable" style="top: 654.417px; left: 1119.15px; transform: rotate(-45deg);"></div>

<div class="line Node ui-draggable" style="top: 620.767px; left: 1033.08px; transform: rotate(-75deg);"></div>

<div class="line Node ui-draggable" style="top: 622.767px; left: 629.083px; transform: rotate(75deg);"></div>

<div class="line Node ui-draggable" style="top: 634.15px; left: 585.133px; transform: rotate(60deg);"></div>

<div class="line Node ui-draggable" style="top: 651.433px; left: 545.217px; transform: rotate(45deg);"></div>

<div class="line Node ui-draggable" style="top: 681.1px; left: 514.183px; transform: rotate(30deg);"></div>

<div class="line Node ui-draggable" style="top: 713.3px; left: 496.55px; transform: rotate(15deg);"></div>
<div class="line Node ui-draggable" style="width: 240px; top: 891px; left: 575px; transform: rotate(95deg);"></div>
<div class="line Node ui-draggable" style="width: 240px; top: 830px; left: 1130px; transform: rotate(35deg);"></div>
<div class="line Node ui-draggable" style="width: 240px; top: 900px; left: 985px; transform: rotate(85deg);"></div>
<div class="line Node ui-draggable" style="width: 240px; top: 823px; left: 431px; transform: rotate(-35deg);"></div>



<div class="Node" style="position: relative; left: 688px; top: -328px;">
<div class="line Node ui-draggable" style="width: 90px; top:1086px; left: 698px; transform: rotate(50deg);"></div>
<div class="page ui-draggable" style="width: 90px; top:1110px; left: 766px; ">About</div>
<div class="line ui-draggable" style="width: 90px; top:1111px; left: 678px; transform: rotate(70deg);"></div>
<div class="page  ui-draggable" style="width: 90px; top:1145px; left: 734px; ">Customers</div>
<div class="line ui-draggable" style="width: 90px; top:1123px; left: 638px; transform: rotate(90deg);"></div>
<div class="page ui-draggable" style="width: 90px; top:1169px; left: 638px; ">Products</div>
<div class="line ui-draggable" style="width: 90px; top:1111px; left: 598px; transform: rotate(110deg);"></div>
<div class="page ui-draggable" style="width: 90px; top:1145px; left: 544px; ">Support</div>
<div class="line ui-draggable" style="width: 90px; top:1086px; left: 578px; transform: rotate(130deg);"></div>
<div class="page ui-draggable" style="width: 90px; top:1110px; left: 510px; ">Misc</div>
</div>
<div class="small Node ui-draggable dev" style="top: 884px; left: 1336px;"><br>dev.infocus.com<br></div>

<div class="Node" style="position: relative; left: 432px; top: -200px;">
<div class="line Node ui-draggable" style="width: 90px; top:1086px; left: 698px; transform: rotate(50deg);"></div>
<div class="page ui-draggable" style="width: 90px; top:1110px; left: 766px; ">About</div>
<div class="line ui-draggable" style="width: 90px; top:1111px; left: 678px; transform: rotate(70deg);"></div>
<div class="page  ui-draggable" style="width: 90px; top:1145px; left: 734px; ">Customers</div>
<div class="line ui-draggable" style="width: 90px; top:1123px; left: 638px; transform: rotate(90deg);"></div>
<div class="page ui-draggable" style="width: 90px; top:1169px; left: 638px; ">Products</div>
<div class="line ui-draggable" style="width: 90px; top:1111px; left: 598px; transform: rotate(110deg);"></div>
<div class="page ui-draggable" style="width: 90px; top:1145px; left: 544px; ">Support</div>
<div class="line ui-draggable" style="width: 90px; top:1086px; left: 578px; transform: rotate(130deg);"></div>
<div class="page ui-draggable" style="width: 90px; top:1110px; left: 510px; ">Misc</div>
</div>
<div class="small Node ui-draggable dev" style="top: 1012px; left: 1080px;"><br>dev.infocus.de<br></div>


<div class="Node" style="position: relative; left: 0px; top: -200px;">
<div class="line Node ui-draggable" style="width: 90px; top:1086px; left: 698px; transform: rotate(50deg);"></div>
<div class="page ui-draggable" style="width: 90px; top:1110px; left: 766px; ">About</div>
<div class="line ui-draggable" style="width: 90px; top:1111px; left: 678px; transform: rotate(70deg);"></div>
<div class="page  ui-draggable" style="width: 90px; top:1145px; left: 734px; ">Customers</div>
<div class="line ui-draggable" style="width: 90px; top:1123px; left: 638px; transform: rotate(90deg);"></div>
<div class="page ui-draggable" style="width: 90px; top:1169px; left: 638px; ">Products</div>
<div class="line ui-draggable" style="width: 90px; top:1111px; left: 598px; transform: rotate(110deg);"></div>
<div class="page ui-draggable" style="width: 90px; top:1145px; left: 544px; ">Support</div>
<div class="line ui-draggable" style="width: 90px; top:1086px; left: 578px; transform: rotate(130deg);"></div>
<div class="page ui-draggable" style="width: 90px; top:1110px; left: 510px; ">Misc</div>
</div>
<div class="small Node ui-draggable prod" style="top: 1012px; left: 648px;"><br>www.infocus.de<br></div>

<div class="Node" style="position: relative; left: -254px; top: -326px;">
<div class="line Node ui-draggable" style="width: 90px; top:1086px; left: 698px; transform: rotate(50deg);"></div>
<div class="page ui-draggable" style="width: 90px; top:1110px; left: 766px; ">About</div>
<div class="line ui-draggable" style="width: 90px; top:1111px; left: 678px; transform: rotate(70deg);"></div>
<div class="page  ui-draggable" style="width: 90px; top:1145px; left: 734px; ">Customers</div>
<div class="line ui-draggable" style="width: 90px; top:1123px; left: 638px; transform: rotate(90deg);"></div>
<div class="page ui-draggable" style="width: 90px; top:1169px; left: 638px; ">Products</div>
<div class="line ui-draggable" style="width: 90px; top:1111px; left: 598px; transform: rotate(110deg);"></div>
<div class="page ui-draggable" style="width: 90px; top:1145px; left: 544px; ">Support</div>
<div class="line ui-draggable" style="width: 90px; top:1086px; left: 578px; transform: rotate(130deg);"></div>
<div class="page ui-draggable" style="width: 90px; top:1110px; left: 510px; ">Misc</div>
</div>
<div class="small Node ui-draggable prod" style="top: 884px; left: 394px;"><br>www.infocus.com<br></div>



<div class="large Node ui-draggable devcore" style="top: 686px; left: 634px;">
    <br>
                                Development Site
    <br>
</div>
<div class="large Node ui-draggable prodcore" style="top: 688px; left: 970px;">
    <br>
                                Production Site
    <br>
</div>

<div class="medium Node ui-draggable" style="top: 348px; left: 1060px;">Product Specs</div>
<div class="medium Node ui-draggable" style="top: 276px; left: 880px;">Product Descriptions</div>
<div class="medium Node ui-draggable" style="top: 444.717px; left: 640px;">Product Overviews</div>
<div class="medium Node ui-draggable" style="top: 398px; left: 1098px;">Articles</div>
<div class="medium Node ui-draggable" style="top: 346px; left: 708px;">Downloads</div>
<div class="medium Node ui-draggable" style="top: 390.717px; left: 670px;">Translations</div>
<div class="medium Node ui-draggable" style="top: 302px; left: 768px;">"Custom" Pages</div>
<div class="medium Node ui-draggable" style="top: 302px; left: 992px;">Resellers</div>
<div class="medium Node ui-draggable" style="top: 448px; left: 1126px;">Accessory Matrix</div>
<div class="medium Node ui-draggable" style="top: 276px; left: 880px;">Redirects</div>
<div class="medium Node ui-draggable" style="top: 444.717px; left: 640px;">Form Assignments</div>
<div class="medium Node ui-draggable" style="top: 346px; left: 708px;"></div>
<div class="medium Node ui-draggable" style="top: 390.717px; left: 670px;"></div>
<div class="medium Node ui-draggable" style="top: 302px; left: 768px;"></div>
<div class="medium Node ui-draggable" style="top: 302px; left: 992px;"></div>
<div class="medium Node ui-draggable l1" style="top: 526px; left: 656px;"><br>Images<br></div>
<div class="medium Node ui-draggable l2" style="top: 546px; left: 592px;"><br>CSS<br></div>
<div class="medium Node ui-draggable l3" style="top: 580px; left: 536px;"><br>PHP<br></div>
<div class="medium Node ui-draggable l4" style="top: 624px; left: 496px;"><br>Documents<br></div>
<div class="medium Node ui-draggable l5" style="top: 680px; left: 470px;"><br>Misc<br></div>
<div class="medium Node ui-draggable r1" style="top: 526px; left: 1096px;"><br>Images<br></div>
<div class="medium Node ui-draggable r2" style="top: 546px; left: 1162px;"><br>CSS<br></div>
<div class="medium Node ui-draggable r3" style="top: 580px; left: 1214px;"><br>PHP<br></div>
<div class="medium Node ui-draggable r4" style="top: 624px; left: 1262px;"><br>Documents<br></div>
<div class="medium Node ui-draggable r5" style="top: 680px; left: 1292px;"><br>Misc<br></div>




</body>
</html>

