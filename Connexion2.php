<?php
//require_once "includes/functions.php";
session_start();

if (!empty($_POST['login']) and !empty($_POST['mdp']))
{
    $login = $_POST['login'];
    $password = $_POST['mdp'];

    if($_SESSION['user']=="eleve")
    {
        $stmt = getDb()->prepare('select * from eleve where usr_login=? and usr_mdp=?');
        $stmt->execute(array($login, $mdp));
    }
    else
    {
        $stmt = getDb()->prepare('select * from gestionnaire where usr_login=? and usr_mdp=?');
        $stmt->execute(array($login, $mdp));
    }
    if ($stmt->rowCount() == 1) {
        // Authentication successful
        $_SESSION['login'] = $login;
        redirect("acceuil.php");
    }
    else 
    {
        $_SESSION['message']=1;
        header('Location: Connexion1.php');
    }
}
?>