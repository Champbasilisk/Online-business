<?php
	include('config/connect.php'); 
	$sql="select distinct pro_brand from product order by pro_brand";
	if (!$result=mysqli_query($conn,$sql)){
	  die('Error: ' . mysqli_error($conn));
	}
?>
<link rel="stylesheet" href="css/creative.css">
<div class="container-fluid">
  	<div class="row no-gutter">
    	<div class="col-lg-5 col-sm-5"> 
        	<button class="link-btn" onclick="show_proAll()"><img src="img/logo-white-lg.png" class="img-responsive" alt=""></button>
        </div>
    	<div class="col-lg-7 col-sm-8">
        	<div class="col-sm-3" style="padding-left:0px;"> 
            	<ul class="pro-menu">
                	<li class="pro-menu-head">Brand</li>
                    <li>
                    <select class="form-control brand-combo" id="brand" name="brand" onchange="box();" >
                    <option value="0">--Select Brand--</option>;
 <?php  						
 						$index = 0;
						if(mysqli_num_rows($result) == 0){
							echo "There is no data";
						}else{
							while($data=mysqli_fetch_array($result, MYSQLI_ASSOC)){?>
								<option value="<?php echo $data['pro_brand'] ?>"><?php echo $data['pro_brand']?></option>;
<?php 							$index++;											
							}
						}
							mysqli_free_result($result);
							mysqli_close($conn);	
?>
                        </select>                        
                    </li>                    
                </ul>
            </div>
        	<div class="col-sm-2" style="padding-right:0px;"> 
            	<ul class="pro-menu">
                	<li class="pro-menu-head">Gender</li>
                    <li><input type="button" class="link-btn" value="Gentleman"  onclick="a()" id="gen_m"></li>                    
                    <li><input type="button" class="link-btn" value="Lady"  onclick="b()" id="gen_w"></li>
                </ul>
            </div>	
      		<div class="col-sm-2" style="padding-left:0px;"> 
            	<ul class="pro-menu">
                	<li class="pro-menu-head">Display</li>
                    <li><input type="button" class="link-btn" value="Digital"  onclick="display_digital()" id="display_digital"></label></li> 
                    <li><input type="button" class="link-btn" value="Analog"  onclick="display_analog()" id="display_analog"></label></li>   
                    <li><input type="button" class="link-btn" value="Combination"  onclick="display_combination()" id="display_combination"></label></li>                    
                    
                </ul>
            </div>
            <div class="col-sm-2" style="padding-right:0px;padding-left:0px;"> 
            	<ul class="pro-menu">
                	<li class="pro-menu-head">Strap</li>
                    <li><input type="button" class="link-btn" value="Leather"  onclick="strap_leather()" id="strap_leather"></li>  
                    <li><input type="button" class="link-btn" value="Metal Bracelet"  onclick="strap_metal()" id="strap_metal"></li>  
                    <li><input type="button" class="link-btn" value="Ceramic"  onclick="strap_ceramic()" id="strap_ceramic"></li>  
                    <li><input type="button" class="link-btn" value="Plastic/Rubber"  onclick="strap_pla()" id="strap_plastic"></li>  
                    <li><input type="button" class="link-btn" value="Fabric"  onclick="strap_fab()" id="strap_fabric"></li>  
                  
                </ul>
            </div>
            <div class="col-sm-3" style="padding-left:0;">
            	<ul class="pro-menu">
                	<li class="pro-menu-head">Price Range</li>
                    <li><input class="form-control" type="number" min="0" placeholder="From" id="price-form"></li>  
                    <li style="padding-top:5px;"><input class="form-control" type="number" min="0" placeholder="To" id="price-to"></li>  
                    <li style="padding-top:5px;"><input type="button" class="form-control btn btn-go" value="GO" onclick="price_range();"></li>     
                </ul>
            </div>
    	</div>
  	</div>
</div>
<div class="col-lg-12">
	<div class="col-lg-12">
    	<h3 id="show-type">Newest</h3>
    </div>
</div>

<!-- Modal detail-->
  <div class="modal fade" id="pricerRangeStatus" role="dialog" data-backdrop="static" data-keyboard="false" style="color:#000;" align="center">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" style="text-transform:uppercase; font-weight:bold;" align="center"><i class='fa fa-exclamation-triangle fa-2x'></i> Warning</h4>
        </div>
        <div class="modal-body text-alert" id="priceShowhere" align="center">
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
<!-- /Modal detail -->

<!-- Modal add2cart -->
  <div class="modal fade" id="addtocartStatus" role="dialog" data-backdrop="static" data-keyboard="false" style="color:#000;">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" style="text-transform:uppercase; font-weight:bold;" align="center"><i class="fa fa-cart-plus fa-2x"></i>  List in order</h4>
        </div>
        <div class="modal-body text-alert" id="showa2c" align="center">
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
<!-- /Modal add2cart -->
