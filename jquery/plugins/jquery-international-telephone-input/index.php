<?php
	if(isset($_POST['submit'])){
		echo "<pre>";
		print_r($_POST);
		exit;
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="intl-tel-input-master/build/css/intlTelInput.min.css">
	<script type="text/javascript" src="intl-tel-input-master/build/js/intlTelInput.min.js"></script>
	<script type="text/javascript" src="intl-tel-input-master/build/js/utils.js"></script>
	<script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
</head>
<body>
	<!-- <form name="frm" action="" method="post"> -->
		<input type="tel" id="phoneNumber" name="phoneNumber" value="" placeholder="Please enter your mobile number">
		<input type="submit" name="submit" value="Send" onclick="submitForm();">
	<!-- </form> -->
	<script type="text/javascript">
		// https://intl-tel-input.com/node_modules/intl-tel-input/examples/gen/default-country-ip.html
		// https://intl-tel-input.com/node_modules/intl-tel-input/examples/gen/is-valid-number.html
		var inputPhoneNumber = document.querySelector("#phoneNumber");
		var iti = window.intlTelInput(inputPhoneNumber, {
			allowDropdown: true,
			autoHideDialCode:true,
			autoPlaceholder:'polite',
			customContainer:'clsPhoneNumberDiv',
			separateDialCode: true,
			// hiddenInput: "fullPhoneNumber", // Use if form is not ajax submit
			formatOnDisplay: true,
			initialCountry:"gb",
			nationalMode:true,
			placeholderNumberType:"MOBILE",
			utilsScript: "intl-tel-input-master/build/js/utils.js"
		});
		function submitForm(){
			let isValid = iti.isValidNumber();
			// debugger;
			console.log(isValid);
			if(isValid){
				/*let fullPhoneNumber = $('input:hidden[name=fullPhoneNumber]').val();
				console.log(fullPhoneNumber);*/

				let extension = iti.getExtension();
				console.log(extension);

				let numberType = iti.getNumberType();
				console.log(numberType);

				let number = iti.getNumber();
				console.log(number);

				let countryData = iti.getSelectedCountryData();
				console.log(countryData);
			}
			else{
				let error = iti.getExtension();
				console.log(error);
				alert("Mobile number is invalid.");
			}
		}
	</script>
</body>
</html>