<?php
include('connexion.inc.php');

session_start();
// faire une requete pour changer la formule d'un client
if (isset($_POST["groupe"])){
    $requete2=$conn->exec("INSERT INTO appartient VALUES (".$_SESSION["code"].", '".$_POST["groupe"]."')");  
    //echo "INSERT INTO appartient VALUES (".$_SESSION["code"].", '".$_POST["groupe"]."')";
    header('Location: ../myaccount.php?newGroup=1');
}




?>

