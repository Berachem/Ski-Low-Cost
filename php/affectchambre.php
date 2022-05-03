<?php

include('connexion.inc.php');
session_start();

$numgroupe = "SELECT numg FROM appartient WHERE codec = ".$_SESSION['code'];
$membres = $conn->query("SELECT nomc,prenomc,clients.codec FROM clients,appartient WHERE appartient.codec = clients.codec and appartient.numg IN (".$numgroupe.") ORDER BY nomc,prenomc");

//affecte les chambres aux personnes du groupe
$index = 0;
while( $ligne = $membres->fetch(PDO::FETCH_OBJ) ){
    $verif = $conn->query("SELECT * FROM occupe WHERE codec = ".$ligne->codec);
    if (!empty($ligne2 = $verif->fetch(PDO::FETCH_OBJ))){
        $requete=$conn->exec("UPDATE occupe SET numchambre = '".$_POST['chambre'.$index]."' WHERE codec =".$ligne->codec); 
        $requete=$conn->exec("UPDATE occupe SET numr = 'R".$_SESSION['code']."' WHERE codec =".$ligne->codec);
        
    }else{
        
        $requete=$conn->exec("INSERT INTO occupe VALUES (".$ligne->codec.",".$_POST['chambre'.$index].",'R".$_SESSION['code']."')");
    }
    $index += 1;
}


$gens = $conn->query("SELECT formulec,date_de_naissancec AS d FROM clients,appartient WHERE clients.codec = appartient.codec AND appartient.numg = 'G".$_SESSION['code']."'");
$total = 0;

//calcule le prix total du groupe
while( $ligne = $gens->fetch(PDO::FETCH_OBJ) ){
    $compt = $conn->query("SELECT prix FROM formule WHERE formulec = '".$ligne->formulec."'");

    while($ligne2 = $compt->fetch(PDO::FETCH_OBJ)){
        $today = date("Y-m-d");
        $diff = date_diff(date_create($ligne->d), date_create($today));
        if (2 > $diff->format('%y')){
            $total += 0;
        }elseif (12 > $diff->format('%y')){
            $total += ($ligne2->prix)*0.8;
        }else{
            $total += $ligne2->prix;
        }
    }
}  

$existe = $conn->query("SELECT * FROM facture_groupe WHERE numg = 'G".$_SESSION['code']."'");


if (empty($test = $existe->fetch(PDO::FETCH_OBJ))){
    $requete=$conn->exec("INSERT INTO facture_groupe VALUES ('FactGroup".$_SESSION['code']."',".$total.",'G".$_SESSION['code']."')");
}else{
    $requete=$conn->exec("UPDATE facture_groupe SET montantfacture = ".$total." WHERE numg ='G".$_SESSION['code']."'");
}

header('Location: ../group.php');


?>