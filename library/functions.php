<?php 
function customer($c_id){
	$query_scat="SELECT c_id,c_name FROM   tbl_charity WHERE c_status='0' ORDER BY c_name";
	$result_scat=mysql_query($query_scat) or die("Unable to select data from the tbl_category. ".mysql_error());
	while($row_scat=mysql_fetch_row($result_scat)){
?>
		<option value="<?php echo $row_scat[0]; ?>" <?php if($c_id != "" && $c_id==$row_scat[1]){echo "selected";}?>><?php echo $row_scat[1]; ?></option>
<?php
	}
}


function rep($c_id){
	$query_scat="SELECT rep_id,name FROM   tbl_rep WHERE status='0' ORDER BY name";
	$result_scat=mysql_query($query_scat) or die("Unable to select data from the tbl_category. ".mysql_error());
	while($row_scat=mysql_fetch_row($result_scat)){
?>
		<option value="<?php echo $row_scat[1]; ?>" <?php if($c_id != "" && $c_id==$row_scat[1]){echo "selected";}?>><?php echo $row_scat[1]; ?></option>
<?php
	}
}


function ino($c_id){
	$query_scat="SELECT bill_id FROM   tbl_bill WHERE bill_status='0' ORDER BY bill_id";
	$result_scat=mysql_query($query_scat) or die("Unable to select data from the tbl_category. ".mysql_error());
	while($row_scat=mysql_fetch_row($result_scat)){
?>
		<option value="<?php echo $row_scat[0]; ?>" <?php if($c_id != "" && $c_id==$row_scat[0]){echo "selected";}?>><?php echo $row_scat[0]; ?></option>
<?php
	}
}





function l_no($ld_id){
	$query_scat="SELECT ld_id FROM   tbl_load WHERE ld_status='0' ORDER BY ld_id";
	$result_scat=mysql_query($query_scat) or die("Unable to select data from the tbl_category. ".mysql_error());
	while($row_scat=mysql_fetch_row($result_scat)){
?>
		<option value="<?php echo $row_scat[0]; ?>" <?php if($ld_id != "" && $ld_id==$row_scat[0]){echo "selected";}?>><?php echo $row_scat[0]; ?></option>
<?php
	}
}
function billno($bill_id){
	$query_scat="SELECT bill_id FROM  tbl_bill WHERE bill_status='0' ORDER BY bill_id";
	$result_scat=mysql_query($query_scat) or die("Unable to select data from the tbl_bill. ".mysql_error());
	while($row_scat=mysql_fetch_row($result_scat)){
?>
		<option value="<?php echo $row_scat[0]; ?>" <?php if($bill_id != "" && $bill_id==$row_scat[0]){echo "selected";}?>><?php echo $row_scat[0]; ?></option>
<?php
	}
}





function getUserName($u_id){
	$query_user="SELECT u_name FROM tbl_user WHERE u_id='$u_id'";
	$result_user=mysql_query($query_user) or die("Unable to select data from the tbl_user. ".mysql_error());
	$row_user=mysql_fetch_row($result_user);
	return $row_user[0];
}

function kapuwa($k_id){
	$query_scat="SELECT k_id,k_name FROM  tbl_kapuwa WHERE k_status='0' ORDER BY k_name";
	$result_scat=mysql_query($query_scat) or die("Unable to select data from the tbl_category. ".mysql_error());
	while($row_scat=mysql_fetch_row($result_scat)){
?>
		<option value="<?php echo $row_scat[1]; ?>" <?php if($k_id != "" && $k_id==$row_scat[1]){echo "selected";}?>><?php echo $row_scat[1]; ?></option>
<?php
	}
}

function emp($emp_id){
	$query_scat="SELECT emp_id,emp_name FROM  tbl_emp WHERE emp_status='0' ORDER BY emp_name";
	$result_scat=mysql_query($query_scat) or die("Unable to select data from the tbl_category. ".mysql_error());
	while($row_scat=mysql_fetch_row($result_scat)){
?>
		<option value="<?php echo $row_scat[1]; ?>" <?php if($emp_id != "" && $emp_id==$row_scat[1]){echo "selected";}?>><?php echo $row_scat[1]; ?></option>
<?php
	}
}

function bank($b_id){
	$query_scat="SELECT b_id,b_nam FROM  tbl_loans WHERE b_status='0' ORDER BY b_nam";
	$result_scat=mysql_query($query_scat) or die("Unable to select data from the tbl_category. ".mysql_error());
	while($row_scat=mysql_fetch_row($result_scat)){
?>
		<option value="<?php echo $row_scat[1]; ?>" <?php if($b_id != "" && $b_id==$row_scat[1]){echo "selected";}?>><?php echo $row_scat[1]; ?></option>
<?php
	}
}
function acc($b_id){
	$query_scat="SELECT b_id,acc_name FROM  tbl_loans WHERE b_status='0' ORDER BY acc_name";
	$result_scat=mysql_query($query_scat) or die("Unable to select data from the tbl_category. ".mysql_error());
	while($row_scat=mysql_fetch_row($result_scat)){
?>
		<option value="<?php echo $row_scat[1]; ?>" <?php if($b_id != "" && $b_id==$row_scat[1]){echo "selected";}?>><?php echo $row_scat[1]; ?></option>
<?php
	}
}
function cus($c_id){
	$query_scat="SELECT c_id,c_name FROM   tbl_charity WHERE c_status='0' ORDER BY c_name";
	$result_scat=mysql_query($query_scat) or die("Unable to select data from the tbl_category. ".mysql_error());
	while($row_scat=mysql_fetch_row($result_scat)){
?>
		<option value="<?php echo $row_scat[1]; ?>" <?php if($c_id != "" && $c_id==$row_scat[1]){echo "selected";}?>><?php echo $row_scat[1]; ?></option>
<?php
	}
}

function user($u_id){
	$query_scat="SELECT u_id,u_name FROM  tbl_user WHERE u_status='0' ORDER BY u_name";
	$result_scat=mysql_query($query_scat) or die("Unable to select data from the tbl_category. ".mysql_error());
	while($row_scat=mysql_fetch_row($result_scat)){
?>
		<option value="<?php echo $row_scat[1]; ?>" <?php if($u_id != "" && $u_id==$row_scat[1]){echo "selected";}?>><?php echo $row_scat[1]; ?></option>
<?php
	}
}

function fane($idFane){
	$query_scat="SELECT idFane,name FROM  fane WHERE f_status='0' ORDER BY name";
	$result_scat=mysql_query($query_scat) or die("Unable to select data from the tbl_category. ".mysql_error());
	while($row_scat=mysql_fetch_row($result_scat)){
?>
		<option value="<?php echo $row_scat[1]; ?>" <?php if($idFane  != "" && $idFane==$row_scat[1]){echo "selected";}?>><?php echo $row_scat[1]; ?></option>
<?php
	}
}




function puja($p_id){
	$query_scat="SELECT p_id,p_name FROM  puja WHERE p_status='0' ORDER BY p_name";
	$result_scat=mysql_query($query_scat) or die("Unable to select data from the tbl_category. ".mysql_error());
	while($row_scat=mysql_fetch_row($result_scat)){
?>
		<option value="<?php echo $row_scat[1]; ?>" <?php if($p_id != "" && $p_id==$row_scat[1]){echo "selected";}?>><?php echo $row_scat[1]; ?></option>
<?php
	}
}

function genBookID(){
	$query_book_id="SELECT MAX(book_id) FROM tbl_book";
	$result_book_id=mysql_query($query_book_id) or die("Unable to select data from the tbl_book. ".mysql_error());
	$row_book_id=mysql_fetch_row($result_book_id);
	return ($row_book_id[0]+1);
}

function studetType($std_tp){
	$query_stu_tp="SELECT stu_tp_id,stu_tp_name FROM tbl_student_type ORDER BY stu_tp_name";
	$result_stu_tp=mysql_query($query_stu_tp) or die("Unable to select data from the tbl_student_type. ".mysql_error());
	while($row_stu_tp=mysql_fetch_row($result_stu_tp)){
?>
		<option value="<?php echo $row_stu_tp[0]; ?>" <?php if($std_tp != "" && $std_tp == $row_stu_tp[0]){echo "selected";}?>><?php echo $row_stu_tp[1]; ?></option>
<?php
	}
}

function getStudentType($stu_tp_id){
	$query_st_tp="SELECT stu_tp_name FROM tbl_student_type WHERE stu_tp_id='$stu_tp_id'";
	$result_st_tp=mysql_query($query_st_tp) or die("Unable to select data from the tbl_student_type. ".mysql_error());
	$row_st_tp=mysql_fetch_row($result_st_tp);
	return $row_st_tp[0];
}

function getFineRate(){
	$query_f_rate="SELECT f_rate FROM tbl_fine";
	$result_f_rate=mysql_query($query_f_rate) or die("Unable to select data from the tbl_fine. ".mysql_error());
	$row_f_rate=mysql_fetch_row($result_f_rate);
	return $row_f_rate[0];
}
?>
<?php 

function getvehname($veh_id){
	$query_room="SELECT veh_name FROM  tbl_veh WHERE veh_id=$veh_id";
	$result_room=mysql_query($query_room) or die("Unable to select data from the tbl_room. ".mysql_error());
	$row_room=mysql_fetch_row($result_room);
	return $row_room[0];
	
	}

function supp($p_id){
	$query_scat="SELECT k_id,k_name FROM  tbl_kapuwa WHERE k_status='0' ORDER BY k_name";
	$result_scat=mysql_query($query_scat) or die("Unable to select data from the tbl_category. ".mysql_error());
	while($row_scat=mysql_fetch_row($result_scat)){
?>
		<option value="<?php echo $row_scat[1]; ?>" <?php if($p_id != "" && $p_id==$row_scat[1]){echo "selected";}?>><?php echo $row_scat[1]; ?></option>
<?php
	}
}






function getVeh($veh_id){
	 $query_user="SELECT veh_id,veh_name FROM tbl_veh WHERE veh_status='0' ORDER BY veh_name";
	$result_user=mysql_query($query_user) or die("Unable to select data from the tbl_user. ".mysql_error());
	while($row_user=mysql_fetch_row($result_user)){
?>
		<option value="<?php echo $row_user[0]; ?>" <?php if($veh_id != "" && $veh_id==$row_user[0]){echo "selected";}?>><?php echo $row_user[1]; ?></option>
<?php
	}
}

function getMil($bill_id){
	 $query_user="SELECT menu_name FROM tbl_bill_menu WHERE bill_id=$bill_id ORDER BY menu_name";
	$result_user=mysql_query($query_user) or die("Unable to select data from the tbl_user. ".mysql_error());
	while($row_user=mysql_fetch_row($result_user)){
?>
		<option value="<?php echo $row_user[0]; ?>" <?php if($bill_id != "" && $bill_id==$row_user[0]){echo "selected";}?>><?php echo $row_user[1]; ?></option>
<?php
	}
}




function category($cat_id){
	$query_cat="SELECT cat_id,cat_name FROM tbl_category WHERE cat_status='0' ORDER BY cat_name";
	$result_cat=mysql_query($query_cat) or die("Unable to select data from the tbl_category. ".mysql_error());
	while($row_cat=mysql_fetch_row($result_cat)){
?>
		<option value="<?php echo $row_cat[0]; ?>" <?php if($cat_id != "" && $cat_id==$row_cat[0]){echo "selected";}?>><?php echo $row_cat[1]; ?></option>
<?php
	}
}

function getGrnNo(){
	$query_grn_no="SELECT MAX(grn_id) FROM tbl_grn";
	$result_grn_no=mysql_query($query_grn_no) or die("Unable to select data from the tbl_grn. ".mysql_error());
	$row_grn_no=mysql_fetch_row($result_grn_no);
	if($row_grn_no[0] == ""){
		return 1;
	}else{
		return ($row_grn_no[0]+1);
	}
}
function getldNo(){
	$query_grn_no="SELECT MAX(ld_id) FROM tbl_load";
	$result_grn_no=mysql_query($query_grn_no) or die("Unable to select data from the tbl_load. ".mysql_error());
	$row_grn_no=mysql_fetch_row($result_grn_no);
	if($row_grn_no[0] == ""){
		return 1;
	}else{
		return ($row_grn_no[0]+1);
	}
}

/*stock eken aduwana hati*/
function getSubMenu($MenuNo){	
	
$query = "select menu_id from tbl_menu where menu_no ='$MenuNo'";
		$menuIdResult = mysql_query($query) or die("Unable to select data from the tbl_menu. ".mysql_error());
		$result_menu_ID = mysql_fetch_array($menuIdResult);

	    $query_sub_menu="SELECT sub_menu_id FROM tbl_sub_menu WHERE menu_id='$result_menu_ID[0]'";  // 3 *  items 
	    $result_get_sub_menu = mysql_query($query_sub_menu);
	
		while($row_sub_menu_id = mysql_fetch_array($result_get_sub_menu)){ //select sub menu ids  *3
		 $row_sub_menu_id[0]."</br>";  
				$query_get_Pid = "SELECT p_id,ing_qty FROM tbl_ingredians WHERE sub_menu_id ='$row_sub_menu_id[0]' ";
				   $result_pid = mysql_query($query_get_Pid) or die("Unable to select data from the tbl_ingredians. ".mysql_error());
				   
				      while($row_get_pid = mysql_fetch_array($result_pid)){
						   
						   		$selected_row_Pid = $row_get_pid[0];
								$selected_row_ing_qty = $row_get_pid[1]; 	
																 
								$query_select_r_qty = "SELECT st_remain_qty FROM tbl_stock WHERE p_id ='$selected_row_Pid' ORDER BY grn_id DESC ";
								$r_qty_result =mysql_query($query_select_r_qty);
								$row_remaining_qty =mysql_fetch_array($r_qty_result);
								$row_remaining_qty2 =$row_remaining_qty[0];	
								$new_remaining_qty = $row_remaining_qty2 - $selected_row_ing_qty;
							    $new_remaining_qty;  								
							    $update_stock = "UPDATE tbl_stock SET st_remain_qty = '$new_remaining_qty' WHERE p_id ='$selected_row_Pid'";	
								mysql_query($update_stock) or die("Unable to Update Stpck. ".mysql_error());
														   
					 }			  
		}
}





function getBillNo(){
	$query_bill_no="SELECT MAX(bill_id) FROM tbl_bill ";
	$result_bill_no=mysql_query($query_bill_no) or die("Unable to select data from the tbl_invoice. ".mysql_error());
	$row_bill_no=mysql_fetch_row($result_bill_no);
	return ($row_bill_no[0]+1);
}

function getAssrootNo(){
	$query_bill_no="SELECT COUNT(r_a_id) FROM tbl_assgn_rute ";
	$result_bill_no=mysql_query($query_bill_no) or die("Unable to select data from the tbl_invoice. ".mysql_error());
	$row_bill_no=mysql_fetch_row($result_bill_no);
	return ($row_bill_no[0]+1);
}
function getOtherBillNo(){
	$query_bill_no="SELECT COUNT(other_bill_id) FROM other_bill ";
	$result_bill_no=mysql_query($query_bill_no) or die("Unable to select data from the tbl_invoice. ".mysql_error());
	$row_bill_no=mysql_fetch_row($result_bill_no);
	return ($row_bill_no[0]+1);
}

function getVatBillNo(){
	$query_vat_bill_no="SELECT COUNT(v_bill_id) FROM v_bill";
	$result_v_bill_no=mysql_query($query_vat_bill_no) or die("Unable to select data from the vat bill table".mysql_error());
	$row_vat_bill_no=mysql_fetch_row($result_v_bill_no);
	return ($row_vat_bill_no[0]+1);
	
}

function maincategory($scat_id){
	$query_scat="SELECT scat_name,scat_id FROM tbl_maincategory WHERE scat_status='0' ORDER BY scat_name";
	$result_scat=mysql_query($query_scat) or die("Unable to select data from the tbl_category. ".mysql_error());
	while($row_scat=mysql_fetch_row($result_scat)){
?>
		<option value="<?php echo $row_scat[1]; ?>" <?php if($scat_id != "" && $scat_id==$row_scat[1]){echo "selected";}?>><?php echo $row_scat[0]; ?></option>
<?php
	}
}
function rute($r_id){
	$query_scat="SELECT r_name,r_id FROM tbl_rute WHERE r_status='0' ORDER BY r_name";
	$result_scat=mysql_query($query_scat) or die("Unable to select data from the tbl_category. ".mysql_error());
	while($row_scat=mysql_fetch_row($result_scat)){
?>
		<option value="<?php echo $row_scat[0]; ?>" <?php if($r_id != "" && $r_id==$row_scat[1]){echo "selected";}?>><?php echo $row_scat[0]; ?></option>
<?php
	}
}
function Reff($emp_id){
	$query_scat="SELECT emp_name,emp_id FROM tbl_emp WHERE emp_status='0' and type='reff' ORDER BY emp_name";
	$result_scat=mysql_query($query_scat) or die("Unable to select data from the tbl_category. ".mysql_error());
	while($row_scat=mysql_fetch_row($result_scat)){
?>
		<option value="<?php echo $row_scat[0]; ?>" <?php if($emp_id != "" && $r_id==$row_scat[1]){echo "selected";}?>><?php echo $row_scat[0]; ?></option>
<?php
	}
}

function Driver($emp_id){
	$query_scat="SELECT emp_name,emp_id FROM tbl_emp WHERE emp_status='0' and type='driver' ORDER BY emp_name";
	$result_scat=mysql_query($query_scat) or die("Unable to select data from the tbl_category. ".mysql_error());
	while($row_scat=mysql_fetch_row($result_scat)){
?>
		<option value="<?php echo $row_scat[0]; ?>" <?php if($emp_id != "" && $r_id==$row_scat[1]){echo "selected";}?>><?php echo $row_scat[0]; ?></option>
<?php
	}
}
function genLibraryID(){
	$query_stu_id="SELECT MAX(st_id) FROM tbl_student";
	$result_stu_id=mysql_query($query_stu_id) or die("Unable to select data from the tbl_student. ".mysql_error());
	$row_stu_id=mysql_fetch_row($result_stu_id);
	return ($row_stu_id[0]+1);
}

function GradeCategory($g_cat_id){
	$query_g_cat="SELECT grade_cat_id,grade_cat_name FROM  tbl_grade_category WHERE grade_cat_status='0' ORDER BY grade_cat_name";
	$result_g_cat=mysql_query($query_g_cat) or die("Unable to select data from the tbl_grade_category. ".mysql_error());
	while($row_g_cat=mysql_fetch_row($result_g_cat)){
?>
		<option value="<?php echo $row_g_cat[0]; ?>" <?php if($g_cat_id != "" && $g_cat_id == $row_g_cat[0]){echo "selected";}?>><?php echo $row_g_cat[1]; ?></option>
<?php
	}
}

?>