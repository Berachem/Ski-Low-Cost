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
                                    
                                }

                            }
                        echo '

                            <tr>
                            <td>'. $ligne->codec .'</td>
                            <td>'. $ligne->nomc .'</td>
                            <td>'. $ligne->prenomc .'</td>
                            <td>'. $ligne->date_de_naissancec .'</td>
                            <td>'. $ligne->adressec .'</td>
                            <td>'. $ligne->telephonec .'</td>
                            <td>'. $ligne->formulec .'</td>
                            <td>'. $ligne->niveau_skic .'</td>
                            <td>'. $ligne->taillec .'</td>
                            <td>'. $ligne->poidsc .'</td>
                            <td>'. $ligne->pointurec .'</td>
                            <td>'. $ligne->nomr .'</td>


                            <td><div class="btn-group" data-toggle="buttons"><a href="php/editInfoForm.php?client='. $ligne->codec .'" target="_blank" class="btn btn-warning btn-xs" rel="noopener">Modifier</a></div></td>
                            </tr>
                            ';
                        }
?>
</form>