<?PHP
session_start();
include("config/connect.php");
$username = $_POST['userLogin'];
$password = $_POST['passLogin'];
$sql="select mem_name,mem_lastname,mem_id from member where username='$username' and password='$password'";
if (!$result=mysqli_query($conn,$sql)){
  die('Error: ' . mysqli_error($conn));
}
if(mysqli_num_rows($result)==0){
	echo "Username or Password is not correct.";
}else{
	$data=mysqli_fetch_array($result, MYSQLI_ASSOC);
	$_SESSION['mem_name'] = $data['mem_name'];
	$_SESSION['mem_lastname'] = $data['mem_lastname'];
	$_SESSION['mem_id'] = $data['mem_id'];
	$status_login = true;
	
	echo "<meta http-equiv='refresh' content='0;url=index.php'>";
}
/* free result set */
mysqli_free_result($result);
mysqli_close($conn);
?>