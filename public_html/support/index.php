<!DOCTYPE html>
<?php
require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/infocusscripts.php");
require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/header.php");

echo PHP_EOL . '<link rel="canonical" href="http://' .  $_SERVER['SERVER_NAME'] . '/support/"/>' . PHP_EOL;

?>

<script>
  (function( $ ) {
    $.widget( "custom.combobox", {
      _create: function() {
        this.wrapper = $( "<span>" )
          .addClass( "custom-combobox" )
          .insertAfter( this.element );
 
        this.element.hide();
        this._createAutocomplete();
        this._createShowAllButton();
      },
 
      _createAutocomplete: function() {
        var selected = this.element.children( ":selected" ),
          value = selected.val() ? selected.text() : "";
 
        this.input = $( "<input>" )
          .appendTo( this.wrapper )
          .val( value )
          .attr( "title", "" )
          .addClass( "custom-combobox-input ui-widget ui-widget-content ui-state-default ui-corner-left" )
          .autocomplete({
            delay: 0,
            minLength: 0,
            source: $.proxy( this, "_source" )
          })
          .tooltip({
            tooltipClass: "ui-state-highlight"
          });
 
        this._on( this.input, {
          autocompleteselect: function( event, ui ) {
            ui.item.option.selected = true;
            this._trigger( "select", event, {
              item: ui.item.option
            });
          },
 
          autocompletechange: "_removeIfInvalid"
        });
      },
 
      _createShowAllButton: function() {
        var input = this.input,
          wasOpen = false;
 
        $( "<a>" )
          .attr( "tabIndex", -1 )
          .attr( "title", "Show All Items" )
          .tooltip()
          .appendTo( this.wrapper )
          .button({
            icons: {
              primary: "ui-icon-triangle-1-s"
            },
            text: false
          })
          .removeClass( "ui-corner-all" )
          .addClass( "custom-combobox-toggle ui-corner-right" )
          .mousedown(function() {
            wasOpen = input.autocomplete( "widget" ).is( ":visible" );
          })
          .click(function() {
            input.focus();
 
            // Close if already visible
            if ( wasOpen ) {
              return;
            }
 
            // Pass empty string as value to search for, displaying all results
            input.autocomplete( "search", "" );
          });
      },
 
      _source: function( request, response ) {
        var matcher = new RegExp( $.ui.autocomplete.escapeRegex(request.term), "i" );
        response( this.element.children( "option" ).map(function() {
          var text = $( this ).text();
          if ( this.value && ( !request.term || matcher.test(text) ) )
            return {
              label: text,
              value: text,
              option: this
            };
        }) );
      },
 
      _removeIfInvalid: function( event, ui ) {
 
        // Selected an item, nothing to do
        if ( ui.item ) {
          return;
        }
 
        // Search for a match (case-insensitive)
        var value = this.input.val(),
          valueLowerCase = value.toLowerCase(),
          valid = false;
        this.element.children( "option" ).each(function() {
          if ( $( this ).text().toLowerCase() === valueLowerCase ) {
            this.selected = valid = true;
            return false;
          }
        });
 
        // Found a match, nothing to do
        if ( valid ) {
          return;
        }
 
        // Remove invalid value
        this.input
          .val( "" )
          .attr( "title", value + " didn't match any item" )
          .tooltip( "open" );
        this.element.val( "" );
        this._delay(function() {
          this.input.tooltip( "close" ).attr( "title", "" );
        }, 2500 );
        this.input.data( "ui-autocomplete" ).term = "";
      },
 
      _destroy: function() {
        this.wrapper.remove();
        this.element.show();
      }
    });
  })( jQuery );
 
  $(function() {
    $( "#combobox" ).combobox();
    $( "#toggle" ).click(function() {
      $( "#combobox" ).toggle();
    });
  });
  

 </script>
<style>
div.bulleted ul{
list-style-type: disc;
list-style-position: inside;
}
table { border-collapse: collapse; text-align: left; width: 100%; } 
.rounded {font: normal 12px/150% Arial, Helvetica, sans-serif; background: #fff; overflow: hidden; border: 1px solid #006699; -webkit-border-radius: 12px; -moz-border-radius: 12px; border-radius: 12px; }
table td, 
table th { padding: 4px 6px; }
table thead th {background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #006699), color-stop(1, #00557F) );background:-moz-linear-gradient( center top, #006699 5%, #00557F 100% );filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#006699', endColorstr='#00557F');background-color:#006699; color:#FFFFFF; font-size: 15px; font-weight: bold; border-left: 1px solid #0070A8; } 
table thead th:first-child { border: none; }
table tbody td { color: #00496B; border-left: 1px solid #E1EEF4;font-size: 12px;font-weight: normal; }
table tbody td:first-child { border-left: none; }
table tbody tr:last-child td { border-bottom: none; }
table tfoot td div { border-top: 1px solid #006699;background: #E1EEF4;} 
table tfoot td { padding: 0; font-size: 12px } 
table tfoot td div{ padding: 2px; }
table tfoot td ul { margin: 0; padding:0; list-style: none; text-align: right; }
table tfoot  li { display: inline; }
table tfoot li a { text-decoration: none; display: inline-block;  padding: 2px 8px; margin: 1px;color: #FFFFFF;border: 1px solid #006699;-webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px; background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #006699), color-stop(1, #00557F) );background:-moz-linear-gradient( center top, #006699 5%, #00557F 100% );filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#006699', endColorstr='#00557F');background-color:#006699; }
table tfoot ul.active, 
table tfoot ul a:hover { text-decoration: none;border-color: #006699; color: #FFFFFF; background: none; background-color:#00557F;}
table tbody tr:nth-child(even) {
    background: #E1EEF4; color: #00496B;
}

  .custom-combobox {
   position: relative;
   display: inline-block;
font-size:80%;
	background: #e8edff;
 }
  .custom-combobox-toggle {
    position: absolute;
    top: 0;
    bottom: 0;
    margin-left: -1px;
    padding: 0;
    /* support: IE7 */
    *height: 1em;
    *top: 0.1em;
	background: #e8edff;
  }
  .custom-combobox-input {
	margin: 0;
font-size:80%;
    padding: 0.3em;
	background: #e8edff;
	padding-left:40px;
  }

  .ui-autocomplete {
max-height: 200px;
font-size:80%;
overflow-y: auto;
/* prevent horizontal scrollbar */
overflow-x: hidden;
}
/* IE 6 doesn't support max-height
* we use height instead, but this forces the menu to always be this tall
*/
* html .ui-autocomplete {
height: 200px;
}

.ui-widget-dd{
left:200px;
   display: inline;

}

.thumb img{
vertical-align:middle;
width:100px;
float:left;
}

.colorclass2 #cboxLoadedContent{
margin-bottom:20px;
padding:10px;
}
.colorclass2 #cboxContent{
opacity:1;
background-color:white;
}
</style>
	</head>
	<body>
		<?php include($homedir . "/resources/html/mainmenu.html"); ?>

<div class="content">
<div class="C8">
<h4 class="pane-title" >Welcome to InFocus Support</h4>
    
    <style type="text/css">
.Button-1 {
	-moz-box-shadow:inset 0px 1px 0px 0px #97c4fe;
	-webkit-box-shadow:inset 0px 1px 0px 0px #97c4fe;
	box-shadow:inset 0px 1px 0px 0px #97c4fe;
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #3d94f6), color-stop(1, #1e62d0) );
	background:-moz-linear-gradient( center top, #3d94f6 5%, #1e62d0 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#3d94f6', endColorstr='#1e62d0');
	background-color:#3d94f6;
	-moz-border-radius:6px;
	-webkit-border-radius:6px;
	border-radius:6px;
	border:1px solid #337fed;
	display:inline-block;
        color:white;
	font-family:arial;
	font-size:15px;
	font-weight:bold;
	padding:6px 24px;
	text-decoration:none;
	text-shadow:1px 1px 0px #1570cd;
}.Button-1:hover {
text-decoration:none;
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #1e62d0), color-stop(1, #3d94f6) );
	background:-moz-linear-gradient( center top, #1e62d0 5%, #3d94f6 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#1e62d0', endColorstr='#3d94f6');
	background-color:#1e62d0;
}.Button-1:active {
	position:relative;
	top:1px;
}
</style>

<div class="C7 Col" style="">
Our goal in the support department is to provide you every tool you need to resolve your issue in the most convenient way possible.  Customer Service is exceptional people and products developed with teamwork, flexibility, and continuous improvement to create customers for life. Customer Service is our most important product.  Please don't hesitate to contact us for help.
<div style="padding-top:20px;">
<a href="http://www.infocusstore.com/Lamps-Accessories/b/7448620011?ie=UTF8&title=Lamps" class="Button-1" style="color:white;">Buy a Lamp</a>
&nbsp;&nbsp;&nbsp;&nbsp;
<a href="#AreYouSure-popup" class="colorbox-inline Button-1" style="color:white;">Contact Support</a>
&nbsp;&nbsp;&nbsp;&nbsp;
<a href="/calculator" class="Button-1" style="color:white;">Projector Calculator</a>
</div></div>

<div class="C3 Col image-set" style="float:right;">
<img src="/resources/images/SupportLogo" alt="SupportLogo.png" style="" border="0" >

</div>
<div class="C4" style="margin:20px 0;">
<div style="background-color:lightgrey;border-radius:10px;padding:10px;margin-bottom:10px;">If you are having trouble finding your product<br> just start typing in the box below.</div>
			<div class="ui-widget" style="padding-bottom:30px;">
			<!--pulls all projectors from the database-->
			<select id="combobox" style="height:90px;float:left;">
			<option value="" selected><?php echo $Selectproduct; ?></option>
			<option value="/accessories/product?pn=INLITESHOW3">Liteshow III</option>
			<option value="/accessories/product?pn=INLITESHOW2">Liteshow II</option>
			<?php 
			$sql = "SELECT partnumber, productgroup, active FROM producttext WHERE partnumber NOT LIKE 'A%' AND partnumber NOT LIKE 'C%' AND partnumber NOT LIKE 'DP%' AND productgroup != 'Accessory' AND productgroup != 'Series' AND lang = '" . $lang . "' AND active is not null ORDER BY partnumber";
			$results = mysqli_query($connection,$sql);
			while($row = mysqli_fetch_array($results)){echo '<option value="/'. strtolower($row['productgroup']) . "s/" . $row['partnumber'] .'">'.$row['partnumber'] .'</option>';}
			?>      
			</select><INPUT type="button" id="btn" class="Button-1" style="display:inline;margin-left:50px;" value="Go" onclick="window.location = document.getElementById('combobox').value + '#support';"  /><br>
			</div>
			</div>
 <div class="" style="clear:both;">
 <style type="text/css">
.Button-1 {
	-moz-box-shadow:inset 0px 1px 0px 0px #97c4fe;
	-webkit-box-shadow:inset 0px 1px 0px 0px #97c4fe;
	box-shadow:inset 0px 1px 0px 0px #97c4fe;
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #3d94f6), color-stop(1, #1e62d0) );
	background:-moz-linear-gradient( center top, #3d94f6 5%, #1e62d0 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#3d94f6', endColorstr='#1e62d0');
	background-color:#3d94f6;
	-moz-border-radius:6px;
	-webkit-border-radius:6px;
	border-radius:6px;
	border:1px solid #337fed;
	display:inline-block;
        color:white;
	font-family:arial;
	font-size:15px;
	font-weight:bold;
	padding:6px 24px;
	text-decoration:none;
	text-shadow:1px 1px 0px #1570cd;
}
.Button-1:hover {
text-decoration:none;
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #1e62d0), color-stop(1, #3d94f6) );
	background:-moz-linear-gradient( center top, #1e62d0 5%, #3d94f6 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#1e62d0', endColorstr='#3d94f6');
	background-color:#1e62d0;
}
.Button-1:active {
	position:relative;
	top:1px;
}
</style>

<div class="C4 Col" style="vertical-align:top;">

<h6>Register your Product</h6>
<div >Registering your product allows us to more accurately track your warranty status.  It also means we can notify you of any important updates.  Please take a moment to fill in your details.</div>
<br/><br/>
<a href="/resources/forms/register" class="Button-1 form-box" style="color:white;">Register</a>
<br/><br/>
<h6>Laptop Display Shortcuts</h6>
<div>Most laptop computers require a function key or software command to activate/deactivate the laptop video output signal.  Click the link at the below for a full list.</div>
<br/>
<a href="/support/Laptop_Activation">Laptop Activation Guide</a>
</div>

<div class="C3 Col" style="vertical-align:top;">
<h6>Get Service</h6>
&gt; <a target="" href="/support/warrantyvt.php" class="warval-box">Warranty Status</a><br/>
<br/>
<script>
$(".warval-box").colorbox({iframe:true, innerWidth:400, innerHeight:200});
</script>
<Strong style="color:grey;">U.S. &amp; Canada</Strong><br/>
&gt; <a href="#RMAUSCan-popup" class="colorbox-inline">Get Warranty Service</a><br/>
&gt; <a href="/support/authorized-service-centers#ABU">Find a Repair Provider</a><br/>
<br/>
<br/>

<Strong style="color:grey;">Find a Global Service Provider</Strong><br/>
 <a href="#RMAWorldMap-popup" class="colorbox-inline"><img src="/resources/images/World.jpg" width="180px" /></a><br/>
</div>
 
 <div class="C3 Col" style="vertical-align:top;">
<h6>Contact Us</h6>
<strong style="color:grey;">US &amp; Canada</Strong><br/>
Mon-Fri, 6am - 5pm PST<br/>
&gt; 877-388-8360<br/>
&gt; <a href="#AreYouSure-popup" class="colorbox-inline">Submit an Online Question</a><br/>
<br/>
<strong style="color:grey;">Asia-Pacific Region</Strong><br/>
<table >
<tr style="position:relative;left:-100;"><td>Mon-Fri:</td><td style="text-align:left;">9am -5pm Local Time</td></tr>
<tr style="position:relative;left:-100;">
<td>Singapore</td>
<td style="text-align:left;">+65 6506-3196</td>
</tr>
<tr style="position:relative;left:-100;">
<td>Australia</td>
<td style="text-align:left;">1300-290-922</td>
</tr><tr style="position:relative;left:-100;">
<td>China</td>
<td style="text-align:left;">800-888-9288</td>
</tr></table>
<br>
<strong style="color:grey;">Europe, Middle-East &amp; Africa</Strong><br/>
<table border="0px">
<tr style="position:relative;left:-100;">
<td>Mon-Fri:</td><td style="text-align:left;">08:00 - 17:00</td></tr>
<tr style="position:relative;left:-100;">
<td>France</td>
<td style="text-align:left;">0800 905-993</td>
</tr>
<tr style="position:relative;left:-100;">
<td>Germany</td>
<td style="text-align:left;">0800 181-3649</td>
</tr><tr style="position:relative;left:-100;">
<td>Italy</td>
<td style="text-align:left;">0800 877-238</td>
</tr><tr style="position:relative;left:-100;">
<td>Spain</td>
<td style="text-align:left;">+34 902 366 592</td>
</tr><tr style="position:relative;left:-100;">
<td>Sweden</td>
<td style="text-align:left;">020-791251</td>
</tr><tr style="position:relative;left:-100;">
<td>UK</td>
<td style="text-align:left;">0800 028-6470</td>
</tr><tr style="position:relative;left:-100;">
<td>Other</td>
<td style="text-align:left;">008000 463-6287</td>
</tr></table>
</div>

 
<div class="hidden" style="display:none">
<div id="RMAWorldMap-popup">
<style type="text/css">
	dl.image_map {display:block; width:648px; height:413px; background:url(/resources/images/WorldMap.png); position:relative; margin:2px auto 2px auto;}
<dl class="image_map">
</dl>
</style>
 <base target="_parent" />
<div id="WorldMap-popup" style="text-align:center; width:648px; margin-left:auto; margin-right:auto;">
<img id="Image-WorldMap" src="/resources/images/WorldMap.png" usemap="#Image-WorldMap" border="0" width="648" height="413" alt="" />
<map id="_Image-WorldMap" name="Image-WorldMap">
<area shape="poly" coords="23,99,45,109,67,119,92,129,105,142,111,153,131,143,140,137,148,145,132,158,124,161,123,165,123,170,120,174,119,174,107,185,107,197,104,200,100,197,100,189,96,185,85,182,68,182,61,181,51,188,45,173,40,173,36,161,21,159,16,148,5,140,2,133,2,130,5,119,10,109,19,103,19,103," class="btn form-box" href="/resources/forms/online-rma"  alt="United States"alt="United States" title="United States"   />
<area shape="poly" coords="28,65,33,51,56,40,60,19,23,10,4,19,5,46,17,64," class="btn form-box" href="/resources/forms/online-rma"  alt="United States"alt="United States" title="United States"   />
<area shape="poly" coords="31,60,31,54,38,48,46,41,58,37,80,20,107,3,169,1,215,4,226,28,226,47,223,62,208,75,197,92,183,95,174,64,164,51,138,46,135,64,149,84,161,100,176,113,174,119,176,137,162,145,150,148,142,135,111,151,109,139,98,130,18,99,21,77," Target="_Parent" href="http://www.repairware.ca/contact-us/" alt="Canada" title="Canada"   />
<area shape="poly" coords="122,202,91,199,57,193,45,174,40,173,37,161,19,156,13,146,4,141,3,170,18,188,23,206,40,215,58,226,68,234,81,249,88,267,86,285,96,305,106,320,111,327,97,392,115,406,124,404,124,395,125,389,128,383,140,373,160,362,184,343,202,333,218,313,223,298,214,284,198,279,184,265,177,259,168,259,159,256,142,248,130,244,111,240,138,231,156,227,140,211," Target="_Parent" href="/support/authorized-service-centers#LatinAM" alt="" title="Latin America"   />
<area shape="poly" coords="221,98,211,93,210,77,230,76,239,84,234,93,253,112,249,122,258,131,254,142,258,154,269,157,280,149,282,145,291,142,297,138,297,130,295,126,298,119,303,112,307,110,311,110,318,110,334,107,332,108,336,106,336,100,330,101,328,96,327,89,325,84,325,77,320,63,313,46,300,33,297,26,288,24,294,44,297,68,293,81,284,93,272,100,263,104,261,105," Target="_Parent" href="http://service.infocus.info" alt="Europe" title="Europe"   />
<area shape="poly" coords="296,179,276,173,271,168,272,159,260,151,246,151,244,166,244,177,235,191,221,206,215,221,216,239,225,245,251,253,261,250,266,250,275,255,283,275,284,294,289,318,298,338,313,352,324,340,339,331,350,317,362,317,376,317,396,299,396,282,366,268,383,255,390,241,390,227,371,230,360,223,347,209,338,197,333,187,314,184,307,185," Target="_Parent" href="/support/authorized-service-centers#EMEA" alt="Africa" title="Africa"   />
<area shape="poly" coords="417,203,424,191,424,180,432,163,443,146,463,135,489,132,512,132,520,123,537,133,548,140,570,146,571,174,544,200,551,242,569,256,603,270,616,308,647,367,641,399,600,390,554,366,510,343,498,326,502,292,481,265,456,245,439,243,420,231,419,214," Target="_Parent" href="/support/authorized-service-centers#APAC" alt="Asia Pacific" title="Asia Pacific"   />
<area shape="poly" coords="363,228,343,195,339,180,312,169,283,157,298,127,320,109,330,99,321,75,330,55,386,30,471,25,543,29,611,32,628,59,610,94,593,128,566,106,565,121,563,141,550,154,548,138,525,123,515,123,513,129,483,133,450,136,439,151,431,163,428,171,422,187,416,194,415,204,414,207,401,215,376,227," Target="_Parent" href="/support/authorized-service-centers#EMEA" alt="Eastern Europe" title="Eastern Europe"   />
</map>
</div>
</div></div>


<div class="hidden" style="display:none">
<div id="RMAUSCan-popup">
<style type="text/css">
	dl.image_map {display:block; width="178px" height="194px" background:url(/resources/images/USCanadaMap.png); position:relative; margin:2px auto 2px auto;}
<dl class="image_map">
</dl>
</style>
 <base target="_parent" />
<div id="USCanada-popup" style="text-align:center;  margin-left:auto; margin-right:auto;">
<img id="Image-UsCanada" src="/resources/images/USCanadaMap.png" usemap="#Image-UsCanada" border="0"  alt="" />
<map id="_Image-UsCanada" name="Image-UsCanada">
<area shape="poly" coords="23,99,45,109,67,119,92,129,105,142,111,153,131,143,140,137,148,145,132,158,124,161,123,165,123,170,120,174,119,174,107,185,107,197,104,200,100,197,100,189,96,185,85,182,68,182,61,181,51,188,45,173,40,173,36,161,21,159,16,148,5,140,2,133,2,130,5,119,10,109,19,103,19,103," class="btn form-box" href="/resources/forms/online-rma" alt="United States" title="United States"   />
<area shape="poly" coords="28,65,33,51,56,40,60,19,23,10,4,19,5,46,17,64," class="btn form-box" href="/resources/forms/online-rma"  alt="United States" title="United States"   />
<area shape="poly" coords="31,60,31,54,38,48,46,41,58,37,80,20,107,3,169,1,215,4,226,28,226,47,223,62,208,75,197,92,183,95,174,64,164,51,138,46,135,64,149,84,161,100,176,113,174,119,176,137,162,145,150,148,142,135,111,151,109,139,98,130,18,99,21,77," Target="_Parent" href="http://www.repairware.ca/contact-us/" alt="Canada" title="Canada"   />
</map>
</div>
</div></div>


<div class="hidden" style="display:none">
<div id="AreYouSure-popup" style="background-color:white;padding:10px;">
<h4>Are you experiencing a product failure?</h4>
<h6>For Example:</h6> your projector won't power on?<br>
<a href="#RMAUSCan-popup" id="open-RMAUSCan" class="colorbox-inline">Click Here</a>
<h4>Do you have a general question?</h4>
<h6>For Example:</h6> How many lumens do I need for a small conference room?<br>
<a class="form-box" href="/resources/forms/supportcontactus">Click Here</a>
</div></div>  </div>
</div></section></div>
				<footer id="site-info" >
				<?php include($homedir . "/resources/html/footer.html"); ?>
				</footer>

<script>
				$(".form-box").colorbox({iframe:true, innerWidth:"80%", innerHeight:400});
				$(".colorbox-inline").colorbox({inline:true});
				

				
<?php

if(strpos(strtolower("a" . $_SERVER['QUERY_STRING']),"register")>0){
echo '$.colorbox({iframe: true, href: "/resources/forms/register?';
foreach($_GET as $key => $value){
echo $key . "=" . $value . "&"; 
}
echo '", innerWidth: "80%", innerHeight: 800});';
}
elseif(strlen($_SERVER['QUERY_STRING'])>0){
echo '$.colorbox({iframe: true, href: "/resources/forms/' . $_SERVER['QUERY_STRING'];
echo '", innerWidth: "80%", innerHeight: 800});';
}
 ?>
				
				
  var hash = window.location.hash;
  hash = hash.substring(1);
  if(hash.length>0){
    
$.get(
   "/resources/forms/" + hash,
   function(data, textStatus, jqXHR) {
          $.colorbox({iframe: true, href: "/resources/forms/" + hash + "?<?php echo $_GET['regdl']; ?>&<?php echo $_GET['filename']; ?>", innerWidth: "80%", innerHeight: 800});
   }
);

  }
  
</script>

<script>/*<![CDATA[*/window.zEmbed||function(e,t){var n,o,d,i,s,a=[],r=document.createElement("iframe");window.zEmbed=function(){a.push(arguments)},window.zE=window.zE||window.zEmbed,r.src="javascript:false",r.title="",r.role="presentation",(r.frameElement||r).style.cssText="display: none",d=document.getElementsByTagName("script"),d=d[d.length-1],d.parentNode.insertBefore(r,d),i=r.contentWindow,s=i.document;try{o=s}catch(c){n=document.domain,r.src='javascript:var d=document.open();d.domain="'+n+'";void(0);',o=s}o.open()._l=function(){var o=this.createElement("script");n&&(this.domain=n),o.id="js-iframe-async",o.src=e,this.t=+new Date,this.zendeskHost=t,this.zEQueue=a,this.body.appendChild(o)},o.write('<body onload="document._l();">'),o.close()}("https://assets.zendesk.com/embeddable_framework/main.js","infocuscorp.zendesk.com");

/*]]>*/</script>

</body>
</html>
