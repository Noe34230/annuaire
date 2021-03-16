<!DOCTYPE html>
<html>
    <body>
        <meta charset="utf-8" />
        <h1>CONNEXION</h1>
        <br/>
        <br/>
        <form method="POST" action="intermediaire.php">
            <label for="user"> ELEVE </label>
            <input type ="radio" name ="user" value="eleve"/> <br/><br/>
            <label for ="user"> Administrateur</label>
            <input type ="radio" name ="user" value="admin"/> <br/><br/>
            <input type="submit" name="envoi" id="envoi" value ="Envoyer"/>

        </form>
    </body>
</html>