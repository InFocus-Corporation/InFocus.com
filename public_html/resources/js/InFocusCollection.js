function makeReadable(readableHTML){
var lb = '\r\n';
readableHTML = readableHTML.replace(/(\r\n|\n|\r)/gm,"");
var htags = ["<html","</html>","</head>","<title","</title>","<meta","<link","<style","</style>","</body>"];
for (i=0; i<htags.length; ++i) {
var hhh = htags[i];
readableHTML = readableHTML.replace(new RegExp(hhh,'gi'),lb+hhh);
}
var btags = ["</div>","</span>","</form>","</fieldset>","<br>","<br />","<hr","<pre","</pre>","<blockquote","</blockquote>","<ul","</ul>","<ol","</ol>","<li","<dl","</dl>","<dt","</dt>","<dd","</dd>","<\!--","<table","</table>","<caption","</caption>","<th","</th>","<tr","</tr>","<td","</td>","<script","</script>","<noscript","</noscript>"];
for (i=0; i<btags.length; ++i) {
var bbb = btags[i];
readableHTML = readableHTML.replace(new RegExp(bbb,'gi'),lb+bbb);
}
var ftags = ["<label","</label>","<legend","</legend>","<object","</object>","<embed","</embed>","<select","</select>","<option","<option","<input","<textarea","</textarea>"];
for (i=0; i<ftags.length; ++i) {
var fff = ftags[i];
readableHTML = readableHTML.replace(new RegExp(fff,'gi'),lb+fff);
}
var xtags = ["<body","<head","<div","<span","<p","<form","<fieldset"];
for (i=0; i<xtags.length; ++i) {
var xxx = xtags[i];
readableHTML = readableHTML.replace(new RegExp(xxx,'gi'),lb+lb+xxx);
}
return readableHTML;
}

// append row to the HTML table
function appendRow(tableID) {
    var tbl = document.getElementById(tableID), // table reference
        row = tbl.insertRow(tbl.rows.length),      // append table row
        i;
    // insert table cells to the new row
    for (i = 0; i < tbl.rows[0].cells.length; i++) {
        createCell(row.insertCell(i), i, 'row');
    }
}
 
// create DIV element and append to the table cell
function createCell(cell, text, style) {
    var div = document.createElement('div'), // create DIV element
        txt = document.createTextNode(text); // create text node
    div.appendChild(txt);                    // append text node to the DIV
    div.setAttribute('class', style);        // set DIV class attribute
    div.setAttribute('className', style);    // set DIV class attribute for IE (?!)
    cell.appendChild(div);                   // append DIV to the table cell			
			}
			
// append column to the HTML table
function appendColumn(tableID) {
    var tbl = document.getElementById(tableID), // table reference
        i;
    // open loop for each row and append cell
    for (i = 0; i < tbl.rows.length; i++) {
        createCell(tbl.rows[i].insertCell(tbl.rows[i].cells.length), i, 'col');
    }
}			

// delete table rows with index greater then 0
function deleteRows(tableID) {
    var tbl = document.getElementById(tableID), // table reference
        lastRow = tbl.rows.length - 1,             // set the last row index
        i;
    // delete rows with index greater then 0
    for (i = lastRow; i > 0; i--) {
        tbl.deleteRow(i);
    }
}
function deleteRow(tableID) {
    var tbl = document.getElementById(tableID); // table reference
    // delete last row
        tbl.deleteRow(tbl.rows.length);
}
 
// delete table columns with index greater then 0
function deleteColumns(tableID) {
    var tbl = document.getElementById(tableID), // table reference
        lastCol = tbl.rows[0].cells.length - 1,    // set the last column index
        i, j;
    // delete cells with index greater then 0 (for each row)
    for (i = 0; i < tbl.rows.length; i++) {
        for (j = lastCol; j > 0; j--) {
            tbl.rows[i].deleteCell(j);
        }
    }
}
function deleteColumn(tableID) {
    var tbl = document.getElementById(tableID); // table reference
    // delete last column)
    for (i = 0; i < tbl.rows.length; i++) {
            tbl.rows[i].deleteCell(tbl.rows[0].cells.length - 1);
    }
}

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
          .attr("placeholder", "...")
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
          .addClass( "custom-combobox-toggle ui-corner-right ui-widget-dd" )
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
  
  function projectorSlide(){

			jQuery.post("/resources/php/projectorcategorylist.php",
			{pn: ""},
			function(response){
				document.getElementById('product-slide').innerHTML = '<div id="category" class="content-i"><div id="details" style="min-height:600px;overflow:hidden;display:none">' + response + '</div></div>';
			$("#details").show('slide', { direction: 'right' }, 1000);
			});

}
function showCategory(catSelected){
			   $('.models-list').css({"width": $('#categories').outerWidth()});
			   $('#' + catSelected).animate({width:0}, 0,function(){$('#' + catSelected).show()});
			   $('#' + catSelected).animate({width:"100%"}, 1000);
			   $('#categories').animate({width:0}, 990,function(){$('#categories').hide()});
	}
function backUp(catSelected){
			   $('#categories').animate({width:"100%",height:"100%"}, 0);
			   $('#categories').slideDown(1000);
			   $('#' + catSelected).hide('slide', { direction: 'up' }, 1000);
}

function getProductList(where,elemId){
	jQuery.post("/resources/php/productlist.php",
			{wheretxt: where},
			function(response){
				document.getElementById(elemId).innerHTML = response;
			});
}

function updateSpecs(modelList, phpFile){
var n = document.getElementById('modlist').value.indexOf(modelList);
if(n>0){
<!--Trans-Marker-->
// alert("Model already present in the table");
return;
}

console.log(modelList)

document.getElementById('modlist').value = document.getElementById('modlist').value +  modelList;
modelList = document.getElementById('modlist').value;
	var tableWidth = 250 + (modelList.split(",").length*215)
	jQuery.post("/resources/php/" + phpFile,
			{pn: modelList},
			function(response){
			   document.getElementById('specFrame').outerHTML = '<div id="specFrame" style="width:' + tableWidth + 'px">' + response + '</div>';
			});
}

function removeSpecs(removeModel, phpFile){
var modelList = document.getElementById('modlist').value;
modelList = modelList.replace(removeModel,"");
document.getElementById('modlist').value = modelList;
	var tableWidth = 200 + (modelList.split(",").length*165)
	jQuery.post("/resources/php/" + phpFile,
			{pn: modelList},
			function(response){
			   document.getElementById('specFrame').outerHTML = '<div id="specFrame" style="width:' + tableWidth + 'px">' + response + '</div>';
			});
}

$(function() {
$( "#tabs-min" ).tabs();
if($(".flexnav").length>0){$(".flexnav").flexNav();}
});



$( document ).ready(function() {
var Tabs = {

  init: function() {
    this.bindUIfunctions();
    this.pageLoadCorrectTab();
  },

  bindUIfunctions: function() {

    // Delegation
    $(document)
      .on("click", ".transformer-tabs a[href^='#']:not('.active')", function(event) {
        Tabs.changeTab(this.hash);
        event.preventDefault();
      })
      .on("click", ".transformer-tabs a.active", function(event) {
        Tabs.toggleMobileMenu(event, this);
        event.preventDefault();
      });

  },

  changeTab: function(hash) {

    var anchor = $("[href=" + hash + "]");
    var div = $(hash);

    // activate correct anchor (visually)
    anchor.addClass("active").parent().siblings().find("a").removeClass("active");

    // activate correct div (visually)
    div.addClass("active").siblings().removeClass("active");

    // update URL, no history addition
    // You'd have this active in a real situation, but it causes issues in an <iframe> (like here on CodePen) in Firefox. So commenting out.
    window.history.replaceState("", "", hash);

    // Close menu, in case mobile
    anchor.closest("ul").removeClass("open");

  },

  // If the page has a hash on load, go to that tab
  pageLoadCorrectTab: function() {
    if(document.location.hash.length>2){this.changeTab(document.location.hash);}

	},

  toggleMobileMenu: function(event, el) {
    $(el).closest("ul").toggleClass("open");
  }

}

Tabs.init();
});
