<main role="main" class="container">
    <div class="starter-template">
        <br>
        <h1>Ajout d'un Client</h1>
    </div>
    <br><br><br>
    <form action="index.php?c=client&m=addClient" method="post">
        <div class="col mb-6" style="width: 450px">
            <div class="row">
                <p>Nom : <input type="text" class="form-control" name="nom" /></p>&nbsp;&nbsp;&nbsp;
                <p>Prenom : <input type="text" class="form-control" name="prenom"></p>

            </div>
            <div class="row">
                <p>Téléphone : <input type="text" class="form-control" name="tele" /></p>&nbsp;&nbsp;&nbsp;
                <p>E-mail : <input type="text" class="form-control" name="mail" /></p>

            </div>
            <p>Sexe :
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="radio" id="feminin" name="sexe" value="feminin" checked>
                <label for="feminin">feminin</label>



                <input type="radio" id="masculin" name="sexe" value="masculin">
                <label for="masculin">masculin</label>

            </p>
            <p>Date de Naissance : <input type="date" class="form-control" name="naissance" /></p>
            <p>Adresse : <input type="texte" class="form-control" name="addr" /></p>
            <p>Code Postal : <select name="postal" id="status-select">
                    <option value="NULL"></option>
                    <?php foreach ($codesPostaux as $codePostal) { ?>
                        <option value=<?php echo $codePostal['CodePostale']; ?>><?php echo $codePostal['CodePostale']; ?></option>

                    <?php } ?>

                </select>
            </p>
            <p><input class="btn btn-success btn-sm" type="submit" value="OK"></p>

        </div>
    </form>





</main>