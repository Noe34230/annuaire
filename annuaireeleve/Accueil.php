<!DOCTYPE html>
<html>

<?php require_once "includes/head.php"; ?>
<body>

<?php require_once "includes/header.php"; ?>

<?php 
  session_start();
  require("includes/functions.php");
  afficherNomsPrenoms($_SESSION['login']); 
  afficherExperience($_SESSION['login']);
  ?>

<?php require_once "includes/scripts.php"; ?>
</body>
</html>