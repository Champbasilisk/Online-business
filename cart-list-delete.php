<?PHP
	ob_start();
	session_start();
	$product = $_POST["product"];
	$_SESSION["proID"][$product]="";
	$_SESSION["listAmount"][$product] = "";
	$_SESSION["Count"]-=1;
?>