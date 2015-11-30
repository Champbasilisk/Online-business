<?php
	include('config/connect.php');
	$orid = $_POST['orid'];	
	$sql = "select * from member,orders where or_id='$orid' and orders.mem_id = member.mem_id ";		
	
	$result = mysqli_query($conn, $sql);	
	
	while($data=mysqli_fetch_array($result,MYSQLI_ASSOC)){?>   
    	<div class="col-sm-12 no-padding">
          <div class="row">
            <div class="col-sm-6">
              <p><img src="img/payment/<?php echo $data['or_payImg']; ?>" class="img-thumbnail"/> </p>
            </div> 
            <div class="col-sm-6" style="padding-left:0px;">
            	<table class="table table-striped" style="font-size:16px;">
                    <tr>
                      <th>Order ID</th>
                      <td><?PHP echo $orid;?></td>
                    </tr>
                     <tr>
                      <th>Member name</th>
                      <td><?PHP echo $data['mem_name']." ".$data['mem_lastname'];?></td>
                    </tr>
                    <tr>
                      <th>Order Total</th>
                      <td><?PHP echo $data['or_sum'];?></td>
                    </tr>
                </table>
            </div>
          </div>  
     	</div>         
        
<?php }
	mysqli_free_result($result);
	mysqli_close($conn);
?>
    	