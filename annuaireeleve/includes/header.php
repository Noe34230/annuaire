<nav class="navbar navbar-expand-sm bg-light">

<ul class="navbar-nav">
<li class="nav-item">
<?php
session_start();

if ($_SESSION['user']=="eleve")
{
    echo "<a class='nav-link' href='AccueilEleve.php'>Accueil</a>";

}
else
{
    echo "<a class='nav-link' href='AccueilGest.php'>Accueil</a>";

}
?>
</li>
<li class="nav-item">
<a class="nav-link" href="Recherche.php">Rechercher une experience</a>
</li>
<li class="nav-item">
<a class="nav-link" href="infosPerso.php">Mes informations personnelles</a>
</li>
<li class="nav-item">
<a class="nav-link" href="deconnexion.php">Deconnexion</a>
</li>

</ul>
</nav>