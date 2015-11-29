<?PHP
	$host="localhost";
	$user="root";
	$password="";
	$dbname="e-business_watchonline";
	$item_per_page = 5;
	//connect to database
	$conn = mysqli_connect($host,$user,$password,$dbname);
	//check connection 
	if (mysqli_connect_errno()) {
		echo "Connect failed: ".mysqli_connect_error();
		exit();
	}
	//set charset for thai
	mysqli_set_charset($conn, "utf8");
?>
