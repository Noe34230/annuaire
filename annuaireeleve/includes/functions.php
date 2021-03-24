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

function afficherNomsPrenoms($id){
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
function afficherInfosPerso($id){
    require("connect.php");
    $requete = $BDD->prepare("SELECT * FROM eleve
WHERE login= ? ");
$requete->execute( array($id) ) ;
    while ($Tuple = $requete ->fetch()){
        echo "Prénom : "."$Tuple[prenom]"."</br>";
        echo "Nom : "."$Tuple[nom]"."</br>";
        echo "Genre : "."$Tuple[genre]"."</br>";
        echo "Numéro de rue : "."$Tuple[numRue]"."</br>";
        echo "Nom de rue : "."$Tuple[nomRue]"."</br>";
        echo "Code Postal : "."$Tuple[codePostal]"."</br>";
        echo "Ville : "."$Tuple[ville]"."</br>";
        echo "Téléphone : "."$Tuple[telephone]"."</br>";
        echo "Mail : "."$Tuple[mail]"."</br>";
        echo "Promotion : "."$Tuple[promotion]"."</br>";

    }
}

function modifInfosPerso ($id,$nom,$prenom,$genre,$numRue,$nomRue,$codePostal,$ville,$mail,$telephone,$promotion)
{
    require("connect.php");
    if (isset($_POST['mail']))
    {
        $requete = $BDD->prepare("UPDATE eleve SET mail = :mail
        WHERE login= :login ");
        $requete ->bindValue('mail',$mail, PDO::PARAM_STR);
        $requete ->bindValue('login',$id, PDO::PARAM_STR);
        $requete->execute() ;
    }
    if (isset($_POST['nom']))
    {
        $requete = $BDD->prepare("UPDATE eleve SET nom = :nom
        WHERE login= :login ");
        $requete ->bindValue('nom',$nom, PDO::PARAM_STR);
        $requete ->bindValue('login',$id, PDO::PARAM_STR);
        $requete->execute() ;
    }    
    if (isset($_POST['prenom']))
    {
        $requete = $BDD->prepare("UPDATE eleve SET prenom = :prenom
        WHERE login= :login ");
        $requete ->bindValue('prenom',$prenom, PDO::PARAM_STR);
        $requete ->bindValue('login',$id, PDO::PARAM_STR);
        $requete->execute() ;
    }    
    if (isset($_POST['promotion']))
    {
        $requete = $BDD->prepare("UPDATE eleve SET promotion = :promotion
        WHERE login= :login ");
        $requete ->bindValue('promotion',$promotion, PDO::PARAM_STR);
        $requete ->bindValue('login',$id, PDO::PARAM_STR);
        $requete->execute() ;
    }    
    if (isset($_POST['numRue']))
    {
        $requete = $BDD->prepare("UPDATE eleve SET numRue = :numRue
        WHERE login= :login ");
        $requete ->bindValue('numRue',$numRue, PDO::PARAM_STR);
        $requete ->bindValue('login',$id, PDO::PARAM_STR);
        $requete->execute() ;
    }    
    if (isset($_POST['nomRue']))
    {
        $requete = $BDD->prepare("UPDATE eleve SET nomRue = :nomRue
        WHERE login= :login ");
        $requete ->bindValue('nomRue',$nomRue, PDO::PARAM_STR);
        $requete ->bindValue('login',$id, PDO::PARAM_STR);
        $requete->execute() ;
    }
    if (isset($_POST['ville']))
    {
        $requete = $BDD->prepare("UPDATE eleve SET ville = :ville
        WHERE login= :login ");
        $requete ->bindValue('ville',$ville, PDO::PARAM_STR);
        $requete ->bindValue('login',$id, PDO::PARAM_STR);
        $requete->execute() ;
    }
    if (isset($_POST['codePostal']))
    {
        $requete = $BDD->prepare("UPDATE eleve SET codePostal = :codePostal
        WHERE login= :login ");
        $requete ->bindValue('codePostal',$codePostal, PDO::PARAM_STR);
        $requete ->bindValue('login',$id, PDO::PARAM_STR);
        $requete->execute() ;
    }    
    if (isset($_POST['telephone']))
    {
        $requete = $BDD->prepare("UPDATE eleve SET telephone = :telephone
        WHERE login= :login ");
        $requete ->bindValue('telephone',$telephone, PDO::PARAM_STR);
        $requete ->bindValue('login',$id, PDO::PARAM_STR);
        $requete->execute() ;
    }    
    if (isset($_POST['genre']))
    {
        $requete = $BDD->prepare("UPDATE eleve SET genre = :genre
        WHERE login= :login ");
        $requete ->bindValue('genre',$genre, PDO::PARAM_STR);
        $requete ->bindValue('login',$id, PDO::PARAM_STR);
        $requete->execute() ;
    }


}


?>