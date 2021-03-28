<html>
<?php require_once "includes/head.php" ?>

<body>
    <?php
    session_start();
    require("includes/functions.php");
    require_once "includes/header.php";
    require_once "includes/scripts.php";

    $requete = getDb()->prepare("SELECT * FROM experience");
    $requete->execute();
    while ($Tuple = $requete->fetch()) {
        echo "Type : " . "$Tuple[type]" . "</br>";
        echo "Date de début : " . "$Tuple[dateDeb]" . "</br>";
        echo "Date de fin : " . "$Tuple[dateFin]" . "</br>";
        echo "Description: " . "$Tuple[description]" . "</br>";
        echo "organisation : " . "$Tuple[organisation]" . "</br>";
        echo "Lieu : " . "$Tuple[lieu]" . "</br>";
        echo "Salaire : " . "$Tuple[salaire]" . "</br>";
        echo "Login : " . "$Tuple[login]" . "</br>" . "</br>";
        echo "  <form method='POST' action='SupprimerExp.php'>
        <label for ='validation'> Supprimer cet expérience </label>
        <input type ='radio' name ='validation' value='non'/> 
        <label for='idexp'></label>
        <input type ='hidden' name ='idexp' value ='$Tuple[idExperience]'/>
        <input type='submit' name='envoi' id='envoi' value ='Envoyer'/>
        </form>";
    }
    ?>
</body>

</html>