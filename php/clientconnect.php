<?php
include('connexion.inc.php');

echo $_POST['id'];
echo $_POST['psw'];

/*
if (isset($_POST['id']) && isset($_POST['psw'])){
    // si c'est un admin

    header('Location: manager.php&id='.$POST['id'].'&psw='.$POST['psw']);

    // sinon si c'est un client...
    header('Location: myaccount.php&id='.$POST['id'].'&psw='.$POST['psw']);

    // sinon (erreur)...
    header('Location: connexion.php&error=1'); 
}
*/

?>