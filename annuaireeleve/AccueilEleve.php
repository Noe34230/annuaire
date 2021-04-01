<!DOCTYPE html>
<html>

<?php
require_once "includes/head.php";
?>

<body>

  <?php
  require_once "includes/functions.php";
  session_start();
  $stmt = getDb()->prepare('select valide from eleve where login=?');
  $stmt->execute(array($_SESSION['login']));
  $Tuple = $stmt->fetch();
  if ($Tuple['valide'] == 1) {
    require_once "includes/header.php"; ?>
    <div class="container">
    <?php
    echo "<h1>";
    afficherNomsPrenoms($_SESSION['login']);
    echo "</h1>";
    echo "<div>";
    afficherExperience($_SESSION['login']);
    echo "<br/> <br/>";
    echo "<a href='ajoutExp.php' class='btn btn-primary' >Ajouter une experience</a><br/>";
    echo "</div>";
  } else {
    echo "Votre compte est en attente de validation";
  }

    ?>
    </div>
    <?php require_once "includes/scripts.php"; ?>
</body>

</html>