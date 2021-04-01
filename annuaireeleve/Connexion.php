<!DOCTYPE html>
<html>
<?php
session_start();
require_once "includes/head.php" ?>

<body>
    <div class="container">
        <h1>CONNEXION</h1><br /><br />
        <div class="d-flex justify-content-center align-items-center container ">
            <fieldset class="form-group border p-3">
                <form method="POST" action="Connexion1.php">
                    <div class=" form-check">
                        <input type="radio" class="form-check-input" name="user" id="eleve" value="eleve" />
                        <label for="user" class="form-check-label">Eleve</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="user" id="admin" value="admin" />
                        <label for="user" class="form-check-label">Administrateur</label>
                    </div>
                    <input type="submit" name="envoi" value="Se connecter" class="btn btn-primary" />
                </form>
            </fieldset>
        </div>
        <a href="inscription.php" class="btn btn-primary" class="align-items-center ">Créer un compte</a>
    </div>


    </div>
</body>

</html>