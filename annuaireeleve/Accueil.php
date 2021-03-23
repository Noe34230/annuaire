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
  afficherInfos($_SESSION['login']);
  afficherExperience($_SESSION['login']);
  ?>
