<main role="main" class="container">
    <div class="starter-template">
        <br>
        <h1>Ajout d'une commande</h1>
    </div>
    <br><br><br>
    <form action="index.php?c=commande&m=addLivraison" method="post">
        <div class="col mb-6" style="width: 450px">
            <div class="row">
            <p>Nom et Prenom du client : <select name="client" id="client-select">
                    <option value="NULL"></option>
                    <?php foreach ($clientslist as $client) { ?>
                        <option value=<?php echo $client['idClient']; ?>><?php echo $client['nom']." ". $client['prenom']; ?></option>

                    <?php } ?>

                </select>
            </p><br><br>

            </div>
            <div class="row">
                <p>Téléphone : <input type="text" class="form-control" name="tele" /></p>&nbsp;&nbsp;&nbsp;
                <p>E-mail : <input type="text" class="form-control" name="mail" /></p>

            </div><br>
            <p>Commande :<br>
               
                <input style="margin-left: 150px" type="radio"  name="mode" value="emporter" checked>
                <label for="emporter">à Emporter</label><br>



                <input style="margin-left: 150px" type="radio" name="mode" value="livraison">
                <label for="livraison">En Livraison</label>

            </p>
            <p>Code de la remise (s'elle existe): <input type="texte" class="form-control" name="remise" /></p>
            
            <p><input class="btn btn-success btn-sm" type="submit" name="valide" value="OK"></p>

        </div>
    </form>





</main>