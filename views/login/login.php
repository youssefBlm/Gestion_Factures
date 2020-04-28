<?php

if (isset($_POST['log'])) {
	session_start();
	$_SESSION['Login'] = $_POST['login'];
	$_SESSION['passe'] = $_POST['passe'];

	define('ROOTLOG', str_replace("views/login/login.php", "", $_SERVER["SCRIPT_NAME"]));
	header("Location:" . ROOTLOG . "index.php?c=login&m=login");
}

if (isset($_GET['msg'])) {

	echo $_GET['msg'];
}
?>

<html lang="en">

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Page de connexion</title>

	<link rel="icon" type="image/png" href="/APPMVC/Views/images/icons/favicon.ico" />
	<!--============================================="APPMVC/Views/Layouts/" . $this->layout . '.php'==================================================-->
	<link rel="stylesheet" type="text/css" href="/APPMVC/Views/vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/APPMVC/Views/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/APPMVC/Views/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/APPMVC/Views/vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/APPMVC/Views/vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/APPMVC/Views/vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/APPMVC/Views/vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/APPMVC/Views/vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/APPMVC/Views/css/util.css">
	<link rel="stylesheet" type="text/css" href="/APPMVC/Views/css/main.css">

</head>

<body style="background-color: #FFF8DC;">

	<div class="col mb-6 border rounded" style="width: 500px; height:400px; margin-left:4%; margin-top:3%;background-color: #DCDCDC;">
		<div class="col mb-6 " style="padding-left:3%; padding-top:10%;padding-bottom:100px;">
			<form method="POST" action="#">
				<input type="text" id="login" class="form-control" name="login" placeholder="login"><br>
				<input type="password" id="password" class="form-control" name="passe" placeholder="password"><br>
				<input type="submit" name="log" class="btn btn-success btn-sm" value="Se connecter">
			</form><br>
			</div>
			<a class="btn btn-primary" href="instal_DB.php">télécharger la base de données </a>
		
	</div>

</body>

</html>