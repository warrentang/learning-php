<?php
	require_once('./lib.php');
	
	//if
	h2('if');
	$a = 100; 
	$b = 200;
	if($a < $b) {
		echo htmlspecialchars("a < b");
	} else {
		echo htmlspecialchars("a > b");
	}
	br();
	
	$score = 70;
	if($score < 60) {
		echo "unqualified";
	} elseif ($score < 80) {
		echo "qualified";
	} elseif ($score < 100) {
		echo "excellent";
	} else {
		echo "superb!";
	}
	br();
	
	//logical expressions
	h2('logical expressions');
	if(3 > 2 && 4 > 1) {
		echo 'and'; br();
	}
	
	if(3 > 2 || 4 < 1) {
		echo 'or'; br();
	}
	
	if(!isset($a)) {
		$a = 100;
	}
	echo $a; br();
	
	if(is_int($a)) {
		settype($a, 'string');
	}
	echo gettype($a); br();
	
	//switch
	h2('switch');
	$b = 2; 
	switch($b) {
		case 1:
			echo 'b == 1';
			break;
		case 2:
			echo 'b == 2';
			break;
		default:
			echo 'b != 1 && b != 2';
			break;
	}
	br();
	
	//while
	h2('while');
	$count = 1;
	while($count <= 10) {
		echo $count . ' ';
		$count++;
	}
	br();
	echo $count; br();
	
	$count = 1;
	while(true) {
		if($count <= 10) {
			echo $count . ' ';
			$count++;
			continue;
		} else {
			break;
		}
		echo 'this should not appear';
	}
	br();
	
	//for
	h2('for');
	for($count = 1; $count <= 10; $count++) {
		echo $count . ' ';
	}
	br();
	
	//foreach
	h2('foreach');
	$arr = array(2, 4, 6, 8, 10);
	foreach($arr as $value) {
		echo $value . ' ';
	}
	br();
	
	foreach ($arr as $key => $value) {
		echo "{$key}: {$value}"; 
		br();
	}
	
	//pointers
	h2('pointers');
	$arr = array("a" => 2, "b" => 4, "c" => 6);
	while($value = current($arr)) {
		echo key($arr) . ': ' . $value; br();
		next($arr);
	}
?>