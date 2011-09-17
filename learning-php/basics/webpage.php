<?php 
	//cookies
	setcookie('test', 33, time() + 3600);
	
	//sessions
	session_start();
	
	//headers
	//header("Location: functions.php");
	//exit;
?>
<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>PHP Web Page</title>
</head>
<body>
<pre>
/*
 * Three types of user input:
 *   GET - URLs/Links
 *   POST - Forms
 *   COOKIE - Cookies
 */
</pre>
<?php
	require_once('lib.php');
	
	//url parameters
	h2("url parameters");
	print_r($_GET); br();
	$id = $_GET['id'];
	echo 'id = ' . $id; br();
	
	//encoding
	h2("encoding");
	$str = "warren tang&selena>guan";
	echo urlencode($str); br();	//encode url after the question mark
	echo rawurlencode($str); br(); //encode url before the question mark
	echo htmlspecialchars($str); br(); //encode html
	
	//forms
	h2("forms");
?>
<form action="webpage.php" method="post">
	<label for="username">User Name: </label><input type="text" name="username" />
	<label for="password">Password: </label><input type="password" name="password" />
	<input type="submit" name="submit" value="Submit" />
</form>
<?php 
	echo print_r($_POST); br();
	$username = $_POST['username'];
	$password = $_POST['password'];
	echo "{$username}: {$password}"; br();
	
	//cookies
	h2('cookies');
	//You must call setcookie prior to any output,
	//so look at the beginning of this file for:
	//setcookie('test', 33, time() + 3600);
	//Another way is using output buffer. 
	//See ob_start()/ob_end_flush();
	
	$cookie = "";
	if(isset($_COOKIE['test'])) {
		$cookie = $_COOKIE['test'];  //refresh to see the value.
	}
	echo "test cookie = " . $cookie; br();
	
	//sessions
	h2("sessions");
	//session_start() before any output.
	echo 'name = ' . $_SESSION['name']; br();
	$_SESSION['name'] = 'warren tang';  //refresh to see the value
	
	//headers
	h2('headers');
	echo 'header() must come before any output'; br();
	
	//includes
	h2('includes');
?>
<pre>
	include() / include_once()
	require() / require_once() - strict
</pre>
</body>
</html>