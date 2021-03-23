<?php 

session_start();
require_once "includes/functions.php";

if (empty($_POST['login'])) {
    print "Veuillez saisir votre login";
    }
    
    else if(empty($_POST['mdp']) || empty($_POST['mdpConf'])){
        print "Veuillez saisir ou confirmer votre mot de passe";
    } 
    else if(empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['genre']) || empty($_POST['promo']) || empty($_POST['mail']) 
    || empty($_POST['tel']) || empty($_POST['nomRue']) || empty($_POST['ville'] )){
        print "veuilez saisir tous les champs";  
    }

else{
    if($_POST['mdp']==$_POST['mdpConf']){

        ajouterEleve($_POST['nom'],$_POST['prenom'],$_POST['genre'],$_POST['mail'],$_POST['promo'],$_POST['tel'],
        $_POST['numRue'],$_POST['nomRue'],$_POST['codePostal'],$_POST['ville'],$_POST['login'],$_POST['mdp']);
    }
    else{
        print 'Les mots de passe ne correspondent pas';
    }
}

?>