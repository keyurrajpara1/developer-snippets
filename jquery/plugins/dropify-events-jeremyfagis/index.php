<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="dist/css/dropify.min.css">
	<script type="text/javascript" src="dist/js/jquery-3.6.0.min.js"></script>
	<script type="text/javascript" src="dist/js/dropify.min.js"></script>
</head>
<body>
<input type="file" name="" class="dropifyProduct" data-default-file="">
<br><br><br><br><br><br>
<input type="button" name="" onclick="setImage();" value="Set Image">
<input type="button" name="" onclick="clearImage();" value="Clear Image">
<script type="text/javascript">
	// https://github.com/JeremyFagis/dropify/issues/75
	var dropifyProduct;
	dropifyProduct = $('.dropifyProduct').dropify();
	dropifyProduct = dropifyProduct.data('dropify');
	if(!dropifyProduct.isDropified()){
		dropifyProduct.init();
	}
	function setImage(){ // Edit
		var dropifyProduct = $('.dropifyProduct').dropify();
		dropifyProduct = dropifyProduct.data('dropify');
		dropifyProduct.resetPreview();
		dropifyProduct.clearElement();
		dropifyProduct.settings['defaultFile'] = '3b8ad2c7b1be2caf24321c852103598a.jpg';
		dropifyProduct.destroy();
		dropifyProduct.init();
	}
	function clearImage(){
		var dropifyProduct = $('.dropifyProduct').dropify();
		dropifyProduct = dropifyProduct.data('dropify');
		dropifyProduct.resetPreview();
		dropifyProduct.clearElement();
		dropifyProduct.settings['defaultFile'] = '';
		dropifyProduct.destroy();
		// if(!dropifyProduct.isDropified()){
			dropifyProduct.init();
		// }
	}
</script>
</body>
</html>