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
	
?>
<h3 class="uppercase">Change Password</h3>
<form id="formChange">
<table class="table table-hover" style="font-size:15px;" cellpadding="0" cellspacing="0">
  <tr style="background:white;">
    <th valign="top" width="15%">Username</th>
    <td><?PHP echo $data['username']?></td>
  </tr>
  <tr style="background:white;">
    <th valign="top" width="15%">Old password</th>
    <td >
        <div class="row" align="left">
          <div class="col-sm-5">
            <div class="input-group"> <span class="input-group-addon"><i class="fa fa-unlock-alt fa-fw"></i></span>
              <input class="form-control" type="password" id="oldpass" name="oldpass">
            </div>
          </div>
        </div>
      </div></td>
  </tr>
  <tr style="background:#f5f5f5;">
    <th valign="top">New password</th>
    <td>
        <div class="row" align="left">
          <div class="col-sm-5">
            <div class="input-group"> <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
              <input class="form-control" type="password" id="newPass1" name="newPass1">
            </div>
          </div>
        </div>
      </div></td>
  </tr>
  <tr style="background:#f5f5f5;border-top:hidden;">
    <th valign="top" width="15%">Re-enter new password</th>
    <td>
        <div class="row" align="left">
          <div class="col-sm-5">
            <div class="input-group"> <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
              <input class="form-control" type="password" id="newPass2" name="newPass2">
            </div>
            <p style="font-style:italic; font-size:10px; color:#F00;margin-bottom:0px;"> ***Notice : Password must be the same with the new password above. </p>
          </div>
        </div>
      </div></td>
  </tr>
  <tr style="background:white;">
    <th></th>
    <td><div class="row" style="padding-top:5px;">
        <div class="col-sm-5">
          <input type="button" class="btn btn-save" onclick="checkPass();" value="SAVE" />
          <input type="button" class="btn btn-can" onclick="loadShow();" value="Cancel" />
        </div>
      </div></td>
  </tr>
</table>
</form>
<?PHP }
}
?>
