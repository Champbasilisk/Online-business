<?PHP 
session_start();
include('config/connect.php');
$orid = $_POST['orid'];
$sql = "select * from orders where orders.or_id = $orid";
if (!$result=mysqli_query($conn,$sql)){
	die('Error: ' . mysqli_error($conn));
}
if(mysqli_num_rows($result)==0){
	echo "<div class='col-sm-12'>
        	<div class='row'>
            	<div class='col-sm-2'><h3 class='uppercase'>You Order</h3></div>
            </div>
        </div>
        <table class='table table-hover' style='font-size:15px;'>
         	<tr style='background:white;'>
                <th width='15%'>Order ID</th>
                <th>Date</th>
                <th>Subdetail</th>
                <th>Order Total</th>
                <th>Payment</th>
            </tr>
			<tr><td colspan='5' align='center' style='font-weight:bold;'>No order.</td></tr>
		</table>
			";
}else{?>
		<div class="col-sm-12">
        	<div class="row">
            	<div class="col-sm-2"><h3 class="uppercase">You Order</h3></div>
                <div class="col-sm-10 no-padding" align="right">
                 
                </div>
            </div>
        </div>
        <table class="table table-hover" style="font-size:15px;">
         	<tr style="background:white;">
                <th width="20%">Order ID</th>
                <th width="20%">Date</th>
                <th width="20%">Order Detail</th>
                <th width="20%">Order Total</th>
                <th width="20%">Payment</th>
            </tr>
    <?PHP
	while($data=mysqli_fetch_array($result, MYSQLI_ASSOC)){ 
		$date = $data['or_date'];
		$res = explode("-",$date);
		$newDate = $res[2]."/".$res[1]."/".($res[0]+543);
	?>
		<tr>
        	<td class="order-id"><?PHP echo $data['or_id']; ?></td>
        	<td><?PHP echo $newDate; ?></td>
            <td><a class="btn link-btn" id="viewList2" data-id="<?PHP echo $data['or_id']; ?>">View List</a></td>
            <td><?PHP echo $data['or_sum']; ?></td>
	<?PHP 	if($data['or_status']=='No'){?>
            <td style="font-weight:bold;color:#F05F04;">
				<?PHP echo $data['or_status']; ?>
            </td>
    <?PHP 	}if($data['or_status']=='Waiting'){?>
     		<td style="font-weight:bold;color:#999;">
				<?PHP echo $data['or_status']; ?>
            </td>
	<?PHP 	}if($data['or_status']=='Yes'){?>
     		<td style="font-weight:bold;color:#0C3;">
				<?PHP echo $data['or_status']; ?>
            </td>
	<?PHP	}?>
        </tr>
    
<?PHP } ?>
 </table>

<?PHP } ?>
<?php
	mysqli_close($conn);
?>
