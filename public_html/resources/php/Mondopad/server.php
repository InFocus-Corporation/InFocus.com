<?php  
	header("Content-Type:text/html; charset=utf8"); 
	require 'sqlclass.php';
	$services = new M("Services");
	
	
	$method=$_GET['method']; 
	$code=$_GET['code'];
	$serialnumber=$_GET['serialNumber'];
	$startdate=$_GET['startDate'];
	
	$methoderror="The method can not be empty!";
	$codeerror="The code can not be empty!";
	
	if(isset($method) && !empty($method)){
		//this method is isupdate_code
		if($method=="isupdate_code"){
			if(isset($code) && !empty($code) && isset($serialnumber) && !empty($serialnumber)){
				$arr = $services->selectview(vServices,"ValidationCode='".$code."'");
				if($arr != null){
					foreach ($arr as $key => $val) {
					   if(($val['SerialNumber']==null || $val['SerialNumber']=="")&&($val['StartDate']==null || $val['StartDate']=="")){
						    if($val['ContractLength'] != null && $val['ContractLength'] != "" && $val['ContractLength'] > 0){
								$arr1 = $services->selectview(vServices,"SerialNumber='".$serialnumber."'");
								$today =date("Y-m-d");
								$startdate1='';
								if($arr1!=null){
									foreach ($arr1 as $key => $val1){
									   if($startdate1 == null || $startdate1 == "")
										   $startdate1=date('Y-m-d',strtotime($val1['StartDate'].'+'.$val1['ContractLength'].' month'));
									   else{
										   if($startdate1 <= $val1['StartDate'])
											   $startdate1 =date('Y-m-d',strtotime($val1['StartDate'].'+'.$val1['ContractLength'].' month'));
									   }
									}
								}
								else{
									$freeYearlength = 12; 
									$startdate1=date('Y-m-d',strtotime(date("Y-m-d",strtotime($startdate)) .'+'.$freeYearlength.' month'));
								}
								
								$agreement_residue=round((strtotime($startdate1) - strtotime($today))/(24*60*60));
								if($agreement_residue <= 0)
								   $startdate1 = $today;
								   
								$services->update("`Validation Code` ='".$code."'","`Start Date` ='".$startdate1."' ".",`Serial Number` ='".$serialnumber."'");
								
								echo '1';
								return '1';	
							}
							else{
								echo '0';
					            return '0';
							}
						}
						else{
							echo '-1';
							return '-1';
						}
					}
				}
				else{
					echo '0';
					return '0';
				}				     
			}
			else
				return $codeerror;
	     }
				 		
		//this mothod is GetFreePeriod 
		if($method=="GetFreePeriod"){
			 $startdate=$_GET['startDate'];
			 if(isset($startdate) && !empty($startdate)){
				$contractlength=12;
				$today=date("Y-m-d");
				$agreement=date('Y-m-d',strtotime($startdate .'+'.$contractlength.' month'));
				$agreement_residue=round((strtotime($agreement) - strtotime($today))/(24*60*60));
				echo $agreement_residue;
				return $agreement_residue;
			 }
			 else{
				echo "startDate cannot empty";
				return "startDate cannot empty";
			 }
		 }
		   
		//this mothod is GetServicesPeriod
		if($method=="GetServicesPeriod"){
			$serialnumber=$_GET['serialNumber'];
			if(isset($serialnumber) && !empty($serialnumber)){
				$arr = $services->selectview(vServices,"SerialNumber='".$serialnumber."'");
				//echo json_encode($arr);
				if($arr!=null){
					$today =date("Y-m-d");
					$startdate='';
					foreach ($arr as $key => $val){
						if($startdate == null || $startdate == "")
							$startdate=date('Y-m-d',strtotime($val['StartDate'].'+'.$val['ContractLength'].' month'));
						else{
							if($startdate <= $val['StartDate'])
								$startdate =date('Y-m-d',strtotime($val['StartDate'].'+'.$val['ContractLength'].' month'));
						}
					}
					 
				  //echo "start date : ".$startdate;
				  $agreement_residue=round((strtotime($startdate) - strtotime($today))/(24*60*60));
				  //echo $agreement_residue;
				  echo $agreement_residue.",".$startdate;
				  return $agreement_residue.",".$startdate;
				}
				else{
					echo "0";
					return "0";
				}
			}
			else{
				echo "serialNumber is nont null";
				return "serialNumber is nont null";
			}
		 }
		   
		//this mothod is insert 
		if($method=="insert_testdata"){
			//rand(122334,11345677);
			$validationCode = rand(999,999999);
			$contractLength= rand(1,24);
			if(isset($serialnumber) && !empty($serialnumber)&&isset($startdate) && !empty($startdate)){
				$services->insert(array("`Validation Code`"=>$validationCode,"`Contract Length`"=>$contractLength,"`Expended`"=>"true","`Serial Number`"=>$serialnumber,"`Start Date`"=>$startdate));
				$arr = $services->selectview(vServices,"ValidationCode='".$validationCode."'");
				echo json_encode($arr);
				return json_encode($arr);
			}
			else{
				$services->insert(array("`Validation Code`"=>$validationCode,"`Contract Length`"=>$contractLength,"`Expended`"=>"true"));
				$arr = $services->selectview(vServices,"ValidationCode='".$validationCode."'");
				echo json_encode($arr);
				return json_encode($arr);
			}
		 }
					
		//this method is getinfo_view		  
		if($method=="getinfo_view"){
			$arr = $services->selectview(vServices);
			echo json_encode($arr);
		}
  
		//this is select all table
		if($method=="select_all"){
			$arr = $services->select();
			echo json_encode($arr);
			return json_encode($arr);
		}
			
		//delete by code in table
		if($method=="DeleteBySerialNumber"){
			$serialnumber=$_GET['serialNumber'];
			if(isset($serialnumber) && !empty($serialnumber)){
			   $arr = $services->delete("`Serial Number` ='".$serialnumber."'");
			   echo 'ok'; 
			}
			else{
			   echo $codeerror;
			}
		 }
			
		//UpdateStartDateByCode
		if($method=="UpdateStartDateByCode"){
			if(isset($code) && !empty($code)){
				$startdate=$_GET['startDate'];
				$time =date("Y-m-d",strtotime($startdate));
				$services->update("`Validation Code` ='".$code."'","`Start Date` ='".$time."'");
				$arr = $services->selectview(vServices,"ValidationCode='".$code."'");
				echo json_encode($arr);
			}
			else{
			   echo $codeerror;
			} 
		} 
		
		if($method=="ClearAllUsedData"){
			$services->update("1=1","`Start Date` = null ".",`Serial Number` =null");
		}
	}
	else
		return $methoderror;
		
	$services->close();
?>  