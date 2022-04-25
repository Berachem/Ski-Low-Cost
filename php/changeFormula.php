<?php

include('connexion.inc.php');

// faire une requete pour changer la formule d'un client
if (isset($_POST["tarif"]) && isset($_POST["formule"])){
    //echo $_POST["formule"];
    $requete2=$conn->exec("UPDATE formule SET  prix = ".$_POST["tarif"]." WHERE formulec = '".$_POST["formule"]."'");  

    header('Location: ../manager.php?newTarif=1');
}

?>
