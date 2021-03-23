<?php 

session_start();
require_once "includes/functions.php";

ajouterEleve($_POST['nom'],$_POST['prenom'],$_POST['dateNaissance'],$_POST['genre'],$_POST['mail'],$_POST['promo'],$_POST['tel'],
$_POST['numRue'],$_POST['nomRue'],$_POST['codePostal'],$_POST['ville'],$_POST['login'],$_POST['mdp']);



?>