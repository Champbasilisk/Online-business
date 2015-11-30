<?php
	include('config/connect.php');
	$pro_id = $_POST['proid'];
	$sql="delete from product where pro_id='$pro_id'";
	$result=mysqli_query($conn,$sql);
	echo "Delete product ".$pro_id." successful.";
	mysqli_close($conn);
?>