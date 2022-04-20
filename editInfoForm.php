<?php

include('includes/header.inc.html');
include('php/connexion.inc.php');
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['psw'])){

    // si c'est un admin
    if ($_SESSION['id']!='admin' && $_SESSION['psw']!='admin'){
        header('Location: myaccount.php'); // ce n'est pas un admin, il dégage
    }
}else{
    header('Location: connexion.php');
}

?>

<form action="">

<?php

$results=$conn->query("SELECT * FROM clients");

                            
                        // Exécution de la requête SQL
                        while( $ligne = $results->fetch() ) {

                            if ($_POST['client']==$ligne[0]){

                                for (int i=0; i< count($ligne);i++){
                                    echo 'Changer '.$ligne[i].' : '
                                    echo '<input type="text" value="'.$ligne[i].'">';
                                }

                            }
                
                        }
?>
<button class="btn btn-info">Modifier</button>
</form>


