<?php
require_once "includes/functions.php";
session_start();

if (!empty($_POST['login']) and !empty($_POST['mdp'])) {
    $login = $_POST['login'];
    $mdp = $_POST['mdp'];

    if ($_SESSION['user'] == "eleve") {
        $stmt = getDb()->prepare('select * from eleve where login=? and motDePasse=?');
    } else {
        $stmt = getDb()->prepare('select * from gestionnaire where login=? and motDePasse=?');
    }
    $stmt->execute(array($login, $mdp));

    if ($stmt->rowCount() == 1 && $_SESSION['user'] == "eleve") {
        // Authentication successful eleve
        $_SESSION['login'] = $login;
        redirect('AccueilEleve.php');
    } else if ($stmt->rowCount() == 1 && $_SESSION['user'] == "admin") {
        // Authentication successful gestionnaire
        $_SESSION['login'] = $login;
        redirect('AccueilGest.php');
    } else {
        $_SESSION['message'] = 1;
        redirect('Connexion.php');
    }
}
