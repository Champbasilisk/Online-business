<script src="js/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
	function loadShow(){
		$('div#pageContent').load('member-show-page.php');
		$("#payContent").hide();
		$('#pageContent').css('display', 'block').hide().fadeIn();
	}
	function editShow(){
		$('div#pageContent').load('member-edit-page.php');
		$("#payContent").hide();
		$('#pageContent').css('display', 'block').hide().fadeIn();
	}
	function passShow(){
		$('div#pageContent').load('member-editpass-page.php');
		$("#payContent").hide();
		$('#pageContent').css('display', 'block').hide().fadeIn();
	}
	function orderShow(){
		$('div#pageContent').load('member-order-view.php');
		$('#pageContent').css('display', 'block').hide().fadeIn();
	}
</script>
<script src="js/creative.js"></script>
<link rel="stylesheet" href="css/creative.css">
<div class="col-lg-12">
	<div class="col-lg-3"></div>
    <div id="menu-heading" class="col-lg-9" style="text-align:left">
    
    </div>
</div>
<div class="col-lg-12" style="height:auto;">
	<div class="col-lg-3 no-padding bg-dark">
        <ul class="mem-menu">
            <li><a href="#show-page" class="btn" onclick="loadShow();">Profile</a></li>
            <li><a href="#purchase-page" class="btn" onclick="orderShow();">Purchase</a></li>
            <li><a href="#history-page" class="btn">Purchase History</a></li>
            <li><a href="#password-page" class="btn" onclick="passShow()">Change Password</a></li>
        </ul>
    </div>
    <div id="pageContent" class="col-lg-9 no-padding bg-white" style="text-align:left;">
    
    
    </div>
</div>
<div class="col-lg-12" style="height:auto;">
    <div class="col-lg-3 no-padding" id="output"></div>
    <div id="payContent" class="col-lg-9 no-padding bg-info" style="display:none;">
        <?PHP include("confirm-order-form.php");?>
    </div>
</div>
 
<div class="col-sm-12">
	<hr class="light">
	<a href="#page-top" class="page-scroll btn btn-default btn-xl" onclick="hideProfile()">Close</a>
</div>
<!-- Modal listview -->
  <div class="modal fade" id="ListView" role="dialog" data-backdrop="static" data-keyboard="false" style="color:#000;">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" style="text-transform:uppercase; font-weight:bold;" align="center">List in order</h4>
        </div>
        <div class="modal-body text-alert" id="showList">
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
<!-- /Modal listview-->

<!-- Modal Update-->
  <div class="modal fade" id="statusUpdate" role="dialog" data-backdrop="static" data-keyboard="false" style="color:#000;">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" style="text-transform:uppercase; font-weight:bold;" align="center">Update Member</h4>
        </div>
        <div class="modal-body text-alert" id="showUpdate" align="center">
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
<!--/ModalUpdate -->

<!-- Modal Confirm-->
  <div class="modal fade" id="statusConfirm" role="dialog" data-backdrop="static" data-keyboard="false" style="color:#000;">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" style="text-transform:uppercase; font-weight:bold;" align="center">Payment</h4>
        </div>
        <div class="modal-body text-alert" id="showConfirm" align="center">
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
<!--/Modal Confirm -->
