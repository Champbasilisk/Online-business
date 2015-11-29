<div class="col-lg-12 bg-info" style="padding:35px 0; border-radius:10px;margin-bottom:20px;">
<div class="col-lg-12"><h2 class="section-heading">Shipment Detail</h2><hr class="primary"></div>
<form class="form-horizontal my-form" role="form" id="cus-form">
	<div class="form-group">
		<label class="col-sm-2 control-label">Name</label>
		<div class="col-sm-9">
			<div class="form-group">
                <div class="col-sm-12">
                    <div class="form-group"> <!-- nested form-group acting like row -->
                        <div class="col-sm-6">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
                                <input class="form-control" type="text" placeholder="First name" id="cus-firstname" name="firstname">
                            </div>
                        </div><!-- /col-sm-6 -->
                        <div class="col-sm-6">
                              	<input class="form-control" type="text" placeholder="Last name" id="cus-lastname" name="lastname">
                        </div><!-- /col-sm-6 -->
                    </div> <!-- /nested form-group acting like row -->
                </div><!-- col-sm-9 -->
 			</div><!-- /form-group -->
		</div><!-- /col-sm-9 -->
	</div><!-- /form-group --> 
    
    <div class="form-group">
		<label class="col-sm-2 control-label">Address</label>
		<div class="col-sm-9">
			<div class="input-group">
            	<span class="input-group-addon"><i class="fa fa-map-marker fa-fw"></i></span>
            	<input class="form-control" type="text" placeholder="Address" id="cus-address" name="address">
            </div>
		</div><!-- /col-sm-9 -->
	</div><!-- /form-group -->
    
    <div class="form-group">
  		<div class="col-sm-offset-2 col-sm-9">
			<div class="form-group"> <!-- nested form-group acting like row -->
    			<div class="col-sm-4">
     				<input type="text" class="form-control" placeholder="Province" id="cus-province" name="province">
    			</div><!-- /col-sm-4 -->
    			<div class="col-sm-2">
     				<input type="text" class="form-control" type="number" placeholder="Postcode" id="cus-postcode" name="postcode">
    			</div><!-- /col-sm-2 -->
                <div class="col-sm-6"></div><!-- /col-sm-6 -->
   			</div> <!-- /nested form-group acting like row -->
  		</div><!-- /col-sm-offset-3 col-sm-9 -->
 	</div><!-- /form-group -->
    
      <div class="form-group">
		<label class="col-sm-2 control-label">Contact</label>
		<div class="col-sm-9">
			<div class="form-group">
                <div class="col-sm-12">
                    <div class="form-group"> <!-- nested form-group acting like row -->
                        <div class="col-sm-4">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-phone fa-fw"></i></span>
                                <input class="form-control" type="text" placeholder="Phone" id="cus-phone" name="phone">
                            </div>
                        </div><!-- /col-sm-6 -->
                    
                        <div class="col-sm-8">
                        	<div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope fa-fw"></i></span>
                                <input class="form-control" type="text" placeholder="Email" id="cus-email" name="email">
                            </div>
                        </div><!-- /col-sm-6 -->
                    </div> <!-- /nested form-group acting like row -->
                </div><!-- col-sm-9 -->
 			</div><!-- /form-group -->
		</div><!-- /col-sm-9 -->
	</div><!-- /form-group --> 
    
    <hr class="primary">
    <div class="col-sm-12" align="center">
        <input type="button" class="btn btn-info btn-xl" value="Purchase without account" onclick="cus2order();"/> 
        <input type="button" class="btn btn-warning btn-xl" value="Cancle" onclick="cus2orderForm();"/> 
    </div>
</form>
</div>