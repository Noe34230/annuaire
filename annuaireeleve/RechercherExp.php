<?php 
session_start();
require_once "includes/functions.php";
afficherExperienceRecherchees($_POST['type'],$_POST['organisation'],$_POST['lieu'],$_POST['secteurAct'],$_POST['domaineComp'],$_SESSION['login']);



?>