<?php
	$array1 = array("Apple", "Dog", "Rose");

	list($fruit, $animal, $flower) = $array1;
	// First parameter is required.

	echo "I have fruit an $fruit, animal $animal and flower $flower<br />";
	// I have fruit an Apple, animal Dog and flower Rose

	// -----------------------------------

	list(, $animal,) = $array1;
	// First parameter is required.

	echo "I have animal $animal<br />";
	// I have flower Rose
	// I have fruit an Apple, animal Dog and flower Rose

	// -----------------------------------

	list(, , $flower) = $array1;
	// First parameter is required.

	echo "I have flower $flower<br />";
	// I have flower Rose

	// -----------------------------------

	$array2 = array("Apple", array("Dog", "Rose"));

	list($fruit, list($animal, $flower)) = $array2;

	echo "First Array Value: $fruit, Second Array Value: $animal, $flower<br />";

	// -----------------------------------

	$user = "1|Liam|5|500|0";
	list($user_id, $name, $limit, $remaining, $reset) = explode('|', $user);
	echo $user_id."<br />";
	echo $name."<br />";
	echo $limit."<br />";
	echo $remaining."<br />";
	echo $reset."<br />";

	// -----------------------------------

	$user = "1|Liam";
	list($user_id, $name, $limit, $remaining, $reset) = array_pad(explode('|', $user), 5, null);
	echo $user_id."<br />";
	echo $name."<br />";
	echo $limit."<br />";
	echo $remaining."<br />";
	echo $reset."<br />";

	// -----------------------------------

	$array3 = array("id" => 1, "firstName" => "Keyur", "lastName" => "Rajpara");
	list('id' => $id, 'firstName' => $fName, 'lastName' => $lName) = $array3;
	echo $id."<br />".$fName."<br />".$lName;

	// -----------------------------------

	//
?>