<?php
require("connect.php");
require("includes/functions.php");
$valide =$_POST['validation'];
$login=$_POST['login'];

echo $login;
echo $valide;

$voirExp=$_POST['voirExp']; //pas fini

if ($valide=="oui")
{
    //$requete = $BDD->prepare("UPDATE eleve SET valide = :valide
    //WHERE login= :login ");
    $requete ->bindValue('valide',1, PDO::PARAM_INT);
    $requete ->bindValue('login',$login, PDO::PARAM_STR);
    $requete->execute() ;
}
else
{
    $requete = $BDD->prepare("DELETE FROM experience
WHERE login=:login");
$requete->bindValue('login',$login , PDO::PARAM_INT );
$requete->execute();
$requete = $BDD->prepare("DELETE FROM eleve
WHERE login=:login");
$requete->bindValue('login',$login , PDO::PARAM_INT );
$requete->execute();
}



redirect('AccueilGest.php');
