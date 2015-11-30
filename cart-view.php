<?PHP 
ini_set('error_reporting', 0);
ini_set('display_errors', 0);
session_start();
include("config/connect.php");
  $Total = 0;
  $SumTotal = 0;
  $count = 0;
  $totalItem = 0;
  ?>
<table class="table" width="100%">
	<tr align="left" style="background:rgba(204,204,204,0.2);">
    	<td class="head-checkout" width="10%">product</td>
        <td width="50%"></td>
        <td class="head-checkout" width="10%">Quantity</td>
        <td width="10%"></td>
        <td class="head-checkout" align="right" width="20%">Price</td>
    </tr>
  <?PHP
  for($i=0;$i<=(int)$_SESSION["intLine"];$i++){
  	if($_SESSION["proID"][$i] != "")
	  {
		$strSQL = "SELECT * FROM product WHERE pro_id = '".$_SESSION["proID"][$i]."' ";
		$objQuery = mysqli_query($conn,$strSQL)  or die(mysql_error());
		$objResult = mysqli_fetch_array($objQuery);
		$Total = $_SESSION["listAmount"][$i] * $objResult["pro_price"];
		$totalItem+=$_SESSION["listAmount"][$i];
		$totalValue[$i] = $Total;
		$SumTotal+= $Total;
		$_SESSION['sumtotal'] = $SumTotal;	
		$count+=1;
		$_SESSION["Count"] = $count;
		$_SESSION['allTotal'] = $totalValue;
		?>
		<tr valign="middle" style="border-bottom:3px solid rgba(204,204,204,0.7);">
            <td valign="middle"><img src="img/product/<?php echo $objResult['pro_pic']; ?>" class="img-responsive" width="120"></td>
            <td align="left">
                <div class="brand-checkout"><?php echo $objResult["pro_brand"];?></div>
                <div><?php echo $objResult["pro_model"];?></div>
            </td>
            <td align="right">
                <input class="form-control" type="number" min="0" name="checkoutAmount" id="checkoutAmount" value="<?php echo $_SESSION["listAmount"][$i];?>">
            </td>
            <td align="left"><a class="btn" data-id="<?php echo $i;?>" id="del-list"><i class="fa fa-trash fa-2x"></i></a></td>
            <td align="right"><div class="price-checkout"><?php echo number_format($Total);?> THB</div></td>
    	</tr>
    <?PHP	
	  }
  }
?>
<link href="css/creative.css">
   	<tr>
    	<td colspan="2" class="no-border"></td>
    	<td colspan="2" align="left" class="checkout-menu tr-bg-left">Total list</td>
        <td align="right" class="checkout-sum tr-bg-right"><?php echo $_SESSION["Count"] ;?></td>
   	</tr>
    <tr>
    	<td colspan="2" class="no-border"></td>
    	<td colspan="2" align="left" class="checkout-menu">Total Items</td>
        <td align="right" class="checkout-sum"><?php echo $totalItem; ?></td>
   	</tr>
    <tr>
    	<td colspan="2" class="no-border"></td>
    	<td colspan="2" align="left" class="checkout-menu tr-bg-left">Delivery</td>
        <td align="right" class="checkout-sum tr-bg-right">FREE</td>
   	</tr>
    
    <tr>
    	<td colspan="2" class="no-border"></td>
    	<td colspan="2" align="left" class="order-total">Order total</td>
        <input type="hidden" id="sumtotal" value="<?php echo $SumTotal?>">
        <td align="right" class="order-total"><?php echo number_format($SumTotal);?> THB</td>
   	</tr>
    <tr>
    	<td colspan="2" class="no-border"></td>
        <td colspan="3">
        	<input type="button" value="proceed to checkout" class="form-control btn btn-checkout" onclick="save2order();"/>
        </td>
   	</tr>
</table>
<?php
	mysqli_close($conn);
?>
