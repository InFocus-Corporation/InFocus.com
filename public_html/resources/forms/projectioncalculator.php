<!DOCTYPE html>

<HTML>
<HEAD>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<link type="text/css" rel="stylesheet" href="/tmp/resources/css/core.css">

<script>
if(self==top){
var sPath=window.location.pathname;
var sPage = sPath.substring(sPath.lastIndexOf('/') + 1);
if(sPage.lastIndexOf('.')>0){sPage = sPage.substring(0,sPage.lastIndexOf('.'));}

window.location = "/#projectioncalculator";
}

$(document).ready(function() {
    parent.$.colorbox.resize({
        innerWidth:$('body').width()+20,
        innerHeight:$('body').height()+60
    });
	});
</script>

<style>

#inneriframe
{
   width:550px;
   height:530px;
}

  form {
	background: #f7f7f7;
	padding: 5px;
	box-shadow: 0px 0px 0px 0px rgba(0, 0, 0, 0.2), inset 0px 0px 0px 0px rgba(255, 255, 255, 1);
	border: 0px solid #B2B2B2;
}
</style>
</head>
<body style="width:550px;background:#F7F7F7;">
<h1>Out of Order</h1>
We are sorry for the inconvenience.  We are looking to transition to a different calculator and will be back up and running as soon as possible. 

</BODY>
</HTML>