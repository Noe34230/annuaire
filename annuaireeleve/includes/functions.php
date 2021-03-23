<?php


function getDb() {
    // Local deployment
    $server = "localhost";
    $username = "root";
    $password = "";
    $db = "annuaireeleve"; 
    
    // Deployment on Heroku with ClearDB for MySQL
   /* $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
    $server = $url["localhost"];
    $username = $url["ebalatti"];
    $password = $url["mdp"];
    $db = substr($url["anuaireeleve"], 1);*/
    
    return new PDO("mysql:host=$server;dbname=$db;charset=utf8", $username, $password,
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
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


?>