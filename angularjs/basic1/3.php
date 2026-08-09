<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<script type="text/javascript" src="js/angular.min.js"></script>
</head>
<body>
	<h2>AngularJS Sample Application</h2>
	<div ng-app="">
		<table border="0">
			<tr>
				<td><input type="checkbox" ng-model="enableDisableButton">Disable Button</td>
				<td><button ng-disabled="enableDisableButton">Click Me!</button></td>
			</tr>
			<tr>
				<td><input type="checkbox" ng-model="showHide">Show Button</td>
				<td><button ng-show="showHide">Click Me!</button></td>
			</tr>
			<tr>
				<td><p>Total click: {{ clickCounter }}</p></td>
				<td><button ng-click="clickCounter = clickCounter + 1">Click Me!</button></td>
			</tr>
		</table>
	</div>
</body>
</html>