<script type="text/javascript">
	function loadNotPay(){
		$('div#orderContent').load('admin-order-view-notPay.php');
		$('#orderContent').css('display', 'block').hide().fadeIn();
	}
	function loadWaiting(){
		$('div#orderContent').load('admin-order-view-pay.php');
		$('#orderContent').css('display', 'block').hide().fadeIn();
	}
	function loadReady(){
		$('div#orderContent').load('admin-order-view-pay.php');
		$('#orderContent').css('display', 'block').hide().fadeIn();
	}
	$(document).ready(function() {
        loadNotPay();
    });
</script>
<div class="col-sm-12" align="center">
	<h3 style="font-weight:bold;text-transform:uppercase;">Order</h3>
</div>
<div class="col-lg-12">
<div class="col-sm-1"></div>
	<div class="col-lg-10 no-padding bg-white" align="center">
        <ul class="list-inline">
            <li><a class="btn btn-link" onclick="loadNotPay();">Not payments</a></li>
            <li><a class="btn btn-link" onclick="loadWaiting();">Waiting check</a></li>
            <li><a class="btn btn-link" onclick="loadReady();">Ready Supply</a></li>
        </ul>
    </div>
<div class="col-sm-1"></div>
</div>
<div class="col-lg-12 no-padding">
	<div class="row">
		<div class="col-sm-1"></div>
        <div class="col-sm-10" id="orderContent">

        </div>
        <div class="col-sm-1"></div>
    </div>
</div>

<!-- Modal PayImg -->
  <div class="modal fade" id="statusPayImg" role="dialog" data-backdrop="static" data-keyboard="false" style="color:#000;">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" style="text-transform:uppercase; font-weight:bold;">Check Payment</h4>
        </div>
        <div class="modal-body text-alert" id="showPayImg" align="center">
        
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
<!--/ Modal PayImg-->

<!-- Modal statusPayConf -->
  <div class="modal fade" id="statusPayConf" role="dialog" data-backdrop="static" data-keyboard="false" style="color:#000;">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" style="text-transform:uppercase; font-weight:bold;">Payment Manage</h4>
        </div>
        <div class="modal-body text-alert" id="showPayConf" align="center">
        
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
<!--/ Modal statusPayConf-->