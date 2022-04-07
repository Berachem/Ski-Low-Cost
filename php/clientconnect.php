<?php
include('connexion.inc.php');


if (isset($_POST['id']) && isset($_POST['psw'])){
    // si c'est un admin
    if ($_POST['id']==1 && $_POST['psw']=='admin'){
        header('Location: manager.php&id='.$POST['id'].'&psw='.$POST['psw']);
    }
    

    // sinon si c'est un client...
    header('Location: myaccount.php&id='.$POST['id'].'&psw='.$POST['psw']);

    // sinon (erreur)...
    header('Location: connexion.php&error=1'); 
}


?>