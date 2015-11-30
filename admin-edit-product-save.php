<?PHP
include('config/connect.php');
$proid = $_POST['proid'];
$amount = $_POST['amount'];
$sqlUpdateProduct = "UPDATE product SET pro_amount = '$amount' where pro_id = $proid";
	
if(!mysqli_query($conn,$sqlUpdateProduct)){
	die('Error : '.mysqli_error($conn));
}
echo "Update Successful";
mysqli_close($conn);
?>