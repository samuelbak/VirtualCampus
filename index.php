<html>
<head>
	<title>PHP test page</title>
	<link rel="stylesheet" type="text/css" href="styles/index.css">
</head>

<body>
<?php 
if(!isset($_COOKIE['user'])) {
	echo "Cookie is not set!";
} else {
	echo "Cookie username is set!<br>";
	echo "Value is: " . $_COOKIE['user'];
	print_r($_COOKIE);
}

?>
<a href="login/login.php" target="_blank">This is a link</a>
	
</body>
</html>	
