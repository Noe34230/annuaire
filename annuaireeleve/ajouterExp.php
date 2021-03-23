<?php 

session_start();
require_once "includes/functions.php";

    if(empty($_POST['type']) || empty($_POST['deteDeb']) || empty($_POST['libelle']) || empty($_POST['dateFin']) || empty($_POST['description']) 
    || empty($_POST['organisation']) || empty($_POST['lieu']) || empty($_POST['salaire'] )){
        $_SESSION['champVideExp']=1;  
        header('Location: ajoutExp.php');
    }

else{
    if($_POST['mdp']==$_POST['mdpConf']){
        ajouterExp($_POST['type'],$_POST['dateDeb'],$_POST['libelle'],$_POST['dateFin'],$_POST['description'],$_POST['organisation'],
        $_POST['lieu'],$_POST['salaire']);
        header('Location: ajoutExp.php');
    }
}

?>