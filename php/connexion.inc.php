<?php

/*
 * création d'objet PDO de la connexion qui sera représenté par la variable $cnx
 */
$user =  'berachem.markria';
$pass =  'Bouzened93';



try {
    $conn = new PDO('pgsql:host=sqletud.u-pem.fr;dbname=berachem.markria_db', $user, $pass); 
    $conn = $conn->exec("set SEARCH_PATH TO projet");
    
}
catch (PDOException $e) {
    echo "ERREUR : La connexion a échouée";

 /* Utiliser l'instruction suivante pour afficher le détail de erreur sur la
 * page html. Attention c'est utile pour débugger mais cela affiche des
 * informations potentiellement confidentielles donc éviter de le faire pour un
 * site en production.*/
//    echo "Error: " . $e;

}

?>

