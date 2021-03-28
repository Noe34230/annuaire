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
            echo "<fieldset class='form-group border p-3'>";
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
            echo "  
            <div class='d-flex justify-content-center align-items-center container '>
                <form method='POST' action='ConfirmerEleve.php'>
                    <div class='form-group row'>
                        <label for='login' class='col-form-label'></label>
                        <div class='col'>
                            <input type='hidden' name='login' class='form-control' value='$Tuple[login]' />
                        </div>
                    </div>
        
                    <input type='submit' name='envoi' class='btn btn-primary' id='envoi' value='Supprimer ce profil' />
                    </fieldset>
                </form>
        </div>";
      }
      ?>
</body>

</html>