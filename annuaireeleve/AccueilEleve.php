<!DOCTYPE html>
<html>

<?php require_once "includes/head.php"; ?>

<body>

  <?php require_once "includes/header.php"; ?>

  <?php
  require("includes/functions.php");
  echo "<h1>";
  afficherNomsPrenoms($_SESSION['login']);
  echo "</h1>";
  echo "<div>";
  afficherExperience($_SESSION['login']);
  echo "<a href='ajoutExp.php'>Ajouter une experience</a><br/>";
  echo "</div>";

  ?>

  <?php require_once "includes/scripts.php"; ?>
</body>

</html>