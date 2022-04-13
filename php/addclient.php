<?php

include('connexion.inc.php');


// Exécution de la requête SQL pour insérer dans clients
$requete=$conn->prepare("INSERT INTO clients VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");    
$requete->execute(array()); // mettre la liste des éléments qui remplaceront les ?

// Exécution de la requête SQL pour insérer dans login
$requete2=$conn->prepare("INSERT INTO login VALUES (?,?,?)");  

$requete2->execute(array()); // mettre la liste des éléments qui remplaceront les ?






?>