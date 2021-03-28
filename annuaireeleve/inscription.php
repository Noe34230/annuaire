<!doctype html>
<html>

<?php
session_start();
$pageTitle = "Inscription";
require_once "includes/head.php";
?>

<body>

    <h1>Inscription</h1>
    <?php
    if (isset($_SESSION['errMdp'])) {
        echo "Les mots de passe ne correspondent pas </br>";
    }

    if (isset($_SESSION['champVide'])) {
        echo "Veuillez remplir tout les champs";
    }


    ?>

    <div class="d-flex justify-content-center align-items-center container ">
        <fieldset class="form-group border p-3">
            <legend>Informations personnelles</legend>
            <form method="POST" action="validerInscr.php">
                <div class="form-group row">
                    <label for="nom" class="col-form-label">Nom :</label>
                    <div class="col">
                        <input type="text" class="form-control" name="nom" size="50" />
                    </div>
                </div>
                <div class="form-group row">
                    <label for="prenom" class="col-form-label">Prenom :</label>
                    <div class="col">
                        <input type="text" class="form-control" name="prenom" size="50" />
                    </div>
                </div>
                <div class="form-group row">
                    <label for="dateNaissance" class="col-form-label">Date de naissance :</label>
                    <div class="col">
                        <input type="date" class="form-control" name="dateNaissance" />
                    </div>
                </div>
                <div class="form-group row">
                    <legend class="col-form-label col-sm-2 pt-0">Genre</legend>
                    <div class="col">
                        <div class="form-check">

                            <input class="form-check-input" type="Radio" name="genre" value="homme" />
                            <label class="form-check-label" for="genre">Homme </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="Radio" name="genre" value="femme" />
                            <label class="form-check-label" for="genre">Femme </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="Radio" name="genre" value="autre" />
                            <label class="form-check-label" for="genre">Autre </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="Radio" name="genre" value="je ne veux pas preciser" />
                            <label class="form-check-label" for="genre">Je ne veux pas preciser</label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="mail" class="col-form-label">Mail :</label>
                    <div class="col">
                        <input type="mail" class="form-control" name="mail" size="50" />
                    </div>
                </div>
                <div class="form-group row">
                    <label for="promo" class="col-form-label">Promotion :</label>
                    <div class="col">
                        <input type="number" class="form-control" name="promo" size="4" />
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tel" class="col-form-label">Telephone :</label>
                    <div class="col">
                        <input type="number" class="form-control" name="tel" size="10" />
                    </div>
                </div>
                <fieldset class="form-group border p-3">
                    <legend>Adresse</legend>
                    <div class="form-group row">
                        <label for="numRue" class="col-form-label">Numéro de rue :</label>
                        <div class="col">
                            <input type="number" class="form-control" name="numRue" size="10" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nomRue" class="col-form-label">Nom de rue :</label>
                        <div class="col">
                            <input type="text" class="form-control" name="nomRue" size="50" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="codePostal" class="col-form-label">Code postal :</label>
                        <div class="col">
                            <input type="number" class="form-control" name="codePostal" size="10" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="ville" class="col-form-label">Ville :</label>
                        <div class="col">
                            <input type="text" class="form-control" name="ville" size="50" />
                        </div>
                    </div>
                </fieldset>
                <div class="form-group row">
                    <label for="login" class="col-form-label">Login :</label>
                    <div class="col">
                        <input type="text" class="form-control" name="login" size="50" />
                    </div>
                </div>
                <div class="form-group row">
                    <label for="mdp" class="col-form-label">Mot de passe :</label>
                    <div class="col">
                        <input type="password" class="form-control" name="mdp" size="50" />
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Conf" class="col-form-label">Confirmer le mot de passe :</label>
                    <div class="col">
                        <input type="password" class="form-control" name="mdpConf" size="50" />
                    </div>
                </div>
                <input type="submit" class="btn btn-primary" name="valider" value="Valider" />
                <input type="reset" class="btn btn-primary" name="annuler" value="Annuler" />
        </fieldset>
        </form>
    </div>

</body>


</html>