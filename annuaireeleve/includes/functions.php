<?php

function getDb()
{
    $server = "localhost";
    $username = "ebalatti";
    $password = "mdp";
    $db = "annuaireeleve";

    return new PDO(
        "mysql:host=$server;dbname=$db;charset=utf8",
        "$username",
        "$password",
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
    );
}
function redirect($url)
{
    header("Location: $url");
}



function ajouterEleve($nom, $prenom, $genre, $date, $mail, $promotion, $telephone, $numRue, $nomRue, $codePostal, $ville, $login, $motDePasse)
{
    $eleve = getDb()->prepare("INSERT INTO eleve
    (nom, prenom, genre, dateNaissance , mail,promotion, telephone, numRue, nomRue, codePostal, ville, login, motDePasse)
    VALUES (:nom , :prenom, :genre,:dateNaissance ,:mail, :promotion,:telephone, :numRue,:nomRue, :codePostal, :ville, :login, :motDePasse)");

    $eleve->bindValue('nom', $nom, PDO::PARAM_STR);
    $eleve->bindValue('prenom', $prenom, PDO::PARAM_STR);
    $eleve->bindValue('genre', $genre, PDO::PARAM_STR);
    $eleve->bindValue('dateNaissance', $date, PDO::PARAM_STR);
    $eleve->bindValue('mail', $mail, PDO::PARAM_STR);
    $eleve->bindValue('promotion', $promotion, PDO::PARAM_INT);
    $eleve->bindValue('telephone', $telephone, PDO::PARAM_INT);
    $eleve->bindValue('numRue', $numRue, PDO::PARAM_INT);
    $eleve->bindValue('nomRue', $nomRue, PDO::PARAM_STR);
    $eleve->bindValue('codePostal', $codePostal, PDO::PARAM_INT);
    $eleve->bindValue('ville', $ville, PDO::PARAM_STR);
    $eleve->bindValue('login', $login, PDO::PARAM_STR);
    $eleve->bindValue('motDePasse', $motDePasse, PDO::PARAM_STR);

    $eleve->execute();
}


function ajouterExp($type, $dateDeb, $libelle, $dateFin, $description, $organisation, $lieu, $salaire, $login, $secteurAct, $domaineComp)
{
    $rqtNb = "SELECT COUNT(*) as total FROM experience";
    $tabNb = getDb()->query($rqtNb);
    $nb = $tabNb->fetch();
    $idExperience = $nb['total'] + 1; //pour l'incrementation

    /*  $rqtDomaine=getDb()->prepare("SELECT IdDomaine FROM domainecompetence WHERE nomDomaine= :nomDomaine");
    $rqtDomaine->bindvalue('nomDomaine',$domaineComp,PDO::PARAM_STR);
    $rqtDomaine->execute();
    $domaine=$rqtDomaine->fetch();*/

    $exp = getDb()->prepare("INSERT INTO experience
    (type,dateDeb,libelle,dateFin,description,organisation,lieu,salaire,login,idExperience)
    VALUES (:type,:dateDeb,:libelle,:dateFin,:description,:organisation,:lieu,:salaire,:login,:id)");

    $exp->bindValue('type', $type, PDO::PARAM_STR);
    $exp->bindValue('dateDeb', $dateDeb, PDO::PARAM_STR);
    $exp->bindValue('libelle', $libelle, PDO::PARAM_STR);
    $exp->bindValue('dateFin', $dateFin, PDO::PARAM_STR);
    $exp->bindValue('description', $description, PDO::PARAM_STR);
    $exp->bindValue('organisation', $organisation, PDO::PARAM_STR);
    $exp->bindValue('lieu', $lieu, PDO::PARAM_STR);
    $exp->bindValue('salaire', $salaire, PDO::PARAM_STR);
    $exp->bindValue('login', $login, PDO::PARAM_STR);
    $exp->bindValue('id', $idExperience, PDO::PARAM_INT);

    $exp->execute();

    /* $act =getDb()->prepare("INSERT INTO attribuer (idExperience,IdDomaine)
    VALUES (:idExperience,:IdDomaine)");

    $act->bindvalue('idExperience',$idExperience,PDO::PARAM_INT);
    $act->bindvalue('IdDomaine',$domaine,PDO::PARAM_INT);

    $act->execute();*/
}

function afficherNomsPrenoms($id)
{
    $requete = getDb()->prepare("SELECT * FROM eleve
WHERE login= ? ");
    $requete->execute(array($id));
    while ($Tuple = $requete->fetch()) {
        echo "$Tuple[prenom]" . " ";
        echo "$Tuple[nom]";
    }
}
function afficherDomaineComp()
{
    $requete = getDb()->prepare("SELECT nomDomaine FROM domainecompetence");
    $requete->execute();
    while ($Tuple = $requete->fetch()) {
        echo "<option value=$Tuple[nomDomaine]>$Tuple[nomDomaine]</option>";
    }
}

function afficherSecteurAct()
{
    $requete = getDb()->prepare("SELECT nomSecteur FROM secteuractivite");
    $requete->execute();
    while ($Tuple = $requete->fetch()) {
        echo "<option value=$Tuple[nomSecteur]>$Tuple[nomSecteur]</option>";
    }
}



function afficherExperience($id)
{
    $requete = getDb()->prepare("SELECT * FROM experience
WHERE login= ? ");
    $requete->execute(array($id));
    while ($Tuple = $requete->fetch()) {
        //echo "<p>$Tuple[type]</p>";
        echo "
        <fieldset class='form-group border p-5'>
        <p>$Tuple[libelle]</p>;
        <p>$Tuple[lieu]</p>;
        
        <form method='POST' action='ModifExp.php'>
            <div class='form-group row'>
                <label for='idExperience'></label>
                <input type ='hidden' name ='idExperience' value ='" . $Tuple['idExperience'] . "'/> <br/><br/>
                <input type ='hidden' name ='libelle' value ='" . $Tuple['libelle'] . "'/> <br/><br/>
                <input type='submit' name='envoi' class='btn btn-primary' id='envois' value ='Modifier cette expérience'/>
            </div>
        </form>";
        echo "
        <form method='POST' action='ConsulterExp.php'>
            <div class='form-group row'>
                <label for='idExperience'></label>
                <input type ='hidden' name ='idExperience' value ='" . $Tuple['idExperience'] . "'/> <br/><br/>
                <input type='submit' name='envoi'  class='btn btn-primary' id='envois' value ='Consulter cette expérience'/>
            </div>
            </fieldset>
        </form>";
    }
}
/*
function afficherExperiencePerso2($id, $idExperience){
    $requete = getDb()->prepare("SELECT * FROM experience
    WHERE login= ?  AND idExperience=?");
    $requete->execute( array($id,$idExperience)) ;
    $Tuple = $requete ->fetch();
        echo "<p>$Tuple[type]<br/>;
                $Tuple[libelle]<br/>;
                $Tuple[lieu]<br/>;
                $Tuple[dateDeb]<br/>;
                $Tuple[dateFin]<br/>;
                $Tuple[description]<br/>;
                $Tuple[organisation]<br/>;
                $Tuple[salaire]<br/><p>";
        print "si il affiche rien c'est chaud"; 
        echo $idExperience;  
}*/

function afficherExperiencePerso2($idExperience)
{
    $requete = getDb()->prepare("SELECT * FROM experience
    WHERE idExperience=?");
    $requete->execute(array($idExperience));
    $Tuple = $requete->fetch();
    echo "<p>$Tuple[type]<br/>;
                $Tuple[libelle]<br/>;
                $Tuple[lieu]<br/>;
                $Tuple[dateDeb]<br/>;
                $Tuple[dateFin]<br/>;
                $Tuple[description]<br/>;
                $Tuple[organisation]<br/>;
                $Tuple[salaire]<br/><p>";
}



function afficherExperienceRecherchees($type, $organisation, $lieu, $secteurAct, $domaineComp, $id)
{
    $requete = getDb()->prepare("SELECT * FROM experience EXP, associer ASSO,attribuer ATT,eleve E, domainecompetence DC, secteuractivite SA
    WHERE E.login= :login AND E.login= EXP.login AND EXP.type= :type  AND EXP.organisation= :organisation 
    AND EXP.lieu= :lieu AND SA.nomSecteur= :secteurAct AND ASSO.idSecteur=SA.IdSecteur AND ASSO.idExperience=EXP.idExperience  
    AND DC.nomDomaine= :domaineComp AND ATT.IdDomaine= DC.idDomaine AND ATT.idExperience=EXP.idExperience");

    $requete->bindValue('type', $type, PDO::PARAM_STR);
    $requete->bindValue('organisation', $organisation, PDO::PARAM_STR);
    $requete->bindValue('login', $id, PDO::PARAM_STR);
    $requete->bindValue('lieu', $lieu, PDO::PARAM_STR);
    $requete->bindValue('idSecteur', $secteurAct, PDO::PARAM_INT);
    $requete->bindValue('idExperience', $domaineComp, PDO::PARAM_STR);

    $requete->execute();
    while ($Tuple = $requete->fetch()) {
        //echo "<p>$Tuple[type]</p>";
        echo "<p>$Tuple[libelle]</p>";
        echo "<p>$Tuple[lieu]</p>";
        echo "<form method='POST' action='ConsulterExp.php'>
            <input type='submit' name='Consulter' id='$Tuple[idExperience]' value ='Consulter cette experience'/>
            </form>";
    }
}

function afficherExperienceRechercheesBIS($type, $organisation, $lieu)
{
    $requete = getDb()->prepare("SELECT * FROM experience WHERE
    type= :type AND (organisation= :organisation or lieu= :lieu) "); //l'utilisateur doit obligatoirement remplir le type mais pas le reste 

    $requete->bindValue('type', $type, PDO::PARAM_STR);
    $requete->bindValue('organisation', $organisation, PDO::PARAM_STR);
    //$requete->bindValue('login',$id,PDO::PARAM_STR);
    $requete->bindValue('lieu', $lieu, PDO::PARAM_STR);


    $requete->execute();

    while ($Tuple = $requete->fetch()) {
        //echo "<p>$Tuple[type]</p>";
        echo "<p>$Tuple[libelle]</p>";
        echo "<p>$Tuple[lieu]</p>";
        echo "<form method='POST' action='ConsulterExp.php'>
            <input type='hidden' name='idExperience' value='$Tuple[idExperience]'>
            <input type='submit' name='Consulter' id='$Tuple[idExperience]' value ='Consulter cette experience'/>
            </form>";
    }
}

function afficherInfosPerso($id)
{
    $requete = getDb()->prepare("SELECT * FROM eleve
WHERE login= ? ");
    $requete->execute(array($id));
    while ($Tuple = $requete->fetch()) {
        echo "Prénom : " . "$Tuple[prenom]" . "</br>";
        echo "Nom : " . "$Tuple[nom]" . "</br>";
        echo "Genre : " . "$Tuple[genre]" . "</br>";
        echo "Numéro de rue : " . "$Tuple[numRue]" . "</br>";
        echo "Nom de rue : " . "$Tuple[nomRue]" . "</br>";
        echo "Code Postal : " . "$Tuple[codePostal]" . "</br>";
        echo "Ville : " . "$Tuple[ville]" . "</br>";
        echo "Téléphone : " . "$Tuple[telephone]" . "</br>";
        echo "Mail : " . "$Tuple[mail]" . "</br>";
        echo "Promotion : " . "$Tuple[promotion]" . "</br>";
    }
}

function modifInfosPerso($id, $nom, $prenom, $genre, $numRue, $nomRue, $codePostal, $ville, $mail, $telephone, $promotion)
{
    if ($mail != "") {
        $requete = getDb()->prepare("UPDATE eleve SET mail = :mail
        WHERE login= :login ");
        $requete->bindValue('mail', $mail, PDO::PARAM_STR);
        $requete->bindValue('login', $id, PDO::PARAM_STR);
        $requete->execute();
    }
    if ($nom != "") {
        $requete = getDb()->prepare("UPDATE eleve SET nom = :nom
        WHERE login= :login ");
        $requete->bindValue('nom', $nom, PDO::PARAM_STR);
        $requete->bindValue('login', $id, PDO::PARAM_STR);
        $requete->execute();
    }
    if ($prenom != "") {
        $requete = getDb()->prepare("UPDATE eleve SET prenom = :prenom
        WHERE login= :login ");
        $requete->bindValue('prenom', $prenom, PDO::PARAM_STR);
        $requete->bindValue('login', $id, PDO::PARAM_STR);
        $requete->execute();
    }
    if ($promotion != 0) {
        $requete = getDb()->prepare("UPDATE eleve SET promotion = :promotion
        WHERE login= :login ");
        $requete->bindValue('promotion', $promotion, PDO::PARAM_INT);
        $requete->bindValue('login', $id, PDO::PARAM_INT);
        $requete->execute();
    }
    if ($numRue != 0) {
        $requete = getDb()->prepare("UPDATE eleve SET numRue = :numRue
        WHERE login= :login ");
        $requete->bindValue('numRue', $numRue, PDO::PARAM_INT);
        $requete->bindValue('login', $id, PDO::PARAM_INT);
        $requete->execute();
    }
    if ($nomRue != "") {
        $requete = getDb()->prepare("UPDATE eleve SET nomRue = :nomRue
        WHERE login= :login ");
        $requete->bindValue('nomRue', $nomRue, PDO::PARAM_STR);
        $requete->bindValue('login', $id, PDO::PARAM_STR);
        $requete->execute();
    }
    if ($ville != "") {
        $requete = getDb()->prepare("UPDATE eleve SET ville = :ville
        WHERE login= :login ");
        $requete->bindValue('ville', $ville, PDO::PARAM_STR);
        $requete->bindValue('login', $id, PDO::PARAM_STR);
        $requete->execute();
    }
    if ($codePostal != 0) {
        $requete = getDb()->prepare("UPDATE eleve SET codePostal = :codePostal
        WHERE login= :login ");
        $requete->bindValue('codePostal', $codePostal, PDO::PARAM_INT);
        $requete->bindValue('login', $id, PDO::PARAM_INT);
        $requete->execute();
    }
    if ($telephone != 0) {
        $requete = getDb()->prepare("UPDATE eleve SET telephone = :telephone
        WHERE login= :login ");
        $requete->bindValue('telephone', $telephone, PDO::PARAM_INT);
        $requete->bindValue('login', $id, PDO::PARAM_INT);
        $requete->execute();
    }
    if ($genre != "") {
        $requete = getDb()->prepare("UPDATE eleve SET genre = :genre
        WHERE login= :login ");
        $requete->bindValue('genre', $genre, PDO::PARAM_STR);
        $requete->bindValue('login', $id, PDO::PARAM_STR);
        $requete->execute();
    }
}
function modifExp($id, $libelle, $description, $organisation, $salaire, $lieu, $type, $dateFin, $idExperience)
{
    if (!is_null($type)) {
        $requete = getDb()->prepare("UPDATE experience SET type = :type
        WHERE login= :login AND idExperience=:idExperience ");
        $requete->bindValue('type', $type, PDO::PARAM_STR);
        $requete->bindValue('login', $id, PDO::PARAM_STR);
        $requete->bindValue('idExperience', $idExperience, PDO::PARAM_INT);
        //echo "COUCOU";
        $requete->execute();
    }
    if (!is_null($libelle)) {
        $requete = getdb()->prepare("UPDATE experience SET libelle = :libelle
        WHERE login= :login AND idExperience=:idExperience ");
        $requete->bindValue('libelle', $libelle, PDO::PARAM_STR);
        $requete->bindValue('login', $id, PDO::PARAM_STR);
        $requete->bindValue('idExperience', $idExperience, PDO::PARAM_INT);
        echo "COUCOU";
        $requete->execute();
    }
    if (!is_null($description)) {
        $requete = getdb()->prepare("UPDATE experience SET description = :description
        WHERE login= :login AND idExperience=:idExperience ");
        $requete->bindValue('description', $description, PDO::PARAM_STR);
        $requete->bindValue('login', $id, PDO::PARAM_STR);

        $requete->execute();
    }
    if ($salaire != 0) {
        $requete = getdb()->prepare("UPDATE experience SET salaire = :salaire
        WHERE login= :login AND idExperience=:idExperience ");
        $requete->bindValue('salaire', $salaire, PDO::PARAM_STR);
        $requete->bindValue('login', $id, PDO::PARAM_STR);
        $requete->bindValue('idExperience', $idExperience, PDO::PARAM_INT);
        $requete->execute();
    }
    if ($lieu != "") {
        $requete = getdb()->prepare("UPDATE experience SET lieu = :lieu
        WHERE login= :login AND idExperience=:idExperience ");
        $requete->bindValue('lieu', $lieu, PDO::PARAM_STR);
        $requete->bindValue('login', $id, PDO::PARAM_STR);
        $requete->bindValue('idExperience', $idExperience, PDO::PARAM_INT);
        $requete->execute();
    }
    if ($organisation != "") {
        $requete = getdb()->prepare("UPDATE experience SET organisation = :organisation
        WHERE login= :login AND idExperience=:idExperience ");
        $requete->bindValue('organisation', $organisation, PDO::PARAM_STR);
        $requete->bindValue('login', $id, PDO::PARAM_STR);
        $requete->bindValue('idExperience', $idExperience, PDO::PARAM_INT);
        $requete->execute();
    }
    if ($dateFin != "") {
        $requete = getdb()->prepare("UPDATE experience SET dateFin = :dateFin
        WHERE login= :login AND idExperience=:idExperience ");
        $requete->bindValue('dateFin', $dateFin, PDO::PARAM_STR);
        $requete->bindValue('login', $id, PDO::PARAM_STR);
        $requete->bindValue('idExperience', $idExperience, PDO::PARAM_INT);
        $requete->execute();
    }
}
