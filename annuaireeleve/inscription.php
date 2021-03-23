<!doctype html>
  <html>

  <?php
  session_start();
    $pageTitle = "Inscription";
    require_once "includes/head.php";
    ?>

<body>

<h1>Inscription</h1>
<?php
if(isset($_SESSION['errMdp'])){
    echo "Les mots de passe ne correspondent pas </br>";
}

if(isset($_SESSION['champVide'])){
    echo "Veuillez remplir tout les champs";
}


?>


<fieldset>
    <legend>Informations personnelles</legend>
<form method="POST" action="validerInscr.php">
<label for="nom"> Nom :</label>
<input type="text" name="nom" size="50" /><br /><br /><br/>
<label for="prenom"> prenom :</label>
<input type="text" name="prenom" size="50" /><br /><br /><br/>
<label for="dateNaissance"> Date de naissance :</label>
<input type="date" name="dateNaissance" /><br /><br /><br/>
<label for="genre"> Homme </label>
<input type="Radio" name="genre" value="homme" />
<label for="genre"> Femme </label>
<input type="Radio" name="genre" value="femme" />
<label for="genre"> Autre </label>
<input type="Radio" name="genre" value="autre" />
<label for="genre"> Je ne veux pas preciser</label>
<input type="Radio" name="genre" value="je ne veux pas preciser" /><br /><br /><br/>
<label for="mail"> Mail :</label>
<input type="mail" name="mail" size="50" /><br /><br /><br/>
<label for="promo"> Promotion :</label>
<input type="number" name="promo" size="4" /><br /><br /><br/>
<label for="tel"> Telephone :</label>
<input type="number" name="tel" size="10" /><br /><br /><br/>
<fieldset>
    <legend>Adresse</legend>
    <label for="numRue"> Numéro de rue :</label>
<input type="number" name="numRue" size="10" /><br /><br /><br/>
<label for="nomRue"> Nom de rue :</label>
<input type="text" name="nomRue" size="50" /><br /><br /><br/>
<label for="codePostal"> Code postal :</label>
<input type="number" name="codePostal" size="10" /><br /><br /><br/>
<label for="ville"> Ville :</label>
<input type="text" name="ville" size="50" /><br />
</fieldset>
<br/>


<label for="login"> login :</label>
<input type="text" name="login" size="50" /><br /><br /><br/>
<label for="mdp"> mot de passe :</label>
<input type="password" name="mdp" size="50" /><br /><br /><br/>
<label for="Conf"> confirmer le mot de passe :</label>
<input type="password" name="mdpConf" size="50" /><br /><br /><br/>
<input type="submit" name="valider" value="valider"/>
</fieldset>
</form>

</body>


</html>