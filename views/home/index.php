<main role="main" class="container">
    <div class="starter-template">
        <h1>Page d'accueil par défaut</h1>
        <p class="lead">Bienvenue
            <?php
            echo $_SESSION['nom'] . " " . $_SESSION['prenom'];
            if ($_SESSION['status']=="admin")
            echo " [ ADMINISTRATEUR ]";
            
            ?>.</p>
    </div>
</main><!-- /.container -->