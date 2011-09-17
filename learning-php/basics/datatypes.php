<?php 
	require_once('lib.php');
	
	//variables
	h2('variables');
	$var1 = 10;
	echo $var1; br();
	$var1 = "something";
	echo $var1; br();
	
	echo 'isset: ' . isset($a2342);  br();
	echo 'isset: ' . isset($var1); br();
	unset($var1);
	echo 'isset: ' . isset($var1); br();
	
	echo 'empty: ' . empty($var4); br();
	$var4;
	echo 'empty: ' . empty($var4); br();
	$var4 = NULL;
	echo 'empty: ' . empty($var4); br();
	$var4 = 0;
	echo 'empty: ' . empty($var4); br();
	$var4 = "0";
	echo 'empty: ' . empty($var4); br();
	$var4 = "";
	echo 'empty: ' . empty($var4); br();
	$var4 = "00";
	echo 'empty: ' . empty($var4); br();
	
	//strings 
	h2('strings');
	$str = "warreN tanG";
	echo "Hello, " . $str; br();
	echo "Hello, $str"; br();
	echo "Hello, {$str}"; br();
	echo 'Hello, $str'; br();
	
	echo strtolower($str); br();
	echo ucfirst($str); br();
	echo ucwords($str); br();
	
	echo strstr($str, 'tan');  br(); //find
	echo str_replace('tan', 'guan', $str); br();
	
	//numbers
	h2('numbers');
	$a = 40;
	$b = 60;
	$c = $a + $b;
	echo $c; br();
	$c += 50; 
	echo $c; br();
	$c++;
	echo $c; br();
	
	//floats
	h2('floats');
	$x =  4/3;
	echo $x; br();
	echo round($x, 1); br();
	echo ceil($x); br();
	
	//booleans
	h2('booleans');
	$bool1 = true;
	$bool2 = false;
	echo 'true: ' . $bool1; br();
	echo 'false: ' . $bool2; br();
	
	//typecasting
	h2('typecasting');
	$var1 = "11 dogs";
	echo gettype($var1); br();
	$var1 += 9; 
	echo gettype($var1); br();
	echo $var1; br();
	
	settype($var1, 'string');
	echo gettype($var1); br();
	
	$var1 .= " foxs";
	echo $var1; br();
	
	$var2 = (int)$var1;
	echo 'is_int:' . is_int($var2);
	
	//constants
	h2('constants');
	define("MAX_WIDTH", 1920);
	echo MAX_WIDTH; br(); 
?>