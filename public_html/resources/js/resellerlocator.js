            // Create a map and add OSM raster layer as the base layer

var selectedprod = "Projector";
var displayedCountry="";
var vCountry="";
			
 var layerListeners = {
    featureclick: function(e) {
        log(e.object.name + " says: " + e.feature.id + " clicked.");
        return false;
    },
    nofeatureclick: function(e) {
        log(e.object.name + " says: No feature clicked.");
    }
};
 
 var map1 = new OpenLayers.Map('map1', {
        projection: 'EPSG:4326',
        layers: [
            new OpenLayers.Layer.OSM()
        ]
    ,
				eventListeners: {
				featureover: function(e) {
					e.feature.renderIntent = "select";
					e.feature.layer.drawFeature(e.feature);
					log("Map says: Pointer entered " + e.feature.id + " on " + e.feature.layer.name);
				},
				featureout: function(e) {
					e.feature.renderIntent = "default";
					e.feature.layer.drawFeature(e.feature);
					log("Map says: Pointer left " + e.feature.id + " on " + e.feature.layer.name);
				},
				featureclick: function(e) {
					console.log("Map says: " + e.feature.id + " clicked on " + e.feature.layer.name);
				}
			},numZoomLevels: 9
});

          // Initial view location
            // var center = new OpenLayers.LonLat(-71, 42);
            // center.transform(new OpenLayers.Projection("EPSG:4326"), new OpenLayers.Projection("EPSG:900913"));
            // map1.setCenter(center, 2);
            // Add a LayerSwitcher control
            //map1.addControl(new OpenLayers.Control.LayerSwitcher());
var proj = new OpenLayers.Projection("EPSG:4326");
var point = new OpenLayers.LonLat(10.451526, 51.165691);
map1.setCenter(point.transform(proj, map1.getProjectionObject()),4);
 
            // Define three colors that will be used to style the cluster features
            // depending on the number of features they contain.
            var colors = {
                low: "rgb(239, 67, 0)", 
                middle: "rgb(241, 211, 87)", 
                high: "rgb(181, 226, 140)"
            };
            
            // Define three rules to style the cluster features.
            var lowRule = new OpenLayers.Rule({
                filter: new OpenLayers.Filter.Comparison({
                    type: OpenLayers.Filter.Comparison.LESS_THAN,
                    property: "count",
                    value: 5
                }),
                symbolizer: {
                    fillColor: colors.low,
                    fillOpacity: 0.9, 
                    strokeColor: colors.low,
                    strokeOpacity: 0.5,
                    strokeWidth: 8,
                    pointRadius: 5,
                    label: "${count}",
                    labelOutlineWidth: 0,
                    fontColor: "#ffffff",
                    fontOpacity: 0.8,
                    fontSize: "10px"
                }
            });
            var middleRule = new OpenLayers.Rule({
                filter: new OpenLayers.Filter.Comparison({
                    type: OpenLayers.Filter.Comparison.BETWEEN,
                    property: "count",
                    lowerBoundary: 5,
                    upperBoundary: 20
                }),
                symbolizer: {
                    fillColor: colors.middle,
                    fillOpacity: 0.9, 
                    strokeColor: colors.middle,
                    strokeOpacity: 0.5,
                    strokeWidth: 10,
                    pointRadius: 10,
                    label: "${count}",
                    labelOutlineWidth: 0,
                    fontColor: "#ffffff",
                    fontOpacity: 0.8,
                    fontSize: "12px"
                }
            });
            var highRule = new OpenLayers.Rule({
                filter: new OpenLayers.Filter.Comparison({
                    type: OpenLayers.Filter.Comparison.GREATER_THAN,
                    property: "count",
                    value: 10
                }),
                symbolizer: {
                    fillColor: colors.high,
                    fillOpacity: 0.9, 
                    strokeColor: colors.high,
                    strokeOpacity: 0.5,
                    strokeWidth: 12,
                    pointRadius: 15,
                    label: "${count}",
                    labelOutlineWidth: 0,
                    fontColor: "#ffffff",
                    fontOpacity: 0.8,
                    fontSize: "12px"
                }
            });
            
            // Create a Style that uses the three previous rules
            var style = new OpenLayers.Style(null, {
                rules: [lowRule, middleRule, highRule]
            });            

			 var styleselected = new OpenLayers.Style({
                    fillColor: "rgb(14, 44, 168)",
                    fillOpacity: 0.9, 
                    strokeColor: "rgb(14, 44, 168)",
                    strokeOpacity: 0.5,
                    strokeWidth: 12,
                    pointRadius: 15,
                    label: "${count}",
                    labelOutlineWidth: 0,
                    fontColor: "#ffffff",
                    fontOpacity: 0.8,
                    fontSize: "12px"
                });

				
var aminatedur = 40;
if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
aminatedur = 0;
}				
            // Create a vector layers
            var vector1 = new OpenLayers.Layer.Vector("Features", {
                protocol: new OpenLayers.Protocol.HTTP({
        url: "/resources/misc/resellers_projector.json",
        format: new OpenLayers.Format.GeoJSON()
		}),
                renderers: ['Canvas','SVG'],
                strategies: [
                    new OpenLayers.Strategy.Fixed(),
                    new OpenLayers.Strategy.AnimatedCluster({
                        distance: 15,
                        animationMethod: OpenLayers.Easing.Expo.easeOut,
                        animationDuration: aminatedur
                    })
                ],
                styleMap:  new OpenLayers.StyleMap({'default': style,
													'select': styleselected}),
           });
            map1.addLayer(vector1);
			
            var vector2 = new OpenLayers.Layer.Vector("Features", {
                protocol: new OpenLayers.Protocol.HTTP({
        url: "/resources/misc/resellers_mondopad.json",
        format: new OpenLayers.Format.GeoJSON()
		}),
                renderers: ['Canvas','SVG'],
                strategies: [
                    new OpenLayers.Strategy.Fixed(),
                    new OpenLayers.Strategy.AnimatedCluster({
                        distance: 15,
                        animationMethod: OpenLayers.Easing.Expo.easeOut,
                        animationDuration: aminatedur
                    })
                ],
                styleMap:  new OpenLayers.StyleMap({'default': style,
													'select': styleselected}),
           });

            map1.addLayer(vector2);
		    var vector3 = new OpenLayers.Layer.Vector("Features", {
                protocol: new OpenLayers.Protocol.HTTP({
        url: "/resources/misc/resellers_bigtouch.json",
        format: new OpenLayers.Format.GeoJSON()
		}),
                renderers: ['Canvas','SVG'],
                strategies: [
                    new OpenLayers.Strategy.Fixed(),
                    new OpenLayers.Strategy.AnimatedCluster({
                        distance: 15,
                        animationMethod: OpenLayers.Easing.Expo.easeOut,
                        animationDuration: aminatedur
                    })
                ],
                styleMap:  new OpenLayers.StyleMap({'default': style,
													'select': styleselected}),
           });

            map1.addLayer(vector3);
//var selectFeature = new OpenLayers.Control.SelectFeature(vector);
//map1.addControl(selectFeature);
//selectFeature.activate();


var vectorarray = [];

vectorarray.push(vector1);
vectorarray.push(vector2);
vectorarray.push(vector3);



// Add a select control (note: this control is added to the map, but is disabled)
var select = new OpenLayers.Control.SelectFeature(
    vectorarray,
    {
        multiple: false,
        clickout: true,             // Will be ignored (aka, you have to deselect a feature when no feature is found onClick)
        onSelect: function(feature)
        {
                //this.select(feature);
        },
        onUnselect: function(feature)
        {
                //this.unselect(feature);
        }
    }
);

map1.addControl(select);

// Handler to intercept click.
handler = new OpenLayers.Handler.Click(
    select,  // The select control
    {
        click: function(evt)
        {
            //console.warn(this); // OpenLayers.Control.SelectFeature
			select.unselectAll();
			var feature = this.layer.getFeatureFromEvent(evt);
			var lonlat = map1.getLonLatFromPixel(evt.xy);

			console.log(lonlat);

             // Select a feature
            if(feature){
                this.select(feature);
				//console.warn(feature)
				featArray = feature.cluster;
				var resellernode="";
					featArray = featArray.sort(function() {
					return Math.random() - 0.5;
				 });
				for(var i = 0, len = featArray.length; i<len; i++){
				
				resellernode = resellernode + displayResults(featArray[i],i);

				}
				
				if(displayedCountry.length>5){

					jQuery.post("/resources/php/onlineresellers.php",
					{countryList:"(" + '`country` LIKE "%' + displayedCountry + '%"' + ")",
					products: selectedprod
					},
					function(response){

					if(response.length<10){document.getElementById('shopOnline').innerHTML = "";}
					else{document.getElementById('shopOnline').innerHTML = onlinetext;}
					document.getElementById('onlineresults').innerHTML = response;

						
					});}
				
 				document.getElementById('results-table').outerHTML = '<table id="results-table" class="C8 Col"><thead></thead><tbody>' + '<tr>' + resellernode + "</tr></tbody></table>";
				$(".iframe").colorbox({iframe:true, width:"50%", height:"60%"});
				return;
           }
            //clickout
            if(this.layer.selectedFeatures){
                this.unselect(this.layer.selectedFeatures[0]);
				return;
            }

        },
        dblclick: function(evt)
        {
		    var lonlat = map1.getLonLatFromPixel(evt.xy);
			var centerloc = [];
			console.log(evt);
			console.log(lonlat.lat);
			centerloc.push(lonlat.lon);
			centerloc.push(lonlat.lat);
			var newzoom = map1.zoom+1;
			if( newzoom == 3){newzoom=5;}
			map1.setCenter(centerloc,newzoom);

        }
    },
    {
        single: true,
        double: true,
        stopDouble: true,
        stopSingle: true
    }
);

 //select.activate();  // The select control must NOT be active
handler.activate(); 

map1.events.on({moveend: function(evt) {
      if(map1.zoom>5){
	  var e = 0;
	  var myFeatures;
	  if(vector1.getVisibility()){myFeatures = map1.layers[1].features;}
	  if(vector2.getVisibility()){myFeatures = map1.layers[2].features;}
	  if(vector3.getVisibility()){myFeatures = map1.layers[3].features;}
 		  var resellernode="";
 				var e = 0;
	myFeatures = myFeatures.sort(function() {
    return Math.random() - 0.5;
 });
    for (var x=0;x<myFeatures.length;x++) {
          var poi = myFeatures[x];
				featArray = poi.cluster;
				
				
	featArray = featArray.sort(function() {
    return Math.random() - 0.5;
 });
 

 
				for(var i = 0, len = featArray.length; i<len; i++){
				
         if (poi.onScreen()){
  
				
				resellernode = resellernode + displayResults(featArray[i],e);
				e=e+1;
				}

				}}
 				document.getElementById('results-table').outerHTML = '<table id="results-table" class="C8 Col"><thead></thead><tbody>' + '<tr>' + resellernode + "</tr></tbody></table>";
				$(".iframe").colorbox({iframe:true, width:"50%", height:"60%"});
     }
      if(map1.zoom<19){


		var viewPort="" + map1.getExtent().transform(map1.projection, map1.displayProjection);
		viewPort = viewPort.split(",");
		var l2=viewPort[0]*1;
		var t2=viewPort[1]*1;
		var w2=viewPort[2] - l2;
		var h2=viewPort[3] - t2; 
		vCountry = "";
		var x = map1.getCenter();
		
		
		//Georgia
		var lonLow=4447928.4277164;	
		var lonHigh=5185392.8765091;			
		var latLow=5031036.4952647;				
		var latHigh=5375920.3668394;			
		countryOverlap("Georgia",lonLow,lonHigh,latLow,latHigh,x);
		//Azerbaijan
		lonLow=5083884.5029605;lonHigh=5560851.5593936;latLow=4749748.2312144;latHigh=5136213.8461705;
		countryOverlap("Azerbaijan",lonLow,lonHigh,latLow,latHigh,x);

		//Armenia
		lonLow=4839286.012482;lonHigh=5193953.8236758;latLow=4708166.4878331;latHigh=5026144.5254551;
		countryOverlap("Azerbaijan",lonLow,lonHigh,latLow,latHigh,x);

		//Nigeria
		lonLow=305853.06150434;lonHigh=1440790.0573247;latLow=534921.36894573;latHigh=1611154.7270512;
		countryOverlap("Nigeria",lonLow,lonHigh,latLow,latHigh,x);

		//United States
		lonLow=-13748826.794577;lonHigh=-7478206.1164353;latLow=2961498.307606;latHigh=6275331.9021025;
		countryOverlap("United States",lonLow,lonHigh,latLow,latHigh,x);

		//Canada
		lonLow=-15730074.567453;lonHigh=-6337492.5330785;latLow=6257904.2596562;latHigh=10171480.107312;
		countryOverlap("Canada",lonLow,lonHigh,latLow,latHigh,x);

		//Belgium
		lonLow=226002.21080009;lonHigh=813038.58794853;latLow=6439060.0166664;latHigh=6683658.507145;
		countryOverlap("Belgium",lonLow,lonHigh,latLow,latHigh,x);

		//Denmark
		lonLow=621946.01726226;lonHigh=1796018.7715591;latLow=7322824.9375767;latHigh=7812021.9185337;
		countryOverlap("Denmark",lonLow,lonHigh,latLow,latHigh,x);

		//France
		lonLow=-350944.47861657;lonHigh=813344.33606119;latLow=5385299.1448738;latHigh=6363693.1067878;
		countryOverlap("France",lonLow,lonHigh,latLow,latHigh,x);

		//Germany
		lonLow=677592.17384555;lonHigh=1636418.2565213;latLow=5990068.9125817;latHigh=7340252.5800232;
		countryOverlap("Germany",lonLow,lonHigh,latLow,latHigh,x);

		//Mexico
		lonLow=-12819352.530759;lonHigh=-10148337.014733;latLow=1734055.1782557;latHigh=3690843.1020839;
		countryOverlap("Mexico",lonLow,lonHigh,latLow,latHigh,x);

		//Netherlands
		lonLow=281954.11549669;lonHigh=783381.02097765;latLow=6676473.4264871;latHigh=7058047.0716336;
		countryOverlap("Netherlands",lonLow,lonHigh,latLow,latHigh,x);

		//Norway
		lonLow=536948.0418205;lonHigh=1437070.4867815;latLow=7957863.7684813;latHigh=10286441.397837;
		countryOverlap("Norway",lonLow,lonHigh,latLow,latHigh,x);

		//Sweden
		lonLow=1280527.4528752;lonHigh=2630711.1203166;latLow=7488234.6667628;latHigh=10599527.465649;
		countryOverlap("Sweden",lonLow,lonHigh,latLow,latHigh,x);

		//Thailand
		lonLow=10947059.796586;lonHigh=11808046.48307;latLow=389986.47307617;latHigh=2346774.3969043;
		countryOverlap("Thailand",lonLow,lonHigh,latLow,latHigh,x);

		//United Kingdom
		lonLow=-1104307.8292905;lonHigh=187172.20043605;latLow=6435238.1652525;latHigh=8118075.7797448;
		countryOverlap("United Kingdom",lonLow,lonHigh,latLow,latHigh,x);
		

	if(vCountry.length>5){
	jQuery.post("/resources/php/onlineresellers.php",
			{countryList:"(" + vCountry + ")",
			products: selectedprod
			},
			function(response){

 					if(response.length<10){document.getElementById('shopOnline').innerHTML = "";}
					else{document.getElementById('shopOnline').innerHTML = onlinetext;}
				document.getElementById('onlineresults').innerHTML = response;

				
			});}


	 
	 }
	 }

});



function log(msg) {
    if (!log.timer) {
        result.innerHTML = "";
        log.timer = window.setTimeout(function() {delete log.timer;}, 100);
    }
    result.innerHTML += msg + "<br>";
}     

function SetJSON(producttype) {

//var producttype = document.getElementById('prodtype').value;

if(producttype=="All"){
vector1.setVisibility(true);
vector2.setVisibility(true);
vector3.setVisibility(true);
selectedprod = "";

if(displayedCountry.length>5){

	jQuery.post("/resources/php/onlineresellers.php",
	{countryList:"(" + '`country` LIKE "%' + displayedCountry + '%"' + ")",
	products: selectedprod
	},
	function(response){

					if(response.length<10){document.getElementById('shopOnline').innerHTML = "";}
					else{document.getElementById('shopOnline').innerHTML = onlinetext;}
		document.getElementById('onlineresults').innerHTML = response;

		
	});
}
if(vCountry.length>5){
	jQuery.post("/resources/php/onlineresellers.php",
	{countryList:"(" + vCountry + ")",
	products: selectedprod
	},
	function(response){

					if(response.length<10){document.getElementById('shopOnline').innerHTML = "";}
					else{document.getElementById('shopOnline').innerHTML = onlinetext;}
	document.getElementById('onlineresults').innerHTML = response;


	});
}
}
if(producttype=="Projector"){
vector1.setVisibility(true);
vector2.setVisibility(false);
vector3.setVisibility(false);
selectedprod="Projector";

if(displayedCountry.length>5){

	jQuery.post("/resources/php/onlineresellers.php",
	{countryList:"(" + '`country` LIKE "%' + displayedCountry + '%"' + ")",
	products: selectedprod
	},
	function(response){

					if(response.length<10){document.getElementById('shopOnline').innerHTML = "";}
					else{document.getElementById('shopOnline').innerHTML = onlinetext;}
		document.getElementById('onlineresults').innerHTML = response;

		
	});
}
if(vCountry.length>5){
	jQuery.post("/resources/php/onlineresellers.php",
	{countryList:"(" + vCountry + ")",
	products: selectedprod
	},
	function(response){

					if(response.length<10){document.getElementById('shopOnline').innerHTML = "";}
					else{document.getElementById('shopOnline').innerHTML = onlinetext;}
	document.getElementById('onlineresults').innerHTML = response;


	});
}}
if(producttype=="Mondopad"){
vector1.setVisibility(false);
vector2.setVisibility(true);
vector3.setVisibility(false);
selectedprod="Mondopad";

if(displayedCountry.length>5){

	jQuery.post("/resources/php/onlineresellers.php",
	{countryList:"(" + '`country` LIKE "%' + displayedCountry + '%"' + ")",
	products: selectedprod
	},
	function(response){

					if(response.length<10){document.getElementById('shopOnline').innerHTML = "";}
					else{document.getElementById('shopOnline').innerHTML = onlinetext;}
		document.getElementById('onlineresults').innerHTML = response;

		
	});
}
if(vCountry.length>5){
	jQuery.post("/resources/php/onlineresellers.php",
	{countryList:"(" + vCountry + ")",
	products: selectedprod
	},
	function(response){

					if(response.length<10){document.getElementById('shopOnline').innerHTML = "";}
					else{document.getElementById('shopOnline').innerHTML = onlinetext;}
	document.getElementById('onlineresults').innerHTML = response;


	});
}}
if(producttype=="Bigtouch"){
vector1.setVisibility(false);
vector2.setVisibility(false);
vector3.setVisibility(true);
selectedprod="Projector";

if(displayedCountry.length>5){

	jQuery.post("/resources/php/onlineresellers.php",
	{countryList:"(" + '`country` LIKE "%' + displayedCountry + '%"' + ")",
	products: selectedprod
	},
	function(response){

					if(response.length<10){document.getElementById('shopOnline').innerHTML = "";}
					else{document.getElementById('shopOnline').innerHTML = onlinetext;}
		document.getElementById('onlineresults').innerHTML = response;

		
	});
}
if(vCountry.length>5){
	jQuery.post("/resources/php/onlineresellers.php",
	{countryList:"(" + vCountry + ")",
	products: selectedprod
	},
	function(response){

					if(response.length<10){document.getElementById('shopOnline').innerHTML = "";}
					else{document.getElementById('shopOnline').innerHTML = onlinetext;}
	document.getElementById('onlineresults').innerHTML = response;


	});
}}

      if(map1.zoom>5){
	  var e = 0;
	  var myFeatures;
	  if(vector1.getVisibility()){myFeatures = map1.layers[1].features;}
	  if(vector2.getVisibility()){myFeatures = map1.layers[2].features;}
	  if(vector3.getVisibility()){myFeatures = map1.layers[3].features;}
 		  var resellernode="";
				var e = 0;
	myFeatures = myFeatures.sort(function() {
    return Math.random() - 0.5;
 });
    for (var x=0;x<myFeatures.length;x++) {
          var poi = myFeatures[x];
				featArray = poi.cluster;
				
				
	featArray = featArray.sort(function() {
    return Math.random() - 0.5;
 });
				for(var i = 0, len = featArray.length; i<len; i++){
				
         if (poi.onScreen()){
  
				
				resellernode = resellernode + displayResults(featArray[i],e);
				e=e+1;

				}

				}}
 				document.getElementById('results-table').outerHTML = '<table id="results-table" class="C8 Col"><thead></thead><tbody>' + '<tr>' + resellernode + "</tr></tbody></table>";
				$(".iframe").colorbox({iframe:true, width:"50%", height:"60%"});
     }


}


var displayedCountry;

function displayResults(featArray,i){

 		  var temptext="<td><h3>" + featArray.attributes['NAME']+ '</h3>' + featArray.attributes['STREET'] + "<br/>" + featArray.attributes['CITY'] + " " + featArray.attributes['STATE'] + " " + featArray.attributes['ZIP'] + "<br/>" + featArray.attributes['PHONE'];
				
				if(featArray.attributes['WEBSITE'].length>10){temptext = temptext + "<br/><a target='blank' href='" + featArray.attributes['WEBSITE'] + "'>" +  featArray.attributes['WEBSITE'] + "</a>";}
				
				if(featArray.attributes['PREMIUM'].length>10){temptext = temptext + "<br/><img src='/resources/images/InFocus-Premium-" + featArray.attributes['PREMIUM'] + ".png' style='Width:120px;'>";}
				
				temptext = temptext + '<br/><a class="iframe" href="http://maps.google.com/?q=' + featArray.attributes['STREET'] + "," + featArray.attributes['CITY'] + "," + featArray.attributes['STATE'] + "," + featArray.attributes['ZIP'] + '&output=embed">'+mapreseller+'</a><br/></td>';
				if((i+1)%4 == 0){ 
				temptext = temptext + "</tr><tr>";
				}
				console.log(featArray.attributes['NAME']+"|"+featArray.attributes['COUNTRY'])
		displayedCountry = featArray.attributes['COUNTRY'];
		return temptext;

} 



function success(position) {
var proj = new OpenLayers.Projection("EPSG:4326");
var point = new OpenLayers.LonLat(position.coords.longitude, position.coords.latitude);
point.transform(proj, map1.getProjectionObject());

map1.setCenter(point,6);
}

function error(msg) {

  
  console.log(arguments);
}

if (navigator.geolocation) {
  navigator.geolocation.getCurrentPosition(success, error);
} else {
  error('not supported');
}


function countryOverlap(Country,lonL,lonH,latL,latH,x){
	if ((x.lon+60000) > lonL && (x.lon-60000) < lonH && (x.lat+60000) > latL && (x.lat-60000) < latH) {
		if(vCountry.length>0){
		vCountry = vCountry + ' OR `country` LIKE "%' + Country + '%"';
		}
		else{
		vCountry = '`country` LIKE "%' + Country + '%"';
		}
	}
}
