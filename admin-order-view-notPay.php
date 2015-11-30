<?php
	include('config/connect.php');
	
	$sql = "select * from orders where or_status='No'";
	if(!$result=mysqli_query($conn,$sql)){
		die('Error : ' . mysqli_error($conn));
	}
	if(mysqli_num_rows($result) == 0){
		echo "There is no data";
	}else{?> 
    	<div class="col-lg-12 no-padding">
        	<div class="row">
            <div class="col-sm-1"></div>
            <div class="col-lg-10 no-padding" style="background-color:#FFF;">
			<table class="table table-striped table-bordered text-format" align="center" style="box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.28);">
            <tr style="font-weight:bold;">
                <td>or_id</td>
                <td>or_date</td>
                <td>or_sum	</td>
                <td>cus_id</td>
                <td>mem_id</td>
                <td>or_status</td>
                <td>check</td>
                <td>confirm</td>
                <td>reject</td>
            </tr>		
		<?PHP
		while($data=mysqli_fetch_array($result, MYSQLI_ASSOC)){
			$date = $data['or_date'];
			$res = explode("-",$date);
			$newDate = $res[2]."/".$res[1]."/".($res[0]+543);
		?>
            <tr>
            	<td class="order-id"><?PHP echo $data['or_id']?></td>
                <td><?PHP echo $newDate?></td>
                <td><?PHP echo $data['or_sum']?></td>
                <td><?PHP echo $data['cus_id']?></td>
                <td><?PHP echo $data['mem_id']?></td>
                <td><?PHP echo $data['or_status']?></td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
            </tr>
     
<?PHP } ?>
			</table>
            </div>
             <div class="col-sm-1"></div>
           </div>
      </div>
<?php
	}
	mysqli_free_result($result);
	mysqli_close($conn);
	
?>
