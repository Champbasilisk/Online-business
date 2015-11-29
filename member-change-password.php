<?PHP
session_start();
include("config/connect.php");
$mem_id = $_SESSION['mem_id'];
$sql = "select * from member where mem_id = '$mem_id'";
if (!$result=mysqli_query($conn,$sql)){
	die('Error: ' . mysqli_error($conn));
}
if(mysqli_num_rows($result)==0){
	echo "There is no data";
}else{
	while($data=mysqli_fetch_array($result, MYSQLI_ASSOC)){ 
	
	
	?>
<?PHP }
}
?>