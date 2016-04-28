<html>
<head>


  <meta charset="utf-8">

  <title>InFocus Projector Calculator</title>

  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-2.1.1.js"></script>
  <script src="https://code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
<script>
function GetReg()
{


//$.post( "http://www.infocus.com/support/warrantyvtapi.php", function( data ) {
//  alert("Info :" + data);
//});
var sn = "abcd12345678";
var SN = "";
  
//SNd = $.get("http://www.infocus.com/support/warrantyvtapi.php", { SN:sn });
//console.log(SNd);
//alert(SNd);

$.post("http://www.infocus.com/resources/test/warrantyvtapi.php", {SN: sn}, function(result){
       alert("info :" + result);
   });

}


</script>
</head>
<body>
<div id = "mydiv">
</div>
<button type="button" onclick="GetReg()">Request data</button>
testing
</body>