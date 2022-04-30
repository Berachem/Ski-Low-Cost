<?php

include('connexion.inc.php');
session_start();

// faire une requete pour changer la formule d'un client

$requete1=$conn->exec("DELETE FROM appartient WHERE codec= ".$_SESSION["code"]);

header("Location: ../myaccount.php?GroupeLeaved=1")

?>
