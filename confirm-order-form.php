<div class="col-sm-12">
    <div class="col-sm-12">
      <h3 class="uppercase" style="color:#000;">Confirm Order</h3>
    </div>
</div>
<form class="form-horizontal my-form" id="formPay">
  <div class="form-group">
    <label class="col-sm-2 control-label" style="color:#000;">Slip Image</label>
    <div class="col-sm-4">
      <div class="input-group"><span class="input-group-addon btn btn-file"> Browse&hellip;
        <input type="file" name="payImage" id="payImage" accept="image/*" />
        </span>
        <span class="input-group-addon btn btn-clear" onClick="clearPayImg();">Cancel</span> </div>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label" id="imgPre" style="display:none">Image Preview</label>
    <div class="col-sm-5">
      <div id="PayPreview"></div>
    </div>
  </div>
   <div class="form-group">
    <label class="col-sm-2 control-label"></label>
    <div class="col-sm-5" align="left">
      <div><input type="submit" class="btn btn-go" value="OK" id="con-ok"/></div>
    </div>
  </div>
</form>
