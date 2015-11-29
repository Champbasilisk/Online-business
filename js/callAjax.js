// JavaScript Document
var xmlhttp;
function loadXMLDoc(url,cfunc){
	if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	}else{// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=cfunc;
	xmlhttp.open("GET",url,true);
	xmlhttp.send();
}

$(document).ready( function() {
	$('#user').bind('keypress', function(e) {
    	//space bar
        if (e.which == 32){
        	e.preventDefault();
        }
    });
	$('#pass').bind('keypress', function(e) {
    	//space bar
        if (e.which == 32){
        	e.preventDefault();
        }
    });
	$('#firstname').bind('keypress', function(e) {
    	//space bar
        if (e.which == 32){
        	e.preventDefault();
        }
    });
	$('#lastname').bind('keypress', function(e) {
    	//space bar
        if (e.which == 32){
        	e.preventDefault();
        }
    });
	$('#email').bind('keypress', function(e) {
    	//space bar
        if (e.which == 32){
        	e.preventDefault();
        }
    });
	$("#phone").keydown(function (e) {
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
            (e.keyCode == 65 && ( e.ctrlKey === true || e.metaKey === true ) ) || 
            (e.keyCode >= 35 && e.keyCode <= 40)) {
                 return;
        }
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
	$('#postcode').bind('keypress', function(e) {
    	//space bar
        if (e.which == 32 || e.which == 45){
        	e.preventDefault();
        }
    });
});
function checkLogin(){
	var userLogin = document.getElementById('userLogin').value;
	var passLogin = document.getElementById('passLogin').value;
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("POST","checkLogin.php",true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.send("userLogin="+userLogin+"&passLogin="+passLogin);
    xmlhttp.onreadystatechange = function() {
	    if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
		    var return_data = xmlhttp.responseText;
			document.getElementById('login-status').innerHTML = return_data;
			$('#login-status').css('display', 'block').hide().fadeIn();
			
	    }
    }
	
}
function registerInsert(){
	var xmlhttp = new XMLHttpRequest();
	var sex = document.getElementsByName('sex');
	var gender = ""
	for (var i = 0, length = sex.length; i < length; i++) {
		if (sex[i].checked) {
			gender = sex[i].value;
			break;
		}
	}
	var bd = document.getElementById('birthday').value;
	var res = bd.split("/");
	var birthday = (res[2]-543)+"-"+res[1]+"-"+res[0];
	var username = document.getElementById('user').value;
	var password = document.getElementById('pass').value;
	var firstname = document.getElementById('firstname').value;
	var lastname = document.getElementById('lastname').value;
	var phone = document.getElementById('phone').value;
	var email = document.getElementById('email').value;
	var address = document.getElementById('address').value;
	var province = document.getElementById('province').value;
	var postcode = document.getElementById('postcode').value;
	var idcard = document.getElementById('idcard').value;
	var url = "register-insert.php";
	var send_val = "username="+username+"&password="+password+"&firstname="+firstname+"&lastname="+lastname+"&birthday="+birthday+"&gender="+gender+"&phone="+phone+"&email="+email+"&address="+address+"&province="+province+"&postcode="+postcode+"&idcard="+idcard;
	xmlhttp.open("POST",url,true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.send(send_val);
    xmlhttp.onreadystatechange = function() {
	    if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
		    var return_data = xmlhttp.responseText;
			jQuery("#statusRegister").modal('show');
			document.getElementById('showhere').innerHTML = return_data;
			document.getElementById('form-register').reset();
	    }
    }
}
function updateMember(){
	var xmlhttp = new XMLHttpRequest();
	var sex = document.getElementsByName('sex');
	var gender = ""
	for (var i = 0, length = sex.length; i < length; i++) {
		if (sex[i].checked) {
			gender = sex[i].value;
			break;
		}
	}	
	var bd = document.getElementById('birthday').value;
	var res = bd.split("/");
	var birthday = (res[2]-543)+"-"+res[1]+"-"+res[0];
	var firstname = document.getElementById('firstname').value;
	var lastname = document.getElementById('lastname').value;
	var phone = document.getElementById('phone').value;
	var email = document.getElementById('email').value;
	var address = document.getElementById('address').value;
	var province = document.getElementById('province').value;
	var postcode = document.getElementById('postcode').value;
	var idcard = document.getElementById('idcard').value;
	var url = "member-edit-update.php";
	var send_val = "firstname="+firstname+"&lastname="+lastname+"&birthday="+birthday+"&gender="+gender+"&phone="+phone+"&email="+email+"&address="+address+"&province="+province+"&postcode="+postcode+"&idcard="+idcard;
	xmlhttp.open("POST",url,true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.send(send_val);
    xmlhttp.onreadystatechange = function() {
	    if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
		    var return_data = xmlhttp.responseText;
			jQuery("#statusUpdate").modal('show');
			document.getElementById('showUpdate').innerHTML = return_data;
	    }
    }
}

function checkPass(){
	var xmlhttp = new XMLHttpRequest();	
	var oldPass = document.getElementById('oldpass').value;
	var newpass1 = document.getElementById('newPass1').value;
	var newpass2 = document.getElementById('newPass2').value;
	xmlhttp.open("POST","member-editpass-save.php",true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.send("oldpass="+oldPass+"&newpass1="+newpass1+"&newpass2="+newpass2);
    xmlhttp.onreadystatechange = function() {
	    if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
		    var return_data = xmlhttp.responseText;
			jQuery("#statusUpdate").modal('show');
			document.getElementById('showUpdate').innerHTML = return_data;
			document.getElementById('formChange').reset();
	    }
    }
}
function a(){
	var gen_data=document.getElementById("gen_m").value;
	//alert(gen_data);
	if(gen_data==""){
		//alert("Please input all fields");
	}else{
		loadXMLDoc("product-show-page.php?keey="+gen_data+"&v=non",function(){
			if (xmlhttp.readyState==4 && xmlhttp.status==200){
				document.getElementById("product-show").innerHTML=xmlhttp.responseText;
				$('#product-show').css('display', 'block').hide().fadeIn();
				document.getElementById('show-type').innerHTML="Gentleman watch";
			}
		});
	}
}


function b(){
	
	var gen_data=document.getElementById("gen_w").value;
	//alert(gen_data);
	if(gen_data==""){
		alert("Please input all fields");
	}else{
		loadXMLDoc("product-show-page.php?keey="+gen_data+"&v=non",function(){
			if (xmlhttp.readyState==4 && xmlhttp.status==200){
				document.getElementById("product-show").innerHTML=xmlhttp.responseText;
				$('#product-show').css('display', 'block').hide().fadeIn();
				document.getElementById('show-type').innerHTML="Lady watch";
			}
		});
	}
}

function display_digital(){
	
	var data=document.getElementById("display_digital").value;
	
	if(data==""){
		alert("Please input all fields");
	}else{
		loadXMLDoc("product-show-page.php?keey="+data+"&v=non",function(){
			if (xmlhttp.readyState==4 && xmlhttp.status==200){
				document.getElementById("product-show").innerHTML=xmlhttp.responseText;
				$('#product-show').css('display', 'block').hide().fadeIn();
				document.getElementById('show-type').innerHTML="Digital";
			}
		});
	}
}

function display_analog(){
	
	var data=document.getElementById("display_analog").value;
	
	if(data==""){
		alert("Please input all fields");
	}else{
		loadXMLDoc("product-show-page.php?keey="+data+"&v=non",function(){
			if (xmlhttp.readyState==4 && xmlhttp.status==200){
				document.getElementById("product-show").innerHTML=xmlhttp.responseText;
				$('#product-show').css('display', 'block').hide().fadeIn();
				document.getElementById('show-type').innerHTML="Analog";
			}
		});
	}
}

function display_combination(){
	
	var data=document.getElementById("display_combination").value;
	//alert(data);
	if(data==""){
		alert("Please input all fields");
	}else{
		loadXMLDoc("product-show-page.php?keey="+data+"&v=non",function(){
			if (xmlhttp.readyState==4 && xmlhttp.status==200){
				document.getElementById("product-show").innerHTML=xmlhttp.responseText;
				$('#product-show').css('display', 'block').hide().fadeIn();
				document.getElementById('show-type').innerHTML="Combination";
			}
		});
	}
}


function box(){
	var data=document.getElementById("brand").value;
	if(data==""){
		alert("Please input all fields");
	}else{
		loadXMLDoc("product-show-page.php?keey="+data+"&v=combo",function(){
			if (xmlhttp.readyState==4 && xmlhttp.status==200){
				document.getElementById("product-show").innerHTML=xmlhttp.responseText;
				$('#product-show').css('display', 'block').hide().fadeIn();
				document.getElementById('show-type').innerHTML=data;				
			}
		});
	}
}




function strap_leather(){
	
	var data=document.getElementById("strap_leather").value;
	//alert(data);
	if(data==""){
		alert("Please input all fields");
	}else{
		loadXMLDoc("product-show-page.php?keey="+data+"&v=strap",function(){
			if (xmlhttp.readyState==4 && xmlhttp.status==200){
				document.getElementById("product-show").innerHTML=xmlhttp.responseText;
				$('#product-show').css('display', 'block').hide().fadeIn();
				document.getElementById('show-type').innerHTML="Leather Strap";
			}
		});
	}
}


function strap_metal(){
	
	var data=document.getElementById("strap_metal").value;
	//alert(data);
	if(data==""){
		alert("Please input all fields");
	}else{
		loadXMLDoc("product-show-page.php?keey="+data+"&v=strap",function(){
			if (xmlhttp.readyState==4 && xmlhttp.status==200){
				document.getElementById("product-show").innerHTML=xmlhttp.responseText;
				$('#product-show').css('display', 'block').hide().fadeIn();
				document.getElementById('show-type').innerHTML="Metal Strap";
			}
		});
	}
}


function strap_ceramic(){
	
	var data=document.getElementById("strap_ceramic").value;
	//alert(data);
	if(data==""){
		alert("Please input all fields");
	}else{
		loadXMLDoc("product-show-page.php?keey="+data+"&v=strap",function(){
			if (xmlhttp.readyState==4 && xmlhttp.status==200){
				document.getElementById("product-show").innerHTML=xmlhttp.responseText;
				$('#product-show').css('display', 'block').hide().fadeIn();
				document.getElementById('show-type').innerHTML="Ceramic Strap";
			}
		});
	}
}


function strap_pla(){
	
	var data=document.getElementById("strap_plastic").value;
	
	if(data==""){
		alert("Please input all fields");
	}else{
		loadXMLDoc("product-show-page.php?keey="+data+"&v=strap",function(){
			if (xmlhttp.readyState==4 && xmlhttp.status==200){
				document.getElementById("product-show").innerHTML=xmlhttp.responseText;
				$('#product-show').css('display', 'block').hide().fadeIn();
				document.getElementById('show-type').innerHTML="Plastic Strap";
			}
		});
	}
}


function strap_fab(){
	
	var data=document.getElementById("strap_fabric").value;
	
	if(data==""){
		alert("Please input all fields");
	}else{
		loadXMLDoc("product-show-page.php?keey="+data+"&v=strap",function(){
			if (xmlhttp.readyState==4 && xmlhttp.status==200){
				document.getElementById("product-show").innerHTML=xmlhttp.responseText;
				$('#product-show').css('display', 'block').hide().fadeIn();
				document.getElementById('show-type').innerHTML="Fabric Strap";
			}
		});
	}
}

function show_proAll(){
	$('div#product-show').load('product-firstpage-show.php');
	document.getElementById('show-type').innerHTML = 'Newest';
	$('#product-show').css('display', 'block').hide().fadeIn();
}

function price_range(){
	var price_from = document.getElementById('price-form').value;
	var price_to = document.getElementById('price-to').value;
	if(price_from=="" || price_to==""){
		jQuery("#pricerRangeStatus").modal('show');
		document.getElementById('priceShowhere').innerHTML = "Please enter your desired price.";
	}else{
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.open("POST","product-pricerange-show.php",true);
		xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xmlhttp.send("pricefrom="+price_from+"&priceto="+price_to);
		xmlhttp.onreadystatechange = function() {
			if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				var return_data = xmlhttp.responseText;
				document.getElementById("product-show").innerHTML=return_data;
				$('#product-show').css('display', 'block').hide().fadeIn();
				document.getElementById('show-type').innerHTML="Price Range";
				document.getElementById('price-form').value = "";
				document.getElementById('price-to').value = "";
				
			}
		}
		
	}
	
}
function ajx_gen(){
	var gen_data=document.getElementById("gender").value;
	//alert(gen_data);
	if(gen_data==""){
		//alert("Please input all fields");
	}else{
		loadXMLDoc("product-show-all.php?keey="+gen_data+"&v=non",function(){
			if (xmlhttp.readyState==4 && xmlhttp.status==200){
				document.getElementById("product-show").innerHTML=xmlhttp.responseText;
				$('#product-show').css('display', 'block').hide().fadeIn();
				document.getElementById('show-type').innerHTML="All product";
			}
		});
	}
}
$(document).on("click", "#goModal", function () {
	var proid = $(this).data('id');
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("POST","product-modal-show.php",true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.send("proid="+proid);
    xmlhttp.onreadystatechange = function() {
	    if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
		    var return_data = xmlhttp.responseText;	
			jQuery("#myModal").modal('show');
			document.getElementById('myModal').innerHTML = return_data;
			
	    }
    }
});
$(document).on("click", "#btn-add2cart", function () {
	var proid = $(this).data('id');
	var amount = $("#amount").val();
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("POST","cart-list.php",true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.send("proid="+proid+"&amount="+amount);
    xmlhttp.onreadystatechange = function() {
	    if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
		    var return_data = xmlhttp.responseText;
			jQuery("#addtocartStatus").modal('show');
			$('#showCartView').load('cart-view.php');
			$('.numberCircle').load('count-show.php');
			$('#myModal').modal('hide');
			document.getElementById('showa2c').innerHTML = return_data;	
	    }
    }
});

$(document).on("click", "#del-list", function () {
	var product = $(this).data('id');
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("POST","cart-list-delete.php",true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.send("product="+product);
    xmlhttp.onreadystatechange = function() {
	    if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
		   $('#showCartView').load('cart-view.php');
		   $('.numberCircle').load('count-show.php');
	    }
    }
});
function save2order(){
	var sumtotal = document.getElementById('sumtotal').value;
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("POST","cart-to-order-save.php",true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.send("sumtotal="+sumtotal);
    xmlhttp.onreadystatechange = function() {
	    if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			 var return_data = xmlhttp.responseText;
			 jQuery("#orderStatus").modal('show');
			 document.getElementById('showOrderstatus').innerHTML = return_data;
			 $('#showCartView').load('cart-view.php');
		   	 $('.numberCircle').load('count-show.php');	
			 //$('#showCusField').load('cart-cus-checkout.php');
	    }
    }
}

function cus2order(){
	var fname = document.getElementById('cus-firstname').value;
	var lname = document.getElementById('cus-lastname').value;
	var addr = document.getElementById('cus-address').value;
	var prov = document.getElementById('cus-province').value;
	var post = document.getElementById('cus-postcode').value;
	var phon = document.getElementById('cus-phone').value;
	var mail = document.getElementById('cus-email').value;
	var send_data = "fname="+fname+"&lname="+lname+"&addr="+addr+"&prov="+prov+"&post="+post+"&phone="+phon+"&email="+mail;
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("POST","cart-cus-to-order-save.php",true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.send(send_data);
    xmlhttp.onreadystatechange = function() {
	    if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			 var return_data = xmlhttp.responseText;
			 jQuery("#orderStatus").modal('show');
			 document.getElementById('showOrderstatus').innerHTML = return_data;
			 $('#showCartView').load('cart-view.php');
		   	 $('.numberCircle').load('count-show.php');
			 document.getElementById('cus-form').reset();
	    }
    }
}

$(document).on("click", "#showcusfield", function () {
	$('#orderStatus').modal('hide');
	$('#showCusField').load("cart-cus-checkout.php");	
	$('#showCusField').slideDown();
});

function cus2orderForm(){
	$('#showCusField').slideUp();
	 document.getElementById('cus-form').reset();	
}
//----------------------------------------------------------------------//
$(document).on("click", "#viewList", function () {
	var orid = $(this).data('id');
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("POST","member-order-view-list.php",true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.send("orid="+orid);
    xmlhttp.onreadystatechange = function() {
	    if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
		    var return_data = xmlhttp.responseText;
			jQuery("#ListView").modal('show');
			document.getElementById('showList').innerHTML = return_data;
	    }
    }
});

$(document).on("click", "#confirm", function () {
	var orid = $(this).data('id');
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("POST","confirm-order-id.php",true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.send("orid="+orid);
    xmlhttp.onreadystatechange = function() {
	    if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			$('#payContent').css('display', 'block').hide().fadeIn();
			$('#payContent').slideDown();
	    }
    }
});

$("#formPay").on('submit',(function(e) {
	e.preventDefault();
	$.ajax({
		url: "confirm-order-save.php",
		type: "POST",
		data:  new FormData(this),
		contentType: false,
    	cache: false,
		processData:false,
		success: function(data)
		{
			$("#targetLayer").html(data);
			$('div#pageContent').load('member-order-view.php');
			$('#pageContent').css('display', 'block').hide().fadeIn();
			document.getElementById('slipName').value='';
			document.getElementById('payImage').value='';
			document.getElementById('PayPreview').style.display = "none";
			document.getElementById('imgPre').style.display = "none";
			document.getElementById('con-ok').style.display = "none";
		}	        
	});
}));
	
//-----------------------------------------------------------------------//

//-----------------------------------------------------------------------//
