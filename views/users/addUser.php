<main role="main" class="container">
    <div class="starter-template">
       <br> <h1>Ajout d'un Utilisateur</h1>
    </div>
    <br><br><br>
    <form action="index.php?c=users&m=addUser" method="post">
        
        <p>Nom : <input type="text" name="nom"  /></p>
        <p>Prenom : <input type="text" name="prenom" ></p>
        <p>Login : <input type="text" name="login"  /></p>
        <p>Mot de passe : <input type="text" name="mdp"  /></p>
        <p>E-mail : <input type="text" name="mail"  /></p>
        <p>Status : <select name="status" id="status-select">
                <option  value="NULL">--Aucun Statut--</option>
                <option  value="admin">Administrateur</option>
                <option  value="mod">Modérateur</option>
                <option  value="com">commerçant</option>

            </select>
        </p>

        <p><input class="btn btn-success btn-sm" type="submit" value="OK"></p>
    </form>





</main>