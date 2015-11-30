<?php
	include('config/connect.php');
	$orid = $_POST['orid'];
	$sql="update orders set or_status='Yes' where or_id='$orid'";
	$result=mysqli_query($conn,$sql);
	echo "Confirm Successful";
	mysqli_close($conn);
?>