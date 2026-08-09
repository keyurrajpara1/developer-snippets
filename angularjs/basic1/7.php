<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Angular JS Forms</title>
	<script type="text/javascript" src="js/angular.min.js"></script>
	<style type="text/css">
		input.ng-invalid.ng-touched{
			border: 1px solid red;
		}
	</style>
	<script type="text/javascript">
		var app = angular.module("myModule", []);
		app.controller('formController', function ($scope) {
			$scope.reset = function () {
				$scope.firstName = "";
				$scope.lastName = "";
				$scope.email = "";
			}
		});
	</script>
</head>
<body>
<h2>AngularJS Sample Application</h2>
<div ng-app="myModule" ng-controller="formController">
	<form name="studentForm">
		{{studentData}} <br><br>
		{{"studentForm.firstname.$error.required : " + studentForm.firstname.$error.required}} <br>
		{{"studentForm.firstname.$error.minlength : " + studentForm.firstname.$error.minlength}} <br>
		{{"studentForm.firstname.$error.maxlength : " + studentForm.firstname.$error.maxlength}} <br><br>
		{{"studentForm.lastname.$error.required : " + studentForm.lastname.$error.required}} <br><br>
		{{"studentForm.email.$error.required : " + studentForm.email.$error.required}} <br>
		{{"studentForm.email.$error.email : " + studentForm.email.$error.email}} <br>
		<table border="0">
			<tr>
				<td>Enter first name:</td>
				<td>
					<input type="text" name="firstname" ng-model="studentData.firstName" ng-minlength="3" ng-maxlength="15" required>
					<span style="color:red">
						<!-- <span ng-show="studentForm.firstname.$error.required">
							First Name is required.
						</span> -->
						<!-- <span ng-show="studentForm.firstname.$error.minlength">
							First Name Too Short!!!
						</span> -->
						<!-- <span ng-show="studentForm.firstname.$error.maxlength">
							First Name Too Long!!!
						</span> -->
					</span>
				</td>
			</tr>
			<tr>
				<td>Enter last name:</td>
				<td>
					<input type="text" name="lastname" ng-model="studentData.lastName" required>
					<!-- <span style="color:red;" ng-show="studentForm.lastname.$error.required">
						Last Name is required.
					</span> -->
				</td>
			</tr>
			<tr>
				<td>Email:</td>
				<td>
					<input type="email" name="email" ng-model="studentData.email" required>
					<span style="color:red">
						<!-- <span ng-show="studentForm.email.$error.required">
							Email is required.
						</span> -->
						<!-- <span ng-show="studentForm.email.$error.email">
							Invalid email address.
						</span> -->
					</span>
				</td>
			</tr>
			<tr>
				<td>
					<button ng-click="reset()">Reset</button>
				</td>
				<td>
					<button ng-click="submit()">
						Submit
					</button>
				</td>
			</tr>
		</table>
		<table>
			<tr>
				<td>
					{{"studentForm.firstname.$valid : "+studentForm.firstname.$valid}} <br>
					{{"studentForm.firstname.$invalid : "+studentForm.firstname.$invalid}} <br>
					{{"studentForm.firstname.$pristine : "+studentForm.firstname.$pristine}} <br>
					{{"studentForm.firstname.$dirty : "+studentForm.firstname.$dirty}} <br>
					{{"studentForm.firstname.$touched : "+studentForm.firstname.$touched}} <br>
					{{"studentForm.firstname.$untouched : "+studentForm.firstname.$untouched}} <br>
				</td>
				<td>
					{{"studentForm.lastname.$valid : "+studentForm.lastname.$valid}} <br>
					{{"studentForm.lastname.$invalid : "+studentForm.lastname.$invalid}} <br>
					{{"studentForm.lastname.$pristine : "+studentForm.lastname.$pristine}} <br>
					{{"studentForm.lastname.$dirty : "+studentForm.lastname.$dirty}} <br>
					{{"studentForm.lastname.$touched : "+studentForm.lastname.$touched}} <br>
					{{"studentForm.lastname.$untouched : "+studentForm.lastname.$untouched}} <br>
				</td>
				<td>
					{{"studentForm.email.$valid : "+studentForm.email.$valid}} <br>
					{{"studentForm.email.$invalid : "+studentForm.email.$invalid}} <br>
					{{"studentForm.email.$pristine : "+studentForm.email.$pristine}} <br>
					{{"studentForm.email.$dirty : "+studentForm.email.$dirty}} <br>
					{{"studentForm.email.$touched : "+studentForm.email.$touched}} <br>
					{{"studentForm.email.$untouched : "+studentForm.email.$untouched}} <br>
				</td>
			</tr>
		</table>
	</form>
</div>
</body>
</html>