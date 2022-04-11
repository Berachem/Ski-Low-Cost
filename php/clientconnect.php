<?php
include('connexion.inc.php');

session_start();

if (isset($_POST['id']) && isset($_POST['psw'])){
    $_SESSION["id"] = $_POST['id'];
    $_SESSION["psw"] = $_POST['psw'];

    // si c'est un admin
    if ($_SESSION['id']=='admin' && $_SESSION['psw']=='admin'){
        header('Location: ../manager.php');
    }else{
        // sinon si c'est un client...
        header('Location: ../myaccount.php');
    }
    



    // sinon (erreur)...
    //header('Location: connexion.php&error=1'); 
}


?>