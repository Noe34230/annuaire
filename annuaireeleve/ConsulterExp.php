<!DOCTYPE html>
<html>

<?php require_once "includes/head.php"; ?>

<body>

  <?php
  session_start();
  require_once "includes/header.php";
  require("includes/functions.php");
  $idExperience = $_POST['idExperience'];
  $id = $_SESSION['login'];
  afficherExperiencePerso2($idExperience);

  ?>

  <?php require_once "includes/scripts.php"; ?>
</body>

</html>