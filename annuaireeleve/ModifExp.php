<!DOCTYPE html>
<html>

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Informations Personnelles</title>

</head>
<?php 
  session_start();
  require("includes/functions.php");
  
?>
    <form method="POST" action="Modifexp2.php">
        <select name="type" size="3" multiple>
        <option value="stage">Stage</option>
        <option value="emploi">emploi</option>
        <option value="alternance">Alternance</option>
        <option value="Benevole">benevole</option>
        <option value="Autre">Autre</option> 
        </select><br/><br/>
        <label for ="libelle"> Libelle :</label>
        <input type ="texte" name ="Libelle" /> <br/><br/>
        <label for="dateFin"> Date à laquelle l'expérience s'est terminé :</label>
        <input type ="text" name ="dateFin"/> <br/><br/>
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