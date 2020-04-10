<main role="main" class="container">
    <div class="starter-template">
       <br> <h1>Modification d'un Utilisateur</h1>
    </div>
    <br><br><br>
    <form action="index.php?c=users&m=editUser" method="post">
        <p>IdUtilisateur : <input type="text"  disabled value=<?php echo $user['idUtilisateur']; ?> /></p>
        <p>Nom : <input type="text" name="nom" value=<?php echo $user['nom']; ?> /></p>
        <p>Prenom : <input type="text" name="prenom" value=<?php echo $user['prenom']; ?>></p>
        <p>Login : <input type="text" name="login" value=<?php echo $user['login']; ?> /></p>
        <p>E-mail : <input type="text" name="mail" value=<?php echo $user['e_mail']; ?> /></p>
        <p>Status : <select name="status" id="status-select">
                <option <?php if($user['status']=="null") echo "selected";?> value="NULL">--Aucun Statut--</option>
                <option <?php if($user['status']=="admin") echo "selected";?> value="admin">Administrateur</option>
                <option <?php if($user['status']=="mod") echo "selected";?> value="mod">Modérateur</option>
                <option <?php if($user['status']=="com") echo "selected";?> value="com">commerçant</option>

            </select>
        </p>
        <input type="hidden" name="id"  value=<?php echo $user['idUtilisateur']; ?> />
        <p><input class="btn btn-success btn-sm" type="submit" value="OK"></p>
    </form>





</main>