<!DOCTYPE html>
<html>
<?php require_once "includes/head.php" ?>

<body>

  <?php
  session_start();
  require_once "includes/header.php";
  require_once "includes/functions.php";
  ?>
  <div class="container">
    <?php afficherInfosPerso($_SESSION['login']) ?>
    <form method="POST" action="ModifInfosPerso.php">
      <input type="submit" class="btn btn-primary" name="envoi" id="envoi" value="Modifier mes Informations Personelles" />
  </div>
  </form>
</body>