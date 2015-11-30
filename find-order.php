<div class="col-sm-12">
	<div class="row">
    	<div class="col-sm-4"></div>
        <div class="col-sm-4" align="center">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Enter your order id." id="orderID" name="orderID">
                <span class="input-group-addon btn btn-save" onClick="findIt();">Find!</span>
            </div>
		</div>
        <div class="col-sm-4"></div>
    </div>
</div>

<div class="col-sm-12" style="padding-top:50px;">
	<div class="row">
    	<div class="col-sm-1"></div>
        <div class="col-sm-10 bg-white" align="center" id="showFindit"></div>
        <div class="col-sm-1"></div>
    </div>
</div>

<div class="col-sm-12" style="padding-top:50px;" align="center">
	<a class="btn btn-default btn-xl page-scroll" onclick="hideFind();">Close</a>
</div>

    
<!-- Modal listview -->
  <div class="modal fade" id="ListView2" role="dialog" data-backdrop="static" data-keyboard="false" style="color:#000;">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" style="text-transform:uppercase; font-weight:bold;" align="center">List in order</h4>
        </div>
        <div class="modal-body text-alert" id="showList2">
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
<!-- /Modal listview-->