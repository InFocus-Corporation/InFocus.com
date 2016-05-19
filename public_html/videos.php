<?php
require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/infocusscripts.php");
require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/header.php");
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
<script>
(function( $ ) {
$.widget( "custom.dropdownbox", {
_create: function() {
this.wrapper = $( "<span>" )
.addClass( "custom-dropdownbox" )
.insertAfter( this.element );
this.element.hide();
this._createAutocomplete();
this._createShowAllButton();
},
_createAutocomplete: function() {
var selected = this.element.children( ":selected" ),
value = selected.val() ? selected.text() : "";
this.input = $( "<input id='dropdowninput' readonly>" )
.appendTo( this.wrapper )
.val( value )
.attr( "title", "" )
.addClass( "custom-dropdownbox-input ui-widget ui-widget-content ui-state-default ui-corner-left" )
.autocomplete({
delay: 0,
minLength: 0,
source: $.proxy( this, "_source" )
,

        //this is select method you look for ...
        select: function( event, ui ) {

        //this is your selected value
  var classSelect = ui.item.value;
  classSelect = classSelect.replace(/\s/g,"-");
  if(classSelect == "All"){
  $(".resultsList li").show();
  }
  else{
  $(".resultsList li").hide();
  $("." + classSelect).show();
  }
        },
        change: function( event, ui ) {

        //some code ...
        }})
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
.addClass( "custom-dropdownbox-toggle ui-corner-right" )
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
   $(document).ready(function() {
$( "#dropdownbox" ).dropdownbox();

});

	
</script>
	</head>
<style>
.cover{
position:relative;
}
.cover:hover{
cursor:pointer;
}

</style>
<body class="">
	<?php include($homedir . "/resources/html/mainmenu.html"); ?>
	<div class="content">
		<div class="C9">
			<h1 class="title">InFocus Videos</h2>
			<a id="vidtop"></a>
<?php

if(!empty($_SERVER['QUERY_STRING'])){
	$result = mysqli_query($connection,'SELECT Summary, title, body, vidid, about, industry FROM videos WHERE vidid = "' . $_SERVER['QUERY_STRING'] . '"');
	$x=0;
	if(mysqli_num_rows ($result)>0){
		while($row = mysqli_fetch_array($result)) {
			echo  "<title>$row[1]</title>";
			echo '<div class="video" style="padding-bottom:30px">
					<iframe id="main-video" src="//www.youtube.com/embed/' . $row[3] . '?vq=hd720&rel=0&modestbranding=1" style="width:100%;height:600px" frameborder="0" allowfullscreen ></iframe></div>
					<h3 id="videoheader">' . $row[1] . '</h3>
					<p id="videosummary">' . $row[2] . '</p>
				</div>';
		}
	} else {
		echo 'Video not found.';
	}

	echo '</div></div><footer id="site-info">';
	include($homedir . "/resources/html/footer.html");
	echo "</footer></body></html>";
	die();
}


			$allvid;
			$displayvid;
			$projvid;
			$displayinclude;
			$projinclude;
			$result = mysqli_query($connection,"SELECT Summary, title, body, vidid, about, industry FROM videos WHERE lang = '$lang' ORDER BY rank, postdate DESC");
			$x=0;
			if(mysqli_num_rows($result)>0){
			while($row = mysqli_fetch_array($result))
				{
					$displayinclude = false;
					$projinclude = false;
					

					$prodarray = explode(",",$row[4]);
					if($x==0){

					echo '<div class="video" style="padding-bottom:30px">
														<h3 id="videoheader">' . $row[1] . '</h3>
							<p id="videosummary">' . $row[0] . '</p>
							<iframe id="main-video" src="//www.youtube.com/embed/' . $row[3] . '?vq=hd720&rel=0&modestbranding=1" style="width:100%;height:600px" frameborder="0" allowfullscreen ></iframe></div>
						<div style="text-align:center">	
				<h4>Filter by Video Type or Industry</h4>
					<div class="ui-widget">
						<select id="dropdownbox">
						<option value="All">All</option>
						<option value="Arts-and-Entertainment">Arts and Entertainment</option>
						<option value="Benefit-Overview">Benefit Overview</option>
						<option value="Business">Business</option>
						<option value="Customer-Stories">Customer Stories</option>
						<option value="First-Responders">First Responders</option>
						<option value="Higher-Education">Higher Education</option>
						<option value="How-To">How-To</option>
						<option value="K-12">K-12</option>
						<option value="News-and-Events">News and Events</option>
						  </select>
					</div>
			</div>

<div class="tabs">
  <nav role="navigation" class="C10 transformer-tabs tabs-wrapper">
    <ul>
				<li><a href="#videos-all" class="active">All</a></li>
				<li><a href="#videos-mondopad">Interactive Displays</a></li>
				<li><a href="#videos-projector">Projectors</a></li>
			</ul>
		</nav>
			';
							$allvid = '<div  >
								<ul class="resultsList">';
							$displayvid = '<div >
								<ul class="resultsList">';

							$projvid = '<div >
								<ul class="resultsList">';
							$x=1;
								}

						$allvid .=  '					<li style="height:400px;" class="' . $row[5] . '"><div class="cover';
						if($x==1){$allvid .=  " nowplaying";$x=2;$y=2;}
						$allvid .= '"><img src="http://img.youtube.com/vi/' . $row[3] . '/mqdefault.jpg" style="width:100%;height:auto"  onclick="openVid(' . "'" . $row[3] . "'" . ');"/></div>
						<div class="about">
							<strong class="abouthead"><a href="?' . $row[3] . '">' . $row[1] . '</a></strong>

							<p class="aboutsumm">' . $row[0] . '</p>
						</div>
					</li>';
						
						
					foreach($prodarray AS $product){

						if(($product == "Mondopad" OR $product == "BigTouch" OR $product == "JTouch") AND $displayinclude == false  ){
							$displayvid .=  '					<li style="height:400px;" class="' . $row[5] . '"><div class="cover';
							if($x==1){$displayvid .=   " nowplaying";}
							$displayvid .=   '"><img src="http://img.youtube.com/vi/' . $row[3] . '/mqdefault.jpg" style="width:100%;height:100%"  onclick="openVid(' . "'" . $row[3] . "'" . ');"/></div>
							<div class="about">
							<strong class="abouthead"><a href="?' . $row[3] . '">' . $row[1] . '</a></strong>

							<p class="aboutsumm">' . $row[0] . '</p>
							</div>
							</li>';
							$displayinclude = true;
						}
						
						if($product != "Mondopad" AND $product != "BigTouch" AND $product != "JTouch" AND $projinclude == false  ){
							$projvid .= '					<li style="height:400px;" class="' . $row[5] . '"><div class="cover';
							if($x==1){$projvid .=  " nowplaying";}
							$projvid .=  '"><img src="http://img.youtube.com/vi/' . $row[3] . '/mqdefault.jpg" style="width:100%;height:100%"  onclick="openVid(' . "'" . $row[3] . "'" . ');"/></div>
							<div class="about">
							<strong class="abouthead"><a href="?' . $row[3] . '">' . $row[1] . '</a></strong>

							<p class="aboutsumm">' . $row[0] . '</p>
							</div>
							</li>';
							$projinclude = true;
						}
						
					}
					$x=3;

					
				}
			$allvid .= '</ul></div>';
			$displayvid .= '</ul></div>';
			$$projvid .= '</ul></div>';

			}

			?>
		<div id="videos-all" class="videos active">
<?php echo $allvid; ?>
		</div>

		<div id="videos-mondopad" class="videos">
<?php echo $displayvid; ?>
		</div>
		<div id="videos-projector" class="videos">
<?php echo $projvid; ?>
		</div>
	</div>
	
	
</div>


			</section>
	</div>
</div>

<footer id="site-info" >
<?php include($homedir . "/resources/html/footer.html"); ?>
</footer>

<script>


$( document ).ready(function() {
$('#dropdowninput').change(function(){

  $(this).blur();
});
});

 $('.cover img').click(function(){
	 var nextElem;

	 nextElem = $(this).parent().next().find(".abouthead").first();
document.getElementById('videoheader').innerHTML = nextElem.text();

	 nextElem = $(this).parent().next().find(".aboutsumm").first();
document.getElementById('videosummary').innerHTML = nextElem.text();

$("#" + $(this).parent().parent().parent().parent().parent().attr('id') + " div").removeClass("nowplaying");



$(this).parent().addClass("nowplaying");

    });
	
function openVid(vid){

document.getElementById('main-video').setAttribute('src','//www.youtube.com/embed/' + vid + '?vq=hd720&rel=0&autoplay=1');

$('html, body').animate({
           'scrollTop':   $('#vidtop').offset().top-20
         }, 2000);
}

</script>

	</body>
</html>