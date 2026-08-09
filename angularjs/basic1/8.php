<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<script type="text/javascript" src="js/angular.min.js"></script>
	<style type="text/css">
		.error{
			color: red;
		}
	</style>
</head>
<body ng-app="">
	<form name="myForm" novalidate>
		<h1>AngularJS Validation</h1>
		<label>Full Name</label>
		<input type="text" name="name" ng-model="name" pattern="[a-zA-Z]{1,}" required>
		<br>
		<span ng-show="myForm.$submitted || myForm.name.$dirty">
			<span class="error" ng-show="myForm.name.$error.required">Name is required</span>
			<span class="error" ng-show="myForm.name.$error.pattern">Name cannot be number</span>
		</span>
		<br><br>

		<label>Gender</label><br>
		<input type="radio" name="gender" ng-model="gender" ng-value='"Male"' required>
		<label>Male</label>
		<input type="radio" name="gender" ng-model="gender" ng-value='"Female"' required>
		<label>Female</label>
		<span ng-show="myForm.$submitted || myForm.gender.$dirty">
			<span class="error" ng-show="myForm.gender.$error.required">Gender is required</span>
		</span>
		<br><br>

		<label>Date of Birth</label>
		<input type="date" name="date" ng-model="date" required>
		<br>
		<span ng-show="myForm.$submitted || myForm.date.$dirty">
			<span class="error" ng-show="myForm.date.$error.required">Date is required</span>
		</span>
		<br><br>

		<label>Address</label>
		<textarea name="address" ng-model="address" required></textarea>
		<br>
		<span ng-show="myForm.$submitted || myForm.address.$dirty">
			<span class="error" ng-show="myForm.address.$error.required">Address is required</span>
		</span>
		<br><br>

		<label>Phone Number</label>
		<input type="number" name="phone" ng-model="phone" ng-minlength="10" ng-maxlength="10" required>
		<br>
		<span ng-show="myForm.$submitted || myForm.phone.$dirty">
			<span class="error" ng-show="myForm.phone.$error.required">Phone is required</span>
			<span class="error" ng-show="((myForm.phone.$error.minlength || myForm.phone.$error.maxlength) && myForm.phone.$dirty)">Phone number should be 10 digits</span>
		</span>
		<br><br>

		<label>Course</label>
		<select name="course" ng-model="course" required>
			<option value="BCom">BCom</option>
			<option value="BA">BA</option>
			<option value="BCA">BCA</option>
			<option value="BSC">BSC</option>
		</select>
		<br>
		<span ng-show="myForm.$submitted || myForm.course.$dirty">
			<span class="error" ng-show="myForm.course.$error.required">Course is required</span>
		</span>
		<br><br>

		<button type="submit">Insert</button>
	</form>
</body>
</html>