<?php
session_start();
session_destroy();//l'administrateur se deconnecte
header('Location: Connexion.php');
?>