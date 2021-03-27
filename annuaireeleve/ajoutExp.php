<!doctype html>
  <html>

  <?php

    $pageTitle = "ajoutExp";
    require "includes/head.php";
    ?>

<body>


<?php
  session_start();
require_once "includes/functions.php";
require_once "includes/header.php";
if(isset($_SESSION['champVideExp'])){
    echo "Veuillez remplir tout les champs";
}


?>
<h1>Ajouter une experience</h1>

<fieldset>
    <legend>Experience</legend>
<form method="POST" action="ajouterExp.php">
<select name="type" size="3" multiple>
<option value="stage">Stage</option>
<option value="emploi">emploi</option>
<option value="alternance">Alternance</option>
<option value="Benevole">benevole</option>
<option value="Autre">Autre</option>
</select><br /><br /><br/>
<label for="libelle"> Libelle :</label>
<input type="text" name="libelle" size="50" /><br /><br /><br/>
<label for="dateDeb"> Date de début :</label>
<input type="date" name="dateDeb" /><br /><br /><br/>
<label for="dateFin"> Date de fin </label>
<input type="date" name="dateFin" /><br /><br /><br/>
<p>
Decrivez votre experience ci-dessous: <p>
<textarea name="description" rows=4 COLS=20></textarea> 
<br/><br/><br/>
<label for="organisation"> Organisation :</label>
<input type="text" name="organisation" size="50" /><br /><br /><br/>
<label for="lieu"> Lieu :</label>
<input type="text" name="lieu" size="50" /><br /><br /><br/>
<label for="salaire"> Salaire :</label>
<input type="number" name="salaire" size="50" /><br /><br /><br/>
<label for="secteurAct">Secteur d'activité</label> <br/> 
<select name="secteurAct" size="3" multiple>
<?php afficherSecteurAct();?>
</select> <br/> <br/>
<label for="domaineComp">Domaine de compétences</label> <br/> 
<select name="domaineComp" size="3" multiple>
<?php afficherDomaineComp();?>
</select> <br/> <br/>
<input type="submit" name="ajouter" value="Ajouter"/>
</fieldset>
</form>

</body>


</html>