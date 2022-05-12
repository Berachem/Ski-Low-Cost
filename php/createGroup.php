<?php
include('connexion.inc.php');

session_start();
$conn->exec("BEGIN;");
// Exécution de la requête SQL pour insérer dans appartient le client et son groupe
$requete1=$conn->exec("INSERT INTO groupe_clients VALUES ('G".$_SESSION["code"]."')");
$requete=$conn->exec("INSERT INTO groupe VALUES ('G".$_SESSION["code"]."','".$_POST["groupeName"]."',".$_SESSION["code"].") ");
$requete1=$conn->exec("INSERT INTO appartient VALUES (".$_SESSION["code"].",'G".$_SESSION["code"]."')");
//echo "INSERT INTO groupe_clients VALUES ('G".$_SESSION["code"]."') <br>";
//echo "INSERT INTO groupe VALUES ('G".$_SESSION["code"]."','".$_POST["groupeName"]."',".$_SESSION["code"].") ";
$requete1=$conn->exec("INSERT INTO reservations VALUES ('R".$_SESSION["code"]."','".$_POST["datedebut"]."','".$_POST["datefin"]."','G".$_SESSION["code"]."')");
//echo "INSERT INTO reservations VALUES ('R".$_SESSION["code"]."','".$_POST["datedebut"]."','".$_POST["datefin"]."','G".$_SESSION["code"]."')";
$conn->exec("COMMIT;");
header('Location: ../group.php?GroupeCreated=1');

?>
