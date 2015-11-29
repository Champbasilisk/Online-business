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
</script>
<script src="js/creative.js"></script>
<link rel="stylesheet" href="css/creative.css">
<div class="col-lg-12">
	<div class="col-lg-3"></div>
    <div id="menu-heading" class="col-lg-9" style="text-align:left">
    
    </div>
</div>

<div class="col-lg-12" style="height:auto;">
	<div class="col-lg-12 no-padding bg-dark">
        <ul class="list-inline mem-menu">
            <li><a class="btn" onclick="loadShowAll();">All Product</a></li>
            <li><a class="btn" onclick="loadAddShow();">Add Product</a></li>
        </ul>
    </div>
</div>

<div class="col-lg-12" style="height:auto;">
	<div id="manageContent" class="col-lg-12 no-padding bg-white" style="text-align:left;">
    
    </div>
</div>

<div class="col-lg-12" style="height:auto;">
    <div class="col-lg-3 no-padding" id="output"></div>
    <div id="AddContent" class="col-lg-9 no-padding" style="display:none;">
        <?PHP include("add-product-form.php");?>
    </div>
</div>
