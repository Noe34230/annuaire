<?php
require("includes/functions.php");
$valide = $_POST['validation'];
$login = $_POST['login'];

echo $login;
echo $valide;

//$voirExp = $_POST['voirExp']; 

if ($valide == "oui") {
    $requete = getDb()->prepare("UPDATE eleve SET valide = :valide
    WHERE login= :login ");
    $requete->bindValue('valide', 1, PDO::PARAM_INT);
    $requete->bindValue('login', $login, PDO::PARAM_STR);
    $requete->execute();
} else if ($valide == "non") {
    $requete = getDb()->prepare("DELETE FROM experience
WHERE login=:login");
    $requete->bindValue('login', $login, PDO::PARAM_STR);
    $requete->execute();
    $RQT = getdb()->prepare("DELETE FROM eleve
WHERE login=:login");
    $RQT->bindValue('login', $login, PDO::PARAM_STR);
    $RQT->execute();
}



redirect('GererEleve.php');
