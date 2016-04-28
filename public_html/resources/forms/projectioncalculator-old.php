<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>InFocus | Projector Calculator</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/jquery-ui.css" rel="stylesheet">  
    <link href="css/jquery-ui-slider-pips.css" rel="stylesheet">        
	  
<script src="https://code.jquery.com/jquery-2.1.1.js"></script>

  <script src="https://code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
  <script src="jquery-ui-slider-pips.js"></script>
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
 <script> //run all scripts and functions from here

if(self==top){window.location = "/#projectioncalculator";}
$(document).ready(function() {
    parent.$.colorbox.resize({
        innerWidth:$('body').width()+20,
        innerHeight:$('body').height()+60
    });	});

	var whichsection = 0;
	var dist_max = 300;
	var dist_min = 0;
	var localMax = "";
	var width_max = 300;
	var width_min = 0;
	var height_min = 0;
	var height_max = 300;
	var throwratio_low = "";
	var throwratio_high = "";
	var oldprojector = "";
	var newprojector = "";
	var AspectWidth = "";
	var AspectHeight = "";
	var temp_aspectratio = "";
	var zoomX = 0;
	var inches = 0;
	var nearest = 0;
	var furthest = 0;
	var aspect1 = "";
	var aspect2 = "";
	var SelectedAR = "";
	var xAR = "";
	var offsetvalue = 0;
	var DefaultAR = "";
	var ActiveAR = "";
	var mm_in_inch = 25.4;
	var inormm = "in";
	var inormm_was = "";
	var origWidth = "";
	//Distance Functions
	
	//function Change_In_to_Mm(integer iIn)
	//{
	//	return iIn*mm_in_inch;
	//}
	
	function setFtIn()
	{
		var oldInch = [4];
		var newFt = [4];
		var newIn = [4];
		newFt[0] = 0;
		newFt[1] = 0;
		newFt[2] = 0;
		newFt[3] = 0;
		newIn[0] = 0;
		newIn[1] = 0;
		newIn[2] = 0;
		newIn[3] = 0;
		oldInch[0] = $( "#slider-dist" ).slider( "value" );
		oldInch[1] = $( "#slider-width" ).slider( "value" );
		oldInch[2] = $( "#slider-height" ).slider( "value" );
		oldInch[3] = $( "#slider-diag" ).slider( "value" );
		
		for(i = 0; i < 4; i++)
		{
			while (oldInch[i] > 11)
			{
				oldInch[i] = oldInch[i]-12;
				newFt[i] = newFt[i]+1;
				newIn[i] = oldInch[i];
				
			}
			
		}
		$( "#text_dist_tot_ft" ).val(newFt[0]);
		$( "#text_dist_tot_ftIn" ).val(newIn[0]);
		
		$( "#text_width_tot_ft" ).val(newFt[1]);
		$( "#text_width_tot_ftIn" ).val(newIn[1]);
		
		$( "#text_height_tot_ft" ).val(newFt[2]);
		$( "#text_height_tot_ftIn" ).val(newIn[2]);
		
		$( "#text_diag_tot_ft" ).val(newFt[3]);
		$( "#text_diag_tot_ftIn" ).val(newIn[3]);
		
	}
	
	function OnToggleIn()
	{
		inormm = "in";
	
				//runTools();
					sliders();
					
					
	}
	function OnToggleCm()
	{
		
		inormm = "mm";	

				//runTools();
					sliders();
					
		
	}
	function FromDistSlider()
	{
		  


	//TAKE CARE OF DISTANCE

	  $( "#text_dist_tot_in" ).val(Math.round( $( "#slider-dist" ).slider( "value" )));//set distance textbox with slider
	  $("#text_dist_tot_mm").val(Math.round( $( "#slider-dist" ).slider( "value" )));

	  var inches = parseInt($( "#slider-dist" ).slider( "value" )) // fill inches with slider value for distance

	  var feet = 0;

	  while(inches > 11) //convert inches to feet (distance)

	  {

	  feet = feet+1;

	  inches = inches -12;

		$( "#text_dist_ft" ).val(feet);

		$( "#text_dist_in" ).val(inches);
		$("#text_dist_tot_in").val(Math.round( $( "#slider-dist" ).slider( "value" )))

	  }
	  
	  
	  //END DISTANCE

	  //TAKE CARE OF WIDTH
	var getwidth = parseInt($( "#slider-dist" ).slider( "value" ))/throwratio_low; //width = D/TR
	$( "#slider-width" ).slider( 'value',Math.round(getwidth) );

	  inches = parseInt($( "#slider-width" ).slider( "value" )) // fill inches with width slider
	  $( "#text_width_tot_in" ).val(Math.round( $( "#slider-width" ).slider( "value" )));//set distance textbox with slider
	  $("#text_width_tot_mm").val(Math.round( $( "#slider-width" ).slider( "value" )*2.54));

	  feet = 0;
	  while(inches > 11) //convert inches to feet (width)

	  {

	  feet = feet+1;

	  inches = inches -12;

		$( "#text_width_ft" ).val(feet);

		$( "#text_width_in" ).val(inches);
		

	  }

	  //END WIDTH

	  //TAKE CARE OF HEIGHT
	var getheight = (parseInt($( "#slider-width" ).slider("value"))*AspectHeight)/AspectWidth; //height = (W*ARH)/ARW
	$( "#slider-height" ).slider( 'value',Math.round(getheight) );

	  inches = parseInt($( "#slider-height" ).slider( "value" )) // fill inches with width slider
		$( "#text_height_tot_in" ).val(Math.round( $( "#slider-height" ).slider( "value" )));//set distance textbox with slider
		$("#text_height_tot_mm").val(Math.round( $( "#slider-height" ).slider( "value" )*2.54));
	  feet = 0;
	  while(inches > 11) //convert inches to feet (width)

	  {

	  feet = feet+1;

	  inches = inches -12;

		$( "#text_height_ft" ).val(feet);

		$( "#text_height_in" ).val(inches);

	  }

	 //END HEIGHT
	  
		//TAKE CARE OF DIAGONAL
		var mywidth = parseInt($( "#slider-width" ).slider( "value" ));
		var myheight = parseInt($( "#slider-height" ).slider( "value" )); 
	var getdiag = Math.sqrt((mywidth*mywidth)+(myheight*myheight)); //distance = TR*W
	$("#slider-diag").slider('value',Math.round(getdiag)); //set dist slider getdist
	 
	  var inches = parseInt($( "#slider-diag" ).slider( "value" )) // fill inches with slider value for distance
	  $( "#text_diag_tot_in" ).val(Math.round( $( "#slider-diag" ).slider( "value" )));//set distance textbox with slider
	  $("#text_diag_tot_mm").val(Math.round( $( "#slider-diag" ).slider( "value" )*2.54));
	  var feet = 0;

	  while(inches > 11) //convert inches to feet (distance)

	  {

	  feet = feet+1;

	  inches = inches -12;

		$( "#text_diag_ft" ).val(feet);

		$( "#text_diag_in" ).val(inches);

	  }

	  //END DIAGONAL

	//FILL SLIDERS WITH TEXTBOXES

	  

	//  $("#slider-height").slider('value',$( "#text_height_in" ).val() ); //set height slider to height textbox
//
//	  $("#slider-width").slider('value',$( "#text_width_in" ).val() ); // set width slider to width textbox

//	  $("#slider-diag").slider('value',$( "#text_diag_in" ).val() ); // set width slider to width textbox

	  

	 //SET COLOR CODING FOR SLIDERS
$("#text_dist_tot_in").val(Math.round( $( "#slider-dist" ).slider( "value" )));
$("#text_dist_tot_in").val(Math.round( $( "#slider-dist" ).slider( "value" )))
getMinMaxDist();
ColorSliders();
	}
	function FromDistText()
	{
			  
		var mydistinches = parseInt($( "#text_dist_in" ).val().substring(0, $( "#text_dist_in" ).val().length - 1));
		var mydistfeet = parseInt($( "#text_dist_ft" ).val().substring(0, $( "#text_dist_ft" ).val().length - 1));
		
		//$( "#slider-dist" ).slider( 'value',Math.round(mydistinches+(mydistfeet*12)));

	//TAKE CARE OF DISTANCE

	  //$( "#text_dist_in" ).val(Math.round( $( "#slider-dist" ).slider( "value" )));//set distance textbox with slider

	  var inches = parseInt($( "#slider-dist" ).slider( "value" )) // fill inches with slider value for distance

	  var feet = 0;

	  while(inches > 11) //convert inches to feet (distance)

	  {

	  feet = feet+1;

	  inches = inches -12;

		$( "#text_dist_ft" ).val(feet);

		$( "#text_dist_in" ).val(inches);

	  }
	  //END DISTANCE

	  //TAKE CARE OF WIDTH
	var getwidth = parseInt($( "#slider-dist" ).slider( "value" ))/throwratio_low; //width = D/TR
	$( "#slider-width" ).slider( 'value',Math.round(getwidth) );

	  inches = parseInt($( "#slider-width" ).slider( "value" )) // fill inches with width slider

	  feet = 0;
	  while(inches > 11) //convert inches to feet (width)

	  {

	  feet = feet+1;

	  inches = inches -12;

		$( "#text_width_ft" ).val(feet);

		$( "#text_width_in" ).val(inches);

	  }

	  //END WIDTH

	  //TAKE CARE OF HEIGHT
	var getheight = (parseInt($( "#slider-width" ).slider("value"))*AspectHeight)/AspectWidth; //height = (W*ARH)/ARW
	$( "#slider-height" ).slider( 'value',Math.round(getheight) );

	  inches = parseInt($( "#slider-height" ).slider( "value" )) // fill inches with width slider

	  feet = 0;
	  while(inches > 11) //convert inches to feet (width)

	  {

	  feet = feet+1;

	  inches = inches -12;

		$( "#text_height_ft" ).val(feet);

		$( "#text_height_in" ).val(inches);

	  }

	 //END HEIGHT
	  
		//TAKE CARE OF DIAGONAL
		var mywidth = parseInt($( "#slider-width" ).slider( "value" ));
		var myheight = parseInt($( "#slider-height" ).slider( "value" )); 
	var getdiag = Math.sqrt((mywidth*mywidth)+(myheight*myheight)); //distance = TR*W
	$("#slider-diag").slider('value',Math.round(getdiag)); //set dist slider getdist
	 
	  var inches = parseInt($( "#slider-diag" ).slider( "value" )) // fill inches with slider value for distance
	  var feet = 0;

	  while(inches > 11) //convert inches to feet (distance)

	  {

	  feet = feet+1;

	  inches = inches -12;

		$( "#text_diag_ft" ).val(feet);

		$( "#text_diag_in" ).val(inches);

	  }

	  //END DIAGONAL

	//FILL SLIDERS WITH TEXTBOXES

	  

	//  $("#slider-height").slider('value',$( "#text_height_in" ).val() ); //set height slider to height textbox
//
//	  $("#slider-width").slider('value',$( "#text_width_in" ).val() ); // set width slider to width textbox

//	  $("#slider-diag").slider('value',$( "#text_diag_in" ).val() ); // set width slider to width textbox

	  

	 //SET COLOR CODING FOR SLIDERS

getMinMaxDist();
ColorSliders();
	}
	function FromDistText_In()
	{
		$( "#slider-zoom" ).slider( "value",(100));
		  $( "#text_zoom" ).val($( "#slider-zoom" ).slider( "value" ));
		$( "#text_dist_tot_in" ).val(parseInt($( "#text_dist_tot_in" ).val()));
		var mydistinches = parseInt($( "#text_dist_tot_in" ).val());
		$("#text_dist_tot_mm").val(mydistinches*2.54);
		
		$( "#slider-dist" ).slider( 'value',mydistinches);
		

	//TAKE CARE OF DISTANCE

	  //$( "#text_dist_in" ).val(Math.round( $( "#slider-dist" ).slider( "value" )));//set distance textbox with slider

	  var inches = parseInt($( "#slider-dist" ).slider( "value" )) // fill inches with slider value for distance

	  //END DISTANCE

	  //TAKE CARE OF WIDTH
	var getwidth = parseInt($( "#slider-dist" ).slider( "value" ))/throwratio_low; //width = D/TR
	$( "#slider-width" ).slider( 'value',Math.round(getwidth) );
	$( "#text_width_tot_in" ).val(parseInt($( "#slider-width" ).slider( "value" )));
	  inches = parseInt($( "#slider-width" ).slider( "value" )) // fill inches with width slider
	$("#text_width_tot_mm").val(inches*2.54);

	  //END WIDTH

	  //TAKE CARE OF HEIGHT
	var getheight = (parseInt($( "#slider-width" ).slider("value"))*AspectHeight)/AspectWidth; //height = (W*ARH)/ARW
	$( "#slider-height" ).slider( 'value',Math.round(getheight) );
$( "#text_height_tot_in" ).val(parseInt($( "#slider-height" ).slider( "value" )));
	  inches = parseInt($( "#slider-height" ).slider( "value" )) // fill inches with width slider
$("#text_height_tot_mm").val(inches*2.54);
	 //END HEIGHT
	  
		//TAKE CARE OF DIAGONAL
		var mywidth = parseInt($( "#slider-width" ).slider( "value" ));
		var myheight = parseInt($( "#slider-height" ).slider( "value" )); 
	var getdiag = Math.sqrt((mywidth*mywidth)+(myheight*myheight)); //distance = TR*W
	$("#slider-diag").slider('value',Math.round(getdiag)); //set dist slider getdist
	 $( "#text_diag_tot_in" ).val(parseInt($( "#slider-diag" ).slider( "value" )));
	  var inches = parseInt($( "#slider-diag" ).slider( "value" )) // fill inches with slider value for distance
	  $("#text_diag_tot_mm").val(inches*2.54);

	  //END DIAGONAL

	//FILL SLIDERS WITH TEXTBOXES

	  

	//  $("#slider-height").slider('value',$( "#text_height_in" ).val() ); //set height slider to height textbox
//
//	  $("#slider-width").slider('value',$( "#text_width_in" ).val() ); // set width slider to width textbox

//	  $("#slider-diag").slider('value',$( "#text_diag_in" ).val() ); // set width slider to width textbox

	  

	 //SET COLOR CODING FOR SLIDERS

getMinMaxDist();
ColorSliders();
setFtIn();
	}
	function FromDistText_mm()
	{
		$( "#slider-zoom" ).slider( "value",(100));
		  $( "#text_zoom" ).val($( "#slider-zoom" ).slider( "value" ));
		var mydistmm = parseInt($( "#text_dist_tot_mm" ).val());
		$("#text_dist_tot_in").val(mydistmm/2.54);
		
		$( "#slider-dist" ).slider( 'value',mydistmm);
		

	//TAKE CARE OF DISTANCE

	  //$( "#text_dist_in" ).val(Math.round( $( "#slider-dist" ).slider( "value" )));//set distance textbox with slider

	  var mm = parseInt($( "#slider-dist" ).slider( "value" )) // fill inches with slider value for distance

	  //END DISTANCE

	  //TAKE CARE OF WIDTH
	var getwidth = parseInt($( "#slider-dist" ).slider( "value" ))/throwratio_low; //width = D/TR
	$( "#slider-width" ).slider( 'value',Math.round(getwidth) );
	$( "#text_width_tot_mm" ).val(parseInt($( "#slider-width" ).slider( "value" )));
	  mm = parseInt($( "#slider-width" ).slider( "value" )) // fill inches with width slider
	$("#text_width_tot_in").val(mm/2.54);

	  //END WIDTH

	  //TAKE CARE OF HEIGHT
	var getheight = (parseInt($( "#slider-width" ).slider("value"))*AspectHeight)/AspectWidth; //height = (W*ARH)/ARW
	$( "#slider-height" ).slider( 'value',Math.round(getheight) );
$( "#text_height_tot_mm" ).val(parseInt($( "#slider-height" ).slider( "value" )));
	  inches = parseInt($( "#slider-height" ).slider( "value" )) // fill inches with width slider
$("#text_height_tot_in").val(inches/2.54);
	 //END HEIGHT
	  
		//TAKE CARE OF DIAGONAL
		var mywidth = parseInt($( "#slider-width" ).slider( "value" ));
		var myheight = parseInt($( "#slider-height" ).slider( "value" )); 
	var getdiag = Math.sqrt((mywidth*mywidth)+(myheight*myheight)); //distance = TR*W
	$("#slider-diag").slider('value',Math.round(getdiag)); //set dist slider getdist
	 $( "#text_diag_tot_mm" ).val(parseInt($( "#slider-diag" ).slider( "value" )));
	  var mm = parseInt($( "#slider-diag" ).slider( "value" )) // fill inches with slider value for distance
	  $("#text_diag_tot_in").val(mm/2.54);

	  //END DIAGONAL

	//FILL SLIDERS WITH TEXTBOXES

	  

	//  $("#slider-height").slider('value',$( "#text_height_in" ).val() ); //set height slider to height textbox
//
//	  $("#slider-width").slider('value',$( "#text_width_in" ).val() ); // set width slider to width textbox

//	  $("#slider-diag").slider('value',$( "#text_diag_in" ).val() ); // set width slider to width textbox

	  

	 //SET COLOR CODING FOR SLIDERS

getMinMaxDist();
ColorSliders();
	}
		
	function FromZoomSlider()
	{
		
	$( "#text_width_tot_in" ).val(Math.round( $( "#slider-width" ).slider( "value" )));//set widthance textbox with slider
	  $("#text_width_tot_mm").val(Math.round( $( "#slider-width" ).slider( "value" )));
  

	$( "#text_width_in" ).val( Math.round($( "#slider-width" ).slider( "value" )));


	  //TAKE CARE OF WIDTH

	  inches = parseInt($( "#slider-width" ).slider( "value" )) // fill inches with width slider

	  feet = 0;
//$("#slider-width").slider('value',$( "#text_width_in" ).val() ); // set width slider to width textbox
	  while(inches > 11) //convert inches to feet (width)

	  {

	  feet = feet+1;

	  inches = inches -12;

		$( "#text_width_ft" ).val(feet);

		$( "#text_width_in" ).val(inches);

	  }

	  //END WIDTH
	//TAKE CARE OF DISTANCE
	//$("#slider-dist").slider('value',Math.round((throwratio_low*$( "#slider-width" ).slider( "value" ))) ); //set dist slider to TR*W
	 

	  var inches = parseInt($( "#slider-dist" ).slider( "value" )) // fill inches with slider value for distance
		//$( "#text_dist_tot_in" ).val(Math.round( $( "#slider-dist" ).slider( "value" )));//set distance textbox with slider
		//$("#text_dist_tot_mm").val(Math.round( $( "#slider-dist" ).slider( "value" )));
	  var feet = 0;

	  while(inches > 11) //convert inches to feet (distance)

	  {

	  feet = feet+1;

	  inches = inches -12;

		$( "#text_dist_ft" ).val(feet);

		$( "#text_dist_in" ).val(inches);

	  }

	  //END DISTANCE
	  //TAKE CARE OF HEIGHT
	  var getheight = ($( "#slider-width" ).slider( "value" )*AspectHeight)/AspectWidth;
	$("#slider-height").slider('value',Math.round(getheight)); //set dist slider to TR*W
	 

	  var inches = parseInt($( "#slider-height" ).slider( "value" )) // fill inches with slider value for distance
		$( "#text_height_tot_in" ).val(Math.round( $( "#slider-height" ).slider( "value" )));//set  textbox with slider
		$("#text_height_tot_mm").val(Math.round( $( "#slider-height" ).slider( "value" )));
	  var feet = 0;

	  while(inches > 11) //convert inches to feet (distance)

	  {

	  feet = feet+1;

	  inches = inches -12;

		$( "#text_height_ft" ).val(feet);

		$( "#text_height_in" ).val(inches);

	  }

	  //END HEIGHT
	  
		//TAKE CARE OF DIAGONAL
		var mywidth = parseInt($( "#slider-width" ).slider( "value" ));
		var myheight = parseInt($( "#slider-height" ).slider( "value" )); 
	var getdiag = Math.sqrt((mywidth*mywidth)+(myheight*myheight)); //distance = TR*W
	$("#slider-diag").slider('value',Math.round(getdiag)); //set dist slider getdist
	 
	  var inches = parseInt($( "#slider-diag" ).slider( "value" )) // fill inches with slider value for distance
	  $( "#text_diag_tot_in" ).val(Math.round( $( "#slider-diag" ).slider( "value" )));//set diagance textbox with slider
	  $("#text_diag_tot_mm").val(Math.round( $( "#slider-diag" ).slider( "value" )));
	  var feet = 0;

	  while(inches > 11) //convert inches to feet (distance)

	  {

	  feet = feet+1;

	  inches = inches -12;

		$( "#text_diag_ft" ).val(feet);

		$( "#text_diag_in" ).val(inches);

	  }

	  //END DIAGONAL
	  getMinMaxDist();
	  ColorSliders();
	}
	
	//Width Functions
	function FromWidthSlider()
	{
		
	$( "#text_width_tot_in" ).val(Math.round( $( "#slider-width" ).slider( "value" )));//set widthance textbox with slider
	  $("#text_width_tot_mm").val(Math.round( $( "#slider-width" ).slider( "value" )));
  

	$( "#text_width_in" ).val( Math.round($( "#slider-width" ).slider( "value" )));


	  //TAKE CARE OF WIDTH

	  inches = parseInt($( "#slider-width" ).slider( "value" )) // fill inches with width slider

	  feet = 0;
//$("#slider-width").slider('value',$( "#text_width_in" ).val() ); // set width slider to width textbox
	  while(inches > 11) //convert inches to feet (width)

	  {

	  feet = feet+1;

	  inches = inches -12;

		$( "#text_width_ft" ).val(feet);

		$( "#text_width_in" ).val(inches);

	  }

	  //END WIDTH
	//TAKE CARE OF DISTANCE
	$("#slider-dist").slider('value',Math.round((throwratio_low*$( "#slider-width" ).slider( "value" ))) ); //set dist slider to TR*W
	 

	  var inches = parseInt($( "#slider-dist" ).slider( "value" )) // fill inches with slider value for distance
		$( "#text_dist_tot_in" ).val(Math.round( $( "#slider-dist" ).slider( "value" )));//set distance textbox with slider
		$("#text_dist_tot_mm").val(Math.round( $( "#slider-dist" ).slider( "value" )));
	  var feet = 0;

	  while(inches > 11) //convert inches to feet (distance)

	  {

	  feet = feet+1;

	  inches = inches -12;

		$( "#text_dist_ft" ).val(feet);

		$( "#text_dist_in" ).val(inches);

	  }

	  //END DISTANCE
	  //TAKE CARE OF HEIGHT
	  var getheight = ($( "#slider-width" ).slider( "value" )*AspectHeight)/AspectWidth;
	$("#slider-height").slider('value',Math.round(getheight)); //set dist slider to TR*W
	 

	  var inches = parseInt($( "#slider-height" ).slider( "value" )) // fill inches with slider value for distance
		$( "#text_height_tot_in" ).val(Math.round( $( "#slider-height" ).slider( "value" )));//set  textbox with slider
		$("#text_height_tot_mm").val(Math.round( $( "#slider-height" ).slider( "value" )));
	  var feet = 0;

	  while(inches > 11) //convert inches to feet (distance)

	  {

	  feet = feet+1;

	  inches = inches -12;

		$( "#text_height_ft" ).val(feet);

		$( "#text_height_in" ).val(inches);

	  }

	  //END HEIGHT
	  
		//TAKE CARE OF DIAGONAL
		var mywidth = parseInt($( "#slider-width" ).slider( "value" ));
		var myheight = parseInt($( "#slider-height" ).slider( "value" )); 
	var getdiag = Math.sqrt((mywidth*mywidth)+(myheight*myheight)); //distance = TR*W
	$("#slider-diag").slider('value',Math.round(getdiag)); //set dist slider getdist
	 
	  var inches = parseInt($( "#slider-diag" ).slider( "value" )) // fill inches with slider value for distance
	  $( "#text_diag_tot_in" ).val(Math.round( $( "#slider-diag" ).slider( "value" )));//set diagance textbox with slider
	  $("#text_diag_tot_mm").val(Math.round( $( "#slider-diag" ).slider( "value" )));
	  var feet = 0;

	  while(inches > 11) //convert inches to feet (distance)

	  {

	  feet = feet+1;

	  inches = inches -12;

		$( "#text_diag_ft" ).val(feet);

		$( "#text_diag_in" ).val(inches);

	  }

	  //END DIAGONAL
	  getMinMaxDist();
	  ColorSliders();
	}
	
	function FromWidthText()
	{
		
		var mywidthinches = parseInt($( "#text_width_in" ).val().substring(0, $( "#text_width_in" ).val().length - 1));
		var mywidthfeet = parseInt($( "#text_width_ft" ).val().substring(0, $( "#text_width_ft" ).val().length - 1));
		
		$( "#slider-width" ).slider( 'value',Math.round(mywidthinches+(mywidthfeet*12)));
  


	  //TAKE CARE OF WIDTH

	  inches = parseInt($( "#slider-width" ).slider( "value" )) // fill inches with width slider

	  feet = 0;
//$("#slider-width").slider('value',$( "#text_width_in" ).val() ); // set width slider to width textbox
	  while(inches > 11) //convert inches to feet (width)

	  {

	  feet = feet+1;

	  inches = inches -12;

		$( "#text_width_ft" ).val(feet);

		$( "#text_width_in" ).val(inches);

	  }

	  //END WIDTH
	//TAKE CARE OF DISTANCE
	$("#slider-dist").slider('value',Math.round((throwratio_low*$( "#slider-width" ).slider( "value" ))) ); //set dist slider to TR*W
	 

	  var inches = parseInt($( "#slider-dist" ).slider( "value" )) // fill inches with slider value for distance

	  var feet = 0;

	  while(inches > 11) //convert inches to feet (distance)

	  {

	  feet = feet+1;

	  inches = inches -12;

		$( "#text_dist_ft" ).val(feet);

		$( "#text_dist_in" ).val(inches);

	  }

	  //END DISTANCE
	  //TAKE CARE OF HEIGHT
	  var getheight = ($( "#slider-width" ).slider( "value" )*AspectHeight)/AspectWidth;
	$("#slider-height").slider('value',Math.round(getheight)); //set dist slider to TR*W
	 

	  var inches = parseInt($( "#slider-height" ).slider( "value" )) // fill inches with slider value for distance

	  var feet = 0;

	  while(inches > 11) //convert inches to feet (distance)

	  {

	  feet = feet+1;

	  inches = inches -12;

		$( "#text_height_ft" ).val(feet);

		$( "#text_height_in" ).val(inches);

	  }

	  //END HEIGHT
	  
		//TAKE CARE OF DIAGONAL
		var mywidth = parseInt($( "#slider-width" ).slider( "value" ));
		var myheight = parseInt($( "#slider-height" ).slider( "value" )); 
	var getdiag = Math.sqrt((mywidth*mywidth)+(myheight*myheight)); //distance = TR*W
	$("#slider-diag").slider('value',Math.round(getdiag)); //set dist slider getdist
	 
	  var inches = parseInt($( "#slider-diag" ).slider( "value" )) // fill inches with slider value for distance
	  var feet = 0;

	  while(inches > 11) //convert inches to feet (distance)

	  {

	  feet = feet+1;

	  inches = inches -12;

		$( "#text_diag_ft" ).val(feet);

		$( "#text_diag_in" ).val(inches);

	  }

	  //END DIAGONAL
	  getMinMaxDist();
	  ColorSliders();
	}
	function FromWidthText_In()
	{
		$( "#slider-zoom" ).slider( "value",(100));
		  $( "#text_zoom" ).val($( "#slider-zoom" ).slider( "value" ));
		$( "#text_width_tot_in" ).val(parseInt($( "#text_width_tot_in" ).val()));
		var mywidthinches = parseInt($( "#text_width_tot_in" ).val());
		$("#text_width_tot_mm").val(mywidthinches*2.54);
		$( "#slider-width" ).slider( 'value',mywidthinches);
  


	  //TAKE CARE OF WIDTH


	  //END WIDTH
	//TAKE CARE OF DISTANCE
	$("#slider-dist").slider('value',Math.round((throwratio_low*$( "#slider-width" ).slider( "value" ))) ); //set dist slider to TR*W
	 
$( "#text_dist_tot_in" ).val(parseInt($( "#slider-dist" ).slider( "value" )));
	  var inches = parseInt($( "#slider-dist" ).slider( "value" )) // fill inches with slider value for distance


	  //END DISTANCE
	  //TAKE CARE OF HEIGHT
	  var getheight = ($( "#slider-width" ).slider( "value" )*AspectHeight)/AspectWidth;
	$("#slider-height").slider('value',Math.round(getheight)); //set dist slider to TR*W
	 
$( "#text_height_tot_in" ).val(parseInt($( "#slider-height" ).slider( "value" )));
	  var inches = parseInt($( "#slider-height" ).slider( "value" )) // fill inches with slider value for distance

	  //END HEIGHT
	  
		//TAKE CARE OF DIAGONAL
		var mywidth = parseInt($( "#slider-width" ).slider( "value" ));
		var myheight = parseInt($( "#slider-height" ).slider( "value" )); 
	var getdiag = Math.sqrt((mywidth*mywidth)+(myheight*myheight)); //distance = TR*W
	$("#slider-diag").slider('value',Math.round(getdiag)); //set dist slider getdist
	 $( "#text_diag_tot_in" ).val(parseInt($( "#slider-diag" ).slider( "value" )));
	  var inches = parseInt($( "#slider-diag" ).slider( "value" )) // fill inches with slider value for distance

	  //END DIAGONAL
	  getMinMaxDist();
	  ColorSliders();
	}
	function FromWidthText_mm()
	{
		$( "#slider-zoom" ).slider( "value",(100));
		  $( "#text_zoom" ).val($( "#slider-zoom" ).slider( "value" ));
		var mywidthmm = parseInt($( "#text_width_tot_mm" ).val());
		$("#text_width_tot_in").val(mywidthmm/2.54);
		
		$( "#slider-width" ).slider( 'value',mywidthmm);
  


	  //TAKE CARE OF WIDTH
	

	  //END WIDTH
	//TAKE CARE OF DISTANCE
	$("#slider-dist").slider('value',Math.round((throwratio_low*$( "#slider-width" ).slider( "value" ))) ); //set dist slider to TR*W
	 
$( "#text_dist_tot_in" ).val(parseInt($( "#slider-dist" ).slider( "value" )));
	  var inches = parseInt($( "#slider-dist" ).slider( "value" )) // fill inches with slider value for distance
	$("#text_dist_tot_in").val(inches/2.54);

	  //END DISTANCE
	  //TAKE CARE OF HEIGHT
	  var getheight = ($( "#slider-width" ).slider( "value" )*AspectHeight)/AspectWidth;
	$("#slider-height").slider('value',Math.round(getheight)); //set dist slider to TR*W
	 
$( "#text_height_tot_in" ).val(parseInt($( "#slider-height" ).slider( "value" )));
	  var inches = parseInt($( "#slider-height" ).slider( "value" )) // fill inches with slider value for distance
$("#text_height_tot_in").val(inches/2.54);
	  //END HEIGHT
	  
		//TAKE CARE OF DIAGONAL
		var mywidth = parseInt($( "#slider-width" ).slider( "value" ));
		var myheight = parseInt($( "#slider-height" ).slider( "value" )); 
	var getdiag = Math.sqrt((mywidth*mywidth)+(myheight*myheight)); //distance = TR*W
	$("#slider-diag").slider('value',Math.round(getdiag)); //set dist slider getdist
	 $( "#text_diag_tot_in" ).val(parseInt($( "#slider-diag" ).slider( "value" )));
	  var inches = parseInt($( "#slider-diag" ).slider( "value" )) // fill inches with slider value for distance
$("#text_diag_tot_in").val(inches/2.54);
	  //END DIAGONAL
	  getMinMaxDist();
	  ColorSliders();
	}
		
	//Height Functions
	function FromHeightSlider()
	{
		 $( "#text_height_in" ).val( Math.round($( "#slider-height" ).slider( "value" )));
		  
		  	//TAKE CARE OF HEIGHT
	  var inches = parseInt($( "#slider-height" ).slider( "value" )) // fill inches with slider value for distance
	  $( "#text_height_tot_in" ).val(Math.round( $( "#slider-height" ).slider( "value" )));//set heightance textbox with slider
	  $("#text_height_tot_mm").val(Math.round( $( "#slider-height" ).slider( "value" )));
	  var feet = 0;

	  while(inches > 11) //convert inches to feet (distance)

	  {

	  feet = feet+1;

	  inches = inches -12;

		$( "#text_height_ft" ).val(feet);

		$( "#text_height_in" ).val(inches);

	  }

	  //END HEIGHT
		  
		  //TAKE CARE OF WIDTH
			var getwidth = ($( "#slider-height" ).slider( "value" )*AspectWidth)/AspectHeight; // (H*ARW)/ARH
			$("#slider-width").slider('value',Math.round(getwidth) ); //set width to getwidth
			inches = parseInt($( "#slider-width" ).slider( "value" )) // fill inches with width slider
			$( "#text_width_tot_in" ).val(Math.round( $( "#slider-width" ).slider( "value" )));//set widthance textbox with slider
	  $("#text_width_tot_mm").val(Math.round( $( "#slider-width" ).slider( "value" )));
	  feet = 0;
	  while(inches > 11) //convert inches to feet (width)

	  {

	  feet = feet+1;

	  inches = inches -12;

		$( "#text_width_ft" ).val(feet);

		$( "#text_width_in" ).val(inches);

	  }

	  //END WIDTH
	//TAKE CARE OF DISTANCE
	var getdist = throwratio_low*getwidth; //distance = TR*W
	$("#slider-dist").slider('value',Math.round(getdist)); //set dist slider getdist
	 
	  var inches = parseInt($( "#slider-dist" ).slider( "value" )) // fill inches with slider value for distance
	  $( "#text_dist_tot_in" ).val(Math.round( $( "#slider-dist" ).slider( "value" )));//set distance textbox with slider
	  $("#text_dist_tot_mm").val(Math.round( $( "#slider-dist" ).slider( "value" )));
	  var feet = 0;

	  while(inches > 11) //convert inches to feet (distance)

	  {

	  feet = feet+1;

	  inches = inches -12;

		$( "#text_dist_ft" ).val(feet);

		$( "#text_dist_in" ).val(inches);

	  }

	  //END DISTANCE
		//TAKE CARE OF DIAGONAL
		var mywidth = parseInt($( "#slider-width" ).slider( "value" ));
		var myheight = parseInt($( "#slider-height" ).slider( "value" )); 
	var getdiag = Math.sqrt((mywidth*mywidth)+(myheight*myheight)); //distance = TR*W
	$("#slider-diag").slider('value',Math.round(getdiag)); //set dist slider getdist
	 
	  var inches = parseInt($( "#slider-diag" ).slider( "value" )) // fill inches with slider value for distance
	  $( "#text_diag_tot_in" ).val(Math.round( $( "#slider-diag" ).slider( "value" )));//set diagance textbox with slider
	  $("#text_diag_tot_mm").val(Math.round( $( "#slider-diag" ).slider( "value" )));
	  var feet = 0;

	  while(inches > 11) //convert inches to feet (distance)

	  {

	  feet = feet+1;

	  inches = inches -12;

		$( "#text_diag_ft" ).val(feet);

		$( "#text_diag_in" ).val(inches);

	  }

	  //END DIAGONAL



getMinMaxDist();
ColorSliders();
	}
	function FromHeightText()
	{
		
		var myhtinches = parseInt($( "#text_height_in" ).val().substring(0, $( "#text_height_in" ).val().length - 1));
		var myhtfeet = parseInt($( "#text_height_ft" ).val().substring(0, $( "#text_height_ft" ).val().length - 1));
		//var mydg = $( "#slider-diag" ).slider( "value" )
		
		$( "#slider-height" ).slider( 'value',Math.round(myhtinches+(myhtfeet*12)));
		
		  
		  	//TAKE CARE OF HEIGHT
	  var inches = parseInt($( "#slider-height" ).slider( "value" )) // fill inches with slider value for distance
	  var feet = 0;

	  while(inches > 11) //convert inches to feet (distance)

	  {

	  feet = feet+1;

	  inches = inches -12;

		$( "#text_height_ft" ).val(feet);

		$( "#text_height_in" ).val(inches);

	  }

	  //END HEIGHT
		  
		  //TAKE CARE OF WIDTH
			var getwidth = ($( "#slider-height" ).slider( "value" )*AspectWidth)/AspectHeight; // (H*ARW)/ARH
			$("#slider-width").slider('value',Math.round(getwidth) ); //set width to getwidth
			inches = parseInt($( "#slider-width" ).slider( "value" )) // fill inches with width slider

	  feet = 0;
	  while(inches > 11) //convert inches to feet (width)

	  {

	  feet = feet+1;

	  inches = inches -12;

		$( "#text_width_ft" ).val(feet);

		$( "#text_width_in" ).val(inches);

	  }

	  //END WIDTH
	//TAKE CARE OF DISTANCE
	var getdist = throwratio_low*getwidth; //distance = TR*W
	$("#slider-dist").slider('value',Math.round(getdist)); //set dist slider getdist
	 
	  var inches = parseInt($( "#slider-dist" ).slider( "value" )) // fill inches with slider value for distance
	  var feet = 0;

	  while(inches > 11) //convert inches to feet (distance)

	  {

	  feet = feet+1;

	  inches = inches -12;

		$( "#text_dist_ft" ).val(feet);

		$( "#text_dist_in" ).val(inches);

	  }

	  //END DISTANCE
		//TAKE CARE OF DIAGONAL
		var mywidth = parseInt($( "#slider-width" ).slider( "value" ));
		var myheight = parseInt($( "#slider-height" ).slider( "value" )); 
	var getdiag = Math.sqrt((mywidth*mywidth)+(myheight*myheight)); //distance = TR*W
	$("#slider-diag").slider('value',Math.round(getdiag)); //set dist slider getdist
	 
	  var inches = parseInt($( "#slider-diag" ).slider( "value" )) // fill inches with slider value for distance
	  var feet = 0;

	  while(inches > 11) //convert inches to feet (distance)

	  {

	  feet = feet+1;

	  inches = inches -12;

		$( "#text_diag_ft" ).val(feet);

		$( "#text_diag_in" ).val(inches);

	  }

	  //END DIAGONAL



getMinMaxDist();
ColorSliders();
	}
	function FromHeightText_In()
	{
		$( "#slider-zoom" ).slider( "value",(100));
		  $( "#text_zoom" ).val($( "#slider-zoom" ).slider( "value" ));
		$( "#text_height_tot_in" ).val(parseInt($( "#text_height_tot_in" ).val()));
		var myheightinches = parseInt($( "#text_height_tot_in" ).val());
		$("#text_height_tot_mm").val(myheightinches*2.54);
		$( "#slider-height" ).slider( 'value',myheightinches);
		
		  
		  	//TAKE CARE OF HEIGHT
	  var inches = parseInt($( "#slider-height" ).slider( "value" )) // fill inches with slider value for distance


	  //END HEIGHT
		  
		  //TAKE CARE OF WIDTH
			var getwidth = ($( "#slider-height" ).slider( "value" )*AspectWidth)/AspectHeight; // (H*ARW)/ARH
			$("#slider-width").slider('value',Math.round(getwidth) ); //set width to getwidth
			$( "#text_width_tot_in" ).val(parseInt($( "#slider-width" ).slider( "value" )));
			inches = parseInt($( "#slider-width" ).slider( "value" )) // fill inches with width slider


	  //END WIDTH
	//TAKE CARE OF DISTANCE
	var getdist = throwratio_low*getwidth; //distance = TR*W
	$("#slider-dist").slider('value',Math.round(getdist)); //set dist slider getdist
	 $( "#text_dist_tot_in" ).val(parseInt($( "#slider-dist" ).slider( "value" )));
	  var inches = parseInt($( "#slider-dist" ).slider( "value" )) // fill inches with slider value for distance


	  //END DISTANCE
		//TAKE CARE OF DIAGONAL
		var mywidth = parseInt($( "#slider-width" ).slider( "value" ));
		var myheight = parseInt($( "#slider-height" ).slider( "value" )); 
	var getdiag = Math.sqrt((mywidth*mywidth)+(myheight*myheight)); //distance = TR*W
	$("#slider-diag").slider('value',Math.round(getdiag)); //set dist slider getdist
	 $( "#text_diag_tot_in" ).val(parseInt($( "#slider-diag" ).slider( "value" )));
	  var inches = parseInt($( "#slider-diag" ).slider( "value" )) // fill inches with slider value for distance


	  //END DIAGONAL



getMinMaxDist();
ColorSliders();
	}
	function FromHeightText_mm()
	{
		$( "#slider-zoom" ).slider( "value",(100));
		  $( "#text_zoom" ).val($( "#slider-zoom" ).slider( "value" ));
		var mywidthmm = parseInt($( "#text_width_tot_mm" ).val());
		$("#text_width_tot_in").val(mywidthmm/2.54);
		
		$( "#slider-width" ).slider( 'value',mywidthmm);
  


	  //TAKE CARE OF WIDTH
	

	  //END WIDTH
	//TAKE CARE OF DISTANCE
	$("#slider-dist").slider('value',Math.round((throwratio_low*$( "#slider-width" ).slider( "value" ))) ); //set dist slider to TR*W
	 
$( "#text_dist_tot_in" ).val(parseInt($( "#slider-dist" ).slider( "value" )));
	  var inches = parseInt($( "#slider-dist" ).slider( "value" )) // fill inches with slider value for distance
	$("#text_dist_tot_in").val(inches/2.54);

	  //END DISTANCE
	  //TAKE CARE OF HEIGHT
	  var getheight = ($( "#slider-width" ).slider( "value" )*AspectHeight)/AspectWidth;
	$("#slider-height").slider('value',Math.round(getheight)); //set dist slider to TR*W
	 
$( "#text_height_tot_in" ).val(parseInt($( "#slider-height" ).slider( "value" )));
	  var inches = parseInt($( "#slider-height" ).slider( "value" )) // fill inches with slider value for distance
$("#text_height_tot_in").val(inches/2.54);
	  //END HEIGHT
	  
		//TAKE CARE OF DIAGONAL
		var mywidth = parseInt($( "#slider-width" ).slider( "value" ));
		var myheight = parseInt($( "#slider-height" ).slider( "value" )); 
	var getdiag = Math.sqrt((mywidth*mywidth)+(myheight*myheight)); //distance = TR*W
	$("#slider-diag").slider('value',Math.round(getdiag)); //set dist slider getdist
	 $( "#text_diag_tot_in" ).val(parseInt($( "#slider-diag" ).slider( "value" )));
	  var inches = parseInt($( "#slider-diag" ).slider( "value" )) // fill inches with slider value for distance
$("#text_diag_tot_in").val(inches/2.54);
	  //END DIAGONAL
	  getMinMaxDist();
	  ColorSliders();
	}
				
	
	function FromDiagSlider()
	{
		var mydg = $( "#slider-diag" ).slider( "value" )
			$( "#text_diag_in" ).val( Math.round($( "#slider-diag" ).slider( "value" )));
			inches = parseInt($( "#slider-diag" ).slider( "value" )) // fill inches with width slider
		$( "#text_diag_tot_in" ).val(Math.round( $( "#slider-diag" ).slider( "value" )));//set diagance textbox with slider
	  $("#text_diag_tot_mm").val(Math.round( $( "#slider-diag" ).slider( "value" )));
			var feet = 0;

			while(inches > 11) //convert inches to feet (distance)

			{

			feet = feet+1;

			inches = inches -12;

				$( "#text_diag_ft" ).val(feet);

				$( "#text_diag_in" ).val(inches);

			}
		  
		 //SET HEIGHT
		  	var getheight = ((parseInt($( "#slider-diag" ).slider( "value" )))*AspectHeight)/(Math.sqrt((AspectWidth*AspectWidth)+(AspectHeight*AspectHeight)))
			$( "#slider-height" ).slider( 'value',Math.round(getheight) );

			inches = parseInt($( "#slider-height" ).slider( "value" )) // fill inches with width slider
			$( "#text_height_tot_in" ).val(Math.round( $( "#slider-height" ).slider( "value" )));//set heightance textbox with slider
	  $("#text_height_tot_mm").val(Math.round( $( "#slider-height" ).slider( "value" )));
			var feet = 0;

	  while(inches > 11) //convert inches to feet (distance)

	  {

	  feet = feet+1;

	  inches = inches -12;

		$( "#text_height_ft" ).val(feet);

		$( "#text_height_in" ).val(inches);

	  }

		//END HEIGHT
		 //SET WIDTH
		  	var getwidth = (AspectWidth/AspectHeight)*$( "#slider-height" ).slider( 'value');
			$( "#slider-width" ).slider( 'value',Math.round(getwidth) );

			inches = parseInt($( "#slider-width" ).slider( "value" )) // fill inches with width slider
			$( "#text_width_tot_in" ).val(Math.round( $( "#slider-width" ).slider( "value" )));//set widthance textbox with slider
	  $("#text_width_tot_mm").val(Math.round( $( "#slider-width" ).slider( "value" )));
			var feet = 0;

	  while(inches > 11) //convert inches to feet (distance)

	  {

	  feet = feet+1;

	  inches = inches -12;

		$( "#text_width_ft" ).val(feet);

		$( "#text_width_in" ).val(inches);

	  }

		//END WIDTH
		 //SET DISTANCE
		  	var getdist = throwratio_low*parseInt($( "#slider-width" ).slider( "value" ));
			$( "#slider-dist" ).slider( 'value',Math.round(getdist) );

			inches = parseInt($( "#slider-dist" ).slider( "value" )) // fill inches with width slider
		$( "#text_dist_tot_in" ).val(Math.round( $( "#slider-dist" ).slider( "value" )));//set distance textbox with slider
	  $("#text_dist_tot_mm").val(Math.round( $( "#slider-dist" ).slider( "value" )));
			var feet = 0;

	  while(inches > 11) //convert inches to feet (distance)

	  {

	  feet = feet+1;

	  inches = inches -12;

		$( "#text_dist_ft" ).val(feet);

		$( "#text_dist_in" ).val(inches);

	  }

		//END DISTANCE
ColorSliders();
	}
	function FromDiagText()
	{
		var mydginches = parseInt($( "#text_diag_in" ).val().substring(0, $( "#text_diag_in" ).val().length - 1));
		var mydgfeet = parseInt($( "#text_diag_ft" ).val().substring(0, $( "#text_diag_ft" ).val().length - 1));
		//var mydg = $( "#slider-diag" ).slider( "value" )
		
		$( "#slider-diag" ).slider( 'value',Math.round(mydginches+(mydgfeet*12)));
			//$( "#text_diag_in" ).val( Math.round($( "#slider-diag" ).slider( "value" )));
	  
		  
		 //SET HEIGHT
		  	var getheight = ((parseInt($( "#slider-diag" ).slider( "value" )))*AspectHeight)/(Math.sqrt((AspectWidth*AspectWidth)+(AspectHeight*AspectHeight)))
			$( "#slider-height" ).slider( 'value',Math.round(getheight) );

			inches = parseInt($( "#slider-height" ).slider( "value" )) // fill inches with width slider
	  
			var feet = 0;

	  while(inches > 11) //convert inches to feet (distance)

	  {

	  feet = feet+1;

	  inches = inches -12;

		$( "#text_height_ft" ).val(feet);

		$( "#text_height_in" ).val(inches);

	  }

		//END HEIGHT
		 //SET WIDTH
		  	var getwidth = (AspectWidth/AspectHeight)*$( "#slider-height" ).slider( 'value');
			$( "#slider-width" ).slider( 'value',Math.round(getwidth) );

			inches = parseInt($( "#slider-width" ).slider( "value" )) // fill inches with width slider
	  
			var feet = 0;

	  while(inches > 11) //convert inches to feet (distance)

	  {

	  feet = feet+1;

	  inches = inches -12;

		$( "#text_width_ft" ).val(feet);

		$( "#text_width_in" ).val(inches);

	  }

		//END WIDTH
		 //SET DISTANCE
		  	var getdist = throwratio_low*parseInt($( "#slider-width" ).slider( "value" ));
			$( "#slider-dist" ).slider( 'value',Math.round(getdist) );

			inches = parseInt($( "#slider-dist" ).slider( "value" )) // fill inches with width slider
	  
			var feet = 0;

	  while(inches > 11) //convert inches to feet (distance)

	  {

	  feet = feet+1;

	  inches = inches -12;

		$( "#text_dist_ft" ).val(feet);

		$( "#text_dist_in" ).val(inches);

	  }

		//END DISTANCE
ColorSliders();
	}
	function FromDiagText_In()
	{
		$( "#slider-zoom" ).slider( "value",(100));
		  $( "#text_zoom" ).val($( "#slider-zoom" ).slider( "value" ));
		$( "#text_diag_tot_in" ).val(parseInt($( "#text_diag_tot_in" ).val()));
		var mydiaginches = parseInt($( "#text_diag_tot_in" ).val());
		$("#text_diag_tot_mm").val(mydiaginches*2.54);
		$( "#slider-diag" ).slider( 'value',mydiaginches);
	  
		  
		 //SET HEIGHT
		  	var getheight = ((parseInt($( "#slider-diag" ).slider( "value" )))*AspectHeight)/(Math.sqrt((AspectWidth*AspectWidth)+(AspectHeight*AspectHeight)))
			$( "#slider-height" ).slider( 'value',Math.round(getheight) );
			$( "#text_height_tot_in" ).val(parseInt($( "#slider-height" ).slider( "value" )));

			inches = parseInt($( "#slider-height" ).slider( "value" )) // fill inches with width slider


		//END HEIGHT
		 //SET WIDTH
		  	var getwidth = (AspectWidth/AspectHeight)*$( "#slider-height" ).slider( 'value');
			$( "#slider-width" ).slider( 'value',Math.round(getwidth) );
			$( "#text_width_tot_in" ).val(parseInt($( "#slider-width" ).slider( "value" )));

			inches = parseInt($( "#slider-width" ).slider( "value" )) // fill inches with width slider


		//END WIDTH
		 //SET DISTANCE
		  	var getdist = throwratio_low*parseInt($( "#slider-width" ).slider( "value" ));
			$( "#slider-dist" ).slider( 'value',Math.round(getdist) );
			$( "#text_dist_tot_in" ).val(parseInt($( "#slider-dist" ).slider( "value" )));

			inches = parseInt($( "#slider-dist" ).slider( "value" )) // fill inches with width slider


		//END DISTANCE
ColorSliders();
	}
	function FromDiagText_mm()
	{
		$( "#slider-zoom" ).slider( "value",(100));
		  $( "#text_zoom" ).val($( "#slider-zoom" ).slider( "value" ));
		//$( "#text_diag_tot_in" ).val(parseInt($( "#text_diag_tot_in" ).val()));
		var mydiaginches = parseInt($( "#text_diag_tot_mm" ).val());
		$("#text_diag_tot_in").val(mydiaginches/2.54);
		$( "#slider-diag" ).slider( 'value',mydiaginches);
	  
		  
		 //SET HEIGHT
		  	var getheight = ((parseInt($( "#slider-diag" ).slider( "value" )))*AspectHeight)/(Math.sqrt((AspectWidth*AspectWidth)+(AspectHeight*AspectHeight)))
			$( "#slider-height" ).slider( 'value',Math.round(getheight) );
			$( "#text_height_tot_in" ).val(parseInt($( "#slider-height" ).slider( "value" )));

			inches = parseInt($( "#slider-height" ).slider( "value" )) // fill inches with width slider
			$("#text_height_tot_in").val(inches/2.54);

		//END HEIGHT
		 //SET WIDTH
		  	var getwidth = (AspectWidth/AspectHeight)*$( "#slider-height" ).slider( 'value');
			$( "#slider-width" ).slider( 'value',Math.round(getwidth) );
			$( "#text_width_tot_in" ).val(parseInt($( "#slider-width" ).slider( "value" )));

			inches = parseInt($( "#slider-width" ).slider( "value" )) // fill inches with width slider
$("#text_width_tot_in").val(inches/2.54);

		//END WIDTH
		 //SET DISTANCE
		  	var getdist = throwratio_low*parseInt($( "#slider-width" ).slider( "value" ));
			$( "#slider-dist" ).slider( 'value',Math.round(getdist) );
			$( "#text_dist_tot_in" ).val(parseInt($( "#slider-dist" ).slider( "value" )));

			inches = parseInt($( "#slider-dist" ).slider( "value" )) // fill inches with width slider
$("#text_dist_tot_in").val(inches/2.54);

		//END DISTANCE
ColorSliders();
	}
			
	
	function CheckAspectRatios()
	{
		switch(temp_aspectratio)
		{
			case "4:3":
			aspect1 = "16:9";
			aspect2 = "16:10";
			break;
			case "16:9":
			aspect1 = "4:3";
			aspect2 = "16:10";
			break;
			case "16:10":
			aspect1 = "4:3";
			aspect2 = "16:9";
			break;
		}
	}
	function ColorSliders()
	{
		
	 //DISTANCE
	inches = parseInt($( "#slider-dist" ).slider( "value" ));

	  	  	if(inches < (dist_max * 0.25)) //set color coding - TOO CLOSE

			{

				$("#mainsliders .ui-slider-range.ui-widget-header").removeClass("green");
				$("#mainsliders .ui-widget-content").removeClass("green");

				$("#mainsliders .ui-slider-range.ui-widget-header").removeClass("yellow");
				$("#mainsliders .ui-widget-content").removeClass("yellow");

				$("#mainsliders .ui-slider-range.ui-widget-header").addClass("red");
				$("#mainsliders .ui-widget-content").addClass("red");

				$( "#dist_desc" ).html("<img src = 'img/icon_alarm.png'/>Your image may be too bright.");

			}
			

			if(inches > (dist_max * 0.25) && inches < (dist_max * 0.75) ) //set color coding - JUST RIGHT

			{
				
				$("#mainsliders .ui-slider-range.ui-widget-header").removeClass("red");
				$("#mainsliders .ui-widget-content").removeClass("red");

				$("#mainsliders .ui-slider-range.ui-widget-header").removeClass("yellow");
				$("#mainsliders .ui-widget-content").removeClass("yellow");

				$("#mainsliders .ui-slider-range.ui-widget-header").addClass("green");
				$("#mainsliders .ui-widget-content").addClass("green");

				$( "#dist_desc" ).html("<img src = 'img/icon_check.png'/>You are at an optimal distance.");

			}

			if(inches > (dist_max * 0.75) )  //set color coding - TOO FAR AWAY

			{

				$("#mainsliders .ui-slider-range.ui-widget-header").removeClass("red");
				$("#mainsliders .ui-widget-content").removeClass("red");

				$("#mainsliders .ui-slider-range.ui-widget-header").removeClass("green");
				$("#mainsliders .ui-widget-content").removeClass("green");

				$("#mainsliders .ui-slider-range.ui-widget-header").addClass("yellow");
				$("#mainsliders .ui-widget-content").addClass("yellow");

				$( "#dist_desc" ).html("<img src = 'img/icon_warn.png'/>Your image may be too dim.");

			}

			//END COLOR CODING
		setFtIn();
	}
	function getLensInformation()
	{
		var lengthtype = "";
if(throwratio_low < 0.5)
{
	lengthtype = "Ultra-Short Throw";
}
else if(throwratio_low <= 1.0 && throwratio_low >= 0.5)
{
	lengthtype = "Short Throw";
}
else if(throwratio_low <= 2.0 && throwratio_low >= 1.1)
{
	lengthtype = "Standard";
}
else if(throwratio_low >= 2.1)
{
	lengthtype = "Long Throw";
}
var x = document.getElementById("whatlens");
$("#lname").text(x.options[x.selectedIndex].text);
$("#llength").text(lengthtype);
	}
	function getMinMaxDist()
	{
		zoomX = Math.round(100*(throwratio_high/throwratio_low))/100;
		if (isNaN(zoomX))
			{
				zoomX = 1.0;
			}
		$( "#zoomvalue" ).text(zoomX + "x");
		//nearest = 0;
		//furthest = 0;
		if ($("#modelnumber").val() != "")
		{
			//alert(zoomX);
			nearest = Math.round(parseInt($( "#slider-dist" ).slider( "value" )));
			furthest = Math.round(parseInt($( "#slider-dist" ).slider( "value" ))*zoomX);
			
			if (isNaN(nearest))
			{
				//nearest = 0;
			}
			if (isNaN(furthest))
			{
				//furthest = 0;
			}
			
					  var inches = 0;
					  var feet = 0;
					
					inches = nearest;
					/*
					  while(inches > 11) //convert inches to feet (distance)

					  {
						  feet = feet+1;
						  inches = inches -12;
					  }
					  */
					  $("#possibleNear").text(inches);
					  inches = 0;
					  feet = 0;
						inches = furthest;
					  /*while(inches > 11) //convert inches to feet (distance)

					  {
						  feet = feet+1;
						  inches = inches -12;
					  }
					  */
					  $("#possibleFar").text(inches);
		}
		else
		{
			nearest = 0;
			furthest = 0;
			$("#possibleNear").text(nearest);
			$("#possibleFar").text(furthest);
		}
		$("#possibleRange").text("");
		
		$("#imageoffset_label").text(Math.round($( "#slider-height" ).slider( "value" )*(offsetvalue/100)) + " (" + offsetvalue + "%)");
		$("#imageoffset_label_viz").text(Math.round($( "#slider-height" ).slider( "value" )*(offsetvalue/100)) + " (" + offsetvalue + "%)");
		
		
	}
	function setAspectRatio()
	{
		
		CheckAspectRatios();
		
		xAR = document.getElementById("aspectratio_select");
		$('#aspectratio_select')
		.empty();
		var option1 = document.createElement("option");
		option1.text = temp_aspectratio ;
		var option2 = document.createElement("option");
		option2.text = aspect1;
		var option3 = document.createElement("option");
		option3.text = aspect2;
		 xAR.add(option1,xAR[0]);
		 xAR.add(option2,xAR[1]);
		 xAR.add(option3,xAR[2]);
		

	

	}
			function Lens_Selected()
			{
				var x = document.getElementById("whatlens");
				switch(x.options[x.selectedIndex].text)
{
	case "Lens-050":
		throwratio_low = 0.8;
		throwratio_high = 0.8;
	break;
	case "Lens-051":
		throwratio_low = 1.25;
		throwratio_high = 1.5;
	break;
	case "Lens-052":
		throwratio_low = 2.0;
		throwratio_high = 3.8;
	break;
	case "Lens-053":
		throwratio_low = 3.8;
		throwratio_high = 7.22;
	break;
		case "Lens-060":
		throwratio_low = 0.8;
		throwratio_high = 0.8;
	break;
		case "Lens-061":
		throwratio_low = 2.0;
		throwratio_high = 3.0;
	break;
		case "Lens-062":
		throwratio_low = 1.8;
		throwratio_high = 2.3;
	break;
		case "Lens-063":
		throwratio_low = 5.0;
		throwratio_high = 9.2;
	break;
		case "Lens-064":
		throwratio_low = 2.8;
		throwratio_high = 5.2;
	break;
		case "Lens-065":
		throwratio_low = 1.5;
		throwratio_high = 2.2;
	break;
		case "Lens-066":
		throwratio_low = 1.2;
		throwratio_high = 1.5;
	break;
		case "Lens-067":
		throwratio_low = 0.5;
		throwratio_high = 0.6;
	break;
		case "Lens-068":
		throwratio_low = 2.2;
		throwratio_high = 2.9;
	break;
		case "Lens-069":
		throwratio_low = 0.78;
		throwratio_high = 0.78;
	break;
			case "Lens-070":
		throwratio_low = 1.15;
		throwratio_high = 1.75;
	break;
			case "Lens-071":
		throwratio_low = 1.47;
		throwratio_high = 3.0;
	break;
			case "Lens-072":
		throwratio_low = 2.8;
		throwratio_high = 4.75;
	break;
			case "Lens-073":
		throwratio_low = 4.5;
		throwratio_high = 8.0;
	break;
			case "Lens-074":
		throwratio_low = 1.8;
		throwratio_high = 2.4;
	break;
			case "Lens-075":
		throwratio_low = 0.78;
		throwratio_high = 0.78;
	break;
			case "Lens-076":
		throwratio_low = 1.3;
		throwratio_high = 1.8
	break;
			case "Lens-077":
		throwratio_low = 3.6;
		throwratio_high = 5.6
	break;
			case "Lens-078":
		throwratio_low = 5.5;
		throwratio_high = 8.5;
	break;
			case "Lens-079":
		throwratio_low = 2.3;
		throwratio_high = 3.8;
	break;
}
	
$("#lname").text(x.options[x.selectedIndex].text);
$("#llength").text(lengthtype);
$("#spec_throw").text(throwratio_low + " - " + throwratio_high);
$( "#zoomvalue" ).text(Math.round(100*(throwratio_high/throwratio_low)/100) + "x");
			}
			function fillLenses()
			{
				$('#whatlens')
			.empty();

			var myModel = $("#modelnumber").val();
			var res = myModel.replace("in","IN");;

			var res2 = res.replace("A","a");
			var res3 = res2.replace("L","l");
			$("#modelnumber").val(res3);
		if ($("#modelnumber").val() == "IN5144a")
		{
	var x = document.getElementById("whatlens");

    var option1 = document.createElement("option");
	var option2 = document.createElement("option");
	var option3 = document.createElement("option");
	var option4 = document.createElement("option");

    option1.text = "Lens-069" ;
	option2.text = "Lens-070";
	option3.text = "Lens-072";
	option4.text = "Lens-073";
    x.add(option1,x[0]);
	x.add(option2,x[1]);
	x.add(option3,x[2]);
	x.add(option4,x[3]);
	Lens_Selected();
		}
		else if ($("#modelnumber").val() == "IN5102")
		{
	var x = document.getElementById("whatlens");

    var option1 = document.createElement("option");
	var option2 = document.createElement("option");
	var option3 = document.createElement("option");
	var option4 = document.createElement("option");

    option1.text = "Lens-037" ;
	option2.text = "Lens-038";
	option3.text = "Lens-039";
	option4.text = "Lens-040";
    x.add(option1,x[0]);
	x.add(option2,x[1]);
	x.add(option3,x[2]);
	x.add(option4,x[3]);
	Lens_Selected();
	
		}
		else if ($("#modelnumber").val() == "IN5108")
		{
	var x = document.getElementById("whatlens");

    var option1 = document.createElement("option");
	var option2 = document.createElement("option");
	var option3 = document.createElement("option");
	var option4 = document.createElement("option");

    option1.text = "Lens-037" ;
	option2.text = "Lens-038";
	option3.text = "Lens-039";
	option4.text = "Lens-040";
    x.add(option1,x[0]);
	x.add(option2,x[1]);
	x.add(option3,x[2]);
	x.add(option4,x[3]);
	Lens_Selected();
		}
		else if ($("#modelnumber").val() == "IN5132")
		{
	var x = document.getElementById("whatlens");

    var option1 = document.createElement("option");
	var option2 = document.createElement("option");
	var option3 = document.createElement("option");
	var option4 = document.createElement("option");

    option1.text = "Lens-069" ;
	option2.text = "Lens-070";
	option3.text = "Lens-071";
	option4.text = "Lens-073";
    x.add(option1,x[0]);
	x.add(option2,x[1]);
	x.add(option3,x[2]);
	x.add(option4,x[3]);
	Lens_Selected();
		}
		else if ($("#modelnumber").val() == "IN5134")
		{
	var x = document.getElementById("whatlens");

    var option1 = document.createElement("option");
	var option2 = document.createElement("option");
	var option3 = document.createElement("option");
	var option4 = document.createElement("option");

    option1.text = "Lens-069" ;
	option2.text = "Lens-070";
	option3.text = "Lens-071";
	option4.text = "Lens-073";
    x.add(option1,x[0]);
	x.add(option2,x[1]);
	x.add(option3,x[2]);
	x.add(option4,x[3]);
	Lens_Selected();
		}
		else if ($("#modelnumber").val() == "IN5135")
		{
	var x = document.getElementById("whatlens");

    var option1 = document.createElement("option");
	var option2 = document.createElement("option");
	var option3 = document.createElement("option");
	var option4 = document.createElement("option");

    option1.text = "Lens-069" ;
	option2.text = "Lens-070";
	option3.text = "Lens-072";
	option4.text = "Lens-073";
    x.add(option1,x[0]);
	x.add(option2,x[1]);
	x.add(option3,x[2]);
	x.add(option4,x[3]);
	Lens_Selected();
		}
		else if ($("#modelnumber").val() == "IN5142")
		{
	var x = document.getElementById("whatlens");

    var option1 = document.createElement("option");
	var option2 = document.createElement("option");
	var option3 = document.createElement("option");
	var option4 = document.createElement("option");

    option1.text = "Lens-069" ;
	option2.text = "Lens-070";
	option3.text = "Lens-072";
	option4.text = "Lens-073";
    x.add(option1,x[0]);
	x.add(option2,x[1]);
	x.add(option3,x[2]);
	x.add(option4,x[3]);
	Lens_Selected();
		}
		else if ($("#modelnumber").val() == "IN5144")
		{
	var x = document.getElementById("whatlens");

    var option1 = document.createElement("option");
	var option2 = document.createElement("option");
	var option3 = document.createElement("option");
	var option4 = document.createElement("option");

    option1.text = "Lens-069" ;
	option2.text = "Lens-070";
	option3.text = "Lens-072";
	option4.text = "Lens-073";
    x.add(option1,x[0]);
	x.add(option2,x[1]);
	x.add(option3,x[2]);
	x.add(option4,x[3]);
	Lens_Selected();
		}
		else if ($("#modelnumber").val() == "IN5145")
		{
	var x = document.getElementById("whatlens");

    var option1 = document.createElement("option");
	var option2 = document.createElement("option");
	var option3 = document.createElement("option");
	var option4 = document.createElement("option");

    option1.text = "Lens-069" ;
	option2.text = "Lens-070";
	option3.text = "Lens-072";
	option4.text = "Lens-073";
    x.add(option1,x[0]);
	x.add(option2,x[1]);
	x.add(option3,x[2]);
	x.add(option4,x[3]);
	Lens_Selected();
		}
		else if ($("#modelnumber").val() == "IN5312")
		{
	var x = document.getElementById("whatlens");

    var option1 = document.createElement("option");
	var option2 = document.createElement("option");


    option1.text = "Lens-060" ;
	option2.text = "Lens-061";

    x.add(option1,x[0]);
	x.add(option2,x[1]);
	Lens_Selected();

		}
		else if ($("#modelnumber").val() == "IN5312a")
		{
	var x = document.getElementById("whatlens");

    var option1 = document.createElement("option");
	var option2 = document.createElement("option");


    option1.text = "Lens-060" ;
	option2.text = "Lens-061";

    x.add(option1,x[0]);
	x.add(option2,x[1]);
	Lens_Selected();

		}
		else if ($("#modelnumber").val() == "IN5314")
		{
	var x = document.getElementById("whatlens");

    var option1 = document.createElement("option");
	var option2 = document.createElement("option");


    option1.text = "Lens-060" ;
	option2.text = "Lens-061";

    x.add(option1,x[0]);
	x.add(option2,x[1]);
	Lens_Selected();

		}
		else if ($("#modelnumber").val() == "IN5316HD")
		{
	var x = document.getElementById("whatlens");

    var option1 = document.createElement("option");
	var option2 = document.createElement("option");


    option1.text = "Lens-060" ;
	option2.text = "Lens-061";

    x.add(option1,x[0]);
	x.add(option2,x[1]);
	Lens_Selected();

		}
		else if ($("#modelnumber").val() == "IN5316HDa")
		{
	var x = document.getElementById("whatlens");

    var option1 = document.createElement("option");
	var option2 = document.createElement("option");


    option1.text = "Lens-060" ;
	option2.text = "Lens-061";

    x.add(option1,x[0]);
	x.add(option2,x[1]);
	Lens_Selected();

		}
		else if ($("#modelnumber").val() == "IN5318")
		{
	var x = document.getElementById("whatlens");

    var option1 = document.createElement("option");
	var option2 = document.createElement("option");


    option1.text = "Lens-060" ;
	option2.text = "Lens-061";

    x.add(option1,x[0]);
	x.add(option2,x[1]);
	Lens_Selected();

		}
		else if ($("#modelnumber").val() == "IN5502")
		{
	var x = document.getElementById("whatlens");

    var option1 = document.createElement("option");
	var option2 = document.createElement("option");
	var option3 = document.createElement("option");
	var option4 = document.createElement("option");

    option1.text = "Lens-050" ;
	option2.text = "Lens-051";
	option3.text = "Lens-052";
	option4.text = "Lens-053";
    x.add(option1,x[0]);
	x.add(option2,x[1]);
	x.add(option3,x[2]);
	x.add(option4,x[3]);
	Lens_Selected();
		}
		else if ($("#modelnumber").val() == "IN5532")
		{
	var x = document.getElementById("whatlens");

    var option1 = document.createElement("option");
	var option2 = document.createElement("option");
	var option3 = document.createElement("option");
	var option4 = document.createElement("option");

    option1.text = "Lens-050" ;
	option2.text = "Lens-051";
	option3.text = "Lens-052";
	option4.text = "Lens-053";
    x.add(option1,x[0]);
	x.add(option2,x[1]);
	x.add(option3,x[2]);
	x.add(option4,x[3]);
	Lens_Selected();
		}
		else if ($("#modelnumber").val() == "IN5533")
		{
	var x = document.getElementById("whatlens");

    var option1 = document.createElement("option");
	var option2 = document.createElement("option");
	var option3 = document.createElement("option");
	var option4 = document.createElement("option");

    option1.text = "Lens-050" ;
	option2.text = "Lens-051";
	option3.text = "Lens-052";
	option4.text = "Lens-053";
    x.add(option1,x[0]);
	x.add(option2,x[1]);
	x.add(option3,x[2]);
	x.add(option4,x[3]);
	Lens_Selected();
		}
		else if ($("#modelnumber").val() == "IN5535")
		{
	var x = document.getElementById("whatlens");

    var option1 = document.createElement("option");
	var option2 = document.createElement("option");
	var option3 = document.createElement("option");
	var option4 = document.createElement("option");

    option1.text = "Lens-050" ;
	option2.text = "Lens-051";
	option3.text = "Lens-052";
	option4.text = "Lens-053";
    x.add(option1,x[0]);
	x.add(option2,x[1]);
	x.add(option3,x[2]);
	x.add(option4,x[3]);
	Lens_Selected();
		}
		else if ($("#modelnumber").val() == "IN5535l")
		{
	var x = document.getElementById("whatlens");

    var option1 = document.createElement("option");
	var option2 = document.createElement("option");
	var option3 = document.createElement("option");
	var option4 = document.createElement("option");

    option1.text = "Lens-050" ;
	option2.text = "Lens-051";
	option3.text = "Lens-052";
	option4.text = "Lens-053";
    x.add(option1,x[0]);
	x.add(option2,x[1]);
	x.add(option3,x[2]);
	x.add(option4,x[3]);
	Lens_Selected();
		}
		else if ($("#modelnumber").val() == "IN5542")
		{
	var x = document.getElementById("whatlens");

    var option1 = document.createElement("option");
	var option2 = document.createElement("option");
	var option3 = document.createElement("option");
	var option4 = document.createElement("option");
	var option5 = document.createElement("option");
	var option6 = document.createElement("option");
	var option7 = document.createElement("option");

    option1.text = "Lens-062" ;
	option2.text = "Lens-063";
	option3.text = "Lens-064";
	option4.text = "Lens-065";
	option5.text = "Lens-066";
	option6.text = "Lens-067";
	option7.text = "Lens-068";
	
    x.add(option1,x[0]);
	x.add(option2,x[1]);
	x.add(option3,x[2]);
	x.add(option4,x[3]);
	x.add(option5,x[4]);
	x.add(option6,x[5]);
	x.add(option7,x[6]);
	Lens_Selected();
		}
		else if ($("#modelnumber").val() == "IN5544")
		{
	var x = document.getElementById("whatlens");

    var option1 = document.createElement("option");
	var option2 = document.createElement("option");
	var option3 = document.createElement("option");
	var option4 = document.createElement("option");
	var option5 = document.createElement("option");
	var option6 = document.createElement("option");
	var option7 = document.createElement("option");

    option1.text = "Lens-062" ;
	option2.text = "Lens-063";
	option3.text = "Lens-064";
	option4.text = "Lens-065";
	option5.text = "Lens-066";
	option6.text = "Lens-067";
	option7.text = "Lens-068";
	
    x.add(option1,x[0]);
	x.add(option2,x[1]);
	x.add(option3,x[2]);
	x.add(option4,x[3]);
	x.add(option5,x[4]);
	x.add(option6,x[5]);
	x.add(option7,x[6]);
	Lens_Selected();
		}
		else if ($("#modelnumber").val() == "IN5552l")
		{
	var x = document.getElementById("whatlens");

    var option1 = document.createElement("option");
	var option2 = document.createElement("option");
	var option3 = document.createElement("option");
	var option4 = document.createElement("option");
	var option5 = document.createElement("option");
	var option6 = document.createElement("option");

    option1.text = "Lens-074" ;
	option2.text = "Lens-075";
	option3.text = "Lens-076";
	option4.text = "Lens-077";
	option5.text = "Lens-078";
	option6.text = "Lens-079";
	
    x.add(option1,x[0]);
	x.add(option2,x[1]);
	x.add(option3,x[2]);
	x.add(option4,x[3]);
	x.add(option5,x[4]);
	x.add(option6,x[5]);
	Lens_Selected();
		}
		else if ($("#modelnumber").val() == "IN5554l")
		{
	var x = document.getElementById("whatlens");

    var option1 = document.createElement("option");
	var option2 = document.createElement("option");
	var option3 = document.createElement("option");
	var option4 = document.createElement("option");
	var option5 = document.createElement("option");
	var option6 = document.createElement("option");

    option1.text = "Lens-074" ;
	option2.text = "Lens-075";
	option3.text = "Lens-076";
	option4.text = "Lens-077";
	option5.text = "Lens-078";
	option6.text = "Lens-079";
	
    x.add(option1,x[0]);
	x.add(option2,x[1]);
	x.add(option3,x[2]);
	x.add(option4,x[3]);
	x.add(option5,x[4]);
	x.add(option6,x[5]);
	Lens_Selected();
		}
		else if ($("#modelnumber").val() == "IN5555l")
		{
	var x = document.getElementById("whatlens");

    var option1 = document.createElement("option");
	var option2 = document.createElement("option");
	var option3 = document.createElement("option");
	var option4 = document.createElement("option");
	var option5 = document.createElement("option");
	var option6 = document.createElement("option");

    option1.text = "Lens-074" ;
	option2.text = "Lens-075";
	option3.text = "Lens-076";
	option4.text = "Lens-077";
	option5.text = "Lens-078";
	option6.text = "Lens-079";
	
    x.add(option1,x[0]);
	x.add(option2,x[1]);
	x.add(option3,x[2]);
	x.add(option4,x[3]);
	x.add(option5,x[4]);
	x.add(option6,x[5]);
	Lens_Selected();
		}
		else
		{
			oldprojector = "";
		$('#whatlens')

    .empty()

    .append('<option selected="selected" value="whatever">None</option>');
		}
			}
			
			
			
			function sliders()
			{ 
				
				//var myZoom = $( "#text_zoom" ).text();
				
		  var myZoom;
		  myZoom = 1.0;
				if ($("#modelnumber").val() != "")
				{
				myZoom = parseInt($( "#text_zoom" ).val().substring(0, $( "#text_zoom" ).val().length - 1))/100;
			if (isNaN(myZoom))
			{
				myZoom = 1.0;
			}
			
				localMax = throwratio_low;
			if (isNaN(localMax))
			{
				//alert("Incompatible Throw Ratio");
				localMax = 0;
				$( "#slider-dist" ).slider( 'value',0 );
					$( "#slider-width" ).slider( 'value',0 );
					$( "#slider-height" ).slider( 'value',0 );
					$( "#slider-diag" ).slider( 'value',0 );
			}
				dist_max = Math.round(((localMax*300)*myZoom));
			if (isNaN(dist_max))
			{
				dist_max = 0;
			}
				dist_min = Math.round((localMax*30)*myZoom);
			if (isNaN(dist_min))
			{
				dist_min = 0;
			}
				width_max = Math.round(((dist_max/localMax)*myZoom));
			if (isNaN(width_max))
			{
				width_max = 0;
			}
				width_min = Math.round((30/localMax)*myZoom);
			if (isNaN(width_min))
			{
				width_min = 0;
			}	
				
				height_min = Math.round(((width_min*AspectHeight)/AspectWidth)*myZoom);
				height_max = Math.round(((width_max*AspectHeight)/AspectWidth)*myZoom);
			
				
				}
				else
				{
					myZoom = 100;
					localMax = 0;
					dist_max = 0;
					dist_min = 0;
					width_max = 0;
					width_min = 0;	
					height_min = 0;
					height_max = 0;
					
				
				}
				
if(inormm == "mm")
			{
			var lvalue_distmin = dist_min*2.54;
			var lvalue_distmax = dist_max*2.54;
				dist_max = Math.round(lvalue_distmax);
				dist_min = Math.round(lvalue_distmin);
			var lvalue_widthmin = width_min*2.54;
			var lvalue_widthmax = width_max*2.54;
				width_max = Math.round(lvalue_widthmax);
				width_min = Math.round(lvalue_widthmin);
				
			var lvalue_heightmin = height_min*2.54;
			var lvalue_heightmax = height_max*2.54;
				height_max = Math.round(lvalue_heightmax);
				height_min = Math.round(lvalue_heightmin);
				
			//var lvalue_diagmin = diag_min*2.54;
			//var lvalue_diagmax = diag_max*2.54;
				 //= lvalue_diagmax;
				//diag_min = lvalue_diagmin;
			
			//var l_slider_dist = $( "#slider-dist" ).slider( "value" );
			//var l_slider_width = $( "#slider-width" ).slider( "value" );
			//var l_slider_height = $( "#slider-height" ).slider( "value" );
			//var l_slider_diag = $( "#slider-diag" ).slider( "value" );
			$( "#slider-dist" ).slider( "value",($( "#slider-width" ).slider( "value")*throwratio_low));
			//$( "#slider-width" ).slider( "value",(origWidth*2.54));
			$("#text_dist_tot_mm").val($( "#slider-dist" ).slider( "value"));
			//$( "#slider-height" ).slider( "value",(l_slider_height*2.54));
			//$( "#slider-diag" ).slider( "value",(l_slider_diag*2.54));
			}	
		


				   $(function() {
    $( "#slider-dist" )
	.slider({
      range: "max",
      min: dist_min,
      max: dist_max,
	  
      slide: function( event, ui ) {
$( "#slider-zoom" ).slider( "value",(100));
		  $( "#text_zoom" ).val($( "#slider-zoom" ).slider( "value" ));
		FromDistSlider();
		$("#distViz").text(Math.round($( "#slider-dist" ).slider( "value" )));
		var Movement = (Math.round($( "#slider-dist" ).slider( "value" ))*300)/dist_max;
		$("#projimage").css("right",Movement + "px");
		ColorSliders();
		origWidth = $( "#slider-width" ).slider( "value" );

      }



    })

	.slider("pips", {
     rest: "label",
	 step: (dist_max-dist_min)/5,
	 first: "pip",
	 last: "pip"
	})
;
	

	//$( "#text_dist_in" ).val( Math.round($( "#slider-dist" ).slider( "value" )));

	

  });
  
   $(function() {

	throwratio = 2;
	var zoom_max = (throwratio_high/throwratio_low)*100;

    $( "#slider-zoom" ).slider({

      range: "max",

      min: 100,

      max: zoom_max,


      slide: function( event, ui ) {
		  $( "#text_height_in" ).val($( "#slider-zoom" ).slider( "value" ));
		  $( "#text_zoom" ).val( $( "#slider-zoom" ).slider( "value" ) + "%");

				$( "#slider-width" ).slider( "value",($( "#slider-zoom" ).slider( "value" )/100)*origWidth);
				$( "#text_width_tot_in" ).val($( "#slider-width" ).slider( "value" ));
				FromZoomSlider();

		  //sliders();
		  //getMinMaxDist();
		  


      }


	  
	  
    })

	;
	$( "#text_zoom" ).val( $( "#slider-zoom" ).slider( "value" ) + "%");


	

  });

        $(function() {

    $( "#slider-width" ).slider({

      range: "max",

      min: width_min,

      max: width_max,


      slide: function( event, ui ) {
		  origWidth = $( "#slider-width" ).slider( "value" );
		   
		  $( "#slider-zoom" ).slider( "value",(100));
		  $( "#text_zoom" ).val($( "#slider-zoom" ).slider( "value" ));
		FromWidthSlider();
	    }

    })
	.slider("pips", {
     rest: "label",
	 step: (width_max-width_min)/5,
	 first: "pip",
	 last: "pip"
	})
	;

  });

          $(function() {

	throwratio = 2;

    $( "#slider-height" ).slider({

      range: "max",

      min: height_min,

      max: height_max,


      slide: function( event, ui ) {
		 $( "#slider-zoom" ).slider( "value",(100));
		  $( "#text_zoom" ).val($( "#slider-zoom" ).slider( "value" ));
		 FromHeightSlider();
		 origWidth = $( "#slider-width" ).slider( "value" );
      }

    })
	.slider("pips", {
     rest: "label",
	 step: (height_max-height_min)/5,
	 first: "pip",
	 last: "pip"
	})
	;

	//$( "#text_height_in" ).val( Math.round(100*$( "#slider-height" ).slider( "value" ))/100);

	

  });

            $(function() {

	throwratio = 2;

    $( "#slider-diag" ).slider({

      range: "max",

      min: 0,

      max: Math.round(Math.sqrt((width_max*width_max)+(height_max*height_max))),


      slide: function( event, ui ) {
		  $( "#slider-zoom" ).slider( "value",(100));
		  $( "#text_zoom" ).val($( "#slider-zoom" ).slider( "value" ));
		  FromDiagSlider();
		  origWidth = $( "#slider-width" ).slider( "value" );

      }

    })
	.slider("pips", {
     rest: "label",
	 step: (Math.round(Math.sqrt((width_max*width_max)+(height_max*height_max)))-0)/5,
	 first: "pip",
	 last: "pip"
	})
	;



  });
  setFtIn();
			}
			                                                     
			function runTools()
			{


	var select = document.getElementById("whatlens");

	var length = select.options.length;

	//	$('#whatlens')

    //.empty()

//;

	 $("#spec_model").text($("#modelnumber").val());

	 		var thiss = $("#modelnumber");
			

			var value = thiss.val();

			var getcommand = "lumens";

			//get lumens

			$.get("getprojectorinfo.php",{value:value, type:getcommand},function(data)

			{

			$("#spec_lumens").text(data);

			});

			//get aspect ratio

			getcommand = "aspect ratio";

			$.get("getprojectorinfo.php",{value:value, type:getcommand},function(data)

			{
			temp_aspectratio = "";
			temp_aspectratio = data;
			$("#spec_aspectratio").text(data);
			
var res = "";

var patternx = new RegExp("x");
res = patternx.test(temp_aspectratio);
if(res == true && AspectWidth == 0)
{
AspectWidth = temp_aspectratio.substr(0,temp_aspectratio.indexOf('x'));
AspectHeight = temp_aspectratio.substr(temp_aspectratio.indexOf("x") + 1);
}
var patternX = new RegExp("X");
res = patternX.test(temp_aspectratio);
if(res == true && AspectWidth == 0)
{
AspectWidth = temp_aspectratio.substr(0,temp_aspectratio.indexOf('X'));
AspectHeight = temp_aspectratio.substr(temp_aspectratio.indexOf("X") + 1);
}
var patterncolon = new RegExp(":");
res = patterncolon.test(temp_aspectratio);
if(res == true && AspectWidth == 0)
{
AspectWidth = temp_aspectratio.substr(0,temp_aspectratio.indexOf(':'));
AspectHeight = temp_aspectratio.substr(temp_aspectratio.indexOf(":") + 1);
}
temp_aspectratio = AspectWidth + ":" + AspectHeight;
DefaultAR = temp_aspectratio;
		
setAspectRatio();
var vtype = "";
if(AspectWidth == "4" && AspectHeight == "3")
{
	vtype = "XGA";
}
if(AspectWidth == "16" && AspectHeight == "9")
{
	vtype = "1080p";
}
if(AspectWidth == "16" && AspectHeight == "10")
{
	vtype = "WXGA";
}
$("#videotype").text(vtype);
			});

			//get contrast

			getcommand = "contrast";

			$.get("getprojectorinfo.php",{value:value, type:getcommand},function(data)

			{

			$("#spec_contrast").text(data + ":1");

			});

			//get lens shift

			getcommand = "lens shift";

			$.get("getprojectorinfo.php",{value:value, type:getcommand},function(data)

			{

			$("#spec_lens_shift").text(data);

			});

			//get offset

			getcommand = "offset";

			$.get("getprojectorinfo.php",{value:value, type:getcommand},function(data)

			{
			offsetvalue = data;
			$("#spec_offset").text(data + "%");

			});

			//get throw ratio

			getcommand = "throw_low";

			$.get("getprojectorinfo.php",{value:value, type:getcommand},function(data)

			{
				var x = document.getElementById("whatlens");
				if (x.length < 2)
				{
				throwratio_low = data;
				//alert("TRL:" + throwratio_low);
				}
				else
				{
					//throwratio_low = 0;
				}
				$("#spec_throw").text(throwratio_low + " - " + throwratio_high);
				sliders();
				
  

			});

			getcommand = "throw_high";

			$.get("getprojectorinfo.php",{value:value, type:getcommand},function(data)

			{
				var x = document.getElementById("whatlens");
				if (x.length < 2)
				{
				throwratio_high = data;
				//alert("TRH " + throwratio_high);
				
				}
				getMinMaxDist();
				sliders();
				$("#spec_throw").text(throwratio_low + " - " + throwratio_high);


			});

			//get remote

			getcommand = "originalremote";

			$.get("getprojectorinfo.php",{value:value, type:getcommand},function(data)

			{

			$("#spec_remote").text(data);

			});

			getcommand = "currentremote";

			$.get("getprojectorinfo.php",{value:value, type:getcommand},function(data)

			{

			$("#spec_newremote").text(data);

			});

			//get lamp

			getcommand = "lamp";

			$.get("getprojectorinfo.php",{value:value, type:getcommand},function(data)

			{

			$("#spec_lamp").text(data);

			});

			//get lamp

			getcommand = "snprefix";

			$.get("getprojectorinfo.php",{value:value, type:getcommand},function(data)

			{

			$("#spec_snprefix").text(data);

			});
			
//sliders();
//getMinMaxDist();
			}//END RUN TOOLS
			

	$(document).ready(function()

	{

		ColorSliders();
		sliders();
		ColorSliders();
		inches = 0;
		feet = 0;
		$( "#text_dist_ft" ).val(feet);
		$( "#text_dist_in" ).val(inches);
		$( "#text_width_ft" ).val(feet);
		$( "#text_width_in" ).val(inches);
		$( "#text_height_ft" ).val(feet);
		$( "#text_height_in" ).val(inches);
		$( "#text_diag_ft" ).val(feet);
		$( "#text_diag_in" ).val(inches);
		
		
	$("#text_dist_in").change(function()
	{			
		var inches = parseInt($("#text_dist_in").val());
		var feet = parseInt($("#text_dist_ft").val());
		if(inches > 11)
		{
			feet = 0;
		}
		var newtotalinches = (inches + (feet*12));	
		feet = 0;
		while(newtotalinches > 11)
		{
			newtotalinches  = newtotalinches - 12;
			feet = feet + 1;
		}
		inches = newtotalinches;
		
		$( "#text_dist_ft" ).val(feet);
		$( "#text_dist_in" ).val(inches);
		newtotalinches = inches + (feet*12);
		//$( "#slider-width" ).slider( 'value', newtotalinches);
		FromDistText();
		
	})	
	$("#text_dist_ft").change(function()
	{			
		var inches = parseInt($("#text_dist_in").val());
		var feet = parseInt($("#text_dist_ft").val());
		if(inches > 11)
		{
			feet = 0;
		}
		var newtotalinches = (inches + (feet*12));	
		feet = 0;
		while(newtotalinches > 11)
		{
			newtotalinches  = newtotalinches - 12;
			feet = feet + 1;
		}
		inches = newtotalinches;
		
		$( "#text_dist_ft" ).val(feet);
		$( "#text_dist_in" ).val(inches);
		newtotalinches = inches + (feet*12);
		//$( "#slider-width" ).slider( 'value', newtotalinches);
		FromDistText();
		
		
	})	
		$("#text_dist_tot_in").change(function()
	{			
		//var inches = parseInt($("#text_dist_tot_in").val());

		FromDistText_In();
		
	})	
	$("#text_width_tot_in").change(function()
	{			
		//var inches = parseInt($("#text_dist_tot_in").val());

		FromWidthText_In();
		
	})	
		$("#text_height_tot_in").change(function()
	{			
		//var inches = parseInt($("#text_dist_tot_in").val());

		FromHeightText_In();
		
	})
		$("#text_diag_tot_in").change(function()
	{			
		//var inches = parseInt($("#text_dist_tot_in").val());

		FromDiagText_In();
		
	})
		$("#text_dist_tot_mm").change(function()
	{			
		//var inches = parseInt($("#text_dist_tot_in").val());

		FromDistText_mm();
		
	})
		$("#text_width_tot_mm").change(function()
	{			
		//var inches = parseInt($("#text_dist_tot_in").val());

		FromWidthText_mm();
		
	})
		$("#text_height_tot_mm").change(function()
	{			
		//var inches = parseInt($("#text_dist_tot_in").val());

		FromHeightText_mm();
		
	})
		$("#text_diag_tot_mm").change(function()
	{			
		//var inches = parseInt($("#text_dist_tot_in").val());

		FromDiagText_mm();
		
	})

	$("#text_width_in").change(function()
	{			
		var inches = parseInt($("#text_width_in").val());
		var feet = parseInt($("#text_width_ft").val());
		if(inches > 11)
		{
			feet = 0;
		}
		var newtotalinches = (inches + (feet*12));	
		feet = 0;
		while(newtotalinches > 11)
		{
			newtotalinches  = newtotalinches - 12;
			feet = feet + 1;
		}
		inches = newtotalinches;
		
		$( "#text_width_ft" ).val(feet);
		$( "#text_width_in" ).val(inches);
		newtotalinches = inches + (feet*12);
		//$( "#slider-width" ).slider( 'value', newtotalinches);
		FromWidthText();
		
	})	
	$("#text_width_ft").change(function()
	{			
		var inches = parseInt($("#text_width_in").val());
		var feet = parseInt($("#text_width_ft").val());
		if(inches > 11)
		{
			feet = 0;
		}
		var newtotalinches = (inches + (feet*12));	
		feet = 0;
		while(newtotalinches > 11)
		{
			newtotalinches  = newtotalinches - 12;
			feet = feet + 1;
		}
		inches = newtotalinches;
		
		$( "#text_width_ft" ).val(feet);
		$( "#text_width_in" ).val(inches);
		newtotalinches = inches + (feet*12);
		//$( "#slider-width" ).slider( 'value', newtotalinches);
		FromWidthText();
		
	})
	$("#text_height_in").change(function()
	{			
		var inches = parseInt($("#text_height_in").val());
		var feet = parseInt($("#text_height_ft").val());
		if(inches > 11)
		{
			feet = 0;
		}
		var newtotalinches = (inches + (feet*12));	
		feet = 0;
		while(newtotalinches > 11)
		{
			newtotalinches  = newtotalinches - 12;
			feet = feet + 1;
		}
		inches = newtotalinches;
		
		$( "#text_height_ft" ).val(feet);
		$( "#text_height_in" ).val(inches);
		newtotalinches = inches + (feet*12);
		//$( "#slider-height" ).slider( 'value', newtotalinches);
		FromHeightText();
		
	})	
	$("#text_height_ft").change(function()
	{			
		var inches = parseInt($("#text_height_in").val());
		var feet = parseInt($("#text_height_ft").val());
		if(inches > 11)
		{
			feet = 0;
		}
		var newtotalinches = (inches + (feet*12));	
		feet = 0;
		while(newtotalinches > 11)
		{
			newtotalinches  = newtotalinches - 12;
			feet = feet + 1;
		}
		inches = newtotalinches;
		
		$( "#text_height_ft" ).val(feet);
		$( "#text_height_in" ).val(inches);
		newtotalinches = inches + (feet*12);
		//$( "#slider-height" ).slider( 'value', newtotalinches);
		FromHeightText();
		
	})	
	$("#text_diag_in").change(function()
	{			
		var inches = parseInt($("#text_diag_in").val());
		var feet = parseInt($("#text_diag_ft").val());
		if(inches > 11)
		{
			feet = 0;
		}
		var newtotalinches = (inches + (feet*12));	
		feet = 0;
		while(newtotalinches > 11)
		{
			newtotalinches  = newtotalinches - 12;
			feet = feet + 1;
		}
		inches = newtotalinches;
		
		$( "#text_diag_ft" ).val(feet);
		$( "#text_diag_in" ).val(inches);
		newtotalinches = inches + (feet*12);
		$("#diag_totinches").text(newtotalinches);
		//$( "#slider-diag" ).slider( 'value', newtotalinches);
		FromDiagText();
		
	})	
	$("#text_diag_ft").change(function()
	{			
		var inches = parseInt($("#text_diag_in").val());
		var feet = parseInt($("#text_diag_ft").val());
		if(inches > 11)
		{
			feet = 0;
		}
		var newtotalinches = (inches + (feet*12));	
		feet = 0;
		while(newtotalinches > 11)
		{
			newtotalinches  = newtotalinches - 12;
			feet = feet + 1;
		}
		inches = newtotalinches;
		
		$( "#text_diag_ft" ).val(feet);
		$( "#text_diag_in" ).val(inches);
		newtotalinches = inches + (feet*12);
		$("#diag_totinches").text(newtotalinches);
		//$( "#slider-diag" ).slider( 'value', newtotalinches);
		FromDiagText();
		
	})		
	
	$("#whatlens").change(function()
	{

$("#spec_throw").text(throwratio_low + " - " + throwratio_high);
runTools();
var x = document.getElementById("whatlens");
switch(x.options[x.selectedIndex].text)
{
	case "Lens-050":
		throwratio_low = 0.8;
		throwratio_high = 0.8;
	break;
	case "Lens-051":
		throwratio_low = 1.25;
		throwratio_high = 1.5;
	break;
	case "Lens-052":
		throwratio_low = 2.0;
		throwratio_high = 3.8;
	break;
	case "Lens-053":
		throwratio_low = 3.8;
		throwratio_high = 7.22;
	break;
		case "Lens-060":
		throwratio_low = 0.8;
		throwratio_high = 0.8;
	break;
		case "Lens-061":
		throwratio_low = 2.0;
		throwratio_high = 3.0;
	break;
		case "Lens-062":
		throwratio_low = 1.8;
		throwratio_high = 2.3;
	break;
		case "Lens-063":
		throwratio_low = 5.0;
		throwratio_high = 9.2;
	break;
		case "Lens-064":
		throwratio_low = 2.8;
		throwratio_high = 5.2;
	break;
		case "Lens-065":
		throwratio_low = 1.5;
		throwratio_high = 2.2;
	break;
		case "Lens-066":
		throwratio_low = 1.2;
		throwratio_high = 1.5;
	break;
		case "Lens-067":
		throwratio_low = 0.5;
		throwratio_high = 0.6;
	break;
		case "Lens-068":
		throwratio_low = 2.2;
		throwratio_high = 2.9;
	break;
		case "Lens-069":
		throwratio_low = 0.78;
		throwratio_high = 0.78;
	break;
			case "Lens-070":
		throwratio_low = 1.15;
		throwratio_high = 1.75;
	break;
			case "Lens-071":
		throwratio_low = 1.47;
		throwratio_high = 3.0;
	break;
			case "Lens-072":
		throwratio_low = 2.8;
		throwratio_high = 4.75;
	break;
			case "Lens-073":
		throwratio_low = 4.5;
		throwratio_high = 8.0;
	break;
			case "Lens-074":
		throwratio_low = 1.8;
		throwratio_high = 2.4;
	break;
			case "Lens-075":
		throwratio_low = 0.78;
		throwratio_high = 0.78;
	break;
			case "Lens-076":
		throwratio_low = 1.3;
		throwratio_high = 1.8
	break;
			case "Lens-077":
		throwratio_low = 3.6;
		throwratio_high = 5.6
	break;
			case "Lens-078":
		throwratio_low = 5.5;
		throwratio_high = 8.5;
	break;
			case "Lens-079":
		throwratio_low = 2.3;
		throwratio_high = 3.8;
	break;
}

var lengthtype = "";
if(throwratio_low < 0.5)
{
	lengthtype = "Ultra-Short Throw";
}
else if(throwratio_low <= 1.0 && throwratio_low >= 0.5)
{
	lengthtype = "Short Throw";
}
else if(throwratio_low <= 2.0 && throwratio_low >= 1.1)
{
	lengthtype = "Standard";
}
else if(throwratio_low >= 2.1)
{
	lengthtype = "Long Throw";
}
$("#lname").text(x.options[x.selectedIndex].text);
$("#llength").text(lengthtype);
$("#spec_throw").text(throwratio_low + " - " + throwratio_high);
$( "#zoomvalue" ).text(Math.round(100*(throwratio_high/throwratio_low)/100) + "x");

getMinMaxDist();
	});

	$("#modelnumber_tab").bind("change", function() {
		AspectWidth = 0;
		$("#modelnumber").val($("#modelnumber_tab").val());
		runTools();					
					fillLenses();					
					whatlens();					
					sliders();
					getMinMaxDist();
					
		});
	$("#modelnumber").bind("change", function() {
		AspectWidth = 0;
		$("#modelnumber_tab").val($("#modelnumber").val());
		runTools();					
					fillLenses();					
					whatlens();					
					sliders();
					getMinMaxDist();
					
		});
		$("#btn_measure").click(function()
		{
			if($("#btn_measure").text() == "Cm/M")
			{
			$("#btn_measure").text("In/Ft");
			}
			else
			{
				$("#btn_measure").text("Cm/M");
			}
			
		})

	$('ul li ul li').click(function(e) 

    { 

    });

	});

  var throwratio = 1.0;

    var myMin = 0;

	var myMax = 100;

  $(function FeetToInches(feet) 

	{

		var answer = feet*12;

		return answer;

	}

  );

		

  $(function() {

    $( "#menu" ).menu();

	

	    var menu = $('#menu');

	//Perform this code every frame

    $(document).ready(function()

	{

	$("#aspectratio_select").change(function() {
		var DefAspWidth;
		var DefAspHeight;
				SelectedAR = xAR.options[xAR.selectedIndex].value;
				AspectWidth = SelectedAR.substr(0,SelectedAR.indexOf(':'));
				AspectHeight = SelectedAR.substr(SelectedAR.indexOf(":") + 1);
				SelectedAR = AspectWidth + ":" + AspectHeight;
				ActiveAR = SelectedAR;
				DefAspWidth = DefaultAR.substr(0,DefaultAR.indexOf(':'));
				DefAspHeight = DefaultAR.substr(DefaultAR.indexOf(":") + 1);
				
				
					runTools();							
					fillLenses();					
					whatlens();					
					sliders();
					getMinMaxDist();
					
					//$("#slider-dist").slider("option","value",$("#text_dist_in").val());
					if (ActiveAR == DefaultAR)
				{
					$("#screenimage").html("<img src = 'img/screen.png' style = 'float:right'/>");
				}
				else
				{
					

					if (parseInt(AspectWidth) < parseInt(DefAspWidth))
					{
						$("#screenimage").html("<img src = 'img/screen1.png' style = 'float:right'/>");
					}
					else if (parseInt(AspectHeight) < parseInt(DefAspHeight))
					{
						$("#screenimage").html("<img src = 'img/screen2.png' style = 'float:right'/>");
					}
					else
					{
						$("#screenimage").html("<img src = 'img/screen.png' style = 'float:right'/>");
					}
					if(DefaultAR == "4:3")
					{
						if(ActiveAR != "4:3")
						{
							$("#screenimage").html("<img src = 'img/screen2.png' style = 'float:right'/>");
						}
					}
				}
	});
	//When the distance text box changes

		$("#text_dist_in").keyup(function()

		{

			$("#slider-dist").slider("option","value",$("#text_dist_in").val());

		});

	//Menu Setup

		//menu.menu(

		//{
			$("li a").click(function(){
				if ($(this).text().substring(0, 2) == "IN")
				{
					$("#modelnumber").val($(this).text());
					$("#modelnumber_tab").val($(this).text());
					AspectWidth = 0;
					runTools();							
					fillLenses();					
					whatlens();					
					sliders();
					getMinMaxDist();
				}
			});
			$("#inchpaneselection").click(function(){
				$('#widthtabs li a').eq(0).tab('show'); 
				$('#disttabs li a').eq(0).tab('show'); 
				$('#heighttabs li a').eq(0).tab('show'); 
				$('#diagtabs li a').eq(0).tab('show'); 
				OnToggleIn();
			});
			$("#inchpaneselection_width").click(function(){
				$('#widthtabs li a').eq(0).tab('show'); 
				$('#disttabs li a').eq(0).tab('show'); 
				$('#heighttabs li a').eq(0).tab('show'); 
				$('#diagtabs li a').eq(0).tab('show'); 
				OnToggleIn();
			});
			$("#inchpaneselection_height").click(function(){
				$('#widthtabs li a').eq(0).tab('show'); 
				$('#disttabs li a').eq(0).tab('show'); 
				$('#heighttabs li a').eq(0).tab('show'); 
				$('#diagtabs li a').eq(0).tab('show'); 
				OnToggleIn();
			});
			$("#inchpaneselection_diag").click(function(){
				$('#widthtabs li a').eq(0).tab('show'); 
				$('#disttabs li a').eq(0).tab('show'); 
				$('#heighttabs li a').eq(0).tab('show'); 
				$('#diagtabs li a').eq(0).tab('show'); 
				OnToggleIn();
			});
			$("#mmpaneselection").click(function(){
				$('#widthtabs li a').eq(1).tab('show'); 
				$('#disttabs li a').eq(1).tab('show'); 
				$('#heighttabs li a').eq(1).tab('show'); 
				$('#diagtabs li a').eq(1).tab('show'); 
				OnToggleCm();
			});
			$("#mmpaneselection_width").click(function(){
				$('#widthtabs li a').eq(1).tab('show'); 
				$('#disttabs li a').eq(1).tab('show'); 
				$('#heighttabs li a').eq(1).tab('show'); 
				$('#diagtabs li a').eq(1).tab('show'); 
				OnToggleCm();
			});
			$("#mmpaneselection_height").click(function(){
				$('#widthtabs li a').eq(1).tab('show'); 
				$('#disttabs li a').eq(1).tab('show'); 
				$('#heighttabs li a').eq(1).tab('show'); 
				$('#diagtabs li a').eq(1).tab('show'); 
				OnToggleCm();
			});
			$("#mmpaneselection_diag").click(function(){
				$('#widthtabs li a').eq(1).tab('show'); 
				$('#disttabs li a').eq(1).tab('show'); 
				$('#heighttabs li a').eq(1).tab('show'); 
				$('#diagtabs li a').eq(1).tab('show'); 
				OnToggleCm();
			});
            /*select: function(event, ui) 

			{
				alert(ui.item.text());
			

				//if (ui.item.text().substring(0, 2) == "IN")

				//{
						$("#modelnumber").val((ui.item.text()));
					AspectWidth = 0;
					runTools();							
					fillLenses();					
					whatlens();					
					sliders();
					getMinMaxDist();
					//sliders();
	

				//}
			
            }

        //});
		*/

    });

  });

 

  $("text_dist_in").attr("maxlength", 4)

  $("text_width_in").attr("maxlength", 4)

    $("text_height_in").attr("maxlength", 4)


  </script>

  </head>   

  <body>

<div class="navbar navbar-default navbar-fixed-top" role="navigation"> 
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><img src="img/logo.png" width="114px" height="23px" alt="InFocus logo" /></a>
        </div>
        <div class="collapse navbar-collapse" id="projNavResp">
            <ul class="nav navbar-nav"> 
                
                <li class="projDrop">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Projectors <b class="caret"></b></a>
                    <ul class="dropdown-menu multi-level" id = "menu">
                        <li class="divider"></li>
                        <li class="dropdown-submenu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Ultra Portable</a>
                            <ul class="dropdown-menu">
                              <li><a tabindex="-1" href="#">IN1110a</a></li>
                              <li><a href="#">IN1112a</a></li>
                              <li><a href="#">IN1142</a></li>
                              <li><a href="#">IN1146</a></li>   
                            </ul>
                        </li>
                        <li class="divider"></li>                        
                        <li class="dropdown-submenu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Short Throw</a>
                            <ul class="dropdown-menu">
                              <li><a tabindex="-1" href="#">IN118HDSTa</a></li>
                              <li><a href="#">IN124STa</a></li>
                              <li><a href="#">IN126STa</a></li>
                              <li><a href="#">IN3924</a></li>  
                              <li><a href="#">IN3926</a></li>                                      
                            </ul>
                        </li>   
                        <li class="divider"></li>                        
                        <li class="dropdown-submenu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Office/Classroom</a>
                            <ul class="dropdown-menu">
                              <li><a tabindex="-1" href="#">IN112a</a></li>
                              <li><a href="#">IN114a</a></li>
                              <li><a href="#">IN116a</a></li>
                              <li><a href="#">IN118HDa</a></li>                       
                              <li><a href="#">IN118HDSTa</a></li>
                              <li><a href="#">IN122a</a></li>
                              <li><a href="#">IN124a</a></li>                        
                              <li><a href="#">IN126a</a></li>
                              <li><a href="#">IN214</a></li>
                              <li><a href="#">IN216</a></li>     
                              <li><a href="#">IN2124a</a></li>
                              <li><a href="#">IN2126a</a></li>
                              <li><a href="#">IN2128HDa</a></li>                        
                              <li><a href="#">IN220</a></li>
                              <li><a href="#">IN222</a></li>
                              <li><a href="#">IN224</a></li>    
                              <li><a href="#">IN226</a></li>                        
                              <li><a href="#">IN226ST</a></li>
                              <li><a href="#">IN3124</a></li>
                              <li><a href="#">IN3126</a></li>    
                              <li><a href="#">IN3128HD</a></li>                        
                              <li><a href="#">IN3128HDa</a></li>
                              <li><a href="#">IN3134a</a></li>
                              <li><a href="#">IN3136a</a></li>                        
                              <li><a href="#">IN3138HD</a></li>                                  
                            </ul>
                        </li>    
                        <li class="divider"></li>                        
                        <li class="dropdown-submenu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Large Venue</a>
                            <ul class="dropdown-menu">
                              <li><a tabindex="-1" href="#">IN5135</a></li>
                              <li><a href="#">IN5142</a></li>
                              <li><a href="#">IN5144a</a></li>
                              <li><a href="#">IN5145</a></li>                       
                              <li><a href="#">IN5312a</a></li>
                              <li><a href="#">IN5316HDa</a></li>
                              <li><a href="#">IN5544</a></li>                        
                              <li><a href="#">IN5552L</a></li>   
                              <li><a href="#">IN5554L</a></li>                        
                              <li><a href="#">IN5555L</a></li>                                 
                            </ul>
                        </li>  
                        <li class="divider"></li>                        
                        <li class="dropdown-submenu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Home Theater</a>
                            <ul class="dropdown-menu">
                              <li><a tabindex="-1" href="#">IN8606HD</a></li>                               
                            </ul>
                        </li>   
                        <li class="divider"></li>                        
                        <li class="dropdown-submenu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Interactive</a>
                            <ul class="dropdown-menu">
                              <li><a tabindex="-1" href="#">IN124STa</a></li>
                              <li><a href="#">IN126STa</a></li>
                              <li><a href="#">IN2124a</a></li>
                              <li><a href="#">IN2126a</a></li>                       
                              <li><a href="#">IN2128HDa</a></li>
                              <li><a href="#">IN3924</a></li>  
                              <li><a href="#">IN3926</a></li>                                
                            </ul>
                        </li>    
                        <li class="divider"></li>                        
                        <li class="dropdown-submenu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Legacy Projectors</a>
                            <ul class="dropdown-menu">
                              <li><a tabindex="-1" href="#">Coming Soon</a></li>                               
                            </ul>
                        </li>                            
                    </ul>
                </li>
                
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</div>
      
      




    <!-- Begin page content -->
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                
                <ul class="projDropList">
                    <li>
                
                <div class="dropWrap projNavDrop">                                        
                    <div class="dropdown">
                        <a id="dLabel" role="button" data-toggle="dropdown" class="btn btn-primary" data-target="#" href="/page.html">
                            Projectors <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
                          <li class="dropdown-submenu">
                            <a tabindex="-1" href="#">Ultra Portable</a>
                            <ul class="dropdown-menu">
                              <li><a tabindex="-1" href="#">IN1110a</a></li>
                              <li><a href="#">IN1112a</a></li>
                              <li><a href="#">IN1142</a></li>
                              <li><a href="#">IN1146</a></li>                    
                            </ul>
                          </li>
                          <li class="dropdown-submenu">
                            <a tabindex="-1" href="#">Short Throw</a>
                            <ul class="dropdown-menu">
                              <li><a tabindex="-1" href="#">IN118HDSTa</a></li>
                              <li><a href="#">IN124STa</a></li>
                              <li><a href="#">IN126STa</a></li>
                              <li><a href="#">IN3924</a></li>  
                              <li><a href="#">IN3926</a></li>                      
                            </ul>                              
                          </li>  
                          <li class="dropdown-submenu">
                            <a tabindex="-1" href="#">Office/Classroom</a>
                            <ul class="dropdown-menu">
                              <li><a tabindex="-1" href="#">IN112a</a></li>
                              <li><a href="#">IN114a</a></li>
                              <li><a href="#">IN116a</a></li>                     
                              <li><a href="#">IN118HDSTa</a></li>
							  <li><a href="#">IN112x</a></li>
							  <li><a href="#">IN114x</a></li>
							  <li><a href="#">IN116x</a></li>
							  <li><a href="#">IN118HDxc</a></li>
							  <li><a href="#">IN119HDx</a></li>
                              <li><a href="#">IN122a</a></li>
                              <li><a href="#">IN124a</a></li>                        
                              <li><a href="#">IN126a</a></li>
                              <li><a href="#">IN214</a></li>
                              <li><a href="#">IN216</a></li>     
                              <li><a href="#">IN2124a</a></li>
                              <li><a href="#">IN2126a</a></li>
                              <li><a href="#">IN2128HDa</a></li>                        
                              <li><a href="#">IN220</a></li>
                              <li><a href="#">IN222</a></li>
                              <li><a href="#">IN224</a></li>    
                              <li><a href="#">IN226</a></li>                        
                              <li><a href="#">IN226ST</a></li>
                              <li><a href="#">IN3126</a></li>    
                              <li><a href="#">IN3128HD</a></li>                        
                              <li><a href="#">IN3134a</a></li>
                              <li><a href="#">IN3136a</a></li>                        
                              <li><a href="#">IN3138HDa</a></li>                      
                            </ul>
                          </li>  
                          <li class="dropdown-submenu">
                            <a tabindex="-1" href="#">Large Venue</a>
                            <ul class="dropdown-menu">
                              <li><a tabindex="-1" href="#">IN5135</a></li>
                              <li><a href="#">IN5142</a></li>
                              <li><a href="#">IN5144a</a></li>
                              <li><a href="#">IN5145</a></li>                       
                              <li><a href="#">IN5312a</a></li>
                              <li><a href="#">IN5316HDa</a></li>
                              <li><a href="#">IN5544</a></li>                        
                              <li><a href="#">IN5552L</a></li>   
                              <li><a href="#">IN5554L</a></li>                        
                              <li><a href="#">IN5555L</a></li>                       
                            </ul>
                          </li>  
                          <li class="dropdown-submenu">
                            <a tabindex="-1" href="#">Home Theater</a>
                            <ul class="dropdown-menu">
                              <li><a tabindex="-1" href="#">IN8606HD</a></li>                   
                            </ul>
                          </li>   
                          <li class="dropdown-submenu">
                            <a tabindex="-1" href="#">Interactive</a>
                            <ul class="dropdown-menu">
                              <li><a tabindex="-1" href="#">IN124STa</a></li>
                              <li><a href="#">IN126STa</a></li>
                              <li><a href="#">IN2124a</a></li>
                              <li><a href="#">IN2126a</a></li>                       
                              <li><a href="#">IN2128HDa</a></li>
                              <li><a href="#">IN3924</a></li>  
                              <li><a href="#">IN3926</a></li>                      
                            </ul>
                          </li>                                  
                          <li class="dropdown-submenu">
                            <a tabindex="-1" href="#">Legacy Projectors</a>
                            <ul class="dropdown-menu">
                              <li><a tabindex="-1" href="#">Coming Soon</a></li>                   
                            </ul>
                          </li>  
                        </ul>
                    </div>                                                   
                </div>
                    </li>
                    
                    <li>
                <div class="projModelInput">
                    <ul>
                        <li><div class="vertDivide"></div></li>
                        <li>
                             <div class="form-group">
                                <input type="text" class="form-control" id="modelnumber" placeholder="Projector Model">      
                             </div>
                        </li>
                        <li><button type="submit" class="btn btn-info">Submit</button></li>                    
                     </ul>                     
                </div>
                
                    </li>
                </ul>
                
                
                <div class="pBlock topLeftVis">
                    <h1>Visual Scale</h1>

                        <div clas="vizWrap">
                        <div class="aRatio">
                            <ul>
                                <li class="aRatioTitle"><h3>Aspect ratio</h3></li>
                                <li>
                                    <select class="form-control" id="aspectratio_select">
                                      <option>16:10</option>
                                      <option>4:3</option>
                                      <option>16:9</option>
                                    </select>
                                </li>
                                <li class="aRatioType" id = "videotype" style = "font-size:1.2em;padding-left:15px;">1080p</li>
                            </ul>
                        </div> 
						<div id = "screenimage">						
							<img src = "img/screen.png" style = "float:right;">
						</div>
                        <div class="vizImage" id = "projimage" style = "position:relative;">
						
                        <img src = "img/projector.png" style = "margin-top:15%;margin-bottom:15%;float:right;margin-right: 10%;">
						
                        </div>
                            <div class="vizBtmWrap">
                                <div class="vizOffset">
                                    <ul>
                                        <li class="aRatioTitle"><h3>Image Offset</h3></li>
                                        <li class="vizTitle" id = "imageoffset_label_viz"><h2>11"(10%)</h2></li>
                                    </ul>
                                </div>    
                                <div class="vertDivide"></div>
                                <div class="vizOffset">
                                    <ul>
                                        <li class="distTitle"><h3>Distance Value</h3></li>
                                        <li class="vizTitle" id = "distViz"><h2>0"</h2></li>
                                    </ul>
                                </div>                                   
                            </div>                            
                        </div>
                </div>
                
                <div class="pBlock btmLeftScale">
                    
                        <ul class="distMessage">
                            <li class="distHead"><h1>Dimensions</h1></li>
<!--                            <li id="dist_desc"><img src="img/icon_alarm.png"/><p>You are too close to the screen.</p></li>                                -->
                            <li id="dist_desc"><img id = "pre_img" src="img/icon_check.png"/><p>You are at an optimal distance.</p></li>                            
<!--                            <li id="dist_desc"><img src="img/icon_warn.png"/><p>You are too far from the screen.</p></li>  -->
                               
                        </ul>                        
                    
                    
                    <div class="row">
                        <div class="col-md-12">
                        <h3>Distance From Screen</h3>                            
                        </div>
                        <div class="col-md-6">
                                <div class="dist_slider leftSlide" id="slider-dist"></div>       
                        </div>                             
                        <div class="col-md-6">
                            <div class="blocky">
                            <div id="secShow" class="secPanelSwitch">

                                 <ul style = "">
                                    <li>
                                    <div role="tabpanel">

                                      <!-- Nav tabs -->
                                      <ul class="nav nav-tabs tabdistWrap" role="tablist" id = "disttabs">
                                        <li role="presentation" class="active" id = "inchpaneselection"><a href="#inchPane" aria-controls="home" role="tab" data-toggle="tab">Inches</a></li>
                                        <li role="presentation" id = "mmpaneselection"><a href="#mmPane" aria-controls="mmPane" role="tab" data-toggle="tab">Centimeters</a></li>
                                      </ul>

                                      <!-- Tab panes -->
                                      <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane inTab active" id="inchPane">
                                            <input type="text" class="form-control" id="text_dist_tot_in" placeholder="0">
                                            <label for="text_dist_tot_in">In</label>
                                            <div class="vertDivide"></div>  
                                            <div class="respBreak">
                                                <input type="text" class="form-control" id="text_dist_tot_ft" placeholder="0">
                                                <label for="text_dist_tot_ft">Ft</label>  
                                                <input type="text" class="form-control" id="text_dist_tot_ftIn" placeholder="0">
                                                <label for="text_dist_tot_ftIn">In</label> 
                                            </div>
                                        </div>
                                        <div role="tabpanel" class="tab-pane inTab" id="mmPane">
                                            <input type="text" class="form-control" id="text_dist_tot_mm" placeholder="0">
                                            <label for="text_dist_in_mm">Cm</label>    
                                        </div>
                                      </div>
                                    </div>     
                                    </li>                                                       
                                </ul>
                            </div>                               
                            </div>
                        </div>                         
                    </div>
                    
        
                    <hr/>
                    
                    
                    <div class="row">
                        <div class="col-md-12">
                                <h3>Image Width</h3>  
                        </div>
                        <div class="col-md-6">
                                  <div class="dist_slider leftSlide" id="slider-width"></div>                                   
                        </div>                          
                        <div class="col-md-6">
                            <div class="blocky">
                        <div id="secWidthShow" class="secImgSwitch">

                         <ul>
                                    <li>
                                        <div role="tabpanel">

     
                                      <ul class="nav nav-tabs tabdistWrap" role="tablist" id = "widthtabs">
                                        <li role="presentation" class="active" id = "inchpaneselection_width"><a href="#imgInchPane" aria-controls="imgInchPane" role="tab" data-toggle="tab">Inches</a></li>
                                        <li role="presentation" id = "mmpaneselection_width"><a href="#imgMmPane" aria-controls="imgMmPane" role="tab" data-toggle="tab">Centimeters</a></li>
                                      </ul>

          
                                      <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane inTab active" id="imgInchPane">
                                            <input type="text" class="form-control" id="text_width_tot_in" placeholder="0">
                                            <label for="text_width_tot_in">In</label>
                                            <div class="vertDivide"></div>        
                                            <div class="respBreak">                                            
                                                <input type="text" class="form-control" id="text_width_tot_ft" placeholder="0">
                                                <label for="text_width_tot_ft">Ft</label>  
                                                <input type="text" class="form-control" id="text_width_tot_ftIn" placeholder="0">
                                                <label for="text_width_tot_ftIn">In</label>     
                                            </div>
                                        </div>
                                        <div role="tabpanel" class="tab-pane inTab" id="imgMmPane">
                                            <input type="text" class="form-control" id="text_width_tot_mm" placeholder="0">
                                            <label for="text_width_mm_width">Cm</label>    
                                        </div>
                                      </div>

                                    </div>  
                                    </li>
                                    
   
                                </ul> 

                            </div>                                
                            </div>
                        </div>                            
                    </div>                                        
                    
                    <hr/>
                    
                    <div class="row">
                        <div class="col-md-12">
                            <h3>Image Height</h3>
                        </div>
                        <div class="col-md-6">
                                <div class="dist_slider leftSlide" id="slider-height"></div>                                  
                        </div>                            
                        <div class="col-md-6">
                            <div class="blocky">
                                
                                
                            <div id="secHeiShow" class="secHeiSwitch">
								<ul>  
                                    <li>
                                <div role="tabpanel">

                                      <!-- Nav tabs -->
                                      <ul class="nav nav-tabs tabdistWrap" role="tablist" id = "heighttabs">
                                        <li role="presentation" class="active" id = "inchpaneselection_height"><a href="#heightInchPane" aria-controls="heightInchPane" role="tab" data-toggle="tab">Inches</a></li>
                                        <li role="presentation" id = "mmpaneselection_height"><a href="#heightMmPane" aria-controls="heightMmPane" role="tab" data-toggle="tab">Centimeters</a></li>
                                      </ul>

                                      <!-- Tab panes -->
                                      <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane inTab active" id="heightInchPane">
                                            <input type="text" class="form-control" id="text_height_tot_in" placeholder="0">
                                            <label for="text_height_tot_in">In</label>
                                            <div class="vertDivide"></div>   
                                            <div class="respBreak">                                            
                                                <input type="text" class="form-control" id="text_height_tot_ft" placeholder="0">
                                                <label for="text_height_tot_ft">Ft</label>  
                                                <input type="text" class="form-control" id="text_height_tot_ftIn" placeholder="0">
                                                <label for="text_height_tot_ftIn">In</label>    
                                            </div>
                                        </div>
                                        <div role="tabpanel" class="tab-pane inTab" id="heightMmPane">
                                            <input type="text" class="form-control" id="text_height_tot_mm" placeholder="0">
                                            <label for="text_height_mm">Cm</label>    
                                        </div>
                                      </div>

                                    </div>  
                                    </li>
                                    
                                 
                                    
                                </ul>
                                 

                            </div>
                                
                                
                            </div>
                        </div>                          
                    </div>       
               
                    <hr/> 
                  
                    <div class="row">
                        <div class="col-md-12">
                            <h3>Image Diagonal</h3>
                        </div>
                        <div class="col-md-6">
                                <div class="dist_slider leftSlide" id="slider-diag"></div>                                
                        </div>                            
                        <div class="col-md-6">
                            <div class="blocky">
                                
                                
                            <div id="secHeiShow" class="secDiaSwitch">
								<ul id="scaleListLast">    
                                <li>
                                <div role="tabpanel">


                                      <ul class="nav nav-tabs tabdistWrap" role="tablist" id = "diagtabs">
                                        <li role="presentation" class="active" id = "inchpaneselection_diag"><a href="#diagInchPane" aria-controls="diagInchPane" role="tab" data-toggle="tab">Inches</a></li>
                                        <li role="presentation" id = "mmpaneselection_diag"><a href="#diagMmPane" aria-controls="diagMmPane" role="tab" data-toggle="tab">Centimeters</a></li>
                                      </ul>


                                      <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane inTab active" id="diagInchPane">
                                            <input type="text" class="form-control" id="text_diag_tot_in" placeholder="0">
                                            <label for="text_diag_tot_in">In</label>
                                            <div class="vertDivide"></div>  
                                            <div class="respBreak">                                            
                                                <input type="text" class="form-control" id="text_diag_tot_ft" placeholder="0">
                                                <label for="text_diag_tot_ft">Ft</label>  
                                                <input type="text" class="form-control" id="text_diag_tot_ftIn" placeholder="0">
                                                <label for="text_diag_tot_ftIn">In</label>     
                                            </div>    
                                        </div>
                                        <div role="tabpanel" class="tab-pane inTab" id="diagMmPane">
                                            <input type="text" class="form-control" id="text_diag_tot_mm" placeholder="0">
                                            <label for="text_diag_mm">Cm</label>  
                                        </div>
                                      </div>

                                    </div>  
                                </li>

                                </ul>
                             

                            </div>
                                
                                
                            </div>
                        </div>                          
                    </div>                           
                    
                </div> 
                
            </div>
            
            <div class="col-md-4 rightSpecs">
    
                <div role="tabpanel">

                  <!-- Nav tabs -->
                  <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Features</a></li>
                    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Specifications</a></li>
                  </ul>

                  <!-- Tab panes -->
                  <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="home">

                                <div class="pBlock topRightModel">
                                    <h1>Projector</h1>  
                                     <div class="form-group">
                                        <input type="text" class="form-control" id="modelnumber_tab" placeholder="Model">                          
                                          <div class="input-group">
                                            <span class="input-group-addon" id="lensAddon">Lens</span>
                                             <select class="form-control" name="number" id="whatlens">
                                              <option selected="selected" value="whatever">None</option>
                                            </select>
                                          </div>                                           
                                      </div>                                                                             
                                </div>
                                <div class="pBlock rightZoom">
                                    <h1>Zoom</h1>
                                     <div class="form-group">
                                          <div class="input-group">
                                            <span class="input-group-addon" id="zoomAddonFront">Zoom Value</span>
                                            <input type="text" class="form-control" id="text_zoom" placeholder="100%">
                                            <span class="input-group-addon" id="zoomvalue">1x</span>                                    
                                          </div>                                           
                                      </div>         
                                    <div class="zoom_slider" id="slider-zoom"></div>
                                    <div class="nearFar">
                                        <ul>
                                            <li class="nearLabel"><h3>Nearest</h3></li>
                                            <li class="nearValue" id="possibleNear">11'5"</li>
                                        </ul>
                                        <ul>
                                            <li class="nearLabel"><h3>Furthest</h3></li>
                                            <li class="nearValue" id="possibleFar">11'5"</li>                                            
                                        </ul>
                                    </div>
                                </div>  
                                <div class="pBlock rightOffset">
                                    <h1>Image offset</h1>
                                    <p>Your image will appear <label id = "imageoffset_label">11"(10%)</label> higher than lens center.</p>
                                </div>   
                                <div class="pBlock rightSupport">
                                    <h1>Support</h1>
                                    <p>Any questions or suggestions can be forwarded to <a href="mailto:support@infocus.com">support@infocus.com</a>.</p>
                                </div>                           

                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="profile">

                                <div class="pBlock topRightSpec">
                                    <h1>Specifications</h1>  
                                        <dl class="dl-horizontal">
                                          <dt>Model</dt>
                                          <dd id="spec_model"></dd>
                                          <dt>Serial Prefix</dt>
                                          <dd id="spec_snprefix"></dd>   
                                          <dt>Aspect Ratio</dt>
                                          <dd id="spec_aspectratio"></dd>   
                                          <dt>Lumens</dt>
                                          <dd id="spec_lumens"></dd>   
                                          <dt>Contrast</dt>
                                          <dd id="spec_contrast"></dd>       
                                          <dt>Lens Shift</dt>
                                          <dd id="spec_lens_shift"></dd>   
                                          <dt>Offset</dt>
                                          <dd id="spec_offset"></dd>   
                                          <dt>Throw Ratio</dt>
                                          <dd id="spec_throw"></dd>                                                
                                          <dt>Original Remote</dt>
                                          <dd id="spec_remote"></dd>
                                          <dt>Current Remote</dt>
                                          <dd id="spec_newremote"></dd>    
                                          <dt>Lamp</dt>
                                          <dd id="spec_lamp"></dd>
                                        </dl>                                    
                                </div>
                                <div class="pBlock rightLens">
                                    <h1>Lens</h1>  
                                        <dl class="dl-horizontal">
                                          <dt>Lens Name</dt>
                                          <dd id="lname">None</dd>
                                          <dt>Lens Length</dt>
                                          <dd id="llength">None</dd>   
                                        </dl>                                     
                                </div>  
                                <div class="pBlock rightSupport">
                                    <h1>Support</h1>
                                    <p>Any questions or suggestions can be forwarded to <a href="mailto:support@infocus.com">support@infocus.com</a>.</p>
                                </div>                           

                    </div>
                  </div>

                </div>
                
                   
            </div>
        </div>
    </div>

    <footer class="footer">
      <div class="container">
      </div>
    </footer>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
<!--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>-->
    <script src="js/jquery-1.11.2.min.js"></script>  
    <script src="js/jquery-ui.min.js"></script> 
    <script src="js/jquery-ui-slider-pips.js"></script>       
    <script src="js/script.js"></script>          
    <script src="js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
