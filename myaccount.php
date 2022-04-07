<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['psw'])){

    // si c'est un admin
    if ($_SESSION['id']=='admin' && $_SESSION['psw']=='admin'){
        header('Location: manager.php');
    }else{
        // sinon si c'est un client...
        echo 'Salut vous êtes le client : '.$_SESSION['id'].' et le psw='.$_SESSION['psw'];
    }

}

?>