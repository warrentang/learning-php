<?php
	function br() {
		echo "<br />";
	}
	//display_error/error_reporting
	$var1 = "some text";
	$var2 = 100;
	$arr = array(1, 3, 5, 7, 9);
	
	echo $var1; br();
	print_r($arr); br();
	echo gettype($var2); br();
	var_dump($arr); br();
	var_dump(get_defined_vars());  br();
?>