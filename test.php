<html>
<div class='d-flex justify-content-center align-items-center container '>
    <fieldset class='form-group border p-3'>
        <form method='POST' action='ConfirmerEleve.php'>
            <div class='form-group row'>

                <label for='validation' class='col-form-label'> Supprimer ce profil </label>
                <div class='col'>
                    <input type='radio' class='form-control' name='validation' value='non' />
                </div>
            </div>

            <div class='form-group row'>
                <label for='login' class='col-form-label'></label>
                <div class='col'>
                    <input type='hidden' name='login' class='form-control' value='$Tuple[login]' />
                </div>
            </div>

            <input type='submit' name='envoi' class='btn btn-primary' id='envoi' value='Envoyer' />
    </fieldset>
    </form>"
</div>

<div class='d-flex justify-content-center align-items-center container '>
    <fieldset class='form-group border p-3'>
        <form method='POST' action='ConfirmerEleve.php'>
            <div class='form-group row'>

                <label for='validation'> Accepter ce profil </label>
                <div class='col'>
                    <input type='radio' name='validation' value='oui' />
                </div>
            </div>
            <div class='form-group row'>
                <label for='validation'> Supprimer ce profil </label>
                <div class='col'>
                    <input type='radio' name='validation' value='non' />
                </div>
            </div>

            <label for='login'></label>
            <input type='hidden' name='login' value='$Tuple[login]' />
            <input type='submit' name='envoi' id='envoi' value='Envoyer' />
        </form>
    </fieldset>
</div>



</html>