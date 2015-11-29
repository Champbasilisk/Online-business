<?PHP
session_start();
include("config/connect.php");

$keey = $_GET['keey'];
$va =$_GET['v'];

if($keey == "Gentleman"||$keey == "Lady"){	
	$sql="select * from product where product.pro_gender = '$keey' ";	
}else if($keey == "Digital"||$keey == "Analog"){
	$sql="SELECT * FROM product WHERE pro_type ='$keey'";
}else if($keey == "Combination"){
	$sql="SELECT * FROM product WHERE pro_type = '$keey'";
}else if($va=="combo"){
	$sql="SELECT * FROM product WHERE pro_brand = '$keey'";
}else if($va == "strap"){
	$sql="SELECT * FROM product WHERE pro_strap like '%$keey%'";
}		
if (!$result=mysqli_query($conn,$sql)){
	 die('Error: ' . mysqli_error($conn));  
}
if(mysqli_num_rows($result)==0){
}else{?>
<link rel="stylesheet" href="css/creative.css">
<div class="container-fluid">
  	<div class="row no-gutter">
    	<div class="col-lg-12" style="padding:0 15px;">
<?PHP 
		$i=1;
		while($data=mysqli_fetch_array($result, MYSQLI_ASSOC)){				
			$pro_id = $data['pro_id'];			
			$pro_pic  = $data['pro_pic']; 
			$pro_brand = $data['pro_brand']; 
			$pro_model = $data['pro_model']; 
			$pro_price = $data['pro_price'];
			if(strlen($pro_model)>20){
				$subModel = substr($pro_model, 0, 20)."...";		
			}else{ $subModel = $pro_model; }
			
			if(strlen($pro_brand)>15){
				$subBrand = substr($pro_brand, 0, 15)."...";		
			}else{ $subBrand = $pro_brand; }
			?>     
<?PHP 		if($i>12)break;
			if($i%6==0){?>
            	<div class="col-sm-2"> 
                        <a class="product-box btn-modal" data-id="<?PHP echo $pro_id?>" id="goModal">
                            <img src="img/product/<?PHP echo $pro_pic ?>" class="img-responsive">
                            <div class="product-box-caption">
                                <div class="product-box-caption-content">
                                    <div class="type-category text-faded">
                                        <?PHP echo $pro_brand ?>
                                    </div>
                                    <div class="type-name">
                                        <?PHP echo $pro_model ?>
                                    </div>
                                     <div style="padding-top:50px;">
                                        <input type="button" class="link-btn more-detail" value="more click">
                                    </div>
                                </div>
                            </div>
                        </a>
                        <div class="subDetail">
                            <div class="brand_text"><?PHP echo $subBrand ?><br></div>
                            <div class="model_text"><?PHP echo $subModel ?><br></div>
                            <div class="price_text">Price :  <?PHP echo number_format($pro_price) ?>  THB</div>
                       </div>
                    </div>    
            
           	 	</div>
                <div class="col-lg-12" style="padding:0 15px;padding-top:30px;">     
<?PHP 		}else{?>
                <div class="col-sm-2"> 
                        <a class="product-box btn-modal" data-id="<?PHP echo $pro_id?>" id="goModal">
                            <img src="img/product/<?PHP echo $pro_pic ?>" class="img-responsive">
                            <div class="product-box-caption">
                                <div class="product-box-caption-content">
                                    <div class="type-category text-faded">
                                        <?PHP echo $pro_brand ?>
                                    </div>
                                    <div class="type-name">
                                        <?PHP echo $pro_model ?>
                                    </div>
                                     <div style="padding-top:50px;">
                                        <input type="button" class="link-btn more-detail" value="more click">
                                    </div>
                                </div>
                            </div>
                        </a>
                        <div class="subDetail">
                            <div class="brand_text"><?PHP echo $subBrand ?><br></div>
                            <div class="model_text"><?PHP echo $subModel ?><br></div>
                            <div class="price_text">Price :  <?PHP echo number_format($pro_price) ?>  THB</div>
                       </div>
                    </div>         
                 
<?PHP		}     
			$i = $i+1; 
		}?>
		</div>
	</div>
</div>
<div id="myModal" class="modal fade text-format" data-backdrop="static" data-keyboard="false">

</div>
<?PHP
} 
mysqli_free_result($result);
mysqli_close($conn);
?>