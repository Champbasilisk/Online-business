<?php
	include('config/connect.php'); 
	$sql="select distinct pro_brand from product order by pro_brand";
	if (!$result=mysqli_query($conn,$sql)){
	  die('Error: ' . mysqli_error($conn));
	}
?>
<script>
function showNewBrandForm(){
	document.getElementById('new brand').style.display = "block";
	document.getElementById('Product Brand').style.display = "none";
	document.getElementById('oldBrand').selectedIndex = 0;
}
function showExistingBrandForm(){
	document.getElementById('new brand').style.display = "none";
	document.getElementById('Product Brand').style.display = "block";
	document.getElementById('newBrand').value="";
	
}
</script>
<form class="form-horizontal my-form" role="form" name="formAddProduct" id="formAddProduct" method="post" action="add-product-insert.php" enctype="multipart/form-data">
	<div class="form-group" id="Product Brand" style="display:">
		<label class="col-sm-2 control-label"  >Product Brand</label>
		<div class="col-sm-9">
			<div class="form-group">
                <div class="col-sm-12">
                    <div class="form-group"> <!-- nested form-group acting like row -->
                        <div class="col-sm-6">
                            <div class="input-group">
                               <span class="input-group-addon"><strong>Existing Brand</strong></span>
                               <select class="form-control" name="oldBrand" id="oldBrand" onchange="check_newBrand()">
                               		<option value="0">--Select Brand--</option>;
<?php 
									$index = 0;
									if(mysqli_num_rows($result) == 0){
										echo "There is no data";
									}else{
										while($data=mysqli_fetch_array($result, MYSQLI_ASSOC)){?>
											<option value="<?php echo $data['pro_brand'] ?>"><?php echo $data['pro_brand']?></option>;
<?php 									
											$index++;
											
										}
									}
									mysqli_free_result($result);
									mysqli_close($conn);	
?>
									<!--
                               		<option value="0">--Select Brand--</option>
                               		<option value="Casio">Casio</option>
                                    <option value="Diesel">Diesel</option>
                               		<option value="Daniel Wellington">Daniel Wellington</option>
                                    -->
                               </select>
                        	</div>
                        </div><!-- /col-sm-5 -->
                        <div class="col-sm-6">
                            <div class="input-group" >
                                <input type="button" id="btn-newBrand" class="btn btn-save" value="New Brand" onclick="showNewBrandForm()"/>
                            </div>
                        </div><!-- /col-sm-5 -->
                    </div> <!-- /nested form-group acting like row -->
                </div><!-- col-sm-9 -->
 			</div><!-- /form-group -->
		</div><!-- /col-sm-9 -->
	</div><!-- /form-group -->
    
    <div class="form-group" id="new brand" style="display:none">
		<label class="col-sm-2 control-label"  >Product Brand</label>
		<div class="col-sm-9">
			<div class="form-group">
                <div class="col-sm-12">
                    <div class="form-group"> <!-- nested form-group acting like row -->
                        <div class="col-sm-6">
                            <div class="input-group">
                              <span class="input-group-addon" ><strong>New</strong></span>
                              <input class="form-control" type="text" placeholder="New Brand" name="newBrand" id="newBrand" value="" >
                         	</div>
         				 </div><!-- /col-sm-5 -->
                         <div class="col-sm-6">
                              <div class="input-group" >
                                  <input type="button" id="btn-newBrand" class="btn btn-save" value="Existing Brand" onclick="showExistingBrandForm()"/>
                              </div>
                        </div><!-- /col-sm-5 -->
                    </div> <!-- /nested form-group acting like row -->
                </div><!-- col-sm-9 -->
 			</div><!-- /form-group -->
		</div><!-- /col-sm-9 -->
	</div><!-- /form-group -->
    
    <div class="form-group">
		<label class="col-sm-2 control-label">Display Type</label>
		<div class="col-sm-6">
         	<div class="input-group">
            	<span class="input-group-addon"><i class="fa fa-tags fa-fw"></i></span>
            	<div class="radio-switch">
                    <input type="radio" name="ptype" value="Digital" id="ptype_d" class="radio-switch-input" checked>
                    <label for="ptype_d" class="radio-switch-label">Digital</label>
                    <input type="radio" name="ptype" value="Analog" id="ptype_a" class="radio-switch-input">
                    <label for="ptype_a" class="radio-switch-label">Analog</label>
                    <input type="radio" name="ptype" value="Combination" id="ptype_da" class="radio-switch-input">
                    <label for="ptype_da" class="radio-switch-label">Combination</label>
           		</div>
            </div>
		</div><!-- /col-sm-9 -->
	</div><!-- /form-group -->
    
    <div class="form-group">
		<label class="col-sm-2 control-label">Gender Type</label>
		<div class="col-sm-9">
			<div class="form-group">
                <div class="col-sm-12">
                    <div class="form-group"> <!-- nested form-group acting like row -->
                        <div class="col-sm-5">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-venus-mars fa-fw"></i></span>
                                <div class="radio-switch">
                                    <input type="radio" name="gen_type" value="Gentleman" id="gen_m" class="gender-switch-input" checked>
                                    <label for="gen_m" class="gender-switch-label">Gentleman</label>
                                    <input type="radio" name="gen_type" value="Lady" id="gen_f" class="gender-switch-input">
                                    <label for="gen_f" class="gender-switch-label">Lady</label>
                            	</div>
                        	</div>
                        </div>
                    	<label class="col-sm-2 control-label">Strap Type</label>
                        <div class="col-sm-5">
                        	<div class="input-group">
                            	<div class="input-group">
                                   <span class="input-group-addon"><i class="fa fa-sliders fa-fw"></i></span>
                                   <select class="form-control" name="strap" id="strap">
                                  		<option value="Leather">Leather</option>
                                        <option value="Metal">Metal</option>
                                        <option value="Ceramic">Ceramic</option>
                                        <option value="Plastic/Rubber">Plastic/Rubber</option>
                                        <option value="Fabric">Fabric</option>
                                   </select>
                                </div>
                            </div>
                        </div><!-- /col-sm-6 -->
                    </div> <!-- /nested form-group acting like row -->
                </div><!-- col-sm-9 -->
 			</div><!-- /form-group -->
		</div><!-- /col-sm-9 -->
	</div><!-- /form-group --> 
    
    <div class="form-group">
		<label class="col-sm-2 control-label">Product Model</label>
		<div class="col-sm-9">
			<div class="form-group">
                <div class="col-sm-12">
                    <div class="form-group"> <!-- nested form-group acting like row -->
                        <div class="col-sm-5">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-tasks fa-fw"></i></span>
                                <input class="form-control" type="text" placeholder="Model" name="model" id="model">
                            </div>
                        </div><!-- /col-sm-4 -->
                    	<label class="col-sm-2 control-label">Product Price</label>
                        <div class="col-sm-5">
                        	<div class="input-group">
                            	<span class="input-group-addon"><strong>THB</strong></span>
                                <input class="form-control" type="number" min="0" placeholder="Price" name="price" id="price">
                                <span class="input-group-addon"><strong>.00</strong></span>
                            </div>
                        </div><!-- /col-sm-6 -->
                    </div> <!-- /nested form-group acting like row -->
                </div><!-- col-sm-9 -->
 			</div><!-- /form-group -->
		</div><!-- /col-sm-9 -->
	</div><!-- /form-group --> 
    
    <div class="form-group">
		<label class="col-sm-2 control-label">Amount</label>
		<div class="col-sm-3">
			<div class="input-group">
            	<span class="input-group-addon"><i class="fa fa-terminal fa-fw"></i></span>
            	<input class="form-control" type="number" min="0" placeholder="Amount" name="amount" id="amount">
            </div>
		</div><!-- /col-sm-9 -->
	</div><!-- /form-group -->
    
    <div class="form-group">
		<label class="col-sm-2 control-label">Product Image</label>
        <div class="col-sm-9">
        	<div class="input-group">
            	<span class="input-group-addon btn btn-file">
                	Browse&hellip;<input type="file" name="fileUpload" id="fileUpload" accept="image/*" />
                </span>
            	<input type="text" class="form-control" name="fileName" id="fileName" value="" readonly>
                <span class="input-group-addon btn btn-clear" onclick="clearFile();">Clear</span>
      		</div> 
        </div>
	</div><!-- /form-group -->
    
    <div class="form-group" id="preview">
		<label class="col-sm-2 control-label" id="ImagePreview" style="display:none">Image Preview</label>
		<div class="col-sm-5">
			<div id="uploadPreview"></div>
		</div><!-- /col-sm-9 -->
	</div><!-- /form-group -->
    <!--<a href="#add_product" class="btn btn-new-product btn-xl">New Product</a>-->
    <input type="button" class="btn btn-new-product btn-xl" value="New Product" onclick="check_addProduct()" />
    <a href="#add_product" class="btn btn-cancel btn-xl" onclick="hideAddProductOnClick()">Cancel</a>
</form>