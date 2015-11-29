<?PHP
include("config/connect.php");
$proid = $_POST['proid'];
$sql="select * from product where product.pro_id = '$proid'";
if (!$result=mysqli_query($conn,$sql)){
  die('Error: ' . mysqli_error($conn));
  
}
if(mysqli_num_rows($result)==0){
}else{	
while($data=mysqli_fetch_array($result, MYSQLI_ASSOC)){		
	$pro_pic  = $data['pro_pic']; 
	$pro_brand = $data['pro_brand']; 
	$pro_model = $data['pro_model']; 
	$pro_id = $data['pro_id'];
	$pro_price = $data['pro_price'];
	$pro_amount = $data['pro_amount'];
	$pro_type = $data['pro_type'];
	$pro_strap = $data['pro_strap'];
	$pro_gender = $data['pro_gender'];
	if($pro_amount>0){
		$pro_status = "Available";
	}else{
		$pro_status = "Out of Stock";	
	}
}
}?>
<style>
table tr td{
	font-size:14px;	
}
</style>
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h2 class="modal-title" id="show"> [<?PHP echo $pro_id?>] <?PHP echo $pro_brand?> (<?PHP echo $pro_model?>) </h2>
      </div>
      <div class="modal-body">
        <div class="col-sm-12 no-padding">
          <div class="row">
            <div class="col-sm-6">
              <p><img src="img/product/<?PHP echo $pro_pic ?>" class="img-thumbnail"></p>
            </div>
            <div class="col-sm-6" style="padding-left:0px;">
              <table class="table table-striped" style="font-size:16px;">
                <tr>
                  <th>Brand</th>
                  <td><?PHP echo $pro_brand ?></td>
                </tr>
                <tr>
                  <th>Model</th>
                  <td><?PHP echo $pro_model ?></td>
                </tr>
                <tr>
                  <th>Gender</th>
                  <td><?PHP echo $pro_gender ?></td>
                </tr>
                <tr>
                  <th>Display</th>
                  <td><?PHP echo $pro_type ?></td>
                </tr>
                <tr>
                  <th>Price(per ea.)</th>
                  <td id="price"><?PHP echo $pro_price ?></td>
                </tr>
                <tr style="border-bottom:1px solid rgba(153,153,153,0.3);">
                  <th>Store Status</th>
                  <td><?PHP echo $pro_status ?> <strong>(<?PHP echo $pro_amount ?> ea.)</strong></td>
                </tr>
              </table>
              <div class="col-sm-12" align="center">
                <h4><strong>Add to cart</strong></h4>
              </div>
              <div class="col-sm-12 no-padding" align="center" >
                <div class="form-group">
                  <label class="col-sm-2 control-label" style="font-size:16px;padding-top:5px;">Amount</label>
                  <div class="col-sm-10">
                    <div class="input-group"> <span class="input-group-addon"><i class="fa fa-terminal fa-fw"></i></span>
                      
                      <input class="form-control" type="number" min="0" placeholder="Amount" name="amount" id="amount" onChange="handleAmount(this);">
                    </div>
                  </div><!-- /col-sm-9 --> 
                </div><!-- /form-group --> 
              </div><!-- /col-sm-12 -->
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-id="<?PHP echo $pro_id?>" id="btn-add2cart">Add to cart</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
