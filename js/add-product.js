// JavaScript Document
function clearFile() {
	document.getElementById('fileUpload').value='';
	document.getElementById('uploadPreview').style.display = "none";
	document.getElementById('ImagePreview').style.display = "none";
}
$("#fileUpload").on('change', function () {
	if (typeof (FileReader) != "undefined") {
		var uploadPreview = $("#uploadPreview");
        uploadPreview.empty();
        var reader = new FileReader();
        reader.onload = function (e) {
        	$("<img />", {
            	"src": e.target.result,
            	"class": "img-thumbnail"
        	}).appendTo(uploadPreview);
        }
		document.getElementById('ImagePreview').style.display = "block";
        uploadPreview.show();
        reader.readAsDataURL($(this)[0].files[0]);
    } else {
		alert("This browser does not support FileReader.");
	}
});