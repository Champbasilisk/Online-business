<?PHP
session_start();
unset($_SESSION['mem_name']);
$_SESSION['mem_id']="";
$_SESSION['mem_lastname'] = "";
?>
<script >alert("Loged out");</script>
<?PHP echo "<meta http-equiv='refresh' content='0;url=index.php'>"; ?>

