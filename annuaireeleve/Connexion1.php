<!DOCTYPE html>
<html>
<?php require_once "includes/head.php" ?>

<body>

    <?php
    session_start();
    require_once "includes/functions.php";
    if (empty($_POST['user'])) {
        redirect('Connexion.php');
    }
    $_SESSION['user'] = $_POST['user'];

    if (isset($_SESSION['message'])) {
        print "Utilisateur ou mdp non reconnu, veuillez réessayez";
    }
    ?>
    <div class="container">
        <h1>CONNEXION</h1>
        <div class="d-flex justify-content-center align-items-center container ">
            <form method="POST" action="Connexion2.php">
                <div class="form-group row">
                    <label for="login" class="col-form-label"> login :</label>
                    <div class="col">
                        <input type="text" class="form-control" name="login" />
                    </div>
                </div>
                <div class="form-group row">
                    <label for="mdp" class="col-form-label"> mot de passe :</label>
                    <div class="col">
                        <input type="password" class="form-control" name="mdp" />
                    </div>
                </div>
                <input type="submit" class="btn btn-primary" name="envoi" id="envoi" value="Envoyer" />
            </form>
        </div>
</body>

</html>