<html>
<?php require_once "includes/head.php" ?>

<body>
    <?php
    session_start();
    require_once "includes/header.php";
    require_once "includes/functions.php";
    afficherEleves($_POST['promotion']);
    ?>

</body>


</html>