<?php
    require_once('lib.php');
  	//arrays.  
  	//http://php.net/manual/en/language.types.array.php
	h2('arrays');
	$arr = array(1, 3, 5, 7, 9);
	print_r($arr); br();
	echo "\$arr[0] = " . $arr[0]; br();
	
	//mixed arrays
	h2('mixed arrays');
	$mix = array(2, "fox", "dog", array("x", 100));
	print_r($mix); br();
	print_r($mix[3]); br();
	print_r($mix[3][1]); br();
	$mix[3] = "others";
	echo $mix[3]; br();
	
	//associative arrays
	//A key may be either an integer or a string.
	h2('associative arrays');
	$associative = array('x' => 10, 'y' => 100, 'z' => 1000);
	echo 'y = ' . $associative['y']; br();
	
	//array functions
	h2('array functions');
	echo min($arr) . ' - ' .  max($arr); br();
	rsort($arr);
	echo 'reverse sort: '; print_r($arr); br();
	
	echo $str2 = implode(',', $arr); br();
	print_r(explode(',', $str2)); br();
	echo in_array(4, $arr); br();
	echo in_array(3, $arr); br();
	
	//array with empty keys.
	//If a key is not specified for a value (empty brackets), 
	//the maximum of the integer indices is taken 
	//and the new key will be that value plus 1
	//Using TRUE as key will evaluate to integer 1 as a key. 
	//Using FALSE as key will evaluate to integer 0 as a key. 
	//Using NULL as a key will evaluate to the empty string. 
	//Using the empty string as a key will create (or overwrite) a key with the empty string and its value; 
	//it is not the same as using empty brackets. 
	h2('array with empty keys');
	$arr2 = array(1, 2, 3);
	var_dump($arr2); br();
	$arr2[] = 4;
	$arr2[] = 5;
	var_dump($arr2); br();
	
	$arr3 = array('a' => "add", 's' => 'substract');
	var_dump($arr3); br();
	$arr3[] = 'multiply';
	$arr3['n'] = "nope";
	$arr3[] = 'devide';
	var_dump($arr3); br();
	echo "0 => {$arr3[0]}"; br();
	echo "1 => {$arr3[1]}"; br();
?>