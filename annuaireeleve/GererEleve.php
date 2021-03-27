<?php
require("connect.php");
require("includes/functions.php");
$valide =$_POST['validation'];
$login=$_POST['login'];
$oui=1;

$voirExp=$_POST['']; //pas fini

if ($valide=="oui")
{
    $requete = $BDD->prepare("UPDATE eleve SET valide = :valide
    WHERE login= :login ");
    $requete ->bindValue('valide',$oui, PDO::PARAM_INT);
    $requete ->bindValue('login',$login, PDO::PARAM_STR);
    $requete->execute() ;
}
else
{
    $requete = $BDD->prepare("DELETE FROM eleve
WHERE login=:login");
$requete->bindValue('login',$login , PDO::PARAM_INT );
$requete->execute();
}



redirect('AccueilGest.php');
