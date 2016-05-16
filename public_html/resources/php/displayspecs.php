
<?php
$localdir = dirname(__FILE__);
$homedir=$_SERVER['DOCUMENT_ROOT']; 
require_once($homedir . "/resources/php/imageprocess.php"); 
require($_SERVER['DOCUMENT_ROOT'] . "/resources/php/connections.php");

mysqli_set_charset($connection, "utf8");
ini_set('default_charset', 'utf-8');

if(substr($_SERVER['SERVER_NAME'], -2)=="de"){
    $lang = "de";
} else {
    $lang = "en";
}


$sql = "SELECT keygroup, transtext FROM (SELECT transkey as keygroup FROM InFocus.labeltranslation GROUP BY transkey) as KeyList LEFT JOIN (SELECT transkey, transtext FROM InFocus.labeltranslation where labeltranslation.lang = '" . $lang . "') as labeltrans ON keygroup = transkey;";
$results = mysqli_query($connection,$sql);

while($row = mysqli_fetch_array($results)){
    if($row[1] == null){$translate[$row[0]] = $row[0];}
    else{$translate[$row[0]] = $row[1];}
}

    $partnumbers = str_replace(" ","",$_REQUEST['pn']);
    $partnumbers = explode(",",$partnumbers);
    $colnum = count($partnumbers);
    echo '<div class="rounded" >';
    echo '<table><thead>';
    // echo '<tr><th style="width:50px !important;"></th>';
    
     // echo '<th style="text-align:center;width:50px !important;">' . $partnumbers[0] . '</th>';
    // for($x=1;$x<$colnum;$x++)
    // {
     // echo '<th style="text-align:center;width:50px !important;">' . $partnumbers[$colnum-$x-1] . '<img src="/resources/images/Close.png" onclick="removeSpecs(' . "'," . $partnumbers[$colnum-$x-1] . "')" . '" Width="20px" style="float:right"/></th>';
    // }
    
    // echo '</tr></thead><tbody><tr><td  style="width:50px !important;"></td>';
    // for($x=0;$x<$colnum;$x++)
    // {
     // $pn=$partnumbers[$colnum-$x-1];
     // $series=$pn;
     // $suffix="";
     // if(substr($pn,-2)=="HD"){
     // $suffix = "HD";
     // $series = substr($pn,0,-3) . "0" . $suffix;
     // }
     // elseif(substr($pn,-2)=="ST"){
     // $suffix = "ST";
     // $series = substr($pn,0,-3) . "0" . $suffix;
     // }
     // elseif(substr($pn,-3)=="UST"){
     // $suffix = "UST";
     // $series = substr($pn,0,-4) . "0" . $suffix;
     // }
     // elseif(substr($pn,-1)=="A"){
     // $suffix = "A";
     // $series = substr($pn,0,-2) . "0" . $suffix;
     // }
     // elseif(substr($pn,-1)=="L"){
     // $suffix = "HD";
     // $series = substr($pn,0,-2) . "0" . $suffix;
     // }
     // else{
     // $series = substr($pn,0,-1) . "0";
     // }
     // $picresult1=glob($homedir. "/resources/images/*" . $pn . "-Hero.*");
     // $picresult2=glob($homedir. "/resources/images/*" . $pn . ".*");
     // $picresult3=glob($homedir. "/resources/images/*" . $series . "-Hero.*");
     // if(!empty($picresult1)){
     // $imgprod = $pn . "-Hero";
     // }
     // elseif(!empty($picresult2)) {
     // $imgprod = $pn;
     // }
     // elseif(!empty($picresult3)){
     // $imgprod = $series . "-Hero";
     // }
     // else{
     // $imgprod = $series;
     // }
    
    
     // echo '<td  style="width:50px;"><img src="/resources/images/InFocus-' . $imgprod . '" width="150px"/></td>';
    // }
    // echo '</tr>';
    $partnumbers = "('".strtoupper(join("','", $partnumbers))."')";

    $sql = "SELECT 
            partnumber AS ' ',
            partnumber AS '  ',
            nativeaspect AS 'Native Aspect Ratio', 
            technology AS 'Technology',
            CONCAT(`resolutionname`, '(', resolution, ')') as 'Resolution', 
            diagonalsize as 'Diagonal Size', 
            touchscreen as 'Touchscreen',
            pip AS 'Picture in Picture', 
            refreshrate AS 'Refresh Rate', 
            Speakers, 
            Connections, 
            processor as 'Processor',
            memory as 'Memory',
            os as 'Operating System',
            CONCAT(`weight`,'lbs. (',ROUND(`weight`/2.2,1),'kg)') as 'Product Weight',
            `dimensions` as 'Product Dimensions HxWxD',
            CONCAT(`shipweight`,'lbs. (',ROUND(`shipweight`/2.2,1),'kg)') as 'Shipping Weight',
            `shippingdimensions` as 'Shipping Dimensions HxWxD',
            prodwarranty AS 'Product Warranty',
            otherspecs AS 'Approvals'
        FROM InFocus.displays WHERE lang='$lang' AND partnumber IN $partnumbers ORDER BY partnumber DESC";

    echo PrintVerticalTable("displays", array("ALL"), $sql, "false");

    echo '</div>';


function transpose($array) {
    $transposed_array = array();
    if ($array) {
        foreach ($array as $row_key => $row) {
            if (is_array($row) && !empty($row)) { //check to see if there is a second dimension
                foreach ($row as $column_key => $element) {
                    $transposed_array[$column_key][$row_key] = $element;
                }
            } else {
                $transposed_array[0][$row_key] = $row;
            }
        }

        return $transposed_array;
    }
}

function PrintVerticalTable($tname, $colnames, $SQLst = 'false', $IncHeader = 'true', $SelectDB = 'InFocus') {
    /* connect to the db */
    global $connection;
    global $homedir;
    global $partnumbers;
    global $translate;
    /* show tables */
    //$result = mysqli_query($connection,'SHOW TABLES') or die(AlertAdmin(mysqli_error($connection),$sql));

    $allRow = array();
    $arrlength = count($colnames);
    $table = $tname;

    $result2 = mysqli_query($connection, $SQLst);

    if ($colnames[0]=='ALL') {
        $i = 0;
        if (mysqli_fetch_field_direct($result2, $i)->name=='rownumber'){$i++;}
        $colnames[0]=mysqli_fetch_field_direct($result2, $i)->name;
        $i++;

        while ($i < mysqli_num_fields($result2)) {
            $colnames[$i]=mysqli_fetch_field_direct($result2, $i)->name;
            $i++;
        }
    }
    $arrlength=count($colnames);

    while($row = mysqli_fetch_array($result2)) {
        $allRow[] = $row;
    }

  $rowNum=count($allRow);
  if($rowNum == 0){echo "No Specifications Found</thead></table></div>";die();}
  $row=transpose(array_reverse($allRow));
   $x=0;
   
   
    $rresult .= '<tr><th style="text-align:right;width:100px">' . $translate[$colnames[$x]] . '</th>';
   
   for($i=0;$i<$rowNum;$i++)
   {
   $rresult .= '<th style="text-align:center;width:50px !important;">' . $row[$x][$i] . '<img src="/resources/images/Close.png" onclick="removeSpecs(' . "'," . $row[$x][$i] . "', 'displaycompare.php')" . '" Width="20px" style="float:right"/></th>';
   }
    $rresult .= '</tr>';
   
    $rresult .= '</thead><tbody>';

   $x=1;
   
    $rresult .= '<tr><td style="text-align:right">' . $translate[$colnames[$x]] . '</td>';
   for($i=0;$i<$rowNum;$i++)
   {

     $pn=$row[$x][$i];
     $series=$pn;
     $suffix="";
     if(substr($pn,-2)=="HD"){
     $suffix = "HD";
     $series = substr($pn,0,-3) . "0" . $suffix;
     }
     elseif(substr($pn,-2)=="ST"){
     $suffix = "ST";
     $series = substr($pn,0,-3) . "0" . $suffix;
     }
     elseif(substr($pn,-3)=="UST"){
     $suffix = "UST";
     $series = substr($pn,0,-4) . "0" . $suffix;
     }
     elseif(substr($pn,-1)=="A"){
     $suffix = "A";
     $series = substr($pn,0,-2) . "0" . $suffix;
     }
     elseif(substr($pn,-1)=="L"){
     $suffix = "HD";
     $series = substr($pn,0,-2) . "0" . $suffix;
     }
     else{
     $series = substr($pn,0,-1) . "0";
     }
     $picresult1=glob($homedir. "/resources/images/*" . $pn . "-Hero.*");
     $picresult2=glob($homedir. "/resources/images/*" . $pn . ".*");
     $picresult3=glob($homedir. "/resources/images/*" . $series . "-Hero.*");
     if(!empty($picresult1)){
     $imgprod = $pn . "-Hero";
     }
     elseif(!empty($picresult2)) {
     $imgprod = $pn;
     }
     elseif(!empty($picresult3)){
     $imgprod = $series . "-Hero";
     }
     else{
     $imgprod = $series;
     }
    
    
     $rresult .= '<td  style="width:50px;"><img src="' . imagethumb($pn,'150') . '" /></td>';


    }
    $rresult .= '</tr>';
   

   for($x=2;$x<$arrlength;$x++)
   {
    $rresult .= '<tr><td style="text-align:right">' . $translate[$colnames[$x]] . '</td>';
   for($i=0;$i<$rowNum;$i++)
   {
    if(strpos($colnames[$x],"HxWxD")>0){
    $dimensions = $row[$x][$i];
    $dimensions = str_replace(" ","",$dimensions);
    $dimensions = explode("x",$dimensions);
    
     $dimensions = $dimensions[2] . " x " . $dimensions[0] . " x " . $dimensions[1] . "in. <br>(" . round($dimensions[2]*25.4,0) . " x " . round($dimensions[0]*25.4,0) . " x " . round($dimensions[1]*25.4,0) . "mm)";

     $rresult .= '<td >' . $dimensions . '</td>';
    }
    elseif($colnames[$x] == "Approvals"){
    $holder = explode(";",$row[$x][$i]);
    
     foreach($holder as $otherSpec){
     
     $otherSpec = explode("[",$otherSpec);
     
     $otherSpecs[$otherSpec[0]] = substr($otherSpec[1],0,-1);
     
     }

     $rresult .= '<td >' . $otherSpecs['Approvals'] . '</td>';
    }
	elseif($colnames[$x] == "Product Warranty" AND strpos($row[$x][$i],"Year")>0){
		$rresult .= '<td >' . $translate[$row[$x][$i]] . '</td>';
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



    ?>
      
