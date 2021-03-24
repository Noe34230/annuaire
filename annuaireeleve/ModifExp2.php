<!DOCTYPE html>
<html>

<head>

  <meta charset="utf-8">

</head>
<?php 
  session_start();
  require("includes/functions.php");
  $type=$_POST['type'];
  $libelle=$_POST['libelle'];
  $lieu=$_POST['lieu'];
  $salaire=$_POST['salaire'];
  $description=$_POST['description'];


  modifExp($_SESSION['login'],$libelle,$description,$organisation,$salaire,$Lieu,$type);
  
  redirect('Accueil.php');
?>