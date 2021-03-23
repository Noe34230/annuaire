<!doctype html>
  <html>

  <?php
  session_start();
    $pageTitle = "ajoutExp";
    require_once "includes/head.php";
    ?>

<body>

<h1>Ajouter une experience</h1>
<?php
if(isset($_SESSION['champVideExp'])){
    echo "Veuillez remplir tout les champs";
}


?>


<fieldset>
    <legend>Experience</legend>
<form method="POST" action="ajouterExp.php">
<label for="type"> Type :</label>
<input type="text" name="type" size="50" /><br /><br /><br/>
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
</fieldset>
</form>

</body>


</html>