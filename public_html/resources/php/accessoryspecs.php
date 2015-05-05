
<?php
$localdir = dirname(__FILE__);
$homedir = $_SERVER['DOCUMENT_ROOT']; 
require_once($homedir . "/resources/php/imageprocess.php"); 
require($_SERVER['DOCUMENT_ROOT'] . "/resources/php/connections.php");
mysqli_set_charset($connection, "utf8");
ini_set('default_charset', 'utf-8');


$result = mysqli_query($connection,'SELECT fieldname, fieldvalue
				FROM accessoryspecs
				WHERE partnumber = "' . $_REQUEST['pn'] . '" AND lang = "' . $_REQUEST['lang'] . '"');

		if(mysqli_num_rows($results)!=0){ 
				echo '<div class="rounded" style="margin-top:40px;width:50%"><table><thead><tr class="HeaderRow"><th></th><th></th></tr></thead><tbody>';

				while($row = mysqli_fetch_array($result))
				{
				switch(substr($row[0],0,13)){
				
				case "Product Depth";
					$proddim["ProdDe"] = $row[1];
					break;
				case "Product Heigh";
					$proddim["ProdHe"] = $row[1];
					break;
				case "Product Weigh";
					$proddim["ProdWe"] = $row[1];
					break;
				case "Product Width";
					$proddim["ProdWi"] = $row[1];
					break;
				case "Shipping Dept";
					$proddim["ShipDe"] = $row[1];
					break;
				case "Shipping Heig";
					$proddim["ShipHe"] = $row[1];
					break;
				case "Shipping Widt";
					$proddim["ShipWi"] = $row[1];
					break;
				case "Shipping Weig";
					$proddim["ShipWe"] = $row[1];
					break;
					
				default:
					echo '<tr><td>' . $row[0] . '</td><td>' . $row[1] . '</td></tr>';
				
				}
				
				}
				
				if(!empty($proddim["ProdHe"])){echo '<tr><td>Product Dimensions HxWxD</td><td>' . $proddim["ProdHe"] . 'x' . $proddim["ProdWi"] . 'x' . $proddim["ProdDe"] . 'in. <br>(' . $proddim["ProdHe"]*25.4 . 'x' . $proddim["ProdWi"]*25.4 . 'x' . $proddim["ProdDe"]*25.4 . 'mm. )</td></tr>';}
				if(!empty($proddim["ProdWe"])){
				echo '<tr><td>Product Weight</td><td>' . $proddim["ProdWe"] . 'lb. (' . round($proddim["ProdWe"]*0.453592,2) . 'kg.)</td></tr>';
				}

				if(!empty($proddim["ShipHe"])){echo '<tr><td>Shipping Dimensions HxWxD</td><td>' . $proddim["ShipHe"] . 'in. x ' . $proddim["ShipWi"] . 'in. x ' . $proddim["ShipDe"] . 'in. <br>(' . $proddim["ShipHe"]*25.4 . 'mm. x ' . $proddim["ShipWi"]*25.4 . 'mm. x ' . $proddim["ShipDe"]*25.4 . 'mm. )</td></tr>';}
				if(!empty($proddim["ShipWe"])){
				echo '<tr><td>Shipping Weight</td><td>' . $proddim["ShipWe"] . 'lb. (' . round($proddim["ShipWe"]*0.453592,2) . 'kg.)</td></tr>';
				}
				
			   echo '</td></tr></tbody>';
			   echo '</table></div>';
			}