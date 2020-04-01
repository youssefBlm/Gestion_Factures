<?php

if (isset($_POST['log'])) {
	session_start();
	$_SESSION['Login'] = $_POST['login'];
	$_SESSION['passe'] = $_POST['passe'];
	define('ROOTLOG', str_replace("views/users/login.php", "", $_SERVER["SCRIPT_NAME"]));
	
	header("Location:".ROOTLOG."index.php?c=users&m=login");
}

if(isset($_GET['msg'])){

echo $_GET['msg'];
}
?>

<html lang="en">

<head>
	<title>Login Page</title>
</head>

<body>

	<form method="POST" action="#">
		<input type="text" id="login" name="login" placeholder="login">
		<input type="text" id="password" name="passe" placeholder="password">
		<input type="submit" name="log" value="Log In">
	</form>

</body>

</html>