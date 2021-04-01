<!DOCTYPE html>
<html>

<?php require_once "includes/head.php"; ?>

<body>

    <?php
    require("includes/functions.php");
    session_start();
    require_once "includes/header.php";
    echo "<h1>";
    afficherNomsPrenoms($_SESSION['login']);
    echo "</h1>";
    echo "<div>";
    echo "</div>";
    $requete = getDb()->prepare("SELECT * FROM eleve
  WHERE valide = 0 ");
    $requete->execute();

    echo "<a href='GererEleve.php'  class ='btn btn-primary'>Voir tous les élèves</a>";
    echo "<a href='GererExp.php' class ='btn btn-primary'>Voir toutes les expériences</a><br/><br/>";

    echo "Profils en attente de validation :" . "</br>";
    echo "<fieldset class='form-group border p-3'>";
    while ($Tuple = $requete->fetch()) {
        echo "Prénom : " . "$Tuple[prenom]" . "</br>";
        echo "Nom : " . "$Tuple[nom]" . "</br>";
        echo "Genre : " . "$Tuple[genre]" . "</br>";
        echo "Numéro de rue : " . "$Tuple[numRue]" . "</br>";
        echo "Nom de rue : " . "$Tuple[nomRue]" . "</br>";
        echo "Code Postal : " . "$Tuple[codePostal]" . "</br>";
        echo "Ville : " . "$Tuple[ville]" . "</br>";
        echo "Téléphone : " . "$Tuple[telephone]" . "</br>";
        echo "Mail : " . "$Tuple[mail]" . "</br>";
        echo "Promotion : " . "$Tuple[promotion]" . "</br>" . "</br>";
        echo "  <div class='d-flex justify-content-center align-items-center container '>
    
        <form method='POST' action='ConfirmerEleve.php'>
            <div class='form-group row'>

                <label for='validation'></label>
                <div class='col'>
                    <input type='hidden' name='validation' value='oui' />
                </div>
            </div>

            <label for='login'></label>
            <input type='hidden' name='login' value='$Tuple[login]' />
            <input type='submit' class ='btn btn-primary' name='envoi' id='envoi' value='Accepter ce profil' />
        </form>
        <form method='POST' action='ConfirmerEleve.php'>
        <div class='form-group row'>

            <label for='validation'></label>
            <div class='col'>
                <input type='hidden' name='validation' value='non' />
            </div>
        </div>

        <label for='login'></label>
        <input type='hidden' name='login' value='$Tuple[login]' />
        <input type='submit' class ='btn btn-primary' name='envoi' id='envoi' value='Supprimer ce profil' />
    </form>
    </fieldset>
</div>";
    }

    echo "<a href='ajoutExp.php' class='btn btn-primary' >Ajouter une experience</a>";
    echo "<a href='inscription.php' class ='btn btn-primary' >Ajouter un élève</a>";
    ?>

    <?php require_once "includes/scripts.php"; ?>
</body>

</html>