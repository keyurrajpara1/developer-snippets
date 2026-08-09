<?php
$connect = mysqli_connect("localhost", "root", "", "testing");
$formData = json_decode(file_get_contents("php://input"));
$data = array();
$error = array();
/*echo "<pre>";
print_r($formData);
exit;*/
$firstName = @$formData->firstName;
$lastName = @$formData->lastName;
if(empty($firstName)){
	$error["firstName"] = "First Name is required.";
}
if(empty($lastName)){
	$error["lastName"] = "Last Name is required.";
}

if(!empty($error)){
	$data["error"] = $error;
}
else{
	$firstName = mysqli_real_escape_string($connect, $firstName);
	$lastName = mysqli_real_escape_string($connect, $lastName);
	$query = "insert into users(first_name, last_name) values('$firstName', '$lastName')";
	if(mysqli_query($connect, $query)){
		$data["message"] = "Data inserted...";
	}
}

echo json_encode($data);
exit;

?>