  <?php
$connection = mysqli_connect('67.43.0.33','partners','InF0cusP@ssw0rd', 'partners_IFC_IB',3306);
if(empty($_REQUEST['note'])){	$result = mysqli_query($connection,'UPDATE `' . $_REQUEST['table'] . '` SET Expended="True", `Date Expended`= NOW() WHERE `Validation Code` = "' . $_REQUEST['key'] . '"');	}else{	$result = mysqli_query($connection,'UPDATE `' . $_REQUEST['table'] . '` SET Expended="True", `Date Expended`= NOW(), `Notes` = "' . $_REQUEST['note'] . '" WHERE `Validation Code` = "' . $_REQUEST['key'] . '"');}
?>
