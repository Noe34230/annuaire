<?php 

session_start();
require_once "includes/functions.php";

    if(empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['genre']) || empty($_POST['promo']) || empty($_POST['mail']) 
    || empty($_POST['tel']) || empty($_POST['nomRue']) || empty($_POST['ville'] || empty($_POST['login'] || empty($_POST['mdp']) ||empty($_POST['mdpConf'])))){
        $_SESSION['champVide']=1;  
        header('Location: inscription.php');
    }

else{
    if($_POST['mdp']==$_POST['mdpConf']){

        ajouterEleve($_POST['nom'],$_POST['prenom'],$_POST['genre'],$_POST['mail'],$_POST['promo'],$_POST['tel'],
        $_POST['numRue'],$_POST['nomRue'],$_POST['codePostal'],$_POST['ville'],$_POST['login'],$_POST['mdp']);
    }
    else{
        
        $_SESSION['errMdp']=1;
        header('Location: inscription.php');
    }
}

?>