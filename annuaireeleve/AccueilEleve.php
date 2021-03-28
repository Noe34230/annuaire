<!DOCTYPE html>
<html>

<?php
session_start();
require_once "includes/head.php";
?>

<body>

  <?php
<<<<<<< HEAD
  session_start();
  require_once "includes/header.php"; ?>
  <div class="container">
    <?php
    require("includes/functions.php");
    echo "<h1>";
    afficherNomsPrenoms($_SESSION['login']);
    echo "</h1>";
    echo "<div>";
    afficherExperience($_SESSION['login']);
    echo "<br/> <br/>";
    echo "<a href='ajoutExp.php' class='btn btn-primary' >Ajouter une experience</a><br/>";
    echo "</div>";

=======

  require("includes/functions.php");
  echo "<h1>";
  afficherNomsPrenoms($_SESSION['login']);
  echo "</h1>";
  echo "<div>";
  afficherExperience($_SESSION['login']);
  echo "<a href='ajoutExp.php'>Ajouter une experience</a><br/>";
  echo "</div>";


  ?>
>>>>>>> 5a90d3cd3cc372c51806e596587352cbf43d3922

    ?>
  </div>
  <?php require_once "includes/scripts.php"; ?>
</body>

</html>