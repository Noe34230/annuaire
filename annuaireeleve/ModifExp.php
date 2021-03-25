<!DOCTYPE html>
<html>

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Modifier une expérience</title>

</head>
</html>
<?php 
  session_start();
  require("includes/functions.php");
  echo $_POST['idExperience'];
  $_SESSION['idExperience']=$_POST['idExperience'];
  
?>
    <form method="POST" action="Modifexp2.php">
        <label for="type"> Type d'expérience :</label>
        <input type ="text" name ="type"/> <br/><br/>
        <label for ="libelle"> Libelle :</label>
        <input type ="texte" name ="libelle" /> <br/><br/>
        <label for="dateFin"> Date à laquelle l'expérience s'est terminé :</label>
        <input type ="date" name ="dateFin"/> <br/><br/>
        <label for ="description"> Description :</label>
        <input type ="texte" name ="description" /> <br/><br/>
        <label for="organisation"> Organisation :</label>
        <input type ="text" name ="organisation"/> <br/><br/>
        <label for ="lieu"> Lieu :</label>
        <input type ="texte" name ="lieu" /> <br/><br/>
        <label for="salaire"> Salaire :</label>
        <input type ="text" name ="salaire"/> <br/><br/>
        <input type="submit" name="envoi" id="envoi" value ="Envoyer"/>
        

    </form>
</html>