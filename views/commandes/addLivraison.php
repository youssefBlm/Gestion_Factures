<main role="main" class="container">
    <div class="starter-template">
        <br>
        <h1>Détail de la Livraison</h1>
    </div>
    <br><br><br>


    <div class="col mb-6" style="width: 450px">

        <form action="index.php?c=commande&m=addLivraison" method="post">
            <div class="row">
                <p>Commande :<br>

                    <input style="margin-left: 150px" type="radio" name="modeLivraison" value="domicile">
                    <label for="domicile">à Domicile</label><br>

                    <input style="margin-left: 150px" type="radio" name="modeLivraison" value="magasin">
                    <label for="magasin">Au Magasin</label> </p>
            </div>
            <p><input style="margin-left: 150px" class="btn btn-primary btn-sm" type="submit" name="modeL" value="Choisir"></p>
        </form>


        <br><br>


        <form action="index.php?c=commande&m=addLivraison" method="post">
            <?php if (isset($_POST["modeL"]) && $_POST["modeLivraison"] == "domicile") { ?>

                <p>Adresse : <input type="texte" class="form-control" name="addr" /></p>
                <p>Code Postal : <select name="postal" id="status-select">
                        <option value="NULL"></option>
                        <?php foreach ($codesPostaux as $codePostal) { ?>
                            <option value=<?php echo $codePostal['CodePostale']; ?>><?php echo $codePostal['CodePostale']; ?></option>

                        <?php } ?>

                    </select>
                </p>

                <p><input class="btn btn-success btn-sm" type="submit" name="done" value="OK"></p>


            <?php }
            if (isset($_POST["modeL"]) && $_POST["modeLivraison"] == "magasin") { ?>

                <p>Veuillez choisir un magasin : </p>
                <select name="magasin" id="status-select">
                    <option value="NULL"></option>
                    <?php foreach ($magasins as $magasin) { ?>
                        <option value=<?php echo $magasin['idMagasin']; ?>><?php echo $magasin['lib_Magasin']; ?></option>

                    <?php } ?>

                </select>
                <p><input class="btn btn-success btn-sm" type="submit" name="done" value="OK"></p>
           


                <?php } ?>
           
            <br>
            
            </form>
    </div>





</main>