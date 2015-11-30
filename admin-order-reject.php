<?php
	include('config/connect.php');
	$orid = $_POST['orid'];
	$sql="update orders set or_status='No' where or_id='$orid'";
	$result=mysqli_query($conn,$sql);
	echo "Reject Successful";
	mysqli_close($conn);
?>