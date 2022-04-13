<?php
include('connexion.inc.php');

session_start();

function getClientCode($id, $psw,$conn){
    $result = $conn->query("SELECT * FROM login");
    
    while($ligne = $result->fetch()){
        if ($ligne['id']==$id && $ligne['psw'] == md5($psw)){
            return $ligne['code_client'];
        }
    }
}

if (isset($_POST['id']) && isset($_POST['psw'])){

    // si c'est un admin
    if ($_POST['id']=='admin' && $_POST['psw']=='admin'){
        $_SESSION["id"] = $_POST['id'];
        $_SESSION["psw"] = $_POST['psw'];
        header('Location: ../manager.php');

    }elseif (getClientCode( $_POST['id'], $_POST['psw'],$conn)){// sinon si c'est un client...
        
        $_SESSION["id"] = $_POST['id'];
        $_SESSION["psw"] = $_POST['psw'];
        header('Location: ../myaccount.php');

    }else{// sinon (erreur)... -> Il n'a pas de compte
        header('Location: ../connexion.php?error=1'); 
    }
    



    

}


?>