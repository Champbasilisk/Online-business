<?PHP
session_start();
include("config/connect.php");
$mem_id = $_SESSION['mem_id'];
$sql = "select * from member where mem_id = '$mem_id'";
if (!$result=mysqli_query($conn,$sql)){
	die('Error: ' . mysqli_error($conn));
}
if(mysqli_num_rows($result)==0){
	echo "There is no data";
}else{
	while($data=mysqli_fetch_array($result, MYSQLI_ASSOC)){ 
		$date = $data['mem_birthday'];
		$res = explode("-",$date);
		$newDate = $res[2]."/".$res[1]."/".($res[0]+543);
	?>
    	<div class="col-sm-12">
        	<div class="row">
            	<div class="col-sm-2"><h3 class="uppercase">Profile</h3></div>
                <div class="col-sm-10 no-padding" align="right">
                 	<h3><input type="button" class="btn btn-save" value="EDIT profile" onclick="editShow()"/></h3>
                </div>
            </div>
        </div>
        <table class="table table-hover" style="font-size:15px;">
         	<tr>
                <th valign="top">Name</th>
                <td><?PHP echo $data['mem_name']."\t".$data['mem_lastname']?> </td>
            </tr>
        	<tr>
        		<th>ID Card</th>
            	<td><?PHP echo $data['mem_idcard']?></td>
        	</tr>
        	<tr>
                <th>Gender</th>
                <td><?PHP echo $data['mem_sex']?></td>
            </tr>
         	<tr>
                <th>Address</th>
                <td><?PHP echo $data['mem_address']." ".$data['mem_province']." ".$data['postcode']?></td>
            </tr> 
        	<tr>
                <th>Phone</th>
                <td><?PHP echo $data['mem_phone']?></td>
            </tr> 
        	<tr>
                <th>Email</th>
                <td><?PHP echo $data['mem_email']?></td>
            </tr>
        	<tr style="border-bottom:1px solid rgba(51,51,51,0.2);">
                <th>Birthday</th>
                <td><?PHP echo $newDate;?></td>
            </tr>
		</table>	
<?PHP }
}
?>