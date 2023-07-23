<?php 
session_start();
require_once '../library/config.php';
require_once '../library/functions.php';

$current_date=date('Y-m-d');


$filename=$_FILES['target_file']['name'];
if($_FILES['target_file']['name'] != null){
	$upload_url=$_FILES['target_file']['name'];
	if(move_uploaded_file($_FILES['target_file']['tmp_name'],$upload_url)){
	}
}

$page = join("",file("$filename"));
$line = explode("\n", $page);
$max=0;
		
//$max=mysql_num_rows($result_ck);
for($i=0;$i<count($line);$i++){
	if($i != 0){
		$shop_code="";
		/*Generate Shop Code*/
		
		$max +=1;
		//echo getRegionID($dis_id)."   |  ".getAreaID($ar_id)."   |  ".getRouteID($r_id)."  |   ".$max."   |  "."<br/>";
		//$shop_code=getRegionID($dis_id).getAreaID($ar_id).getRouteID($r_id).$max;
	
		$target=explode(',',$line[$i]);
		if(count($target) >1 && $target[0] != "" && $target[2] != ""){
			/*echo $outlet_name=$target[0]."....";
			echo $tel=$target[1]."....";
			echo $contact_person=$target[2]."....";
			echo $designation=$target[3]."....";*/
			
			 echo  $name=trim($target[0]);
			 $epf=trim($target[1]);
			 $nic=trim($target[2]);
			 $section=trim($target[3]);
			 $fname=trim($target[4]);
			
			//for($x=4;$x<count($target);$x++){
				
				/*if($x != (count($target)-1)){
					if($x == 4){
						$address =trim($target[$x]).",";
					}else{
						$address .=trim($target[$x]).",";
					}
				}else{
					if($x == 4){
						$address =trim($target[$x]);
					}else{
						$address .=trim($target[$x]);
					}
				}*/
				//echo $address;
			//}
			//$address.".......";
			
			//echo $address;
			/*Check Shop name is already existed or not*/
			//$query_sh="SELECT con_id FROM tbl_cotact WHERE con_name='$outlet_name' AND u_id='$u_id' AND r_id='$r_id' AND con_address='$address'";
			//$result_sh=mysql_query($query_sh) or die("Unable to select data from the tbl_cotact".mysql_error());
			//if(mysql_num_rows($result_sh) == 0){
				echo $query_insert="INSERT INTO tbl_charity(c_name,cus_id,etf,date,fname,section) VALUES('$name','$nic','$epf','$current_date','$fname','$section')";
				mysql_query($query_insert) or die("Unable to insert data into the tbl_charity".mysql_error());
			}
		}
	//}
}
$_SESSION['t_outlet_mes']="Outlets have been added";
//header('Location:upload.php');
?>