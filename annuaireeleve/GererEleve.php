<html>
<?php require_once "includes/head.php" ?>

<body>
      <?php
      session_start();
      require("includes/functions.php");
      require_once "includes/header.php";
      require_once "includes/scripts.php";

      $requete = getDb()->prepare("SELECT * FROM eleve");
      $requete->execute();
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
            echo "  <form method='POST' action='ConfirmerEleve.php'>
            <label for ='validation'> Supprimer ce profil </label>
            <input type ='radio' name ='validation' value='non'/> 
            <label for='login'></label>
            <input type ='hidden' name ='login' value ='$Tuple[login]'/>
            <input type='submit' name='envoi' id='envoi' value ='Envoyer'/>
            </form>";
      }
      ?>
</body>

</html>