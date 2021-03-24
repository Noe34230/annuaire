<!DOCTYPE html>
<html>

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Informations Personelles</title>

</head>
<?php 
  session_start();
  require("includes/functions.php");
  afficherInfosPerso($_SESSION['login']);
?>
    <form method="POST" action="ModifInfosPerso.php">
        </br>
        <input type="submit" name="envoi" id="envoi" value ="Modifier mes Informations Personelles"/>
    </form>

