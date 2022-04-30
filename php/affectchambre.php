<?php

include('connexion.inc.php');
session_start();

$numgroupe = "SELECT numg FROM appartient WHERE codec = ".$_SESSION['code'];
$membres = $conn->query("SELECT nomc,prenomc,clients.codec FROM clients,appartient WHERE appartient.codec = clients.codec and appartient.numg IN (".$numgroupe.") ORDER BY nomc,prenomc");


$index = 0;
while( $ligne = $membres->fetch(PDO::FETCH_OBJ) ){
    $verif = $conn->query("SELECT * FROM occupe WHERE codec = ".$ligne->codec);
    if (!empty($ligne2 = $verif->fetch(PDO::FETCH_OBJ))){
        $requete=$conn->exec("UPDATE occupe SET numchambre = '".$_POST['chambre'.$index]."' WHERE codec =".$ligne->codec); 
        
    }else{
        
        $requete=$conn->exec("INSERT INTO occupe VALUES (".$ligne->codec.",".$_POST['chambre'.$index].",'R".$_SESSION['code']."')");
    }
    $index += 1;
}






header('Location: ../myaccount.php');


?>