<?PHP 
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/animate.min.css" type="text/css">
    <link rel="stylesheet" href="css/creative.css" type="text/css" />
    <link rel="shortcut icon" href="img/oc-logo.png" />
    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery.min.js"></script>
<script type="text/javascript">
	function showOnClick() {
		$("#register").slideDown("slow");
		$("#mem_page").hide();
	}
	function hideOnClick() {
		$("#register").slideUp("slow");
	}
	function hideProfile() {
		$("#mem_page").slideUp();
	}
	function showCheckout() {
		$("#checkout").slideDown("slow");
		document.getElementById('contact').style.backgroundColor = "#f05f40";
		document.getElementById('contact').style.color = "#FFF";
	}
	function showProfile() {
		$('div#pageContent').load('member-show-page.php');
		$("#mem_page").slideDown();
		$("#register").hide();
	}
	function showPurchase() {
		$('div#pageContent').load('member-order-view.php');
		$("#mem_page").slideDown();
		$("#register").hide();
	}
	function hideCheckout() {
		$("#checkout").slideUp("slow");
		document.getElementById('contact').style.backgroundColor = "#FFF";
		document.getElementById('contact').style.color = "#000";
	}
	
</script>
<title>occasion watch</title>
</head>
<body id="page-top" style="padding-right:0px;">
	<nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid"> 
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
            <a class="navbar-brand page-scroll" href="#page-top">occasion watch</a> </div>
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <?PHP 
                if(!isset($_SESSION['mem_name'])){?>
                <ul class="nav navbar-nav navbar-right main-nav" id="signinBtn">
                    <li><a class="page-scroll" href="#Signin">Sign in</a></li>
                </ul>
            <?PHP }else{ include("logout-form.php"); }?>
            <ul class="nav navbar-nav navbar-right" id="common-nav">
              <li><a class="page-scroll" href="#page-top">Home</a></li>
              <li><a class="page-scroll" href="#services">Services</a></li>
              <li><a class="page-scroll" href="#product">Product</a></li>
              <li><a class="page-scroll" href="#contact">Contact</a></li>
              <li><a class="page-scroll" href="#checkout" onClick="showCheckout();"><?PHP include("cart-nav.php")?></a></li>
            </ul> 
          </div>
        </div>
        
        <div class="cd-user-modal" id="popup">
          <div class="cd-user-modal-container">
            <div id="cd-login"><!-- login -->
              <form class="cd-form" method="post" id="formLogin">
              <p class="fieldset" style="font-size:20px; font-weight:bold;">Sign in</p>
                    <div class="form-group">
                      <label for="usr">Username</label>
                      <input type="text" class="form-control input-lg has-border" style="text-align:center;" id="userLogin" autofocus/>
                    </div>
                    <div class="form-group">
                      <label for="pass">Password</label>
                      <input type="password" class="form-control input-lg has-border" style="text-align:center;" id="passLogin"/>
                       <div id="login-status" align="center" style="color:#F00;"></div>
                    </div>
                <p class="fieldset">
               
                  <input type="button" class="full-width" value="Sign in" onClick="checkLogin();"/>
                </p>
              </form>
            
            </div>
          </div>
        </div>
    </nav>
	<?PHP if($_SESSION['mem_name']=="admin_"){ ?>
			<script>
			$(document).ready(function() {
                $('#header').hide();
				$('#services').hide();
				$('#product').hide();
				$('#Proside').hide();
				$('#contact').hide();
            });
            </script>
	<?PHP } ?>
    <header id="header">
        <div class="header-content">
            <div class="header-content-inner">
                <img src="img/logo-white.png" width="750" height="177">
                <p style="padding-top:20px;margin-bottom:20px;">Create account now! get many promotion. Free! account.</p>
                <a href="#register" class="btn btn-primary btn-xl page-scroll" onclick="showOnClick()">Create Account</a>
          </div>
        </div>
    </header>
    
    <section class="bg-primary" id="mem_page" style="display:none; padding-top:35px;">
        <div class="profile no-padding">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <?PHP include("member-profile-page.php");?> 
                </div>
            </div>
        </div>
    </section>
    
    <section class="bg-primary" id="register" style="display:none;padding-top:35px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                 	<h2 class="section-heading">Create New Account</h2>
                    <hr class="light">
                    <?PHP include("register.php");?> 
                </div>
            </div>
        </div>
    </section>
    
    <section id="services" style="padding-top:35px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading" id="order">At Your Service</h2>
                    <hr class="primary">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div id="order1">
                	<?PHP include("service-show.php");?>
                </div>
            </div>
        </div>
    </section>
	
    <section class="no-padding bg-dark" id="product" style="display:block;">
    	<?PHP include("product-show-nav.php");?>
        <div id="product-show">
        	<?PHP include("product-firstpage-show.php");?>
        </div>
    </section>

    <aside class="bg-dark" style="display:block;" id="Proside">
        <div class="container text-center">
            <div class="call-to-action">
                <h2>See More Product</h2>
                <input type="button" class="btn btn-default btn-xl wow tada" value="Click here" onclick="ajx_gen()" id="gender">
            </div>
        </div>
    </aside>
    
    <section id="checkout" style="display:none;padding-top:35px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading" id="order">Checkout</h2>
                    <hr class="primary">
                    <div id="showCartView">
                    	<?PHP include("cart-view.php"); ?>
                    </div>
                    <div id="showCusField" style="display:none;">
                    	<?PHP include("cart-cus-checkout.php")?>
                    </div>
                    <a class="btn btn-primary btn-xl page-scroll" onclick="hideCheckout();">Close</a>
                </div>
            </div>
        </div>
        
        <!-- Modal orderStatus -->
          <div class="modal fade" id="orderStatus" role="dialog" data-backdrop="static" data-keyboard="false" style="color:#000;">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" style="text-transform:uppercase; font-weight:bold;" align="center"><i class='fa fa-exclamation-triangle fa-2x'></i> Checkout</h4>
                </div>
                <div class="modal-body text-alert" id="showOrderstatus" align="center">
                  
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
        <!-- /Modal orderStatus -->
    </section>
    
    <section id="contact">
        <?PHP include("contact.php");?>
    </section>
    
    <section class="bg-primary" id="admin_page" style="padding-top:35px;">
     	<div class="admin">
            <div class="row">
                <div class="col-lg-12 text-center">
                 	<h2 class="section-heading">Management</h2>
                    <hr class="light">
                    <?PHP include("admin-page.php");?>
                </div>
            </div>
      	</div>
    </section>
    <script src="js/add-product.js"></script>
    <script src="js/jquery-1.9.1.js"></script>
	<script src="js/confirm-order.js"></script>
    <script src="js/main.js"></script>
    <script src="js/callAjax.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/jquery.fittext.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/creative.js"></script>
</body>
</html>