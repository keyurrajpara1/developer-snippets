<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<script type="text/javascript" src="js/angular.min.js"></script>
	<style type="text/css">
		input.ng-invalid{
			background-color: yellow;
		}
		input.ng-valid{
			background-color: lawngreen;
		}
		form.ng-pristine{
			background-color: aqua;
		}
		form.ng-dirty{
			background-color: mediumaquamarine;
		}
	</style>
</head>
<body ng-app="">
	<form name="myForm">
		<h2>My Form</h2>
		<input type="text" name="myName" ng-model="myName" placeholder="Enter your name" required>
	</form>
</body>
</html>