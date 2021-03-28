<!DOCTYPE html>
<html>

<?php require_once "includes/head.php"; ?>

<body>

  <?php require_once "includes/header.php"; ?>

  <?php
  require("connect.php");
  session_start();
  require("includes/functions.php");
  echo "<h1>";
  afficherNomsPrenoms($_SESSION['login']);
  echo "</h1>";
  echo "<div>";
  echo "</div>";
  $requete = $BDD->prepare("SELECT * FROM eleve
  WHERE valide = 0 ");
  $requete->execute();
  echo "<form method='POST' action='GererEleve.php'>
            <label for='voirEleves'></label>
            <input type ='hidden' name ='voirEleves' value ='1'/>
            <input type='submit' name='envoi' id='envoi' value ='Voir tous les élèves'/>
          </form>";
  echo "<form method='POST' action='GererEleve.php'>
          <label for='voirExp'></label>
          <input type ='hidden' name ='voirExp' value ='1'/>
          <input type='submit' name='envoi' id='envoi' value ='Voir toutes les expériences'/>
        </form>";

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
    echo "  <form method='POST' action='GererEleve.php'>
            <label for='validation'> Accepter ce profil </label>
            <input type ='radio' name ='validation' value='oui'/> 
            <label for ='validation'> Inspecter ce profil ce profil</label>
            <input type ='radio' name ='validation' value='non'/> 
            <label for='login'></label>
            <input type ='hidden' name ='login' value ='$Tuple[login]'/>
            <input type='submit' name='envoi' id='envoi' value ='Envoyer'/>
            </form>";
  }

  ?>

  <?php require_once "includes/scripts.php"; ?>
</body>

</html>