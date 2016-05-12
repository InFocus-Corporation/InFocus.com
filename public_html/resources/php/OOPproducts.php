<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/resources/php/imageprocess.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/resources/php/connections.php");

class InFocus
{
  public function __construct()
  {
        global $connection;
  	if( substr($_SERVER['DOCUMENT_ROOT'],-11) == "public_html"){$this->lang = "en";}
  	else{$this->lang = substr($_SERVER['DOCUMENT_ROOT'],-2);}
	$this->conn = $connection;
	mysqli_set_charset($this->conn, "utf8");
	ini_set('default_charset', 'utf-8');
	}
 }

class IFCSeries extends InFocus
{
	public function __construct(){
	  	parent::__construct();
	  	$a = func_get_args();
	  	$this->pn = mysqli_real_escape_string($this->conn, strtoupper($a[0]));

	  	$pn = str_replace("_","-",$pn);
	    if(strpos($pn,"$")>0){$pn = substr($pn,0,strpos($pn,"$")-1);}

	    $find = array("CLONE","PROJECTOR","SHORT","THROW","LEGACY","THEATER","HOME","THEATRE","DISPLAY","INFOCUS-","SCREENPLAY-","1080P","PROJEKTOR","LCD","LED","INTERACTIVE","INTERAC","INTERAKTIV","SERIES","--","-DE","LITESHOWII","LITESHOWIII"," ","%20");
	    $replace = array("","","","","","","","","","","","","","","","","","","-","","","LITESHOW2","LITESHOW3","","");
	    $producttest = str_replace($find,$replace,$this->pn);
	    $producttest = rtrim(ltrim($producttest,'-'),'-');

	  	$sql = "SELECT s.series, producttext.partnumber, s.differencelist, producttext.active, producttext.productgroup, s.category, producttext.price, producttext.listtitle
		FROM (SELECT * FROM InFocus.producttext WHERE `lang` = '{$this->lang}' ) as producttext JOIN (
			SELECT productseries.*, ss.category
			FROM (SELECT * FROM InFocus.productseries  WHERE `lang` = '{$this->lang}' ) as productseries JOIN (
				SELECT series, category
					FROM InFocus.productseries JOIN InFocus.producttext ON productseries.series = producttext.partnumber
					WHERE (productseries.partnumber IN('{$producttest}','IN{$producttest}','INS-{$producttest}') OR series IN('{$producttest}','{$producttest}-Series','IN{$producttest}','IN{$producttest}-Series','INS-{$producttest}','INS-{$producttest}-Series') ) LIMIT 1) AS ss
			ON ss.series = productseries.series ) AS s
		ON s.partnumber = producttext.partnumber AND s.`lang` = producttext.`lang` and producttext.active != 86 ORDER BY partnumber desc";

		$result = mysqli_query($this->conn,$sql);

		if(mysqli_num_rows($result)==0){
		$sql = "SELECT  * FROM InFocus.producttext WHERE (`lang` = '{$this->lang}') AND partnumber IN('{$producttest}','IN{$producttest}','INS-{$producttest}') and producttext.active != 86 ORDER BY partnumber";
		$result = mysqli_query($this->conn,$sql);
		}

		if(mysqli_num_rows($result)==0){
		$sql = "SELECT  * FROM InFocus.producttext WHERE (`lang` = '{$this->lang}') AND partnumber IN('{$this->pn}','IN{$this->pn}','INS-{$this->pn}') and producttext.active != 86 ORDER BY partnumber";
		$result = mysqli_query($this->conn,$sql);
		$producttest = $this->pn;
		}

		if(mysqli_num_rows($result)==0){
			header("HTTP/1.0 404 Not Found");
			include($_SERVER['DOCUMENT_ROOT'] . '/404.php');
			exit;
		}

		$this->sql = $sql;
		$this->seriesModels=array();

		if(strpos(strtoupper($this->pn),"SERIES")>0){$this->pn = "Series";}
		else{$this->pn = '';}
		while($row = mysqli_fetch_assoc($result))
		{
			$this->series 				= $row['series'];
			if($this->pn == "Series"){$this->pn = $row['series']; $this->isSeries = true;}
			elseif(strpos(strtoupper(" ".$row['partnumber']),strtoupper($producttest))>0 AND !$this->isSeries){$this->pn = $row['partnumber'];}
			if(!in_array($row['partnumber'], $this->seriesModels )){$this->seriesModels[] 		= $row['partnumber'];}
			if(empty($this->modelsDiff[$row['partnumber']])) {$this->modelsDiff[$row['partnumber']] = $row['differencelist'];}
			if(empty($this->modelActive[$row['partnumber']])) {$this->modelActive[$row['partnumber']] = $row['active'];}
			if(empty($this->modelPrice[$row['partnumber']])) {$this->modelPrice[$row['partnumber']] = $row['price'];}
			if(empty($this->modelListTitle[$row['partnumber']])) {$this->modelListTitle[$row['partnumber']] = $row['listtitle'];}
			if(empty($this->productGroup)) {$this->productGroup = $row['productgroup'];}
			if(empty($this->productCategory)) {$this->productCategory = $row['category'];}

		}
		asort($this->seriesModels);
		if($this->pn == ''){$this->pn = $this->series; $this->isSeries = true;}

		switch($this->productGroup){
			case Projector:
				$this->productPath = "projectors";
				break;
			case Display:
				$this->productPath = "displays";
				break;
			case Accessory:
				$this->productPath = "accessories";
				break;
			case Peripheral:
				$this->productPath = "peripherals";
				break;
		}

		$this->breadcrumb = "<a href='/'>" . translate('Home') . "</a> > <a href='/{$this->productPath}'>" . ucfirst($this->productPath) . "</a> >";
		if($this->productGroup == "Projector" OR $this->productGroup == "Accessory"){
			$this->productCategory = str_replace(", ",",",$this->productCategory);
			$multiCat = explode(",",$this->productCategory);
			foreach($multiCat AS $cat){
				$cat = str_replace("mpbtaccessories","display-accessories",$cat);
			$this->breadcrumb .= " <a href='/{$this->productPath}/{$cat}'>" . ucwords(str_replace("-"," ",$cat)) . "</a>,";
			}
			$this->breadcrumb = rtrim($this->breadcrumb,",");
		}
		$cservername = $_SERVER['SERVER_NAME'];
		if($cservername == "infocus.com"){$cservername = "www.infocus.com";}
		$this->canonical = "<link rel='canonical' href='http:////{$cservername}/{$this->productPath}/{$multiCat[0]}";
		if($this->series != ''){
			$this->breadcrumb .= " > <a href='/{$this->productPath}/{$multiCat[0]}/{$this->series}'>{$this->series}</a>";
			$this->canonical .= "/{$this->series}";
		}
		if(!$this->isSeries){
			$this->breadcrumb .= " > <a href='/{$this->productPath}/{$multiCat[0]}/{$this->series}/{$this->pn}''>{$this->pn}</a>";
			$this->canonical .= "/{$this->pn}";
		}
			$this->canonical .= "'/>";
			$this->canonical = str_replace('//','/',$this->canonical);
			$this->breadcrumb = str_replace('//','/',$this->breadcrumb);
			$this->breadcrumb = str_replace('> > > ','> > ',$this->breadcrumb);

		//file_put_contents("clog.txt", $this->lang . $this->pn  . $this->series . $multiCat[0] .  "\n", FILE_APPEND);
	     if($this->isSeries == true AND basename($_SERVER['PHP_SELF']) != "family.php")
	    {header("HTTP/1.0 301 Moved Permanently"); header("Location: /{$this->productPath}/{$multiCat[0]}/{$this->series}"); exit();}

	     if($this->isSeries != true AND basename($_SERVER['PHP_SELF']) == "family.php")
	    {header("HTTP/1.0 301 Moved Permanently"); header("Location: /{$this->productPath}/{$multiCat[0]}/{$this->series}/{$this->pn}"); exit();}

		$sql = "SELECT  * FROM InFocus.producttext WHERE (`lang` = '{$this->lang}' OR `lang` = 'en') AND partnumber = '{$this->pn}'
				ORDER BY
						IF(producttext.`lang` = '{$this->lang}',1,
						IF(producttext.`lang` = 'en',2,3))";
		$result = mysqli_query($this->conn,$sql);
		while($row = mysqli_fetch_assoc($result))
		{
			if(empty($this->productTitle)) {$this->productTitle = $row['title'];}
			if(empty($this->productText)) {$this->productText = $row;}
		}

		if($this->productGroup == "Projector"){$productmeta = translate('Projector') . ",Beamer";}
		elseif($this->productGroup == "Display"){$productmeta = translate('Display') . ",Touch,Touchscreen";}
		else{$this->productmeta = '';}
		$whereStr = ' WHERE productpn IN(' . implode(",",$this->seriesModels) . ")  AND (accessorypn like 'SP-LAMP%' OR accessorypn like 'LENS%')";
		$result = mysqli_query($this->conn,'SELECT accessorypn FROM(SELECT accessorypn FROM acc_matrix ' . $whereStr . ') as groupacc GROUP BY accessorypn' );
		if($result != null){
			while($row = mysqli_fetch_array($result))
		{
		$this->productmeta .= ",".$row[0];
		}
		}
		$this->productmeta .= ",{$this->productCategory},{$this->productText['productmeta']}";
		$this->productmeta = "<title>{$this->productTitle} | InFocus</title>
		<meta name='description' content='" . str_replace("'",'"', $this->productText['blurb']) . "'/>
		<meta name='keywords' content='{$this->productTitle},Infocus,{$this->productmeta}'/>";
		$this->productmeta = str_replace(",,",",",$this->productmeta);

	 }

	public function sList(){
		$slist = explode("</li>",$this->productText['list']);
		$newlist="";
		$slistcount = count($slist);
		$i=1;
		foreach($slist AS $listbullet){
		$newlist .= $listbullet;
		$i=$i+1;
		if($i>($slistcount/2)){
		$newlist .= "</ul><ul style='margin-left: 20px;'>";
		$i=-20;
		}
		}
		return $newlist;
	 }

	public function overview(){
		$sql = "SELECT `name`, tagline, `image`, `body` FROM productoverview WHERE `lang` = '{$this->lang}' AND (partnumber = '". $this->pn ."') ORDER BY `order`";
		$results = mysqli_query($this->conn,$sql);
		$overviewString;
		if(mysqli_num_rows($results)!=0){
			$this->productTabs .= '<li><a href="#overview" class="active">' . translate('Overview') . '</a></li>';
			$overviewString .= '
			<ul class="C10 alternateDivChildL2">';
			while($row = mysqli_fetch_array($results)){
			$overviewString .=  "<li>
			<div class='image-set cmsedit'>
			{$row['image']}
			</div>
			<div class='info cmsedit'>
			<h2 class='name'>{$row['name']}</h2>
			<strong class='tagline'>{$row['tagline']}</strong>
			{$row['body']}
			</div>
			</li>";
			}
			$overviewString .= '</ul>';
		}
		return $overviewString;
	 }

	public function priceBuyNow($model,$panel = false){
		if(strlen($this->modelPrice[$model])>0){$priceSection = "<small class='price'>";
				$infoLink = '<span class="infolink" title="' . translate('Manufacturer\'s Suggested Retail Price (MSRP) in US Dollars. Actual price may vary by dealer and country; consult your local Authorized InFocus Reseller for details.') . '"></span>';
	}
		else{$priceSection = "<small class='price' style='display:none;'>";}
		//if($this->lang == 'en'){$productLinks = unserialize(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/resources/misc/links"));}


		//if($productLinks[strtoupper($model)] != null){
			if($this->modelActive[$model] != 2){
				$modelLink = "https://InFocusDirect.com/".strtoupper($model);
				$infoLink = '<span class="infolink" title="Price displayed in US Dollars from InFocusDirect.com, may vary elsewhere, and is valid only in the US."></span>';
			}
			else{
			$modelLink ="";
			}
		//}
		//else{

			// if($this->productGroup != "Accessory" AND $this->productGroup != "Peripheral"){
			// switch($this->modelActive[$model]){
			// case 6:	case 3:
			// $this->modelActive[$model] = 3;
			// $this->productText['active'] = 3;
			// break;
			// case 0:	case 9:	break;
			// default:
			// $this->modelActive[$model] = 2;
			// $this->productText['active'] = 2;
			// }
			// }
			//elseif($this->modelActive[$model] != 2){$modelLink = 'http://infocusstore.com/s?defaultSearchTextValue=Search&searchKeywords=' . $model . '&Action=submit';}
			//}

			switch($this->modelActive[$model]){
			case 1:
			case 2:
			case 5:
			case 6:
			if(strlen($this->modelPrice[$model])>0){$priceSection .=  $this->modelPrice[$model] . '<span id="price" style="display:none">******</span>'; }
			$priceSection .=  $infoLink;
			break;
			case 4:
			$modelLink = "http://collaborate.infocus.com/{$model}";
			break;
			case 9:
			$modelLink = "http://outlet.infocus.com/s?defaultSearchTextValue=Search&searchKeywords={$model}+-lamp+-filter&Action=submit";
			break;
			}
			if($this->modelActive[$model] != 0 AND $this->modelActive[$model] != null){$gacode = "<a class='' onclick = 'ga(\"send\",\"event\",\"button\",\"click\",\"Buy Now\")' href='{{link}}'> " . translate('Buy Now') . " <span style='font-size:70%'> (US)</span> >></a>";}
			if($modelLink !=""){$priceSection .= str_replace("{{link}}", $modelLink, $gacode);}
				$priceSection .= "</small>";
				if($this->modelActive[$model] == 0 OR $this->modelActive[$model] == null){$priceSection .= "<small>Discontinued</small>";$gacode="";}
				$priceSection .= "<br><a href='{$model}' class='blue_btn' style='width:80%;'>" . translate('Learn More') . "</a>
			     </div>
			    </li>";

		if($panel){
			return $priceSection;
		}
			switch(strtolower($this->series)){
				case "bigtouch-series":
					$resellerloc = "?Bigtouch";	break;
				case "jtouch-series":
					$resellerloc = "?JTouch"; break;
				case "mondopad-series":
					$resellerloc = "?Mondopad";	break;
			}

		$gacode = "<a class='btn buy-now' onclick = 'ga(\"send\",\"event\",\"button\",\"click\",\"Buy Now\")' href='{{link}}'> " . translate('Buy Now') . " <span style='font-size:70%'> (US)</span> </a>";
		  $priceSection = '<div style="vertical-align:bottom;"><h1 class="mysqledit h2" id="pagetitle" style=""  >' . $this->productText['title'] . '</h1>';
		if($this->isSeries == false){$priceSection .= 'Part Number: ' . $this->pn;}
		$priceSection .= '</div><div class=""><ul class="action-links Col_child';

		if(in_array($this->productText['active'], array(1,5,6))){$priceSection .=  ' bnwp">';}
		else{$priceSection .=   '">';}
		if(in_array($this->productText['active'], array(1,2,5,6,7))){
			$priceSection .=   '<li><span class="cost mysqledit" id="price" style="font-size:160%;">';
			if(strlen($this->productText['active'])>0){$priceSection .= $this->modelPrice[$model] . $infoLink; }
		}
		$priceSection .= '</span>';
		//if(in_array($this->modelActive[$model], array(2,7))){$priceSection .= '</span></li>';}
		if(in_array($this->productText['active'], array(1,5,6))){$priceSection .= str_replace("{{link}}", $modelLink, $gacode) . "</li>";}
		if(in_array($this->productText['active'], array(4))){$priceSection .= '      <li><a onclick = "ga('. "'send','event','button','click','Buy Now'" . ')" href="http://collaborate.infocus.com/' . $pn . '" class="btn learn-more">' . translate("Buy Now") . ' <span style="font-size:70%">(US)</span></a>';}
		if(in_array($this->productText['active'], array(9))){$priceSection .= '      <li><a href="http://outlet.infocus.com/s?defaultSearchTextValue=Search&searchKeywords=' . $pn . '+-lamp+-filter&Action=submit" class="btn learn-more">Available on Outlet Store</a>';}
		if(in_array($this->productText['active'], array(0,null))){$priceSection .= '      <li>Discontinued';}
		$priceSection .= '</li>';

		if(in_array($this->productText['active'], array(2,3,6))){$bclass='btn ';}
		$getaQuote = "<a class='$bclass form-box' style='display:block' href='/resources/forms/getaquote'>" . translate("Get a Quote") . '</a>';
		$resellerLoc = "<a class='$bclass ' href='/reseller-locator{$resellerloc}'>" . translate("Find a Reseller"). '</a>';
		$requestDemo = "<a class='$bclass form-box cboxElement' href='/resources/forms/mpdemo'>" . translate("Request a Demo") . '</a>';
		if($this->productGroup != "Display" ){$getaQuote="";}
		switch($this->productText['active']){
		case 1:
		$this->justButtons = "<li>{$getaQuote}</li><li>{$resellerLoc}</li>";
		$priceSection .= "<li>{$getaQuote}{$resellerLoc}</li>";
		break;
		case 6:
		$this->justButtons =  "<li>{$resellerLoc}</li><li>{$requestDemo}</li>";
		$priceSection .=  "<li>{$resellerLoc}{$requestDemo}</li>";
		break;
		case 3:
		$this->justButtons =  "<li>{$getaQuote}</li><li>{$resellerLoc}</li><li>{$requestDemo}</li>";
		$priceSection .=  $this->justButtons;
		break;
		case 2: case 4: case 7:
		$this->justButtons =  "<li>{$getaQuote}</li><li>{$resellerLoc}</li>";
		$priceSection .=  $this->justButtons;
		break;
		case 8:
		$this->justButtons =  "<li><a class='btn' href='#overview'>" . translate("Download") . '</a></li>';
		$priceSection .=  $this->justButtons;
		}
		$priceSection .=  "</ul></div>";
		$this->justButtons = str_replace("class=' ","class='btn ",$this->justButtons);
		return $priceSection;
	 }

	public function models(){
		$this->productTabs .= '<li id="modid"><a href="#models" class="active ' . $this->productGroup . '">' .  translate('Models') . '</a></li>';
		$seriesPanels;
		$totalCount = COUNT($this->seriesModels);
		$minusCount = array_count_values($this->modelActive);
		if(($totalCount-$minusCount[0]-$minusCount[null])>8 AND $this->productGroup == "Display"){

		$sql = "SELECT * FROM panel_features";
		$panelfeatures = mysqli_query($this->conn,$sql);
		while($row = mysqli_fetch_assoc($panelfeatures))
		{
			$panelfeat[$row['partnumber']]=$row;
		}
		$seriesPanels = '<div class="tableWrap">
	<div class="C3_tag">
		<div class="navWrap">
			<h4 class="checkCon">JTouch Models</h4>
			<small style="position: relative;top: -1em;">Narrow your search</small>
			<div class="checkCon tags-container tagsort-tags-container"></div>
		</div>
	</div>
	<div class="C8_tag">
		<div class="infocusTable">
		<table class="rwd-table-large">
			<thead>
				<tr>
					<th>Size</th>
					<th>Part #</th>
					<th>Features</th>
					<th>Availability</th>
					<th>Price (US)</th>
					<th>Learn / Buy</th>
				</tr>
			</thead>
			<tbody>';
		foreach($this->seriesModels as $model){
			if($this->modelActive[$model] != 0 OR $this->productText['active'] == 0){
			$seriesPanels .=   "
			<tr class=\"item\" data-item-id=\"1\" data-item-tags=\"{$panelfeat[$model]['categories']}\">
<td data-label='Size'>{$panelfeat[$model]['size']}</td>
<td data-label='Part #'><a href='$model'>$model</a></td>
<td data-label='Features'>{$panelfeat[$model]['features']}</td>
<td data-label='Availability'>{$panelfeat[$model]['availability']}</td>
		<td data-label='Price US'>" . $this->modelPrice[$model] . "<span class='infolink' title='Price displayed in US Dollars from InFocusDirect.com, may vary elsewhere, and is valid only in the US.'></span></td>
<td class='buyLearn' data-label='Buy/Learn'><a href='$model' class='table_button'>Learn More</a>";
if(in_array($this->modelActive[$model],array(1,4,5,7,9))){$seriesPanels .=   "<a class='buyNow table_button' href='https://infocusdirect.com/$model'>Buy Now</a>";}
$seriesPanels .=   "</td>
</tr>";
			}
		}
		$seriesPanels .= "</table></div></div>";
		}
		else{
		foreach($this->seriesModels as $model){
			if($this->modelActive[$model] != 0 OR $this->productText['active'] == 0){
				$thumb = imagethumb($model,'135');
				$displayModel = $model;
				$specList = str_replace('<ul>','<ul class="spec-list">', $this->modelsDiff[$model]);

		//				$seriesPanels .= "<li><section class='stretch-wrap33'><a href='$this->series/{$model}'><img style='margin:0 auto;' src='{$thumb}'></a></section>
		//					<div><a href='$this->series/{$model}'><h6 class='title'>{$displayModel}</h6></a>
		//				      {$specList}";
				$seriesPanels .= "<li>
					<div><a href='$this->series/{$model}'><h6 class='title'>{$displayModel}</h6></a>
				      {$specList}";
				$seriesPanels .= $this->priceBuyNow($model,true);
			}
		}
		}

		return $seriesPanels;
	 }

	public function specs(){

		switch($this->productGroup){

		case Projector:
			$sql = "SELECT partnumber FROM projectors GROUP BY partnumber";
			break;
		case Display:
			$sql = "SELECT partnumber FROM displays GROUP BY partnumber";
			break;
		case Accessory:

			break;
		case Peripheral:

			break;


			break;
		}

		if($this->isSeries){
			$count = 0;
			foreach($this->seriesModels as $model){
				if(($this->productText['active'] != 0 AND $this->modelActive[$model] != 0) OR $this->productText['active'] == 0){
					$models .= $model . ",";
					$count++;
				}
			}
			$models = rtrim($models,",");
			if($count == 0){
				$count = 1;
				$models = $this->pn;
			}
		}
		else{$models = $this->pn;}
		$count = 495 + (215*$count);
		if($count>1490)($count=1490);

		if(!empty($sql)){
		$results = mysqli_query($this->conn,$sql);
		if(mysqli_num_rows($results)!=0){
		$specCompare = "<input id='modlist' style='display:none;' value='{$models}' ><br/>
				<div class='ui-widget' style='padding-bottom:30px;'>
		" . translate('Compare with other products') . "<br>
				<select id='combobox' style='height:90px;'>
				<option value=' ' selected></option>
				";
		$results = mysqli_query($this->conn,$sql);
		while($row = mysqli_fetch_array($results)){$specCompare .= "<option value=',{$row['partnumber']}'>{$row['partnumber']}</option>";}
		$specCompare .= "
		</select><INPUT type='button' id='btn' class='formbutton' style='display:inline;margin-right:10px;' value='+' onclick=' updateSpecs(document.getElementById(" . '"combobox"' . ').value,"' . strtolower($this->productGroup) . 'specs.php"' . ");'  /><br>
		</div>		";
		}}
		$postdata = http_build_query(array('pn' => $models,'lang' => $this->lang));
		$opts = array('http' => array('method'  => 'POST','header'  => 'Content-type: application/x-www-form-urlencoded','content' => $postdata));
		$context  = stream_context_create($opts);
		$specsTable = file_get_contents("http://" . $_SERVER['HTTP_HOST'] . "/resources/php/" . strtolower($this->productGroup) . "specs.php",false,$context);
		if(strlen($specsTable) >12){
		$this->productTabs .= '<li><a href="#specs">' . translate('Specifications') . '</a></li>';
		$specsTable = "$specCompare<div id='specFrame' style='width:{$count}px'>
		" . $specsTable . '</div>';

		return $specsTable;
		}
	 }

	public function videos(){
		$sql = 'SELECT Summary, title, body, vidid, about, industry FROM videos WHERE lang = "'.$this->lang.'" AND';
		if($this->isSeries){
			$sql .= ' about LIKE "%' . rtrim($this->series,"-Series") . '%" OR ';
			$sql .= ' about LIKE "%' . implode('%" OR about LIKE "%',$this->seriesModels) . '%"';
		}
		else{
			$sql .= ' about LIKE "%' . $this->pn . '%" ';
		}
		$sql .= ' ORDER BY rank , postdate DESC ';
		$result = mysqli_query($this->conn,$sql);
		if($result === false){error_log($sql);}
		if(mysqli_num_rows($result)>0){
		$this->productTabs .= '<li id="vidsection"><a href="#videos">' . translate('Videos') . '</a></li>';
		$x=0;
		$videoHTML .= '<div id="videos" class="videos">
			<a id="vidtop"></a>';
		while($row = mysqli_fetch_assoc($result))
		{
		 if($x==0){
		$videoHTML .= "<div class='video' style='padding-bottom:30px'>
		          <h3 id='videoheader'>{$row['title']}</h3>
		   <p id='videosummary'>{$row['Summary']}</p>
		   <iframe id='main-video' src='//www.youtube.com/embed/{$row['vidid']}?vq=hd720&rel=0&modestbranding=1' style='width:100%;height:600px' frameborder='0' allowfullscreen ></iframe></div>";
		   $allvid = "<div  >
		    <ul class='resultsList'>";
		 $x=1;
		 }
		  $allvid .=  "     <li style='height:400px;' class='{$row['industry']}'><div class='cover";
		  if($x==1){$allvid .=  ' nowplaying';$x=2;$y=2;}
		  $allvid .= "'><img src='http://img.youtube.com/vi/{$row['vidid']}/mqdefault.jpg' style='width:100%;height:auto'  onclick='openVid(" . '"' . $row['vidid'] . '"' . ");'/></div>
		  <div class='about'>
		   <strong class='abouthead'><a href='/videos?{$row['vidid']}'>{$row['title']}</a></strong>
		   <p class='aboutsumm'>{$row['Summary']}</p>
		  </div>
		 </li>";
		 $x=2;
		}
		$allvid .= "</ul></div>";
		$videoHTML .= $allvid;
		$videoHTML .= "<script>
		$( document ).ready(function() {
		$('#dropdowninput').change(function(){
		  $(this).blur();
		});
		});
		 $('.cover img').click(function(){
		  var nextElem;
		  nextElem = $(this).parent().next().find('.abouthead').first();
		document.getElementById('videoheader').innerHTML = nextElem.text();
		  nextElem = $(this).parent().next().find('.aboutsumm').first();
		document.getElementById('videosummary').innerHTML = nextElem.text();
		$('#' + $(this).parent().parent().parent().parent().parent().attr('id') + ' div').removeClass('nowplaying');
		$(this).parent().addClass('nowplaying');
		    });
		function openVid(vid){
		document.getElementById('main-video').setAttribute('src','//www.youtube.com/embed/' + vid + '?vq=hd720&rel=0&autoplay=1');
		$('html, body').animate({
		           'scrollTop':   $('#vidtop').offset().top-20
		         }, 2000);
		}
		</script></div>
		";
		   }
			return $videoHTML;
	 }

	public function thumbnails(){
		$allthumbs = '<div style="text-align:right;margin-top:15px;height:80px;padding-right:140px">';
		//<!--Alternate product images labled -Back, -Side, and -Top-->
		$picSeries = str_replace("-Series","",$this->series);
		if(!empty($this->productText['additionalimages'])){
		$additionalimages = $this->productText['additionalimages'];
		if(substr($additionalimages,-1)==";"){$additionalimages = substr($additionalimages,0,-1);}
		$additionalimages = explode(";", $additionalimages);
		foreach($additionalimages AS $image){
		$image = explode(",", $image);
		if(file_exists($_SERVER['DOCUMENT_ROOT']  . "/resources/images/" . $image[0] )){
		$allthumbs .=  '<a class="group1" href="' . imagethumb($image[0] ,'800') . '" title="' . $image[1] . '"><img class="thumb" src="' . imagethumb($image[0] ,null,'70'). '" alt="' . $image[1] . '" onerror="$(this).hide()"></a>';
		}
		}
		}
		$standardpics = array("-Back.jpg","-Front.jpg","-Side.jpg","-Top.jpg","-Right.jpg","-Left.jpg","-Bottom.jpg");
		foreach($standardpics AS $imgend){
		if(file_exists($_SERVER['DOCUMENT_ROOT'] . "/resources/images/InFocus-" . strtoupper($this->pn) . $imgend )){
		$allthumbs .=   '<a class="group1" href="' . imagethumb("InFocus-" . strtoupper($this->pn) . $imgend,'800') . '" title="InFocus ' . strtoupper($this->pn) . ' (' . substr($imgend,1,-4) .')"><img class="thumb" src="' . imagethumb("InFocus-" . strtoupper($this->pn) . $imgend,'','70') . '"></a>
		';
		}
		elseif(file_exists($_SERVER['DOCUMENT_ROOT'] . "/resources/images/InFocus-" . $picSeries . $imgend )){
		$allthumbs .=   '<a class="group1" href="' . imagethumb("InFocus-" . $picSeries . $imgend,'800') . '" title="InFocus ' . $picSeries . ' (' . substr($imgend,1,-4) .')"><img class="thumb" src="' . imagethumb("InFocus-" . $picSeries . $imgend,'','70') . '"></a>
		';
		}
		}
		$allthumbs .=   '</div>';
		return $allthumbs;
	 }

	public function accessories(){
		if($this->productGroup == "Accessory"){return;}
		$sql = 'SELECT title, acc_matrix.accessorypn, producttext.partnumber, acc_matrix.rank, producttext.productgroup
		FROM acc_matrix LEFT JOIN producttext ON (producttext.partnumber = acc_matrix.accessorypn) WHERE producttext.lang = "'. $this->lang . '" AND acc_matrix.productpn = "' . $this->pn . '" ORDER BY acc_matrix.rank, acc_matrix.accessorypn';
		return $this->subProdList("Accessories",$sql);
	 }

	public function worksWith(){
		if($this->productGroup == "Display" OR $this->productGroup == "Projector"){return;}
		$sql = 'SELECT title, acc_matrix.productpn, producttext.partnumber, acc_matrix.rank, producttext.productgroup FROM acc_matrix LEFT JOIN producttext ON (producttext.partnumber = acc_matrix.productpn) WHERE producttext.lang = "'. $this->lang . '" AND acc_matrix.accessorypn = "' . $this->pn . '" ORDER BY acc_matrix.rank, acc_matrix.productpn';
		return $this->subProdList("Works With",$sql);
	 }

	public function subProdList($type,$sql){
		$result = mysqli_query($this->conn,$sql);
	 	if(mysqli_num_rows($result) ==0){return;}
		$this->productTabs .= "<li id='" . strtolower(str_replace(" ","",$type)) . "section'><a href='#" . strtolower(str_replace(" ","",$type)) . "'>" . translate($type) . "</a></li>";
		$sectionText = '<ul class="C10 resultsList" style="padding-top:4em;">';
		 while($row = mysqli_fetch_array($result))
		 {
			 if($row[4]=="Accessory"){$row[4] = "accessorie";}
		 $sectionText .= '<li>
	     <a href="/' . strtolower($row[4]) . "s/" . strtoupper($row[1]) . '">
	      <section class="stretch-wrap60"><div class="image-set" style="margin:auto;"><img src="' . imagethumb(strtoupper($row[1]),null,'220') . '"></div></section>
	      <h6>' . $row[0] . '</h6>
	     </a></li>';
		 }
		$sectionText .= '</ul>';
		return $sectionText;
	 }

	public function downloads(){
		$languagelist = array('AA'  => 'Afár af','AF'  => 'Afrikaans','AK'  => 'Akan','AM'  => 'ኣማርኛ (amarəñña)','AN'  => 'Fabla / l\'Aragonés','AR'  => '(al arabiya) العربية','AS'  => 'অসমীয়া (asamīẏa)','AY'  => 'Aymar aru','AZ'  => 'Azərbaycan dili / Азәрбајҹан дили / آذربايجانجا ديلي','BA'  => 'башҡорт теле (bašḵort tele)','BE'  => 'Беларуская мова (Bielaruskaja mova)','BG'  => 'български (bãlgarski) български език (bãlgarski ezik)','BM'  => 'Bamanankan','BN'  => 'বাংলা (baɛṅlā)','BO'  => 'བོད་སྐད་ (pö-gay)','BR'  => 'Ar brezhoneg / brezhoneg','BS'  => 'Bosanski / босански / بۉسانسقى','CE'  => 'Нохчийн мотт (Noxchiin mott)','CH'  => '中文 (zhōngwén)','CO'  => 'Aorsu','CR'  => 'ᓀᐦᐃᔭᐍᐏᐣ (Nēhiyawēwin) ᓀᐦᐃᔭᐤ (Nēhiyaw)','CS'  => 'čeština / český jazyk','CY'  => 'Cymraeg / Y Gymraeg','DA'  => 'Dansk','DE'  => 'Deutsch','EE'  => 'Eʋegbe','EO'  => 'Esperanto','ET'  => 'Eesti keel','EU'  => 'Europe English','FA'  => '(fārsī) فارسى','FI'  => 'Suomi / suomen kieli','FJ'  => 'Vakaviti','FO'  => 'Føroyskt','FR'  => 'Français','GL'  => 'Galego','GN'  => 'Avañe\'ẽ','GU'  => 'ગુજરાતી (gujarātī)','GV'  => 'Gaelg/Gailck (Vanninagh) / Yn Ghaelg / Y Ghailck','HA'  => '(ḥawsa) حَوْسَ','HE'  => '(ivrit) עברית / עִבְרִית','HI'  => 'हिन्दी (hindī)','HR'  => 'Hrvatski','HU'  => 'Magyar / magyar nyelv','HY'  => 'Հայերէն (Hayeren)','HZ'  => 'Otjiherero','ID'  => 'Bahasa Indonesia','IG'  => 'Igbo','IS'  => 'Íslenska','IT'  => 'Italiano ','IU'  => 'ᐃᓄᒃᑎᑐᑦ (inuktitut)','JA'  => '日本語 (nihongo)','JV'  => 'Basa Jawa','KA'  => 'ქართული (kʻartʻuli) ქართული ენა (kʻartʻuli ena)','KG'  => 'Kikongo','KK'  => 'Қазақ тілі / Qazaq tili / قازاق ٴتىلى','KN'  => 'ಕನ್ನಡ (kannaḍa)','KO'  => '한국어 [韓國語] (han-guk-eo)','KR'  => 'Kanuri','KS'  => 'कॉशुर / كٲشُر','KU'  => 'Kurdí / کوردی / к’öрди','KV'  => 'коми кыв (komi kyv)','KW'  => 'Kernewek / Kernowek / Kernuak / Curnoack','LA'  => 'Espanol Latina','LG'  => 'LùGáànda','LN'  => 'lingála','LO'  => 'ພາສາລາວ (pháasaa láo)','LT'  => 'Lietuvių kalba','LV'  => 'Latviešu valoda','MG'  => 'Fiteny Malagasy','MH'  => 'Kajin M̧ajeļ / Kajin Majōl','MK'  => 'македонски (Makedonski) македонски јазик (makedonski jazik)','ML'  => 'മലയാളം (malayāḷam)','MN'  => 'монгол (mongol) монгол хэл (mongol hêl)','MR'  => 'मराठी (marāṭhī)','MS'  => 'Bahasa melayu','MT'  => 'Malti','MY'  => 'Bama saka','NA'  => 'Ekakairũ Naoero','NE'  => 'नेपाली (nēpālī)','NO'  => 'Norsk','OM'  => 'Afaan Oromo','OR'  => 'ଓଡ଼ିଆ (ōṛiyā)','PI'  => 'पालि (pāli)','PL'  => 'Polski / język polski / polszczyzna','PT'  => 'Português','QU'  => 'Qhichwa','RM'  => 'Rumantsch','RU'  => 'Русский язык (Russkij jazyk)','RW'  => 'Ikinyarwanda','SA'  => 'संस्कृतम् (saṃskṛtam) संस्कृता भाषा (saṃskṛtā bhāṣā)','SC'  => 'Limba Sarda / sardu','SD'  => '(sindhī) سنڌي','SG'  => 'Yângâ tî Sängö','SK'  => 'Slovenčina','SL'  => 'Slovenščina','SM'  => 'Gagana Samoa','SN'  => 'ChiShona','SO'  => 'Af Soomaali','SQ'  => 'Shqip / gjuha shqipe','SQ'  => 'Shqip / gjuha shqipe','SR'  => 'Cрпски (srpski) српски језик (srpski jezik)','SS'  => 'SiSwati','SU'  => 'Basa Sunda','SV'  => 'Svenska','SW'  => 'Kiswahili','TA'  => 'தமிழ் (tamiḻ)','TE'  => 'తెలుగు (telugu)','TG'  => 'тоҷики / toçikī / تاجيكي','TH'  => 'ภาษาไทย (paasaa-tai)','TI'  => 'ትግርኛ (təgərəña)','TK'  => 'түркmенче (türkmençe) түркмен дили (türkmen dili)','TL'  => 'Tagalog','TN'  => 'Setswana','TR'  => 'Türkçe','TS'  => 'XiTsonga','TT'  => 'татарча / tatar tele / تاتارچا (tatarça)','TW'  => 'Twi','TY'  => 'Te reo tahiti / te reo Māʼohi','UK'  => 'Українська (Ukrajins\'ka)','UR'  => '(urdū) اردو','UZ'  => 'أۇزبېك ﺗﻴﻠی o\'zbek tili ўзбек тили (o‘zbek tili)','VE'  => 'TshiVenḓa','VI'  => 'Tiếng việt (㗂越)','VT'  => 'Tiếng việt (㗂越)','WA'  => 'Talon','WO'  => 'Wollof','XH'  => 'IsiXhosa','YI'  => '(Yidish) ײִדיש','YO'  => 'Yorùbá','ZH'  => '中文 (zhōngwén)','ZU'  => 'IsiZulu','EN'  => 'English','ES'  => 'Español','SP'  => 'Español','NL'  => 'Nederlands','ZHS'  => '中文 (zhōngwén)','ZHT'  => '中文 (zhōngwén)');

		$dlTable;
		if($this->isSeries){
		$sql = 'SELECT Downloadstmp.filename, Downloadstmp.lang, if(DownloadTrans.description is null,Downloadstmp.description,DownloadTrans.description) AS description, filelocation, relatedproducts, extension, if(DownloadTrans.category is null,Downloadstmp.category,DownloadTrans.category) AS category, if(rank is null,999,rank) AS rank, if(DownloadTrans.title is null,Downloadstmp.title,DownloadTrans.title) AS title  FROM Downloadstmp LEFT JOIN (SELECT * FROM DownloadTrans WHERE lang = "' .$this->lang . '") AS DownloadTrans ON DownloadTrans.filename = Downloadstmp.filename
		WHERE (Downloadstmp.filename LIKE "%Datasheet%" OR Downloadstmp.category = "Datasheets" OR Downloadstmp.category = "Success Stories") AND (relatedproducts LIKE "%' . implode(';%" OR relatedproducts LIKE "%', $this->seriesModels) . ';%") ORDER BY rank,title,description';
		}
		else{
		$sql = 'SELECT Downloadstmp.filename, Downloadstmp.lang, if(DownloadTrans.description is null,Downloadstmp.description,DownloadTrans.description) AS description, filelocation, relatedproducts, extension, if(DownloadTrans.category is null,Downloadstmp.category,DownloadTrans.category) AS category, if(rank is null,999,rank) AS rank, if(DownloadTrans.title is null,Downloadstmp.title,DownloadTrans.title) AS title  FROM Downloadstmp LEFT JOIN (SELECT * FROM DownloadTrans WHERE lang = "' .$this->lang . '") AS DownloadTrans ON DownloadTrans.filename = Downloadstmp.filename WHERE relatedproducts like "%' . $this->pn . ';%" ORDER BY rank,title,description';
		}

		$result = mysqli_query($this->conn,$sql);

		$dlRows;
		if(mysqli_num_rows ($result) ==0){return;}

		if($this->isSeries){
			$this->productTabs .= "<li><a href='#datasheets'>" . translate('Datasheets') . "</a></li>";
		}
		else{
			$this->productTabs .= "<li><a href='#downloads'>" . translate('Downloads') . "</a></li>";
		}
		while($row = mysqli_fetch_array($result))
		{
			$languages = explode(",",$row[1]);
			if(in_array(strtoupper($lang),$languages) AND $lang != "en"){$filename =  $row[0] . '-' . strtoupper($lang);}
			else{$filename = $row[0];}
			if($row[8] == null){$dTitle = $row[0];}
			else{$dTitle = $row[8];}
			$dlRows[$row['category']][] = '<tr class="' . $row['category'] . '"><td><img  src="/resources/images/'.$row[5].'icon" style="width:45px;" /></td><td><a onclick = "ga('. "'send','event','Link','click','" . $row[0] . "'" . ')" href="' . $row[3] . $filename . '.' . $row[5] . '"><span class="title">' . translate($dTitle) . '</span><br><span class="description">' . translate($row[2]) . '</span></a></td><td><ul class="langlist" >
			<li>'.translate('Choose Language').'<ul>';
			foreach($languages as $language){

			if($language == "EN"){$dlRows[$row['category']][COUNT($dlRows[$row['category']])-1] .= '<li><a onclick = "ga('. "'send','event','Link','click','" . $row[0] . "'" .  ')" href="' . $row[3] . $row[0] . "." . $row[5] . '"' .">" . $languagelist[$language] . "</a></li>";}
			elseif($languagelist[$language] == null){$dlRows[$row['category']][COUNT($dlRows[$row['category']])-1] .= '<li><a onclick = "ga('. "'send','event','Link','click','" . $row[0] . "-$language'" .  ')" href="' . $row[3] . $row[0] . "-$language." . $row[5] . '"' .">$language</a></li>";}
			else{$dlRows[$row['category']][COUNT($dlRows[$row['category']])-1] .= '<li><a onclick = "ga('. "'send','event','Link','click','" . $row[0] . "-$language'" .  ')" href="' . $row[3] . $row[0] . "-$language." . $row[5] . '"' .">" . $languagelist[$language] . "</a></li>";}
			}
			$dlRows[$row['category']][COUNT($dlRows[$row['category']])-1] .= "</ul></ul></td></tr>";
		}
		$dtHead = '<div class="rounded" style="margin:auto;max-width:960px;"><table><thead><tr class="HeaderRow"><th style="width:45px">' . translate('Type') . '</th><th>' . translate('File name & Description') . '</th><th style="width: 160px;">' . translate('Language') . '</th></tr></thead><tbody>';
		$dtFoot = 			'</tbody>
		</table></div>';
		$dlSetCat = array("Datasheets","Success Stories","User Guides","Firmware");
		foreach($dlSetCat AS $dlCat){
			if(COUNT($dlRows[$dlCat])>0){
				$dlTable .= "<h2 style='margin-top:40px;text-align:center;'>$dlCat</h2>";
				$dlTable .= $dtHead;
				foreach($dlRows[$dlCat] as $row){
					$dlTable .= $row;
				}
				$dlTable .= $dtFoot;
			}
		}
		$othercat=array();
		foreach($dlRows as $key=>$row){
			if(!in_array($key,$dlSetCat) AND !in_array($key,$othercat) AND $key != ''){
				$othercat[]=$key;
			}
		}
		foreach($othercat as $value){
			if(COUNT($dlRows[$value])>0){
				$dlTable .= "<h2 style='margin-top:40px;text-align:center;'>$value</h2>";
				$dlTable .= $dtHead;
				foreach($dlRows[$value] as $row){
					$dlTable .= $row;
				}
				$dlTable .= $dtFoot;
			}
		}
		if(COUNT($dlRows[''])>0){
			$dlTable .= "<h2 style='margin-top:40px;text-align:center;'>Other</h2>";
			$dlTable .= $dtHead;
			foreach($dlRows[''] as $row){
				$dlTable .= $row;
			}
			$dlTable .= $dtFoot;
		}
		return $dlTable;
		}

	public function reviews(){

		$postdata = http_build_query(array('category' => "review",'lang' => $this->lang, 'limit' => "0,50", 'datestart' => "2020-01-01", 'model' => $this->pn));
		$opts = array('http' => array('method'  => 'POST','header'  => 'Content-type: application/x-www-form-urlencoded','content' => $postdata));
		$context  = stream_context_create($opts);
		$reviews = file_get_contents("http://" . $_SERVER['HTTP_HOST'] . "/resources/php/fetcharticles.php",false,$context);
		if(strlen($reviews) >12){
		$this->productTabs .= '<li><a href="#revsection">' . translate('Reviews') . '</a></li>';
		$reviews = "<div id='revsection'><ul id='eventarticles' class='col-r news-list'>
			$reviews</ul></div>";
		return $reviews;
		}
}

}
?>
