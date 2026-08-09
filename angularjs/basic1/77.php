<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Angular JS Forms</title>
	<!-- jQuery scripts -->
	<script src="js/jquery-3.6.0.min.js"></script>
	<script src="js/jquery.validate.min.js"></script>

	<!-- Angular scripts -->
	<script src="js/angular.min.js"></script>
	<script src="js/angular-validate.min.js"></script>
	<style type="text/css">
		/*input.ng-invalid.ng-touched{
			border: 1px solid red;
		}*/
	</style>
	<script type="text/javascript">
		var app = angular.module("myModule", ['ngValidate']);
		// app.controller('formController', function ($scope) {

		app.controller("formController",['$scope','$ngValidate', function($scope, $ngValidate) {
			
			$scope.validationOptions = {
			    rules: {
			        email: {
			            required: true,
			            email: true
			        },
			        password: {
			            required: true,
			            minlength: 6
			        }
			    },
			    messages: {
			        email: {
			            required: "We need your email address to contact you",
			            email: "Your email address must be in the format of name@domain.com"
			        },
			        password: {
			            required: "You must enter a password",
			            minlength: "Your password must have a minimum length of 6 characters"
			        }
			    }
			}

			$scope.register = function () {
			    if ($scope.registerform.validate()) {
			    	alert('valid!');
			    }
			}

		}]);
	</script>
</head>
<body>
<h2>AngularJS Sample Application</h2>
<div ng-app="myModule" ng-controller="formController">
	<form name="registerform" ng-validate="validationOptions">
	    <input type="email" name="email">
	    <input type="password" name="password">
	</form>
	<button ng-click="register()">validate</button>
</div>
</body>
</html>