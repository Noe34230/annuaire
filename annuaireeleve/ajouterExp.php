<?php 

session_start();
require_once "includes/functions.php";

    if(empty($_POST['type']) || empty($_POST['dateDeb']) || empty($_POST['libelle']) || empty($_POST['dateFin']) || empty($_POST['description']) 
    || empty($_POST['organisation']) || empty($_POST['lieu']) || empty($_POST['salaire'] )){
        $_SESSION['champVideExp']=1;  
        header('Location: ajoutExp.php');
    }

else{
    ajouterExp($_POST['type'],date('Y-m-d',strtotime($_POST['dateDeb'])),$_POST['libelle'],date('Y-m-d',strtotime($_POST['dateFin'])),
    $_POST['description'],$_POST['organisation'], $_POST['lieu'],$_POST['salaire'],$_SESSION['login'],
    $_POST['secteurAct'],$_POST['domaineComp']);
    header('Location: ajoutExp.php');
}

?>