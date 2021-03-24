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



function ajouterEleve($nom,$prenom,$genre,$mail,$promotion,$telephone,$numRue,$nomRue,$codePostal,$ville,$login,$motDePasse){
    $eleve = getDb()->prepare("INSERT INTO eleve
    (nom,prenom, genre, mail,promotion, telephone, numRue, nomRue, codePostal, ville, login, motDePasse)
    VALUES (:nom , :prenom, :genre, :mail, :promotion,:telephone, :numRue,:nomRue, :codePostal, :ville, :login, :motDePasse)");

    $eleve->bindValue('nom',$nom,PDO::PARAM_STR);
    $eleve->bindValue('prenom',$prenom,PDO::PARAM_STR);
   // $eleve->bindValue('dateNissance',$date,PDO::PARAM_STR);
    $eleve->bindValue('genre',$genre,PDO::PARAM_STR);
    $eleve->bindValue('mail',$mail,PDO::PARAM_STR);
    $eleve->bindValue('promotion',$promotion,PDO::PARAM_INT);
    $eleve->bindValue('telephone',$telephone,PDO::PARAM_INT);
    $eleve->bindValue('numRue',$numRue,PDO::PARAM_INT);
    $eleve->bindValue('nomRue',$nomRue,PDO::PARAM_STR);
    $eleve->bindValue('codePostal',$codePostal,PDO::PARAM_INT);
    $eleve->bindValue('ville',$ville,PDO::PARAM_STR);
    $eleve->bindValue('login',$login,PDO::PARAM_STR);
    $eleve->bindValue('motDePasse',$motDePasse,PDO::PARAM_STR);

    //$eleve->execute(array($nom,$prenom,$date,$genre,$mail,$promotion,$telephone,$numRue,$nomRue,$codePostal,$ville,$login,$motDePasse));
    $eleve->execute();
   /* echo $login;
    $db=getDb();
    // if($db!=null)
    //echo 'base ok';
   /* $eleve = $db->prepare('INSERT INTO eleve (nom,prenom,login) VALUES (:nom,:prenom,:dateNaissance,:login)');
    $eleve->bindValue('login',$login,PDO::PARAM_STR);
    $eleve->bindValue('nom',$nom,PDO::PARAM_STR);
    $eleve->bindValue('prenom',$prenom,PDO::PARAM_STR);
    //$eleve->bindValue('dateNissance',$date,PDO::PARAM_STR);
    $eleve->execute();*/
   
}


function ajouterExp($type,$dateDeb,$libelle,$dateFin,$description,$organisation,$lieu,$salaire){
    $exp = getDb()->prepare("INSERT INTO eleve
    (type,datedeb,libelle,dateFin,description,organisation,lieu,salaire,login)
    VALUES (:type,:datedeb,:libelle,:dateFin,:description,:organisation,:lieu,:salaire,:login)");

    $exp->bindValue('type',$type,PDO::PARAM_STR);
    $exp->bindValue('datedeb',$dateDeb,PDO::PARAM_STR);
    $exp->bindValue('libelle',$libelle,PDO::PARAM_STR);
    $exp->bindValue('datefin',$dateFin,PDO::PARAM_STR);
    $exp->bindValue('description',$description,PDO::PARAM_STR);
    $exp->bindValue('organisation',$organisation,PDO::PARAM_STR);
    $exp->bindValue('lieu',$lieu,PDO::PARAM_STR);
    $exp->bindValue('salaire',$salaire,PDO::PARAM_STR);
    $exp->bindValue('login',$_SESSION['login'],PDO::PARAM_STR);

    $exp->execute();
  
   
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