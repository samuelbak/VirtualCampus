<?php
ob_start();
session_start();
?>

<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="styles/login.css">
</head>

<body>


<form id='login' action='login.php' method='post' accept-charset='UTF-8'>
<fieldset >
<legend>Login</legend>
<input type='hidden' name='submitted' id='submitted' value='1'/>
 
<label for='username' >UserName:</label>
<input type='text' name='username' id='username'  maxlength="50" />
<br>
<label for='password' >Password:</label>
<input type='password' name='password' id='password' maxlength="50" />
 
<input type='submit' name='Submit' value='Submit' />
<a href="?logout">logout</a>
<?php 
if(isset($_GET['logout'])) {
	setcookie('user', null, 0, '/');
	header('Location: /');
}
?>


<?php 
/*
if(isset($_POST['submitted']))
{
	if($fgmembersite->Login())
	{
		$fgmembersite->RedirectToURL("login-home.php");
	}
	
}
*/
if(isset($_POST['submitted'])){
	Login();
}

function Login()
{
	if(empty($_POST['username']))
	{
		//$this->HandleError("UserName is empty!");
		return false;
	}
	 
	if(empty($_POST['password']))
	{
		//$this->HandleError("Password is empty!");
		return false;
	}
	 
	$username = trim($_POST['username']);
	$password = trim($_POST['password']);
	 
	if(!CheckLoginInDB($username,$password))
	{
		return false;
	}
	/*
	if(isset($_SESSION['user'])){
		session_unset();
		session_destroy();
	}
	session_start();
	$_SESSION['user'] = $username;
	print_r($_SESSION);
	*/
	$cookie_name = "user";
	$cookie_value = $username;
	setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
	 
	//$_SESSION[$this->GetLoginSessionVar()] = $username;
	 
	return true;
}

function CheckLoginInDB($username,$password)
{
	/*
	if(!$this->DBLogin())
	{
		$this->HandleError("Database login failed!");
		return false;
	}
	$username = $this->SanitizeForSQL($username);
	$pwdmd5 = md5($password);
	$qry = "Select name, email from $this->tablename ".
			" where username='$username' and password='$pwdmd5' ".
			" and confirmcode='y'";
	 
	$result = mysql_query($qry,$this->connection);
	 
	if(!$result || mysql_num_rows($result) <= 0)
	{
		$this->HandleError("Error logging in. ".
				"The username or password does not match");
		return false;
	}
	return true;
	*/
	return true;
}

?>
 
</fieldset>
</form>
	
</body>
</html>	