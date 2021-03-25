<!DOCTYPE html>
<html>

<?php require_once "includes/head.php"; ?>
<body>

<?php require_once "includes/header.php"; ?>

<?php 
  session_start();
  require("includes/functions.php");
  $idExperience=$_POST['idExperience'];
  $id=$_SESSION['login'];
  afficherExperiencePerso2($id,$idExperience);

  ?>

<?php require_once "includes/scripts.php"; ?>
</body>
</html>