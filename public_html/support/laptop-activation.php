<?php
require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/infocusscripts.php");
require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/header.php");
echo PHP_EOL . '<link rel="canonical" href="http://' .  $_SERVER['SERVER_NAME'] . '"/>' . PHP_EOL;
?>
<title>InFocus | Laptop Display Shortcuts</title>
<meta name="description" content="Discover advanced projection equipment offered by InFocus. Global leader in LCD projectors and DLP projection, Mondopad products and projector accessories." />
<meta name="keywords" content="infocus,mondopad,projector,projection,DLP,LCD,LCD display,digital display,visual communications,projector accessories,infocus company,digital technology,projection equipment,monopad, communication, touchscreen" />

<link rel="stylesheet" href="/resources/css/font-awesome.min.css" />
<link rel="stylesheet" href="/resources/css/vendor/foundation.min.css" />
<link rel="stylesheet" href="/resources/css/infocus.min.css" />

<?php
if($_GET['edit']=="true"){CMSscript("/resources/overviews/$pn-$lang.src", $pn, $homedir.'/resources/overviews/', 'admin,salespublisher,saleseditor,marketingpublisher,marketingeditor,editor', ".src", "overview", "true", "SavePage","overview");}
?>
<style>
	.table-search {
		position:relative;
	}
	.table-search .fa-search {
		color: #aaa;
		position: absolute;
		top: 8px;
		left: 10px;
		font-size: 1.2rem;
	}
	input[name=laptop_search],
	input[name=laptop_search]:focus {
	    outline: none;
	    background-color: #fff;
	    border: 2px solid #d1d3d3;
	    border-radius: 3px;
	    color: #3f4a54;
	    box-shadow: none;
	    font-family: 'GoodPro-Wide';
	    padding-left: 40px;
	}
	#infotable {
		border-collapse: collapse;
	}
	#infotable th,
	#infotable td {
		border: 1px solid #ccc;
	}
	#infotable tbody th,
	#infotable tbody td {
		color: #666;
	}
	#infotable li {
		list-style-type: square;
		font-size: 1rem;
		line-height: 1.3em;
	    text-indent: -14px;
    	padding-left: 14px;
    	margin-bottom: 0.25em;
	}
</style>
<script>
$(function () {
	$('input[name=laptop_search]').on('input', function (e) {
		var search = $(this).val().trim().toLowerCase(),
			text = '';

		$('#infotable tbody tr').each(function (idx, el) {
			text = $(el.cells[0]).text().toLowerCase();
			if(text.indexOf(search)>-1) {
				$(el).show();
			} else {
				$(el).hide();
			}
		});
	});
});
</script>
</head>
<body class="">
	<?php include($homedir . "/resources/html/mainmenu.html"); ?>

	<div class="row">
		<div class="small-12 medium-10 medium-offset-1 columns">
			<h2 class="lead_text--secondary_headline">Laptop Display Shortcuts</h2>
			<p style="text-align:left">Most laptop computers require a function key or software command to activate/deactivate the laptop video output signal. The chart below lists the video activation commands for common laptop manufacturers. Many manufacturers use different commands for different models. If none of the commands for your brand listed do not work, consult with the manufacturer for the proper command.</p>
			<p>With most laptops, the activation/deactivation command acts as a toggle switch: repeat the command to display the image on the internal laptop display, the external display (projector) or both displays simultaneously. In some cases, the simultaneous display setting will not work properly if the native resolution of the projector does not match the native resolution of the laptop LCD display. This means that the internal display of some laptops will need to be turned OFF to achieve optimal image quality on the projector.</p>

		<div class="table-search">
			<i class="fa fa-search"></i>
			<input type="text" name="laptop_search" placeholder="Search List By Laptop Brand Name">
		</div>

		<table id="infotable" style="text-align:left" >
			<thead>
				<tr class="HeaderRow">
					<th class="bottomborder" >Computer</th>
					<th class="bottomborder" >Key Command to Activate Port</th>
				</tr>
			</thead>
			<tbody>
		    <tr>
		        <th class="bottomborder">Acer</th>
				<td class="bottomborder">
					<li>Ctrl-Alt-ESC while computer boots activates the setup menu; system config; advanced sys config; display device; LCD/CRT
					</li>
					<li>FN + F5 </li>
				</td>
		    </tr>
		    <tr>
		        <th class="bottomborder">Advanced Logic Research</th>
				<td class="bottomborder">
    <li>Ctrl + Alt + V </li>
  
</td>
		    </tr>
		
		    <tr>
		        <th class="bottomborder">Altima</th>
				<td class="bottomborder">
  <li>Shift + Ctrl + Alt + C
</li>
  <li>Set-up Conf.Simulscan </li>

</td>
		    </tr>
		
		    <tr>
		        <th class="bottomborder">Ambra</th>

				<td class="bottomborder">
  <li>Ctrl + Alt + Esc for set-up screen
</li>
  <li>FN + F2
</li>
  <li>FN + F5
</li>
  <li>F2; choose option; F5 </li>
</td>
		    </tr>
		
		    <tr>

		        <th class="bottomborder">Amrel</th>
				<td class="bottomborder">
  <li>Set-up screen
</li>
  <li>Shift + Ctrl + D
</li>
  <li>FN + F6 </li>
</td>
		    </tr>
		
		    <tr>
		        <th class="bottomborder">AMT</th>
				<td class="bottomborder">

  
    <li>Set-up; (Advanced) Screen Display; Select CRT </li>
  
</td>
		    </tr>
		
		    <tr>
		        <th class="bottomborder">Apple</th>
				<td class="bottomborder">
					<li>Select Monitor Icon on Control Strip; Select Resolution to match display device</li>
					<li>Control Panel folder; Display folder; Activate Video Mirroring; warm reboot</li>
					<li>Control Panel folder; Monitors; switch primary display by dragging white menu bar to Monitor 2</li>
					<li>Many Macintosh computers are not compatible and have no external video port; in these cases there sometimes is a third party device available</li>
				</td>
		    </tr>
		
		    <tr>

		        <th class="bottomborder">Aspen</th>
				<td class="bottomborder">
  
    <li>Automatic </li>
  
</td>
		    </tr>
		
		    <tr>
		        <th class="bottomborder">AST</th>
				<td class="bottomborder">
  

    <li>FN + F5
    </li>
    <li>FN + F3
    </li>
    <li>FN + F12
    </li>
    <li>FN + D
    </li>
    <li>Ctrl + D
    </li>
    <li>Ctrl + FN + D </li>

 
</td>
		    </tr>
		
		    <tr>
		        <th class="bottomborder">AT&amp;T</th>

				<td class="bottomborder">
  <li>FN + F3
</li>
  <li>FN + F6 </li>
</td>
		    </tr>
		
		    <tr>
		        <th class="bottomborder">Austin</th>
				<td class="bottomborder">
  <li>Ctrl + Alt + Comma
</li>
  <li>FN + F12 </li>
</td>

		    </tr>
		
		    <tr>
		        <th class="bottomborder">Award</th>
				<td class="bottomborder">

  
    <li>FN + F6 </li>
  
</td>
		    </tr>
		
		    <tr>
		        <th class="bottomborder">BCC</th>
				<td class="bottomborder">
  
    <li>Reboot the computer </li>
  

</td>
		    </tr>
		
		    <tr>
		        <th class="bottomborder">Bondwell</th>

				<td class="bottomborder">
  
    <li>Reboot for LCD/CRT options to appear </li>
  
</td>
		    </tr>
		
		    <tr>
		        <th class="bottomborder">Canon</th>
				<td class="bottomborder">
  <li>FN + F6
</li>
  <li>Set-up menu

</li>
  <li>FN + F7
</li>
  <li>Change set-up to CRT </li>
</td>
		    </tr>
		
		    <tr>
		        <th class="bottomborder">Chaplet</th>
				<td class="bottomborder">
  <li>Select from set-up screen
</li>

  <li>FN + F6
</li>
  <li>FN + F4 </li>
</td>
		    </tr>
		
		    <tr>
		        <th class="bottomborder">Chembook</th>
				<td class="bottomborder">
  
    <li>FN + F6 </li>
  

</td>
		    </tr>
		
		    <tr>
		        <th class="bottomborder">Chicony</th>

				<td class="bottomborder">
  <li>Ctrl + Alt + Esc
</li>
  <li>Automatic </li>
</td>
		    </tr>
		
		    <tr>
		        <th class="bottomborder">Commax</th>
				<td class="bottomborder">
  <li>Ctrl + Alt + # 6
</li>
  <li>FN + F7
</li>
  <li>FN + F6 </li>

</td>
		    </tr>
		
		    <tr>

		        <th class="bottomborder">Compaq</th>
				<td class="bottomborder">
  <li>FN + F4
</li>
  <li>FN + F2
</li>
  <li>Automatic
</li>
  <li>Ctrl + Alt + &lt; </li>

</td>
		    </tr>

		
		    <tr>
		        <th class="bottomborder">CompuAdd</th>
				<td class="bottomborder">
  <li>FN + F3 Set-up select Display LCD/CRT
</li>
  <li>Alt + F for screen set-up option
</li>
  <li>Automatic </li>
</td>
		    </tr>
		
		    <tr>
		        <th class="bottomborder">Compudyne</th>

				<td class="bottomborder">
  <li>Ctrl + Shift + D
</li>
  <li>Set-up screen
</li>
  <li>FN + F8 </li>
</td>
		    </tr>
		
		    <tr>
		        <th class="bottomborder">Data General</th>
				<td class="bottomborder">
  <li>Ctrl + Alt + Command

</li>
  <li>2 CRT/X at DOS prompt </li>
</td>
		    </tr>
		
		    <tr>

		        <th class="bottomborder">Data View</th>
				<td class="bottomborder">
 
    <li>Ctrl + Shift + M</li>
 
</td>
		    </tr>
		
		    <tr>
		        <th class="bottomborder">DataVue</th>
				<td class="bottomborder">
  

    <li>Ctrl + Shift + M&nbsp;</li>
  
</td>
		    </tr>

		
		    <tr>
		        <th class="bottomborder">DEC</th>
				<td class="bottomborder">
  <li>FN + F4
</li>
  <li>FN + F5
</li>
  <li>Automatic </li>
</td>

		    </tr>
		
		    <tr>
		        <th class="bottomborder">Dell</th>

				<td class="bottomborder">
  <li>FN + F8
</li>
  <li>FN + F12
</li>
  <li>Ctrl + Alt + &lt;
</li>
  <li>FN + D
</li>
  <li>Ctrl + Alt + F10 </li>

</td>
		    </tr>
		
		    <tr>
		        <th class="bottomborder">Digital</th>
				<td class="bottomborder">
  <li>Automatic
</li>
  <li>FN + F2 </li>
</td>
		    </tr>
		
		    <tr>
		        <th class="bottomborder">Dolch</th>
				<td class="bottomborder">

  
    <li>Set dip switch to CRT before boot-up </li>
 
</td>
		    </tr>
		
		    <tr>
		        <th class="bottomborder">EPS Technologies</th>
				<td class="bottomborder">
 
    <li>FN + F4</li>
  

</td>
		    </tr>
		
		    <tr>
		        <th class="bottomborder">Epson</th>

				<td class="bottomborder">
  <li>Set dip switch to CRT before boot-up
</li>
  <li>FN + F12 </li>
</td>
		    </tr>
		
		    <tr>
		        <th class="bottomborder">Everex</th>
				<td class="bottomborder">
  <li>Select from set-up screen
</li>
  <li>FN + F10
</li>
  <li>Ctrl + Alt + Shift + C </li>

</td>
		    </tr>
		
		    <tr>

		        <th class="bottomborder">Fujitsu</th>
				<td class="bottomborder">
  
    <li>FN + F10 </li>
  
</td>
		    </tr>
		
		    <tr>
		        <th class="bottomborder">Gateway</th>
				<td class="bottomborder">
  <li>FN + F3

</li>
  <li>FN + F1
</li>
  <li>Option in set-up </li>
</td>
		    </tr>
		
		    <tr>
		        <th class="bottomborder">Grid</th>
				<td class="bottomborder">
  <li>Ctrl + Alt + Tab
</li>
  <li>FN + F2 </li>
</td>

		    </tr>
		
		    <tr>
		        <th class="bottomborder">Hewlett Packard</th>
				<td class="bottomborder">

  <li>FN + F5
</li>
  <li>FN + F12 </li>
</td>
		    </tr>

		
		    <tr>
		        <th class="bottomborder">Hitachi</th>
				<td class="bottomborder">
  <li>FN + F7
</li>
  <li>FN + F8 </li>
</td>
		    </tr>
		
		    <tr>
		        <th class="bottomborder">Honeywell</th>
				<td class="bottomborder">
  
    <li>FN + F10</li>

  
</td>
		    </tr>
		
		    <tr>

		        <th class="bottomborder">Hyundai</th>
				<td class="bottomborder">
 
    <li>Set-up screen option </li>
 
</td>
		    </tr>
		
		    <tr>
		        <th class="bottomborder">IBM</th>
				<td class="bottomborder">
  <li>FN + F7

</li>
  <li>FN + F1 for set-up
</li>
  <li>Set-up LCD to CRT
</li>
  <li>Ctrl + Alt + S
</li>
  <li>Automatic
</li>
  <li>FN + F2 </li>
</td>

		    </tr>
		
		    <tr>
		        <th class="bottomborder">Infotel</th>
				<td class="bottomborder">
  
    <li>FN + F12</li>

  
</td>
		    </tr>
		
		    <tr>

		        <th class="bottomborder">Jetbook</th>
				<td class="bottomborder">
  <li>FN + F6
</li>
  <li>FN + F12 </li>
</td>
		    </tr>
		
		    <tr>
		        <th class="bottomborder">Kaypro</th>
				<td class="bottomborder">
  
    <li>Automatic </li>

  
</td>
		    </tr>
		
		    <tr>

		        <th class="bottomborder">Kris Tech</th>
				<td class="bottomborder">
 
    <li>FN + F8 </li>
 
</td>
		    </tr>
		
		    <tr>
		        <th class="bottomborder">Leading Edge</th>
				<td class="bottomborder">
  

    <li>FN + T </li>
  
</td>
		    </tr>

		
		    <tr>
		        <th class="bottomborder">Macintosh</th>
				<td class="bottomborder">
  <li>Select Monitor Icon on Control Strip; Select Resolution to match display device
</li>
  <li>Control Panel folder; Display folder; Activate Video Mirroring; warm reboot
</li>
  <li>Control Panel folder; Monitors; switch primary display by dragging white menu bar to Monitor 2
</li>
  <li>Many Macintosh computers are not compatible and have no external video port; in these cases there sometimes is a third party device available </li>

</td>
		    </tr>
		
		    <tr>

		        <th class="bottomborder">Magitronic</th>
				<td class="bottomborder">
  
    <li>FN + F4 </li>
  
</td>
		    </tr>
		
		    <tr>
		        <th class="bottomborder">Mastersport</th>
				<td class="bottomborder">
  

    <li>FN + F2 </li>
  
</td>
		    </tr>

		
		    <tr>
		        <th class="bottomborder">Micro Express</th>
				<td class="bottomborder">
 
    <li>Automatic </li>
  
</td>
		    </tr>
		
		    <tr>
		        <th class="bottomborder">Micron</th>
				<td class="bottomborder">

  <li>FN + F2
</li>
  <li>FN + F12 </li>
</td>
		    </tr>

		
		    <tr>
		        <th class="bottomborder">Microslate</th>
				<td class="bottomborder">
  
    <li>Automatic </li>
 
</td>
		    </tr>
		
		    <tr>
		        <th class="bottomborder">Midwest Micro</th>
				<td class="bottomborder">

  
    <li>FN + F11 </li>
  
</td>
		    </tr>
		
		    <tr>
		        <th class="bottomborder">Mitsubishi</th>
				<td class="bottomborder">
  
    <li>SW2 On-Off-Off-Off </li>
 

</td>
		    </tr>
		
		    <tr>
		        <th class="bottomborder">NCR</th>

				<td class="bottomborder">
  
    <li>Set-up screen option </li>
 
</td>
		    </tr>
		
		    <tr>
		        <th class="bottomborder">NEC</th>
				<td class="bottomborder">
  <li>FN + F3
</li>
  <li>FN + F10

</li>
  <li>FN + F2
</li>
  <li>Select "Active" from set-up
</li>
  <li>CRT at the DOS prompt </li>
</td>
		    </tr>
		
		    <tr>
		        <th class="bottomborder">Olivetti</th>

				<td class="bottomborder">
  <li>Automatic
</li>
  <li>FN + O
</li>
  <li>FN + Asterisk </li>
</td>
		    </tr>
		
		    <tr>
		        <th class="bottomborder">Packard Bell</th>
				<td class="bottomborder">
  <li>FN + F10

</li>
  <li>FN + F2
</li>
  <li>Ctrl + Alt + &lt; </li>
</td>
		    </tr>
		
		    <tr>
		        <th class="bottomborder">Panasonic</th>
				<td class="bottomborder">
  <li>FN + F2
</li>
  <li>Set-up option </li>

</td>
		    </tr>
		
		    <tr>
		        <th class="bottomborder">ProStar</th>

				<td class="bottomborder">
  <li>FN + F6
</li>
  <li>Ctrl + Alt + S at startup </li>
</td>
		    </tr>
		
		    <tr>
		        <th class="bottomborder">Sager</th>
				<td class="bottomborder">
  <li>FN + F6
</li>
  <li>FN + F9 </li>
</td>

		    </tr>
		
		    <tr>
		        <th class="bottomborder">Sampo</th>
				<td class="bottomborder">

  
    <li>CTRL + ALT + SHIFT + C </li>
 
</td>
		    </tr>
		
		    <tr>
		        <th class="bottomborder">Samsung</th>
				<td class="bottomborder">
  <li>FN + F4
</li>
  <li>Set-up screen option
</li>
  <li>FN + F5

</li>
  <li>FN + F6 </li>
</td>
		    </tr>
		
		    <tr>
		        <th class="bottomborder">Sanyo</th>
				<td class="bottomborder">
  
    <li>Set-up screen option </li>
 

</td>
		    </tr>
		
		    <tr>
		        <th class="bottomborder">Sharp</th>

				<td class="bottomborder">
  <li>FN + F5
</li>
  <li>Set dip switch to CRT </li>
</td>
		    </tr>
		
		    <tr>
		        <th class="bottomborder">Sotec</th>
				<td class="bottomborder">
  <li>FN + F5
</li>
  <li>FN + F1 </li>
</td>

		    </tr>
		
		    <tr>
		        <th class="bottomborder">Sun</th>
				<td class="bottomborder">

 
    <li>Ctrl + Shift + M </li>
 
</td>
		    </tr>
		
		    <tr>
		        <th class="bottomborder">Tandy</th>
				<td class="bottomborder">
  <li>Ctrl + Alt + Insert
</li>
  <li>Set-up option </li>
</td>

		    </tr>
		
		    <tr>
		        <th class="bottomborder">Tangent</th>
				<td class="bottomborder">

  
    <li>FN + F5</li>
 
</td>
		    </tr>
		
		    <tr>
		        <th class="bottomborder">Texas Instruments</th>
				<td class="bottomborder">
  <li>FN + F2
</li>
  <li>FN + F3
</li>
  <li>Switch CRT On

</li>
  <li>Press SETUP key on keyboard
</li>
  <li>Type ALTVID at DOS prompt
</li>
  <li>Ctrl + Alt + Setup
</li>
  <li>FN + Setup at DOS prompt - Screen Display = BOTH
</li>
  <li>Ctrl-Alt-Esc
</li>
  <li>Win95 Control Panel; TI SETUP; System Config; Display device; LCD/CRT/both

</li>
  <li>Win3.1 Travelmate Set-up; TI SETUP; System Config; Display device; LCD/CRT/Both
</li>
  <li>FN + F12
</li>
  <li>FN + F10
</li>
  <li>FN + F5 </li>
</td>
		    </tr>
		
		    <tr>
		        <th class="bottomborder">Top-Link</th>
				<td class="bottomborder">
  <li>Set-up option
</li>
  <li>FN + F6 </li>
</td>
		    </tr>
		
		    <tr>
		        <th class="bottomborder">Toshiba</th>
				<td class="bottomborder">

  <li>FN + End
</li>
  <li>Ctrl-Alt-End
</li>
  <li>Automatic
</li>
  <li>Type TSetup at DOS prompt; select display location int/ext/both
</li>
  <li>FN + F5
</li>
  <li>Ctrl + Alt + End

</li>
  <li>FN + End
</li>
  <li>Ctrl + Alt + End
</li>
  <li>Set-up option </li>
</td>
		    </tr>
		
		    <tr>
		        <th class="bottomborder">Twinhead</th>
				<td class="bottomborder">
  <li>FN + F7
</li>

  <li>FN + F5
</li>
  <li>Automatic </li>
</td>
		    </tr>
		
		    <tr>
		        <th class="bottomborder">US Logic</th>
				<td class="bottomborder">
 
    <li>FN + F8 </li>
  

</td>
		    </tr>
		
		    <tr>
		        <th class="bottomborder">Winbook</th>

				<td class="bottomborder">
  <li>FN + F6 (simul); FN + F10 (int/ext)
</li>
  <li>Ctrl + Alt + F10
</li>
  <li>FN + F12
</li>
  <li>FN + F2
</li>
  <li>FN + F8 </li>

</td>
		    </tr>
		
		    <tr>
		        <th class="bottomborder">Wyse</th>
				<td class="bottomborder">
  
    <li>Automatic </li>
  

</td>
		    </tr>
		
		    <tr>
		        <th class="bottomborder">Zenith</th>

				<td class="bottomborder">
  <li>FN + F10
</li>
  <li>FN + F7
</li>
  <li>FN + F2
</li>
  <li>FN + F1 </li>
</td>
		    </tr>
		
		    <tr>

		        <th class="bottomborder">Zeos</th>
				<td class="bottomborder">
  <li>Ctrl + Shift + D
</li>
  <li>FN + F1 </li>
</td>
		    </tr>
		</tbody>
		</table>  

		</div>
	</div>

	<script>
	    $(document).foundation();
	</script>
	<footer id="site-info" >
	<?php include($homedir . "/resources/html/footer.html"); ?>
	</footer>
</body>
</html>















 