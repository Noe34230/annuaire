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
  echo "<a href='GererEleve.php'>Voir tous les élèves</a><br/>";
  echo "<a href='GererExp.php'>Voir toutes les expériences</a><br/>";

  echo "Profils en attente de validation :" . "</br>";
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
    <fieldset class='form-group border p-3'>
        <form method='POST' action='ConfirmerEleve.php'>
            <div class='form-group row'>

                <label for='validation'> Accepter ce profil </label>
                <div class='col'>
                    <input type='radio' name='validation' value='oui' />
                </div>
            </div>
            <div class='form-group row'>
                <label for='validation'> Supprimer ce profil </label>
                <div class='col'>
                    <input type='radio' name='validation' value='non' />
                </div>
            </div>

            <label for='login'></label>
            <input type='hidden' name='login' value='$Tuple[login]' />
            <input type='submit' name='envoi' id='envoi' value='Envoyer' />
        </form>
    </fieldset>
</div>";
  }

  ?>

  <?php require_once "includes/scripts.php"; ?>
</body>

</html>