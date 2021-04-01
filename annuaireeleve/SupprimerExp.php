<?php
require("includes/functions.php");
$idexp = $_POST['idexp'];






$requete = getDb()->prepare("DELETE FROM experience
WHERE idExperience=:idExperience");
$requete->bindValue('idExperience', $idexp, PDO::PARAM_STR);
$requete->execute();



if ($_SESSION['admin']) {
    redirect('GererExp.php');
} else {
    header('Location: AccueilEleve.php');
}
