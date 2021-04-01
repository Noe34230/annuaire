<!DOCTYPE html>
<html>

<?php require_once "includes/head.php"; ?>

</html>
<?php
session_start();
require_once "includes/header.php";
require_once "includes/functions.php";

$_SESSION['idExperience'] = $_POST['idExperience'];

?>
<div class="container">
  <?php echo $_POST['libelle'] ?>
  <fieldset class="form-group border p-3">
    <form method="POST" action="ModifExp2.php">
      <div class="form-group row">
        <label class="col-form-label" for="type">Type </label>
        <div class="col">
          <select name="type">
            <option value="stage">Stage</option>
            <option value="emploi">emploi</option>
            <option value="alternance">Alternance</option>
            <option value="Benevole">benevole</option>
            <option value="Autre">Autre</option>
          </select>
        </div>
      </div>
      <div class="form-group row">
        <label for="libelle" class="col-form-label"> Libelle :</label>
        <div class="col">
          <input type="texte" class="form-control" name="libelle" />
        </div>
      </div>
      <div class="form-group row">
        <label for="dateDeb" class="col-form-label"> Date à laquelle l'expérience a débutée :</label>
        <div class="col">
          <input type="date" class="form-control" name="dateDeb" />
        </div>
      </div>
      <div class="form-group row">
        <label for="dateFin" class="col-form-label"> Date à laquelle l'expérience s'est terminée :</label>
        <div class="col">
          <input type="date" class="form-control" name="dateFin" />
        </div>
      </div>
      <div class="form-group">
        <label for="description" class="col-form-label"> Description :</label>
        <textarea class="form-control" rows="5" name="description"></textarea>
      </div>
      <div class="form-group">
        <label for="organisation" class="col-form-label"> Organisation :</label>
        <div class="col">
          <input type="text" class="form-control" name="organisation" />
        </div>
      </div>
      <div class="form-group">
        <label for="lieu" class="col-form-label"> Lieu :</label>
        <div class="col">
          <input type="texte" class="form-control" name="lieu" />
        </div>
      </div>
      <div class="form-group">
        <label for="salaire" class="col-form-label"> Salaire :</label>
        <div class="col">
          <input type="text" class="form-control" name="salaire" />
        </div>
      </div>
      <input type="submit" name="modifier" class="btn btn-primary" id="modifier" value="Modifier" />


    </form>
  </fieldset>
</div>

</html>