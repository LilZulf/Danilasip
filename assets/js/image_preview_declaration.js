$(document).ready(function() {
	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			
			reader.onload = function (e) {
				var image = new Image();
				image.src = e.target.result;

				image.onload = function() {
					if(this.width<=2000 && this.height<=2000){
						$('#display_image').attr({src: e.target.result});
					}else{
						alert('Image was too big');
					}
				};
			}
			reader.readAsDataURL(input.files[0]);
		}
	}
	var _validFileExtensions = [".jpg", ".jpeg", ".bmp", ".gif", ".png"];    
	function ValidateSingleInput(oInput) {
		if (oInput.type == "file") {
			var sFileName = oInput.value;
			if (sFileName.length > 0) {
				var blnValid = false;
				for (var j = 0; j < _validFileExtensions.length; j++) {
					var sCurExtension = _validFileExtensions[j];
					if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
						blnValid = true;
						break;
					}
				}
				if (!blnValid) {
					alert("Sorry, " + sFileName + " is invalid, allowed extensions are: " + _validFileExtensions.join(", "));
					oInput.value = "";
					return false;
				}
			}
		}
		return true;
	}
	$("#input_image").change(function(){
		var image = document.getElementById('input_image');
		if(ValidateSingleInput(this)){
			readURL(this);
		}
	});


});
