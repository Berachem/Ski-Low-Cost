<?php

include('connexion.inc.php');


// Exécution de la requête SQL pour insérer dans clients
$requete=$conn->prepare("INSERT INTO clients VALUES (DEFAULT,?,?,?,?,?,?,?,?,?,?,?)");    
$requete->execute(array($_POST['nom'],$_POST['prenom'],$_POST['date'],$_POST['adresse'],$_POST['tel'],$_POST['niveau_ski'],$_POST['taille'],$_POST['poids'],$_POST['pointure'],'aucun',$_POST['formule'])); // mettre la liste des éléments qui remplaceront les ?
print_r($requete->errorInfo());
$code_client = $requete->fetch(PDO::FETCH_OBJ);
print_r($code_client);
echo '<br>';




// Exécution de la requête SQL pour insérer dans login
$requete2=$conn->prepare("INSERT INTO login VALUES (?,?,?)");  

$requete2->execute(array($_POST['id'],md5($_POST['psw']),$code_client)); // mettre la liste des éléments qui remplaceront les ?
echo $conn->lastInsertId();
print_r($requete2->errorInfo());






?>