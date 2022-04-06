<?php
include('connexion.inc.php');



if (isset($_POST['id']) && isset($_POST['psw'])){
    // si c'est un admin
    header('manager.php&id='.$POST['id'].'&psw='.$POST['psw']);

    // sinon si c'est un client...
    header('myaccount.php&id='.$POST['id'].'&psw='.$POST['psw']);

    // sinon (erreur)...
    header('connexion.php&error=1'); 
}

?>