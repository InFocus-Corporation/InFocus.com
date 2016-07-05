
<?php
$localdir = dirname(__FILE__);
$homedir = $_SERVER['DOCUMENT_ROOT']; 
require_once($homedir . "/resources/php/imageprocess.php"); 
require($_SERVER['DOCUMENT_ROOT'] . "/resources/php/connections.php");
mysqli_set_charset($connection, "utf8");
ini_set('default_charset', 'utf-8');

if(substr($_SERVER['SERVER_NAME'], -2)=="de"){
$lang = "de";
}
else{
$lang = "en";
} 


$sql = "SELECT keygroup, transtext FROM (SELECT transkey as keygroup FROM InFocus.labeltranslation GROUP BY transkey) as KeyList LEFT JOIN (SELECT transkey, transtext FROM InFocus.labeltranslation where labeltranslation.lang = '" . $lang . "') as labeltrans ON keygroup = transkey;";
$results = mysqli_query($connection,$sql);

while($row = mysqli_fetch_array($results)){

if($row[1] == null){$translate[$row[0]] = $row[0];}
else{$translate[$row[0]] = $row[1];}

}

function translate($key){
global $translate;

if($translate[$key] == NULL){return $key;}
else{return $translate[$key];}
}

$homedir=$_SERVER['DOCUMENT_ROOT']; 
				$partnumbers = str_replace(" ","",$_REQUEST['pn']);
				$partnumbers = explode(",",$partnumbers);
				$colnum = count($partnumbers);
				//echo '<div class="rounded" >';
				echo '<table class="square" style="width:100%"><thead>';
				$partnumbers = implode("' OR partnumber LIKE '",$partnumbers);
			
				
				echo PrintVerticalTable("projectors",array("ALL"),"SELECT 
				partnumber AS ' ',
				partnumber AS '  ',
				nativeaspect AS 'Native Aspect Ratio', 
				Technology, 
				CONCAT(`resolutionname`,'(',resolution,')') as 'Resolution', 
				CONCAT(`lumenslow`,'/',lumenshigh) AS 'Lumens (Eco/High)', 
				Contrast, 
				3d AS '3D', 
				closecap AS 'Closed Captioning', 
				Speakers, 
				CONCAT(`Noiselow`,'/',NoiseHigh) AS 'Audible Noise (Eco/High, dBA)', 
				Keystone, 
				lamppn AS `Lamp`,
				CONCAT(`lamphigh`,'/',lamplow) AS `Lamp Hours (Eco/High)`, 
				Connections, 
				offset AS 'Image Offset', 
				otherspecs AS 'Lens Shift: Horz (min/max)',
				otherspecs AS 'Lens Shift: Vert (min/max)',
				CONCAT(`throwh`,'~',throwl) AS `Throw Ratio`, 
				CONCAT('1:',TRUNCATE( `throwh`/throwl, 3)) AS `Zoom Ratio`,
				CONCAT(`weight`,'/',ROUND(`weight`/2.2,1)) as 'Weight(lbs/kg)',
				`dimensions` as 'Product Dimensions HxWxD',
				CONCAT(`shipweight`,'/',ROUND(`shipweight`/2.2,1)) as 'Shipping Weight(lbs/kg)',
				`shipdimensions` as 'Shipping Dimensions HxWxD',
				otherspecs AS 'Power consumption (Max, Watts)',
				prodwarranty AS 'Product Warranty',
				lampwarranty AS 'Lamp Warranty',
				accwarranty AS 'Accessory Warranty',
				otherspecs AS 'Approvals'
				FROM (SELECT * from InFocus.projectors WHERE lang = '" . $lang . "' AND (partnumber LIKE '" . $partnumbers ."') UNION ALL 
SELECT * from InFocus.projectors WHERE partnumber NOT IN (
SELECT partnumber FROM InFocus.projectors WHERE lang = '" . $lang . "' AND (partnumber LIKE '" . $partnumbers ."')) 
AND lang = 'en' 
AND (partnumber LIKE '" . $partnumbers ."')) as selectprojectors","false");


function transpose($array) {
$transposed_array = array();
if ($array) {
foreach ($array as $row_key => $row) {
if (is_array($row) && !empty($row)) { //check to see if there is a second dimension
foreach ($row as $column_key => $element) {
$transposed_array[$column_key][$row_key] = $element;
}
}
else {
$transposed_array[0][$row_key] = $row;
}
}
return $transposed_array;
}
}

function PrintVerticalTable($tname, $colnames, $SQLst = 'false', $IncHeader = 'true', $SelectDB = 'InFocus')
{
/* connect to the db */

global $homedir;
global $partnumbers;
global $connection;
global $translate;
/* show tables */
//$result = mysqli_query($connection,'SHOW TABLES') or die(AlertAdmin(mysqli_error($connection),$sql));

$arrlength=count($colnames);

	$table = $tname;


	$result2 = mysqli_query($connection,$SQLst) ;


		if ($colnames[0]=='ALL')
		{
			$i = 0;
			if (mysqli_fetch_field_direct($result2, $i)->name=='rownumber'){$i++;}
			$colnames[0]=mysqli_fetch_field_direct($result2, $i)->name;
			$i++;
			while ($i < mysqli_num_fields($result2)) 
			{
			$colnames[$i]=mysqli_fetch_field_direct($result2, $i)->name;
			$i++;
			}
		}

		$arrlength=count($colnames);

	while($row = mysqli_fetch_array($result2))
	{
				$allRow[] = $row;
	}
	
		$rowNum=count($allRow);
		if($rowNum == 0){echo "No Specifications Found";die();}
		$row=transpose($allRow);
			$x=0;
			
			
				$rresult .= '<tr><th style="text-align:right;width:145px">' . $colnames[$x] . '</th>';
			
			for($i=0;$i<$rowNum;$i++)
			{
			$rresult .= '<th style="text-align:center;width:50px !important;">' . $row[$x][$i] . '<img src="/resources/images/Close.png" onclick="removeSpecs(' . "'," . $row[$x][$i] . "', 'speccompare.php')" . '" Width="20px" style="float:right"/></th>';
			}
				$rresult .= '</tr>';
			
				$rresult .= '</thead><tbody><tr>';

			$x=1;
			
				$rresult .= '<tr><td style="text-align:right">' . translate($colnames[$x]) . '</td>';
			for($i=0;$i<$rowNum;$i++)
			{

					$pn=$row[$x][$i];

				
				
					$rresult .= '<td  style="width:50px;"><img src="' . imagethumb(strtoupper($pn),'150',null,null,null,"{.png,-Hero.png,-Front.png,-Right.png,.*}") . '" alt="' . $pn . '"/></td>';


				}
				$rresult .= '</tr>'; 
			

			for($x=2;$x<$arrlength;$x++)
			{
				$rresult .= '<tr><td style="text-align:right">' . translate($colnames[$x]) . '</td>';
			for($i=0;$i<$rowNum;$i++)
			{
				if($colnames[$x] == "Approvals"){
				$holder = explode(";",$row[$x][$i]);
				
					foreach($holder as $otherSpec){
					
					$otherSpec = explode("[",$otherSpec);
					
					$otherSpecs[$otherSpec[0]] = substr($otherSpec[1],0,-1);
					
					}

					$rresult .= '<td >' . $otherSpecs['Approvals'] . '</td>';
				}
				elseif($colnames[$x] == "Power consumption (Max, Watts)"){
				$holder = explode(";",$row[$x][$i]);
				
					foreach($holder as $otherSpec){
					
					$otherSpec = explode("[",$otherSpec);
					
					$otherSpecs[$otherSpec[0]] = substr($otherSpec[1],0,-1);
					
					}

					$rresult .= '<td >' . $otherSpecs['Power consumption (Max, Watts)'] . '</td>';
				}
				elseif($colnames[$x] == "Lens Shift: Horz (min/max)"){
				$holder = explode(";",$row[$x][$i]);
				
					foreach($holder as $otherSpec){
					
					$otherSpec = explode("[",$otherSpec);
					
					$otherSpecs[$otherSpec[0]] = substr($otherSpec[1],0,-1);
					
					}
					if(strlen($otherSpecs['Lens Shift: Horz (min)'])>0)
					{$rresult .= '<td >' . str_replace("+/- ","",$otherSpecs['Lens Shift: Horz (min)']) . "/" . str_replace("+/- ","",$otherSpecs['Lens Shift: Horz (max)']) . '</td>';}
					else{$rresult .= '<td >None</td>';}
				}
				elseif($colnames[$x] == "Lens Shift: Vert (min/max)"){
				$holder = explode(";",$row[$x][$i]);
				
					foreach($holder as $otherSpec){
					
					$otherSpec = explode("[",$otherSpec);
					
					$otherSpecs[$otherSpec[0]] = substr($otherSpec[1],0,-1);
					
					}

					if(strlen($otherSpecs['Lens Shift: Horz (min)'])>0)
					{$rresult .= '<td >' . str_replace("+/- ","",$otherSpecs['Lens Shift: Vert (min)']) . "/" . str_replace("+/- ","",$otherSpecs['Lens Shift: Vert (max)']) . '</td>';}
					else{$rresult .= '<td >None</td>';}
					
				}
				elseif($colnames[$x] == "Product Warranty" AND strpos($row[$x][$i],"Year")>0){
					$rresult .= '<td >' . translate($row[$x][$i]) . '</td>';
				}
				else{
					$rresult .= '<td >' . $row[$x][$i] . '</td>';
				}
				}
				$rresult .= '</tr>';
			}
			$rresult .= '</table>';
	
		return $rresult;
}
[250];


				?>
						
