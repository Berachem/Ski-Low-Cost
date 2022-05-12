<?php

include('connexion.inc.php');

session_start();
// Exécution de la requête SQL pour insérer dans appartient le client et son groupe
$conn->exec("BEGIN;");
$requete=$conn->prepare("INSERT INTO appartient VALUES (?,?)");    
$requete->execute(array($_SESSION["code"],$_POST['groupe'])); // mettre la liste des éléments qui remplaceront les ?
$conn->exec("COMMIT;");

header('Location : ../reserver.php?success=1')
?>