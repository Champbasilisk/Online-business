<?php
	session_start();
	include("config/connect.php");
  	$Total = 0;
  	date_default_timezone_set('Asia/Bangkok');
	$cur_date = date("Y-m-d");
  	$sumTotal = $_POST['sumtotal'];
	
	if($_SESSION["Count"]==0){
		echo "No items in cart.";
	}else{
		if($_SESSION['mem_id']==""){
			echo "You are not sign in or not a member. <br><br>
				<input type='button' value='Please Sign in' class='btn btn-primary'> 
				<a href='#showCusField' class='page-scroll btn btn-info' id='showcusfield'>Purchase without account</a>";
		}else{
			$insertOrders = "insert into orders (or_status,or_date,or_sum,mem_id) values('No','$cur_date','$sumTotal','".$_SESSION['mem_id']."')";
			mysqli_query($conn,$insertOrders) or die(mysql_error());
			$OrderID = mysqli_insert_id($conn);
			
			for($i=0;$i<=(int)$_SESSION["intLine"];$i++)
			{
				if($_SESSION["proID"][$i] != "")
				{
					$insertList = "INSERT INTO listorder (list_amount,list_totalprice,pro_id,or_id)
								VALUES('".$_SESSION["listAmount"][$i]."','".$_SESSION["allTotal"][$i]."',
								'".$_SESSION["proID"][$i]."','$OrderID') ";
					mysqli_query($conn,$insertList) or die(mysql_error());
					$_SESSION["Count"]=0;
					  
					$product = "SELECT * FROM product WHERE pro_id ='".$_SESSION["proID"][$i]."'";			
					$productQuery=mysqli_query($conn,$product) or die("Cannot Query");
					$pro_amount = mysqli_fetch_array($productQuery);
									  
					$proAmount=$pro_amount["pro_amount"] - $_SESSION["listAmount"][$i];			  
					$updateProduct = "UPDATE product SET pro_amount='$proAmount' 
									WHERE pro_id='".$_SESSION["proID"][$i]."'";
					$updateProductQuery=mysqli_query($conn,$updateProduct) or die("Cannot Query");
				}
			}
			mysqli_close($conn);
			unset($_SESSION["listAmount"]);
			unset($_SESSION["proID"]);
			unset($_SESSION["intLine"]);
			unset($_SESSION["sumtotal"]);
			unset($_SESSION["listPrice"]);
			echo "Order successfully";
		}
	}
?>
