<!DOCTYPE html>
<html>

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Informations Personnelles</title>

</head>
<?php
session_start();
require("includes/functions.php");
$mail = $_POST['mail'];
$prenom = $_POST['prenom'];
$nom = $_POST['nom'];
$telephone = $_POST['telephone'];
$codePostal = $_POST['codePostal'];
$numRue = $_POST['numRue'];
$nomRue = $_POST['nomRue'];
$ville = $_POST['ville'];
$genre = $_POST['genre'];
$promotion = $_POST['promotion'];
$date = date('Y-m-d', strtotime($_POST['dateNaissance']));


modifInfosPerso($_SESSION['login'], $nom, $prenom, $genre, $numRue, $nomRue, $codePostal, $ville, $mail, $telephone, $promotion, $date);

redirect('InfosPerso.php');
?>