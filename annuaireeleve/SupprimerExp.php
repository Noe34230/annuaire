<?php
require("includes/functions.php");
$idexp = $_POST['idexp'];






$requete = getDb()->prepare("DELETE FROM experience
WHERE idExperience=:idExperience");
$requete->bindValue('idExperience', $idexp, PDO::PARAM_STR);
$requete->execute();




redirect('GererExp.php');
