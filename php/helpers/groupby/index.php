<?php
if (!function_exists('_pre')) {
	function _pre($array, $exit = 1){
	    echo '<pre>'; print_r($array); echo '</pre>';
	    if ($exit == 1) { exit(); }
	}
}
/**
 * Function that groups an array of associative arrays by some key.
 * 
 * @param {String} $key Property to sort by.
 * @param {Array} $data Array that stores multiple associative arrays.
 */
if (!function_exists('_groupBy')) {
    function _groupBy($key, $data) {
        $result = array();
        foreach($data as $val) {
            if(array_key_exists($key, $val)){
                $result[$val[$key]][] = $val;
            }else{
                $result[""][] = $val;
            }
        }
        return $result;
    }
}
$array = array(
	array('id' => 1, 'name' => 'Liam', 'gender' => 'Male'),
	array('id' => 2, 'name' => 'Noah', 'gender' => 'Male'),
	array('id' => 3, 'name' => 'Oliver', 'gender' => 'Male'),
	array('id' => 4, 'name' => 'Elijah', 'gender' => 'Male'),
	array('id' => 5, 'name' => 'Olivia', 'gender' => 'Female'),
	array('id' => 6, 'name' => 'Emma', 'gender' => 'Female'),
	array('id' => 7, 'name' => 'Ava', 'gender' => 'Female'),
	array('id' => 8, 'name' => 'Charlotte', 'gender' => 'Female'),
);
_pre($array, 0);
$result = _groupBy('gender', $array);
_pre($result);
?>