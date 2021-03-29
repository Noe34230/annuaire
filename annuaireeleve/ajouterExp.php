<?php

session_start();
require_once "includes/functions.php";

if ($_SESSION['user'] == "eleve") {

    if (
        empty($_POST['type']) || empty($_POST['dateDeb']) || empty($_POST['libelle']) || empty($_POST['dateFin']) || empty($_POST['description'])
        || empty($_POST['organisation']) || empty($_POST['lieu']) || empty($_POST['salaire'])
    ) {
        $_SESSION['champVideExp'] = 1;
        header('Location: ajoutExp.php');
    } else {
        ajouterExp(
            $_POST['type'],
            date('Y-m-d', strtotime($_POST['dateDeb'])),
            $_POST['libelle'],
            date('Y-m-d', strtotime($_POST['dateFin'])),
            $_POST['description'],
            $_POST['organisation'],
            $_POST['lieu'],
            $_POST['salaire'],
            $_SESSION['login'],
            $_POST['secteurAct'],
            $_POST['domaineComp']
        );
        $_SESSION['champVideExp'] = null;
    }
} else {
    $stmt = getDb()->prepare('select * from eleve where login=?');
    $stmt->execute(array($_POST['eleve']));
    if ($stmt->rowCount() == 1) {
        ajouterExp(
            $_POST['type'],
            date('Y-m-d', strtotime($_POST['dateDeb'])),
            $_POST['libelle'],
            date('Y-m-d', strtotime($_POST['dateFin'])),
            $_POST['description'],
            $_POST['organisation'],
            $_POST['lieu'],
            $_POST['salaire'],
            $_POST['eleve'],
            $_POST['secteurAct'],
            $_POST['domaineComp']
        );
    }
}
header('Location: ajoutExp.php');
