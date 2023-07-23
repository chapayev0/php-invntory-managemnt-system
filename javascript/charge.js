function Inint_AJAX() {
   try { return new ActiveXObject("Msxml2.XMLHTTP");  } catch(e) {} //IE
   try { return new ActiveXObject("Microsoft.XMLHTTP"); } catch(e) {} //IE
   try { return new XMLHttpRequest();          } catch(e) {} //Native Javascript
   alert("XMLHttpRequest not supported");
   return null;
};

function del_div(div_id) {

	 var req = Inint_AJAX();
	 req.onreadystatechange = function () { 
		  if (req.readyState==4) {
			   if (req.status==200) {
					document.getElementById(div_id).innerHTML=req.responseText; //retuen value
					calc_total('','','');
			   } 
		  }
	 };
	 req.open("POST", "../admin/empty.php"); //make connection
	 req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=iso-8859-1"); // set Header
	 req.send(null); //send value
}

function del_drug_div(div_id){
	var req = Inint_AJAX();
	 req.onreadystatechange = function () { 
		  if (req.readyState==4) {
			   if (req.status==200) {
					document.getElementById(div_id).innerHTML=req.responseText; //retuen value
					calc_total();
			   } 
		  }
	 };
	 req.open("POST", "../admin/empty.php"); //make connection
	 req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=iso-8859-1"); // set Header
	 req.send(null); //send value
}
