<html>
<?php require_once "includes/head.php"; ?>

<body>

<?php 
session_start();
require_once "includes/header.php"; 
require_once "includes/functions.php";
?>



</body>
<form method="POST" action="rechercherExp.php">
<label for="type">Type :</label>
<select name="type" size="1" >
<option value="Stage">Stage</option>
<option value="Emploi">Emploi</option>
<option value="Alternance">Alternance</option>
<option value="Benevole">Benevole</option>
<option value="Autre">Autre</option>
</select><br/><br/>
<label for="domaineComp">Domaine de compétences</label> <br/> 
<select name="domaineComp" size="3">
<option value="tout" selected>Tout</option>
<?php afficherDomaineComp();?>
</select> <br/> <br/>
<label for="organisation"> Organisation</label>
<input type="text" name="organisation"> <br/> <br/>
<label for="lieu"> Lieu</label>
<input type="text" name="lieu"> <br/> <br/>
<label for="secteurAct">Secteur d'activité</label> <br/> 
<select name="secteurAct" size="3">
<option value="tout" selected>Tout</option>
<?php afficherSecteurAct();?>
</select> <br/> <br/>
<label for="promotion">Promotion du stagiaire</label> 
<input type="number" name="promotion"> <br/><br/>
<input type="submit" name="rechercher" value="Rechercher">


</form>

</html>