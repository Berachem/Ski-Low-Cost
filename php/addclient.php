<?php

include('connexion.inc.php');


// Exécution de la requête SQL pour insérer dans clients
$conn->exec("BEGIN;");
$requete=$conn->prepare("INSERT INTO clients VALUES (DEFAULT,?,?,?,?,?,?,?,?,?,?,?)");    
$requete->execute(array($_POST['nom'],$_POST['prenom'],$_POST['date'],$_POST['adresse'],$_POST['tel'],$_POST['niveau_ski'],$_POST['taille'],$_POST['poids'],$_POST['pointure'],'aucun',$_POST['formule'])); // mettre la liste des éléments qui remplaceront les ?
$code_client = (int) ($conn->lastInsertId()) +2;


// Exécution de la requête SQL pour insérer dans login
$requete2=$conn->prepare("INSERT INTO login VALUES (?,?,?)");  

$requete2->execute(array($_POST['id'],md5($_POST['psw']),$code_client)); // mettre la liste des éléments qui remplaceront les ?

$conn->exec("COMMIT;");

header('Location: ../connexion.php?newAccount=1');


?>