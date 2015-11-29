<?php
session_start();
	include('config/connect.php');
	$mem_id = $_SESSION['mem_id'];
	$oldpass = $_POST['oldpass'];
	$newpass1 = $_POST['newpass1'];
	$newpass2 = $_POST['newpass2'];
	$sql = "select password from member where mem_id = '$mem_id'";
	if (!$result=mysqli_query($conn,$sql)){
		die('Error: ' . mysqli_error($conn));
	}else{
		while($data=mysqli_fetch_array($result, MYSQLI_ASSOC)){ 
			$pass= $data['password'];
		}
	}
	
	if($oldpass==""){
		echo "Plese enter old password.";
	}
	else{
		if($pass!=$oldpass){
			echo "Old password not correct.";
		}else{
			if($newpass1=="" || $newpass2==""){
				echo "Please enter New password<br>and Re-enter new password.";
			}
			else if($newpass1!=$newpass2){
				echo "New password and Re-enter not match.";
			}else{
				$sqlUpdatemember = "UPDATE member SET password = '$newpass1' where mem_id = $mem_id";
				if(!mysqli_query($conn,$sqlUpdatemember)){
					die('Error : '.mysqli_error($conn));
				}
				echo "Change password Successful";
				mysqli_close($conn);	
			}
		}
	}
		
?>	
