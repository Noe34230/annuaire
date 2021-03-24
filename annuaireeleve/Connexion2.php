<?php
require_once "includes/functions.php";
session_start();

if (!empty($_POST['login']) and !empty($_POST['mdp']))
{
    $login = $_POST['login'];
    $mdp = $_POST['mdp'];

    if($_SESSION['user']=="eleve")
    {
        $stmt = getDb()->prepare('select * from eleve where login=? and motDePasse=?');
        $stmt->execute(array($login, $mdp));
    }
    else
    {
        $stmt = getDb()->prepare('select * from gestionnaire where login=? and motDePasse=?');
        $stmt->execute(array($login, $mdp));
    }
    if ($stmt->rowCount() == 1) {
        // Authentication successful
        $_SESSION['login'] = $login;
        redirect('Accueil.php');
        echo "YAH";
    }
    else 
    {
        echo"Bonjour";
        $_SESSION['message']=1;
        redirect('Connexion.php');
    }
}
?>