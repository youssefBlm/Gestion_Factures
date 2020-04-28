<?php

if (isset($_POST['Entrer'])) {
  session_start();
  if (isset($_POST['structure']))
    $_SESSION['structure'] = true;
  if (isset($_POST['data']))
    $_SESSION['data'] = true;
  define('ROOTBDD', str_replace("views/login/instal_DB.php", "", $_SERVER["SCRIPT_NAME"]));
  header("Location:" . ROOTBDD . "index.php?c=login&m=instalation");
}

?>
<html lang="en">

<head>
  <title>Page d'instalation</title>
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

<body style="background-color: #FFFFF0;">

  <div class="col mb-6 border rounded" style="width: 710px; height:320px; margin-left:4%; margin-top:2%;background-color: #E6E6FA;">

    <h2> Téléchargement de la base des donnée</h2><br><br>
    <p>Veuillez choisir votre option:</p><br>
    <form method="POST" action="#">
      <div>
        <input type="checkbox" id="scales" name="structure" checked>
        <label for="structure">Télecharger la base de données</label>
      </div>

      <div>
        <input type="checkbox" id="horns" name="data">
        <label for="data">Télecharger les données de la base</label>
      </div><br><br><br>

      <input type="submit" name="Entrer" class="btn btn-success btn-sm" value="Télecharger">
    </form>
  </div>
</body>

</html>