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
<input type="button" name="" onclick="init();" value="Init">
<input type="button" name="" onclick="destory();" value="Destory">
<input type="button" name="" onclick="setImage();" value="Set Image">
<input type="button" name="" onclick="clearImage();" value="Clear Image">
<script type="text/javascript">
	var dropify;
	function init(){
		dropify = $('.dropifyProduct').dropify();
		dropify = dropify.data('dropify');
		if(!dropify.isDropified()){
			dropify.init();
		}
	}
	function destory(){
		/*dropify.destroy();*/
		var dropify = $('.dropifyProduct').dropify();
		dropify = dropify.data('dropify');
		dropify.resetPreview();
		dropify.clearElement();
		dropify.settings['defaultFile'] = '';
		dropify.destroy();
	}
	function setImage(){
		var dropify = $('.dropifyProduct').dropify();
		dropify = dropify.data('dropify');
		dropify.resetPreview();
		dropify.clearElement();
		dropify.settings['defaultFile'] = '3b8ad2c7b1be2caf24321c852103598a.jpg';
		dropify.destroy();
		dropify.init();
	}
	function clearImage(){
		var dropify = $('.dropifyProduct').dropify();
		dropify = dropify.data('dropify');
		dropify.resetPreview();
		dropify.clearElement();
		dropify.settings['defaultFile'] = '';
		dropify.destroy();
		dropify.init();
	}
</script>
</body>
</html>