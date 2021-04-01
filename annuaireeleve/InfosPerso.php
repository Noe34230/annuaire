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
    <?php
    if (!isset($_POST['login'])) {
      afficherInfosPerso($_SESSION['login']);
      echo "<form method='POST' action='ModifInfosPerso.php'>
      <input type='submit' class='btn btn-primary' name='envoi' id='envoi' value='Modifier mes Informations Personelles' />
      </form>";
    } else {
      afficherInfosPerso($_POST['login']);
      afficherExperience($_POST['login']);
    }
    ?>


  </div>
  </form>
</body>