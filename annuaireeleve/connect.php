<?php
try
{ $BDD = new PDO( "mysql:host=localhost;dbname=annuaireeleve;charset=utf8", "ebalatti","mdp",
 array(PDO::ATTR_ERRMODE =>PDO::ERRMODE_EXCEPTION));
; // connexion serveur de BD MySql et choix base
}
catch (Exception $e) {
 die('Erreur fatale : ' . $e->getMessage());
}
?>