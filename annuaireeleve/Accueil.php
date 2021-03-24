<!DOCTYPE html>
<html>

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Accueil</title>

</head>
<?php 
  session_start();
  require("includes/functions.php");
  afficherNomsPrenoms($_SESSION['login']); //mettre dans le header ?
  afficherExperience($_SESSION['login']);
  ?>
