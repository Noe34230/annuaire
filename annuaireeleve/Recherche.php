<html>
<?php require_once "includes/head.php"; ?>

<body>

    <?php
    session_start();
    require_once "includes/header.php";
    require_once "includes/functions.php";
    ?>
    <br />
    <div class="container">
        <fieldset class="form-group border p-3">
            <form method="POST" action="rechercherExp.php">
                <div class="form-group row">
                    <label class="col-form-label" for="type">Type </label>
                    <div class="col">
                        <select name="type">
                            <option value="stage">Stage</option>
                            <option value="emploi">emploi</option>
                            <option value="alternance">Alternance</option>
                            <option value="Benevole">benevole</option>
                            <option value="Autre">Autre</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label" for="domaineComp">Domaine de compétences</label>
                    <div class="col">
                        <select name="domaineComp" size="3">
                            <option value="tout" selected>Tout</option>
                            <?php afficherDomaineComp(); ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="organisation" class="col-form-label"> Organisation :</label>
                    <div class="col">
                        <input type="text" class="form-control" name="organisation" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="lieu" class="col-form-label"> Lieu :</label>
                    <div class="col">
                        <input type="texte" class="form-control" name="lieu" />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label" for="secteurAct">Secteur d'activité</label>
                    <div class="col">
                        <select name="secteurAct" size="3">
                            <option value="tout" selected>Tout</option>
                            <?php afficherSecteurAct(); ?>
                        </select>
                    </div>
                </div>
                <input type="submit" class="btn btn-primary" name="rechercher" value="Rechercher">


            </form>
        </fieldset>
    </div>
</body>

</html>