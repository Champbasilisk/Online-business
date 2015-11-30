<script src="js/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
	function loadShowAll(){
		$('div#manageContent').load('all-product-show.php');
		$('#manageContent').css('display', 'block').hide().fadeIn();
		$("#AddContent").hide();
	}
	function loadAddShow(){
		$('#AddContent').css('display', 'block').hide().fadeIn();
		$("#manageContent").hide();
	}
	function loadOrderShow(){
		$('div#manageContent').load('admin-order-page.php');
		$('#manageContent').css('display', 'block').hide().fadeIn();
		$("#AddContent").hide();
	}
	$(document).ready(function() {
        loadShowAll();
    });
</script>
<script src="js/creative.js"></script>
<link rel="stylesheet" href="css/creative.css">

<div class="col-lg-12" style="height:auto;">
	<div class="col-lg-12 no-padding bg-dark">
        <ul class="list-inline mem-menu">
            <li><a class="btn" onclick="loadShowAll();">All Product</a></li>
            <li><a class="btn" onclick="loadAddShow();">Add Product</a></li>
            <li><a class="btn" onclick="loadOrderShow();">Order</a></li>
        </ul>
    </div>
</div>

<div class="col-lg-12" style="height:auto;">
	<div id="manageContent" class="col-lg-12 no-padding bg-white" style="text-align:left;">
    
    </div>
</div>

<div class="col-lg-12">
    <div id="AddContent" class="col-lg-12 no-padding bg-white" style="display:none; padding-bottom:35px;">
    	<div class="row">
        	<div class="col-lg-1"></div>
        	<div class="col-lg-10">
            	<?PHP include("add-product-form.php");?>
            </div>
            <div class="col-lg-1"></div>
        </div>
    </div>
</div>

<!-- Modal AddPro -->
  <div class="modal fade" id="statusAddPro" role="dialog" data-backdrop="static" data-keyboard="false" style="color:#000;">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" style="text-transform:uppercase; font-weight:bold;"><i class="fa fa-shopping-bag fa-2x"></i> add product</h4>
        </div>
        <div class="modal-body text-alert" id="showAddPro" align="center">
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
<!--/ Modal AddPro-->

<!-- Modal Manage -->
  <div class="modal fade" id="statusManage" role="dialog" data-backdrop="static" data-keyboard="false" style="color:#000;">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" style="text-transform:uppercase; font-weight:bold;"><i class="fa fa-cog fa-2x"></i> Manage product</h4>
        </div>
        <div class="modal-body text-alert" id="showManage" align="center">
        
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
<!--/ Modal Manage-->

<!-- Modal addAmonut -->
  <div class="modal fade" id="addAmonut" role="dialog" data-backdrop="static" data-keyboard="false" style="color:#000;">
   <div id="addAmonutShow"></div>
  </div>
<!--/ Modal addAmonut-->

<!-- Modal statusaddAmonut -->
  <div class="modal fade" id="statusaddAmonut" role="dialog" data-backdrop="static" data-keyboard="false" style="color:#000;">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" style="text-transform:uppercase; font-weight:bold;"><i class="fa fa-cog fa-2x"></i> Manage product</h4>
        </div>
        <div class="modal-body text-alert" id="showaddstatus" align="center">
        
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
<!--/ Modal statusaddAmonut-->
