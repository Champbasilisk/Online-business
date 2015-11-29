// JavaScript Document
function clearPayImg() {
		document.getElementById('payImage').value='';
		document.getElementById('PayPreview').style.display = "none";
		document.getElementById('imgPre').style.display = "none";
		document.getElementById('con-ok').style.display = "none";
		$('#payContent').slideUp();
	}
$("#payImage").on('change', function () {
	if (typeof (FileReader) != "undefined") {
		var PayPreview = $("#PayPreview");
        PayPreview.empty();
        var reader = new FileReader();
        reader.onload = function (e) {
        	$("<img />", {
            	"src": e.target.result,
            	"class": "img-thumbnail"
        	}).appendTo(PayPreview);
        }
		document.getElementById('imgPre').style.display = "block";
		document.getElementById('con-ok').style.display = "block";
        PayPreview.show();
        reader.readAsDataURL($(this)[0].files[0]);
    } else {
		alert("This browser does not support FileReader.");
	}
});