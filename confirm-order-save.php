<?PHP 
session_start();
include("config/connect.php");
$orid = $_SESSION['orid'];
if(is_array($_FILES)) {
	$filename = $_FILES['payImage']['name'];
	$temp=explode(".",$filename);
	$extension=end($temp);	
	$newfilename = $_SESSION['orid'].".".$extension;
	if(is_uploaded_file($_FILES['payImage']['tmp_name'])) {
		$sourcePath = $_FILES['payImage']['tmp_name'];
		$targetPath = "img/payment/".$newfilename;
		
		$sqlConfirmPay = "UPDATE orders SET or_payImg = '$newfilename',or_status = 'Waiting' where or_id = $orid";
		if(!mysqli_query($conn,$sqlConfirmPay)){
			die('Error : '.mysqli_error($conn));
		}
		mysqli_close($conn);	
		if(move_uploaded_file($sourcePath,$targetPath)) {
			echo "Success";
		}
	}
}
?>