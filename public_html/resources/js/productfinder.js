var Q6="";
var Q7="";
var Q8="";
var Q9="";
 $(function() {
$( "#tabs-nohdr" ).tabs();
});



$(function() {
var $currentlySelected = null;
var selected1 = [];

$('#selectable').selectable({
    start: function(event, ui) {
        $currentlySelected = $('#selectable .ui-selected');
    },
    stop: function(event, ui) {
        for (var i = 0; i < selected1.length; i++) {
            if ($.inArray(selected1[i], $currentlySelected) >= 0) {
              $(selected1[i]).removeClass('ui-selected');
            }
        }
        selected1 = [];

		Q6 = "";
		$( ".ui-selected", this ).each(function() {
		var index = $( "#selectable li" ).index( this );
		Q6 = Q6 + "," + ( ( index + 1 )  );
		});
	fetchMatches();
	},
    selecting: function(event, ui) {
        $currentlySelected.addClass('ui-selected'); // re-apply ui-selected class to currently selected items
    },
    selected: function(event, ui) {
        selected1.push(ui.selected);
    }
});

$("#selectable2 li").click(function() {
      $(this).addClass("selected").siblings().removeClass("selected");
	  Q7 = $(this).attr("id");
	  	fetchMatches();
    });


var $currentlySelected3 = null;
var selected3 = [];

$('#selectable3').selectable({
    start: function(event, ui) {
        $currentlySelected3 = $('#selectable3 .ui-selected');
    },
    stop: function(event, ui) {
        for (var i = 0; i < selected3.length; i++) {
            if ($.inArray(selected3[i], $currentlySelected3) >= 0) {
              $(selected3[i]).removeClass('ui-selected');

            }
        }
        selected3 = [];

		Q8 = "";
		$( ".ui-selected", this ).each(function() {
		var index = $( "#selectable3 li" ).index( this );
		Q8 = Q8 + "," + ( ( index + 1 )  );
		});
	fetchMatches();
	},
    selecting: function(event, ui) {
        $currentlySelected3.addClass('ui-selected'); // re-apply ui-selected class to currently selected items
    },
    selected: function(event, ui) {
        selected3.push(ui.selected);
    }
});


var $currentlySelected4 = null;
var selected4 = [];

$('#selectable4').selectable({
    start: function(event, ui) {
        $currentlySelected4 = $('#selectable4 .ui-selected');
    },
    stop: function(event, ui) {
        for (var i = 0; i < selected4.length; i++) {
            if ($.inArray(selected4[i], $currentlySelected4) >= 0) {
              $(selected4[i]).removeClass('ui-selected');
            }
        }
        selected4 = [];

		Q9 = "";
		$( ".ui-selected", this ).each(function() {
		var index = $( "#selectable4 li" ).index( this );
		Q9 = Q9 + "," + ( ( index + 1 )  );
		});
	fetchMatches();
	},
    selecting: function(event, ui) {
        $currentlySelected4.addClass('ui-selected'); // re-apply ui-selected class to currently selected items
    },
    selected: function(event, ui) {
        selected4.push(ui.selected);
    }
});



});


function fetchMatches(){
    var Q1 = document.getElementById('Q1').value;
    if (vLang != "en") {    	var Q2 = document.getElementById('Q2').value*.0328084;    	var Q2a = document.getElementById('Q2a').value*.0328084;    	console.log(Q2);    	console.log(Q2a);    }    else {    	var Q2 = document.getElementById('Q2').value;    	var Q2a = document.getElementById('Q2a').value;    }
	var Q3 = document.getElementById('Q3').value;
	var Q4 = document.getElementById('Q4').value;
	var Q5 = document.getElementById('Q5').value;
	//Q6 = Q6.substring(1);
	//Q8 = Q8.substring(1);
	//Q9 = Q9.substring(1);

    //if(Q1=="" || Q2=="" || Q2a=="" || Q3==""){return;}
    var displayInsert;
    displayInsert="";
    if (Q3>75 && Q1.substr(-1)<8) {
        displayInsert = '<li class="liresults display_insert"><div class="C2 Col"><img src="/resources/images/InFocus-INF5520" width="75%">	</div><div class="Col" style="margin-left:20px;"><h6><a href="/displays/">Have you thought of using an interactive touch display?</a></h6><span style="font-size:70%"></span><ul style="list-style:disc; display:block; vertical-align:top;"><li>Great for bright environments</li><li>Ultimate Colaboration Tool</li></ul> </div><div style="float:right;"><a href="/displays"><button class="formbutton">Learn More</button></a></div></li>';
    }

    showSpinner()
	jQuery.post("/resources/php/productfinder.php",
		{
            Q1: Q1,
			Q2: Q2,
			Q2a: Q2a,
			Q3: Q3,
			Q4: Q4,
			Q5: Q5,
			Q6: Q6,
			Q7: Q7,
			Q8: Q8,
			Q9: Q9,
			lang: vLang
		},
		function(response){
			var resulttab;
			resulttab ="<table>";
			var aline = response.split(";");
			for(i=0; i<aline.length; i++){
				resulttab = resulttab + "<tr>";
				var acol = aline[i].split(",")
				for(x=0; x<acol.length; x++){
					resulttab  = resulttab + "<td>" + acol[x] + "</td>";
				}
				resulttab  = resulttab + "</tr>";
			}
			document.getElementById('results').innerHTML  = displayInsert + response; //resulttab + "</table>";
            hideSpinner();
		}
    );
}

function showAdvanced(){
		$('#specfeat').slideDown(500);
		document.getElementById('specfeattoggle').onclick= function() {hideAdvanced();}
		document.getElementById('specfeattoggle').innerHTML = "Hide Questions";
}
function hideAdvanced(){
		$('#specfeat').slideUp(500);
		document.getElementById('specfeattoggle').onclick= function() {showAdvanced();}
		document.getElementById('specfeattoggle').innerHTML = "Show More Questions";
}

function showSpinner(){
    $("#loading_spinner").show();
}
function hideSpinner(){
    $("#loading_spinner").hide();
}
