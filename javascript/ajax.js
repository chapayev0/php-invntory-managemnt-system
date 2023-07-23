function Inint_AJAX() {
   try { return new ActiveXObject("Msxml2.XMLHTTP");  } catch(e) {} //IE
   try { return new ActiveXObject("Microsoft.XMLHTTP"); } catch(e) {} //IE
   try { return new XMLHttpRequest();          } catch(e) {} //Native Javascript
   alert("XMLHttpRequest not supported");
   return null;
};

function delete_div(div_id) {
	 var req = Inint_AJAX();
	 req.onreadystatechange = function () { 
		  if (req.readyState==4) {
			   if (req.status==200) {
					document.getElementById(div_id).innerHTML=req.responseText; //retuen value
					cal_total();
			   } 
		  }
	 };
	 req.open("POST", "empty.php"); //make connection
	 req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=iso-8859-1"); // set Header
	 req.send(null); //send value
}

function load_new_item(div_id,num) {
	var p_id="item_"+num;
	 var req = Inint_AJAX();
	 req.onreadystatechange = function () { 
		  if (req.readyState==4) {
			   if (req.status==200) {
					document.getElementById(div_id).innerHTML=req.responseText; //retuen value
					$('#'+p_id).focus();
			   } 
		  }
	 };
	 req.open("POST", "../admin/gen_grn_goods.php?num="+num); //make connection
	 req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=iso-8859-1"); // set Header
	 req.send(null); //send value
}

function load_new_item_bill(div_id,num) {
	var p_id="p_id_"+num;
	 var req = Inint_AJAX();
	 req.onreadystatechange = function () { 
		  if (req.readyState==4) {
			   if (req.status==200) {
					document.getElementById(div_id).innerHTML=req.responseText; //retuen value
					$('#'+p_id).focus();
			   } 
		  }
	 };
	 req.open("POST", "../cashier/generate_items.php?num="+num); //make connection
	 req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=iso-8859-1"); // set Header
	 req.send(null); //send value
}


function load_new_invoice_item(div_id,num) {
	var p_id="p_id_"+num;
	 var req = Inint_AJAX();
	 req.onreadystatechange = function () { 
		  if (req.readyState==4) {
			   if (req.status==200) {
					document.getElementById(div_id).innerHTML=req.responseText; //retuen value
					$('#'+p_id).focus();
			   } 
		  }
	 };
	 req.open("POST", "../user/generate_invoice_item.php?num="+num); //make connection
	 req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=iso-8859-1"); // set Header
	 req.send(null); //send value
}

function check_stock(div_id,item_id,qty,item_name,qty_id) {
	//var p_id="p_id_"+num;
	 var req = Inint_AJAX();
	 req.onreadystatechange = function () { 
		  if (req.readyState==4) {
			   if (req.status==200) {
				   var text_value=req.responseText;
				   text_value=text_value.split("-");
					document.getElementById(div_id).innerHTML=text_value[0]; //retuen value
					if(text_value[0] != ""){
						$('#'+qty_id).val(text_value[1]);
					}
					cal_total();
			   } 
		  }
	 };
	 req.open("POST", "../user/check_stock.php?item_id="+item_id+"&qty="+qty+"&item_name="+item_name); //make connection
	 req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=iso-8859-1"); // set Header
	 req.send(null); //send value
}


function display_customer(div_id,cus_type) {
	 var req = Inint_AJAX();
	 req.onreadystatechange = function () { 
		  if (req.readyState==4) {
			   if (req.status==200) {
					document.getElementById(div_id).innerHTML=req.responseText; //retuen value
					cal_total();
			   } 
		  }
	 };
	 if(cus_type == "Saff Member"){
		 req.open("POST", "../user/load_customer.php"); //make connection
	 }else if(cus_type == "Institutional Customer"){
		 req.open("POST", "../user/load_institutional_customer.php"); //make connection
	 }else{
		 req.open("POST", "../user/empty.php"); //make connection
	 }
	 req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=iso-8859-1"); // set Header
	 req.send(null); //send value
}