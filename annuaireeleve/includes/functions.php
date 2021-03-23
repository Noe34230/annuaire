<?php


function getDb() {
    // Local deployment
     $server = "localhost";
    $username = "ebalatti";
    $password = "mdp";
    $db = "annuaireeleve"; 
    
    // Deployment on Heroku with ClearDB for MySQL
    /*$url = parse_url(getenv("CLEARDB_DATABASE_URL"));
    $server = $url["localhost"];
    $username = $url["ebalatti"];
    $password = $url["mdp"];
    $db = substr($url["anuaireeleve"], 1);*/
    
    return new PDO("mysql:host=$server;dbname=$db;charset=utf8", "$username", "$password",
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
function redirect($url) {
    header("Location: $url");
}



function ajouterEleve($nom,$prenom,$date,$genre,$mail,$promo,$tel,$numRue,$nomRue,$codePostal,$ville,$login,$mdp){
    $eleve = getDb()->prepare('insert into eleve
    (nom,prenom,date, genre, mail,promo, tel, numRue, nomRue, codePostal, ville, login, mdp, valide)
    values (:nom , :prenom, :date, :genre, :mail, :promo,:tel, :numRue,:nomRue, :codePostal, :ville, :login, :mdp, :valide)');
    $eleve->execute(array($nom,$prenom,$genre,$mail,$promo,$tel,$numRue,$nomRue,$codePostal,$ville,$login,$mdp,false));
}

function afficherInfos($id){
    require("connect.php");
    $requete = $BDD->prepare("SELECT * FROM eleve
WHERE login= ? ");
$requete->execute( array($id) ) ;
    while ($Tuple = $requete ->fetch()){
        echo "$Tuple[prenom]"." ";
        echo "$Tuple[nom]";
    }
}

function afficherExperience($id){
    require("connect.php");
    $requete = $BDD->prepare("SELECT * FROM experience
WHERE login= ? ");
$requete->execute( array($id) ) ;
    while ($Tuple = $requete ->fetch()){
        //echo "<p>$Tuple[type]</p>";
        echo "<p>$Tuple[libelle]</p>";
        echo "<p>$Tuple[lieu]</p>";
    }
}



?>