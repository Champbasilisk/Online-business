<?php
	session_start();
	include("config/connect.php");
  	$Total = 0;
  	date_default_timezone_set('Asia/Bangkok');
	$cur_date = date("Y-m-d");
	$firstname = $_POST['fname'];
	$lastname = $_POST['lname'];
	$address = $_POST['addr'];
	$province = $_POST['prov'];
	$postcode = $_POST['post'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$sumtotal = $_SESSION['sumtotal'];
	
	if($firstname=="" || $lastname=="" || $address=="" || $province=="" || $postcode=="" || $phone=="" || $email==""){
		echo "Please fill in all fields.";
	}else{
		$insertCus = "insert into customer (cus_name, cus_lastname, cus_address, cus_province, cus_email, cus_phone, cus_postcode) values('$firstname','$lastname','$address','$province','$email','$phone','$postcode')";
		mysqli_query($conn,$insertCus) or die(mysql_error());
		$cusID = mysqli_insert_id($conn);
		
		$insertOrders = "insert into orders (or_status, or_date, or_sum, cus_id) values('No','$cur_date','$sumtotal','$cusID')";
		mysqli_query($conn,$insertOrders) or die(mysql_error());
		$OrderID = mysqli_insert_id($conn);
		
		for($i=0;$i<=(int)$_SESSION["intLine"];$i++){
			if($_SESSION["proID"][$i] != ""){
				$insertList = "INSERT INTO listorder (list_amount,list_totalprice,pro_id,or_id) VALUES('".$_SESSION["listAmount"][$i]."','".$_SESSION["allTotal"][$i]."','".$_SESSION["proID"][$i]."','$OrderID') ";
				mysqli_query($conn,$insertList) or die(mysql_error());
				$_SESSION["Count"]=0;
				
				$product = "SELECT * FROM product WHERE pro_id ='".$_SESSION["proID"][$i]."'";			
				$productQuery=mysqli_query($conn,$product) or die("Cannot Query");
				$pro_amount = mysqli_fetch_array($productQuery);
				$proAmount=$pro_amount["pro_amount"] - $_SESSION["listAmount"][$i];	
						  
				$updateProduct = "UPDATE product SET pro_amount='$proAmount' WHERE pro_id='".$_SESSION["proID"][$i]."'";
				$updateProductQuery=mysqli_query($conn,$updateProduct) or die("Cannot Query");
			}
		}
		mysqli_close($conn);
		unset($_SESSION["listAmount"]);
		unset($_SESSION["proID"]);
		unset($_SESSION["sumtotal"]);
		unset($_SESSION["intLine"]);
		unset($_SESSION["listPrice"]);
		echo "Order successfully.<br>Your order id is ".$OrderID;
	}
?>
