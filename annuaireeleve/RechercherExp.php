<html>
<?php require_once "includes/head.php"?>
<body>
<?php 
session_start();
require_once "includes/header.php";
require_once "includes/functions.php";
if(!($_POST['secteurAct']=='tout' && $_POST['domaineComp']=='tout')){
afficherExperienceRecherchees($_POST['type'],$_POST['organisation'],$_POST['lieu'],$_POST['secteurAct'],$_POST['domaineComp'],$_SESSION['login']);
}
else {
    afficherExperienceRechercheesBIS($_POST['type'],$_POST['organisation'],$_POST['lieu'],$_POST['secteurAct'],$_POST['domaineComp'],$_SESSION['login']);
}


?>
</body>
</html>