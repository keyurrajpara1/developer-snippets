<?php
	$tempObject = new stdClass;
	$tempObject->id=1;
	$tempObject->price=10;

	$tempObject2 = new stdClass;
	$tempObject2->id=2;
	$tempObject2->price=20;

	$array1 = array();
	array_push($array1, $tempObject);
	array_push($array1, $tempObject2);

	echo "<pre>";
	print_r($array1);
	// exit;

	/*
	// Example4
	function _maxAttributeInArray($array1, $value='price'){
		$max=0;
		foreach($array1 as $object){
			if($max < (float)$object->{$value}){
				$max = $object->{$value};
			}
		}
		return $max;
	}
	$max = _maxAttributeInArray($array1);
	echo $max;
	exit;*/

	/*
	// Example3
	$property = 'price';
	$max = array_reduce($array1, function($array, $object) use($property) {
		$array = max($array, $object->$property);
		return $array;
	}, -PHP_INT_MAX);

	$min = array_reduce($array1, function($array, $object) use($property) {
		$array = min($array, $object->$property);
		return $array;
	}, PHP_INT_MAX);

	echo "Max: ".$max."<br />";
	echo "Min: ".$min;
	exit;*/

	/*
	// Example2
	if (!function_exists('_calculateAttributeInArray')) {
		function _calculateAttributeInArray($array, $property, $function) {
		    $result = array_map(function($object) use($property) {
		        return $object->$property;
		    }, $array);
		    if(function_exists($function)) {
		        return $function($result);
		    }
		    return false;
		}
	}
	$max = _calculateAttributeInArray($array1, 'price', 'max');
	echo "Max: ".$max."<br />";
	$min = _calculateAttributeInArray($array1, 'price', 'min');
	echo "Min: ".$min;
	exit;*/

	/*
	// Example1
	if (!function_exists('_getLwstPArrObj')) {
	    function _getLwstPArrObj($arr) {
	        $lwstP = NULL;
	        $res = usort($arr,function($first,$second){
	            return $first->price > $second->price;
	        });
	        if($res){
	            $lwstP = $arr[0]->price;
	        }
	        return $lwstP;
	    }
	}
	$lowestPrice = _getLwstPArrObj($array1);
	echo $lowestPrice;
	exit;*/
?>