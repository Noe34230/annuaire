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
  if (isset($_SESSION['champVideExp'])) {
    echo "Veuillez remplir tout les champs";
  }


  ?>
  <div class="container">
    <h1>Ajouter une experience</h1>

    <fieldset class="form-group border p-3">
      <legend>Experience</legend>
      <form method="POST" action="ajouterExp.php">
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
          <label for="datDeb" class="col-form-label">Date à laquelle l'expérience a commencé :</label>
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
        <div class="form-group row">
          <label class="col-form-label" for="secteurAct">Secteur d'activité</label>
          <div class="col">
            <select name="secteurAct" size="3" multiple>
              <?php afficherSecteurAct(); ?>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-form-label" for="domaineComp">Domaine de compétences</label>
          <div class="col">
            <select name="domaineComp" size="3" multiple>
              <?php afficherDomaineComp(); ?>
            </select>
          </div>
        </div>
        <input type="submit" class="btn btn-primary" name="ajouter" value="Ajouter" />
    </fieldset>
    </form>
  </div>
</body>


</html>