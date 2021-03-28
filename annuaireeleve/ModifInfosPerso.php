<!DOCTYPE html>
<html>
<?php require_once "includes/head.php" ?>

<body>
  <?php
  session_start();
  require_once "includes/header.php";
  require_once "includes/functions.php";

  ?>

  <form method="POST" action="ModifInfosPerso2.php">
    <label for="prenom"> Prénom :</label>
    <input type="text" name="prenom" /> <br /><br />
    <label for="nom"> Nom :</label>
    <input type="texte" name="nom" /> <br /><br />
    <label for="genre"> Genre :</label>
    <input type="text" name="genre" /> <br /><br />
    <label for="numRue"> Numéro de rue :</label>
    <input type="texte" name="numRue" /> <br /><br />
    <label for="nomRue"> Nom de rue :</label>
    <input type="text" name="nomRue" /> <br /><br />
    <label for="codePostal"> Code Postal :</label>
    <input type="texte" name="codePostal" /> <br /><br />
    <label for="ville"> Ville :</label>
    <input type="text" name="ville" /> <br /><br />
    <label for="telephone"> Téléphone :</label>
    <input type="texte" name="telephone" /> <br /><br />
    <label for="mail"> Mail :</label>
    <input type="text" name="mail" /> <br /><br />
    <label for="promotion"> Promotion :</label>
    <input type="texte" name="promotion" /> <br /><br />
    <input type="submit" name="envoi" id="envoi" value="Envoyer" />
  </form>
</body>

</html>