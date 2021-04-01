<!DOCTYPE html>
<html>

<head>

  <meta charset="utf-8">

</head>
<?php
session_start();
require("includes/functions.php");
$type = $_POST['type'];
$libelle = $_POST['libelle'];
$lieu = $_POST['lieu'];
$salaire = $_POST['salaire'];
$description = $_POST['description'];
$idExperience = $_SESSION['idExperience'];
$dateDeb = date('Y-m-d', strtotime($_POST['dateFin']));
$dateFin = date('Y-m-d', strtotime($_POST['dateDeb']));
$organisation = $_POST['organisation'];
//echo $idExperience;



modifExp($_SESSION['login'], $libelle, $description, $organisation, $salaire, $lieu, $type, $dateFin, $idExperience, $dateDeb);

redirect('AccueilEleve.php');
?>