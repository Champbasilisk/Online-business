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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<h3 class="uppercase">Profile</h3>
<form>
<table class="table table-hover" style="font-size:15px;">
  <tr>
    <th valign="top" width="15%">Name</th>
    <td>
    
    <div class="col-sm-12 no-padding">
        <div class="row">
          <div class="col-sm-5">
            <div class="input-group"> <span class="input-group-addon"><strong>Firstname</strong></span>
              
              <input class="form-control" type="text" value="<?PHP echo $data['mem_name']?>" id="firstname" name="firstname">
            </div>
          </div>
          <div class="col-sm-5"></div>
        </div>
        <div class="row" style="padding-top:5px;">
          <div class="col-sm-5">
            <div class="input-group"> <span class="input-group-addon"><strong>Lastname</strong></span>
              <input class="form-control" type="text" value="<?PHP echo $data['mem_lastname']?>" id="lastname" name="lastname">
            </div>
          </div>
          <div class="col-sm-5"></div>
        </div>
      </div></td>
  </tr>
  <tr>
    <th valign="top">ID Card</th>
    <td><div class="col-sm-12 no-padding">
        <div class="row" align="left">
          <div class="col-sm-5">
            <div class="input-group"> <span class="input-group-addon"><i class="fa fa-credit-card fa-fw"></i></span>
              <input class="form-control" type="text" value="<?PHP echo $data['mem_idcard']?>" id="idcard" name="idcard">
            </div>
          </div>
          <div class="col-sm-5"></div>
        </div>
      </div></td>
  </tr>
  <tr>
    <th valign="top">Gender</th>
    <td><div class="col-sm-12 no-padding">
        <div class="row" align="left">
          <div class="col-sm-4">
            <div class="radio-switch" style="border-bottom-left-radius:4px;border-top-left-radius:4px;">
              <?PHP if($data['mem_sex']=="Male"){?>
              <input type="radio" name="sex" value="Male" id="sex_m" class="gender-switch-input" checked="checked">
              <label for="sex_m" class="gender-switch-label">Male</label>
              <input type="radio" name="sex" value="Female" id="sex_f" class="gender-switch-input">
              <label for="sex_f" class="gender-switch-label">Female</label>
              <?PHP }else{  ?>
              <input type="radio" name="sex" value="Male" id="sex_m" class="gender-switch-input" >
              <label for="sex_m" class="gender-switch-label">Male</label>
              <input type="radio" name="sex" value="Female" id="sex_f" class="gender-switch-input" checked="checked">
              <label for="sex_f" class="gender-switch-label">Female</label>
              <?PHP }?>
            </div>
          </div>
          <div class="col-sm-6"></div>
        </div>
      </div></td>
  </tr>
  <tr>
    <th valign="top">Address</th>
    <td><div class="col-sm-12 no-padding">
      <div class="row" align="left">
        <div class="col-sm-10">
          <div class="input-group"> <span class="input-group-addon"><i class="fa fa-map-marker fa-fw"></i></span>
            <input class="form-control" type="text" value="<?PHP echo $data['mem_address']?>" id="address" name="address">
          </div>
        </div>
        <div class="col-sm-2"></div>
      </div>
      <div class="col-sm-12 no-padding" style="padding-top:5px;">
        <div class="row" align="left">
          <div class="col-sm-5">
            <input class="form-control" type="text" value="<?PHP echo $data['mem_province']?>" id="province" name="province">
          </div>
          <div class="col-sm-3" style="padding-left:0px;">
            <input class="form-control" type="text" value="<?PHP echo $data['postcode']?>" id="postcode" name="postcode">
          </div>
          <div class="col-sm-4"></div>
        </div>
      </div></td>
  </tr>
  <tr>
    <th valign="top">Phone</th>
    <td><div class="col-sm-12 no-padding">
        <div class="row" align="left">
          <div class="col-sm-5">
            <div class="input-group"> <span class="input-group-addon"><i class="fa fa-phone fa-fw"></i></span>
              <input class="form-control" type="text" value="<?PHP echo $data['mem_phone']?>" id="phone" name="phone">
            </div>
          </div>
          <div class="col-sm-5"></div>
        </div>
      </div></td>
  </tr>
  <tr>
    <th valign="top">Email</th>
    <td><div class="col-sm-12 no-padding">
        <div class="row" align="left">
          <div class="col-sm-5">
            <div class="input-group"> <span class="input-group-addon"><i class="fa fa-envelope fa-fw"></i></span>
              <input class="form-control" type="text" value="<?PHP echo $data['mem_email']?>" id="email" name="email">
            </div>
          </div>
          <div class="col-sm-5"></div>
        </div>
      </div></td>
  </tr>
  <tr style="border-bottom:1px solid rgba(51,51,51,0.2);">
    <th>Birthday</th>
    <td>
    	<div class="input-group col-sm-4">
        	<span class="input-group-addon"><i class="fa fa-gift fa-fw"></i></span>
            <input class="form-control" type="text" data-provide="datepicker" data-date-language="th-th" placeholder="DD/MM/YYYY" name="birthday" id="birthday" value="<?PHP echo $newDate;?>">
        </div>
    </td>
  </tr>
  <tr style="background:white;">
    <th></th>
    <td><div class="row" style="padding-top:5px;">
        <div class="col-sm-5">
          <input type="button" class="btn btn-save" value="SAVE" onclick="updateMember();"/>
          <input type="button" class="btn btn-can" onclick="loadShow()" value="Cancel" /></form>
        </div>
        <div class="col-sm-5"></div>
      </div></td>
  </tr>
</table>
<?PHP }
}
mysqli_free_result($result);
mysqli_close($conn);
?>
