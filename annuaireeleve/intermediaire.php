<?php
session_start();
$_SESSION['user']=$_POST['user'];
if ($_POST['user']=="eleve")
{
    redirect('Connexion1.php');
}
else //différencier les deux accès
{
    header("Location :Connexion1.php");
}
