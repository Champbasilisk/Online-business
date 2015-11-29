<?php
session_start();
	include('config/connect.php');
	$mem_id = $_SESSION['mem_id'];
	$firstname = $_POST['firstname'];	$lastname = $_POST['lastname'];
	$birthday = $_POST['birthday'];	
	$gender = $_POST['gender'];		
	$phone = $_POST['phone'];			$email = $_POST['email'];			
	$address = $_POST['address'];		$province = $_POST['province'];		$postcode = $_POST['postcode'];
	$idcard = $_POST['idcard'];

	$sqlUpdatemember = "UPDATE member SET mem_name = '$firstname',mem_lastname = '$lastname',mem_idcard = '$idcard',
	mem_sex = '$gender',mem_address = '$address',mem_province ='$province',postcode = '$postcode',mem_phone ='$phone',
	mem_email = '$email',mem_birthday = '$birthday' where mem_id = $mem_id";
	
	if(!mysqli_query($conn,$sqlUpdatemember)){
		die('Error : '.mysqli_error($conn));
	}
	echo "Update Successful";
	mysqli_close($conn);		
?>	
