<?PHP 
$proid = $_POST['proid'];
include("config/connect.php");
$sql="select * from product where product.pro_id = '$proid'";
if (!$result=mysqli_query($conn,$sql)){
  die('Error: ' . mysqli_error($conn));
  
}
if(mysqli_num_rows($result)==0){
}else{	
	while($data=mysqli_fetch_array($result, MYSQLI_ASSOC)){		
		$amount = $data['pro_amount'];
	}
}
?>
<div class="modal-dialog modal-sm">
  <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title" style="text-transform:uppercase; font-weight:bold;">Add/Reduce Amount</h4>
    </div>
    <div class="modal-body text-alert" align="center">
    <h4 style="font-weight:bold;">pro_id : <?PHP echo $proid;?></h4>
    <input class="form-control" type="number" min="0" name="amount2" id="amount2" value="<?PHP echo $amount;?>" required="required">
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-info" data-id="<?PHP echo $proid?>" id="addAmountPro">Update</button>
      <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
    </div>
  </div>
</div>
