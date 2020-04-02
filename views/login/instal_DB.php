<?php

if (isset($_POST['Entrer'])) {
    session_start();
    if (isset($_POST['structure']))
    $_SESSION['structure']=true;
    if (isset($_POST['data']))
    $_SESSION['data']=true;
	define('ROOTBDD', str_replace("views/login/instal_DB.php", "", $_SERVER["SCRIPT_NAME"]));
	header("Location:".ROOTBDD."index.php?c=login&m=instalation");
}

?>
<html lang="en">

<head>
	<title>Page d'instalation</title>
</head>

<body>
<h1> instalation de la base des donnée</h1> 
<p>Choose your monster's features:</p>

<form method="POST" action="#">
<div>
  <input type="checkbox" id="scales" name="structure"
         checked>
  <label for="structure">Structure</label>
</div>

<div>
  <input type="checkbox" id="horns" name="data">
  <label for="data">DATA</label>
</div>

<input type="submit" name="Entrer" value="OK">
</form>

</body>

</html>