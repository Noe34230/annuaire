<!DOCTYPE html>
<html>
    <body>
        <meta charset="utf-8" />
        <h1>CONNEXION</h1>
        <br/>
        <br/>
        <?php 
            session_start();
            $_SESSION['user']=$_POST['user'];

            
            if (isset($_SESSION['message']))
            {print "Utilisateur ou mdp non reconnu, veuillez réessayez"; }
        ?>
        <form method="POST" action="Connexion2.php">
            <label for="login"> login :</label>
            <input type ="text" name ="login"/> <br/><br/>
            <label for ="mdp"> mot de passe :</label>
            <input type ="password" name ="mdp" /> <br/><br/>
            <input type="submit" name="envoi" id="envoi" value ="Envoyer"/>

        </form>
    </body>
</html>