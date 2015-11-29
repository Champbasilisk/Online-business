<?PHP 
session_start();
include('config/connect.php');
$or_id = $_POST['orid'];
$sql = "select * from listorder,product where listorder.or_id = '$or_id' and listorder.pro_id = product.pro_id";
if (!$result=mysqli_query($conn,$sql)){
	die('Error: ' . mysqli_error($conn));
}
if(mysqli_num_rows($result)==0){
}else{?>
<table class="table" width="100%">
	<tr align="left" style="background:rgba(204,204,204,0.2);">
    	<td class="head-checkout" width="10%">product</td>
        <td width="50%"></td>
        <td class="head-checkout" width="10%">Quantity</td>
        <td class="head-checkout" width="20%" align="right">Price</td>
    </tr>
<?PHP
$sum_amount = 0;
$sum_total = 0;
	while($data=mysqli_fetch_array($result, MYSQLI_ASSOC)){ 
		$sum_amount+=$data["list_amount"];
		$sum_total+=$data["list_totalprice"];
	?>
		<tr valign="middle" style="border-bottom:3px solid rgba(204,204,204,0.7);">
            <td valign="middle"><img src="img/product/<?php echo $data['pro_pic']; ?>" class="img-responsive" width="120"></td>
            <td align="left">
                <div class="brand-checkout"><?php echo $data["pro_brand"];?></div>
                <div><?php echo $data["pro_model"];?></div>
            </td>
            <td><?php echo $data["list_amount"];?></td>
            <td align="right"><?php echo number_format($data["list_totalprice"]);?> THB</td>
    	</tr>
	<?PHP }	 ?>
    	<tr class="tr-bg-left">
        	<td></td>
            <td align="right" class="checkout-menu">Total Items</td>
            <td align="center" class="checkout-sum"><?php echo $sum_amount;?></td>
            <td align="right" class="order-id"><?php echo number_format($sum_total);?> THB</td>
        </tr>
	</table>
<?php } 
	mysqli_close($conn);
?>
