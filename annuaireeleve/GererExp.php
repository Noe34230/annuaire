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
        echo "  
            <div class='d-flex justify-content-center align-items-center container '>
                <form method='POST' action='SupprimerExp.php'>
                    <div class='form-group row'>
                        <label for='login' class='col-form-label'></label>
                        <div class='col'>
                            <input type='hidden' name='login' class='form-control' value='$Tuple[idExperience]' />
                        </div>
                    </div>
        
                    <input type='submit' name='envoi' class='btn btn-primary' id='envoi' value='Supprimer cette expérience' />
                    </fieldset>
                </form>
        </div>";
    }
    ?>
</body>

</html>