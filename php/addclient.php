<?php

include('connexion.inc.php');


// Exécution de la requête SQL pour insérer dans clients
$requete=$conn->prepare("INSERT INTO clients VALUES (11,?,?,?,?,?,?,?,?,?,?,?)");    
$requete->execute(array($_POST['nom'],$_POST['prenom'],$_POST['date'],$_POST['adresse'],$_POST['tel'],$_POST['niveau_ski'],$_POST['taille'],$_POST['poids'],$_POST['pointure'],'aucun',$_POST['formule'])); // mettre la liste des éléments qui remplaceront les ?
print_r($requete->errorInfo());
// Exécution de la requête SQL pour insérer dans login
$requete2=$conn->prepare("INSERT INTO login VALUES (?,?,11)");  

$requete2->execute(array($_POST['id'],$_POST['psw'])); // mettre la liste des éléments qui remplaceront les ?
print_r($requete2->errorInfo());







?>