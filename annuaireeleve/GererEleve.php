<?php
  require("connect.php");
  session_start();
  require("includes/functions.php");
  require_once "includes/header.php";
  require_once "includes/scripts.php";

$requete = $BDD->prepare("SELECT * FROM eleve");
$requete->execute();
while ($Tuple = $requete ->fetch()){
      echo "Prénom : "."$Tuple[prenom]"."</br>";
      echo "Nom : "."$Tuple[nom]"."</br>";
      echo "Genre : "."$Tuple[genre]"."</br>";
      echo "Numéro de rue : "."$Tuple[numRue]"."</br>";
      echo "Nom de rue : "."$Tuple[nomRue]"."</br>";
      echo "Code Postal : "."$Tuple[codePostal]"."</br>";
      echo "Ville : "."$Tuple[ville]"."</br>";
      echo "Téléphone : "."$Tuple[telephone]"."</br>";
      echo "Mail : "."$Tuple[mail]"."</br>";
      echo "Promotion : "."$Tuple[promotion]"."</br>"."</br>";
}
      ?>