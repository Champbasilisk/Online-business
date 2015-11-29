<meta http-equiv=Content-Type content="text/html; charset=utf-8">
<?php
	include('config/connect.php');
	//$p_name=$_POST['p_name'];
	$username = $_POST['username'];		$password = $_POST['password'];
	$firstname = $_POST['firstname'];	$lastname = $_POST['lastname'];
	$birthday = $_POST['birthday'];	
	$gender = $_POST['gender'];		
	$phone = $_POST['phone'];			$email = $_POST['email'];			
	$address = $_POST['address'];		$province = $_POST['province'];		$postcode = $_POST['postcode'];
	$idcard = $_POST['idcard'];
	
	/*echo $username . " " . $password . " " . $firstname . " " . $lastname . " " . $sex . " " . $phone . " " . $email . " " . $address . " " . $province . " " . $postcode . " " . $idcard . " " . $birthday;*/
	$sql = "select * from member where username = '".$username."'";
	if($username=="" || $password=="" || $firstname=="" || $lastname=="" || $birthday=="" || $phone=="" || $email=="" || $address=="" || $province=="" || $postcode=="" || $postcode=="" || $idcard==""){
		echo "<i class='fa fa-exclamation-triangle fa-2x'></i>  Please fill in all fields.";		
	}else{
		$status = false;
		if(!$result=mysqli_query($conn,$sql)){
			die('Error : ' . mysqli_error($conn));
		}
		if(mysqli_num_rows($result) == 0){
			//echo "There is no data";
		}else{
			while($data=mysqli_fetch_array($result, MYSQLI_ASSOC)){
				if(strcmp ($username, $data['username'])==0){
					$status = true;		
					break;
				}
			}
		}
		if($status == true){
			echo "<i class='fa fa-user-times fa-2x'></i>  Account name is already exist";		
			//echo "<meta http-equiv='refresh' content='0;url=index.php'>";	
			mysqli_free_result($result);
		}else{
			$sql="insert into member(username,password,mem_name,mem_lastname,mem_idcard,mem_sex,mem_address,mem_province,mem_phone,mem_email,mem_birthday,postcode) values('$username', '$password', '$firstname', '$lastname', '$idcard', '$gender', '$address', '$province', '$phone', '$email', '$birthday', '$postcode')";
			if(!mysqli_query($conn,$sql)){
				die('Error : '.mysqli_error($conn));
			}
			echo "Registered Successfully. Enjoy shopping.";
	
		}
	}
		//echo "<meta http-equiv='refresh' content='0;url=index.php'>";
		mysqli_close($conn);	
	//}	
?>	