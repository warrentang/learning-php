<?php
	//simple functions
	function br() {
		echo "<br />";
	}
	
	function say_hello() {
		echo "Hello, World!";
	}
	
	function say_hello2($name) {
		echo "Hello, {$name}!";
	}
	
	say_hello(); br();
	say_hello2("Warren"); br();
	
	//return value
	function add($var1, $var2) {
		return $var1 + $var2; 
	}
	
	echo add(5, 4); br();
	
	function add_sub ($a, $b) {
		$add = $a + $b;
		$sub = $a - $b;
		$return = array($add, $sub);
		return $return;
	}
	
	$return = add_sub(10, 5);
	echo $return[0]; br();
	echo $return[1]; br();
	
	//global variable
	$bar = "outside";
	function foo() {
		global $bar;
		$bar = "inside";
	}
	foo();
	echo $bar; br();
	
	//default values
	function paint($color = "white") {
		echo "This room is painted with {$color}.";
		br();
	}
	
	paint("blue");  
	paint(); 
?>