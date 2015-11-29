<?php
	include('config/connect.php');	
	
	$oldBrand = $_POST['oldBrand'];
	if($oldBrand==0){
		$brand = $_POST['newBrand'];	
	}else{
		$brand = $oldBrand;
	}
	$displayType = $_POST['ptype'];	
	$gen_type = $_POST['gen_type'];	
	$strap_type = $_POST['strap'];
	$model = $_POST['model'];		
	$price = $_POST['price'];		
	$amount = $_POST['amount'];
	
	echo ("input brand : ".$brand."\nmodel = ".$model."\n");	
	$filename="";	
	if($_FILES["fileUpload"]["error"]>0){
		echo "Return Code : " . $_FILES["fileUpload"]["error"] . "<br>";
	}else{
		$filename = $_FILES["fileUpload"]["name"];
		$filesize = $_FILES["fileUpload"]["size"];
		$filetype = $_FILES["fileUpload"]["type"];
		
		$allowedExts=array("gif","jpg","png","jpeg");
		$temp=explode(".",$filename);
		$extension=end($temp);		
		if((($filetype=="image/gif") || ($filetype=="image/jpg") || ($filetype=="image/jpeg") || ($filetype=="image/png")) && ($filesize <500000) && in_array($extension,$allowedExts)){
			if(file_exists("img/product/".$filename)){
				//echo $filename." already exitsts.";
			}else{
				move_uploaded_file($_FILES["fileUpload"]["tmp_name"], "img/product/".$filename);
				//echo "Stored in: "."img/product/".$filename;
			}
		}
	}
	$status = false;
	$sql = "select * from product where pro_brand = '".$brand."' and pro_model = '".$model."'";
	if(!$result=mysqli_query($conn,$sql)){
		die('Error : '.mysqli_error($conn));
	}
	if(mysqli_num_rows($result) == 0){
		echo "There is no data";
	}else{
		while($data=mysqli_fetch_array($result, MYSQLI_ASSOC)){
			if(strcmp ($brand, $data['pro_brand'])==0 && strcmp($model, $data['pro_model'])==0){
				$status = true;
				$select_amount = (int)$data['pro_amount'];
				$select_proid = $data['pro_id'];
				break;
			}
		}
	}		
	if($status==true){		
		$update_amount = (int)$amount + (int)$select_amount;
		$sql = "UPDATE product set pro_amount = '".$update_amount."' where pro_id = '".$data['pro_id']."'";
		if(!mysqli_query($conn,$sql)){
			die('Error : '.mysqli_error($conn));
		}		
	}else{		
		$sql="insert into product(pro_price,pro_pic,pro_amount,pro_type,pro_brand,pro_model,pro_gender,pro_strap) values('$price', '$filename', '$amount', '$displayType', '$brand', '$model', '$gen_type','$strap_type')";	
		if(!mysqli_query($conn,$sql)){
			die('Error : '.mysqli_error($conn));
		}			
	}	
?>
<script type="text/javascript">
	alert("Success");
</script>
<?php
	echo "<meta http-equiv='refresh' content='0;url=index.php#admin_page'>";
	mysqli_free_result($result);
	mysqli_close($conn);	
?>