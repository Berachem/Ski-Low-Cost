<?php

include('connexion.inc.php');

// faire une requete pour changer la formule d'un client
if (isset($_POST["banned"])){
    //echo $_POST["formule"];
    $requete1=$conn->exec("DELETE FROM login WHERE code_client= ".$_POST["banned"]); 
    $requete2=$conn->exec("DELETE FROM clients WHERE codec= ".$_POST["banned"]);  

    header('Location: ../manager.php?banned=1');
}

?>