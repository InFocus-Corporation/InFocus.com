<?php
if(!empty($_POST['zip'])){
	include_once($_SERVER['DOCUMENT_ROOT'] ."/resources/php/connections.php");
	$sql = 'SELECT destinationzip, `' . $_POST['ship'] . '` as ship FROM infocus_internal.shipping_zones WHERE destinationzip <= ' . $_POST['zip'] . ' ORDER BY destinationzip DESC LIMIT 1';
	$results = mysqli_query($connection,$sql);
while($row = mysqli_fetch_array($results)){ 
$zone = $row['ship'];}
$sql = "SELECT Lbs, `$zone` as cost FROM infocus_internal.shipping_rates";		
$results = mysqli_query($connection,$sql);		
while($row = mysqli_fetch_array($results)){		$shippingRates["lb".$row['Lbs']] = $row['cost']*1.3;}				
echo json_encode($shippingRates);die();}
?>
<!DOCTYPE html>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<link type="text/css" rel="stylesheet" href="/resources/css/core.css"> 
<script>if(self==top){var sPath=window.location.pathname;var sPage = sPath.substring(sPath.lastIndexOf('/') + 1);if(sPage.lastIndexOf('.')>0){sPage = sPage.substring(0,sPage.lastIndexOf('.'));}window.location = "/#freightestimate";}
</script>
<script src="/resources/plugins/jquery-handsontable/dist/jquery.handsontable.full.js"></script>
<style>
ul.iblock li{display:inline-block;padding-left:15px;}
</style></head>
<body style="text-align:center;max-width:910px;">
<form class="C10" style="margin-top:20px;padding:30px;max-width:830px;">
<ul class="iblock"><li><label for="service">Service</label><Select id="service" name="service"><option value="Ground">Ground</option><option value="3Day">3 Day Select</option><option value="2Day">2nd Day Air</option><option value="2DayAM">2nd Day Air A.M.</option><option value="1DaySave">Next Day Air Saver</option><option value="1Day">Next Day Air</option></select></li><li><label for="zip">Zip/Postal Code</label><input id="zip" name="zip"></li><li><label for="weightper">Weight Per Piece</label><input style="width: 60px;" id="weightper" name="weightper"> Lbs.</li><li><label for="number"># Pieces</label><input style="width: 40px;" id="number" name="number" value="1"></li><li><label for="resloc">Res.<br>Location</label><Select id="resloc" name="resloc"><option value="No">No</option><option value="Yes">Yes</option></select></li><li><label for="ressig">Res.<br>Signature</label><Select id="ressig" name="ressig"><option value="No">No</option><option value="Yes">Yes</option></select></li></ul></form><div class="rounded" style="margin:auto;width:300px;margin-top:15px;"><table> <caption>Freight Charges</caption><tr><td>Freight</td><td id="freight"></td></tr><tr><td>Residential Surcharge</td><td id="residentialsurcharge"></td></tr><tr><td>Residential Signature</td><td id="residentialsignature"></td></tr><tr><td>Total*</td><td id="total"></td></tr></table></div><span style="margin-auto;width:300px;font-size:50%;color:grey;"> *estimate only and subject to change at any time</span>
<script>
var sArray;
$( "#zip" ).change(function() {  if(document.getElementById('service' ).value != ""){runShipping();}});
$( "#service" ).change(function() {  if(document.getElementById('zip').value != ""){runShipping();}});
$( "#weightper" ).change(function() {  calculate();});
$( "#number" ).change(function() {  calculate();});
$( "#resloc" ).change(function() {  calculate();});
$( "#ressig" ).change(function() {  calculate();});
$( "#fuel" ).change(function() {  calculate();});

function runShipping(){
	jQuery.post("/resources/forms/freightestimate.php",			{
		zip: document.getElementById('zip').value.substring(0, 3),
		ship: document.getElementById('service').value},
		function(response){
			sArray = response;
			calculate();
			}, "json"); 
			}
function calculate(){
	if(sArray == null && document.getElementById('service' ).value != "" && document.getElementById('zip').value != ""){runShipping();}
	if(sArray != null && document.getElementById('number').value != "" && document.getElementById('weightper').value != ""){
		var value = sArray['lb' + document.getElementById('weightper').value] * document.getElementById('number').value;
		var total = value;
		value = value * 0.1;
		total = total+value;
		document.getElementById('freight').innerHTML = numeral(total).format('$0,0.00');
		//document.getElementById('fuelcost').innerHTML = numeral(value).format('$0,0.00');
		 value = 0;
		 if(document.getElementById('resloc').value == "Yes"){value = 2.85;}
		 document.getElementById('residentialsurcharge').innerHTML = numeral(value).format('$0,0.00');
		 total = total+value;
		 value = 0;
		 if(document.getElementById('ressig').value == "Yes"){value = 4.9;}
		 document.getElementById('residentialsignature').innerHTML = numeral(value).format('$0,0.00');
		 total = total+value;
		 document.getElementById('total').innerHTML = numeral(total).format('$0,0.00');}
		 }
 $(document).ready(function() {
     parent.$.colorbox.resize({
		 innerWidth:$('body').width(),
		 innerHeight:$('body').height()+20
		 });});
</script></BODY></HTML>
