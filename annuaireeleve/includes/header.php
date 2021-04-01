<nav class="navbar navbar-expand-sm bg-dark">

    <ul class="navbar-nav">
        <li class="nav-item">
            <?php
            if ($_SESSION['user'] == "eleve") {
                echo "<a class='nav-link' href='AccueilEleve.php'>Accueil</a>";
                echo "<li class='nav-item'>
                    <a class='nav-link' href='InfosPerso.php'>Mes informations personnelles</a>
                    </li>";
            } else {
                echo "<a class='nav-link' href='AccueilGest.php'>Accueil</a>";
            }
            ?>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="Recherche.php">Rechercher une experience</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="deconnexion.php">Deconnexion</a>
        </li>

    </ul>
</nav>