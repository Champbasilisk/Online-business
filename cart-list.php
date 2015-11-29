<?php
ob_start();
session_start();
$_SESSION['mem_id'];
$list_amount = $_POST["amount"];
$pro_id = $_POST['proid'];

include("config/connect.php");
$sql = "select * from product where pro_id = '$pro_id'";
if(!$query = mysqli_query($conn,$sql)){
	die('Error : '.mysqli_error($conn));
}
$data = mysqli_fetch_array($query);
$pro_price = $data['pro_price'];
$pro_amount = $data['pro_amount'];
$total_price = $pro_amount*$pro_price;

if($list_amount!=0){
	if(0>$pro_amount-$list_amount){	
		echo "The product is not enough";
	}
	else{
		if(!isset($_SESSION["intLine"]))
		{
			 $_SESSION["intLine"] = 0;
			 $_SESSION["proID"][0] = $pro_id;
			 $_SESSION["listAmount"][0] = $list_amount;
			 $_SESSION["listPrice"][0] = $total_price;
			 $_SESSION['sumtotal'] = 0;
			 header("location:cart-view.php");
		}
		else{
			$key = array_search($pro_id,$_SESSION["proID"]);//คิดว่าน่าจะเลือกซ้ำแล้วจะให้จำนวนบวกเพิ่ม
			if((string)$key != ""){
				$_SESSION["listAmount"][$key] = $_SESSION["listAmount"][$key] + $list_amount;
				 echo $list_amount;
			}
			else{
				 $_SESSION["intLine"] = $_SESSION["intLine"] + 1;
				 $intNewLine = $_SESSION["intLine"];
				 $_SESSION["proID"][$intNewLine] = $pro_id;
				 $_SESSION["listAmount"][$intNewLine] = $list_amount;
				 $_SESSION["listPrice"][$intNewLine] = $total_price;
			}
			header("location:cart-view.php");	
		}
	}
}
else{
	echo "Please enter amount";
}
?>
