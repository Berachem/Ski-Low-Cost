<?php
include('includes/header.inc.html');


?>
<?php
session_start();


if (isset($_SESSION['id']) && isset($_SESSION['psw'])){

    // si c'est un admin
    if ($_SESSION['id']=='admin' && $_SESSION['psw']=='admin'){
        header('Location: manager.php');
    }else{
        include('php/connexionPAUL.inc.php');
        // sinon si c'est un client...
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Salut,</strong> votre login est : '.$_SESSION['id'].' et le mot de passe = '.$_SESSION['psw'].'<br> Vous êtes le client : '.$_SESSION["code"].'
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }

}else{// pas encore connecté
    header('Location: connexion.php');
}

?>

<section class="py-5" id="features">
            <div class="container px-5 my-5">
                <div class="row gx-5">
                    <div class="col-lg-4 mb-5 mb-lg-0"><h2 class="fw-bolder mb-0">Voici les informations vous concernant</h2></div>
                    <div class="col-lg-8">
                        <div class="row gx-5 row-cols-1 row-cols-md-2">
                            <div class="col mb-5 h-100">
                                <div class="feature bg-info bg-gradient text-white rounded-3 mb-3"><i class="bi bi-door-open"></i></div>
                                <h2 class="h5">Votre Chambre</h2>
                                <p class="mb-0">

                                <?php
                                    $chambre=$conn->query("SELECT numchambre FROM occupe WHERE occupe.codec = ".$_SESSION["code"]);
                                    if (empty($ligne = $chambre->fetch())){
                                        echo '<p>Vous n\'avez de chambre assignée...</p>';
                                    }else{
                                        echo '<p>'.$ligne[0].'</p>';
                                    }

                                ?>



                                </p>


                            </div>
                            <div class="col mb-5 h-100">
                                <div class="feature bg-warning bg-gradient text-white rounded-3 mb-3"><i class="bi bi-door-open"></i></div>
                                <h2 class="h5">Votre groupe</h2>
                                <p class="mb-0">
                                <?php
                                    $groupe=$conn->query("SELECT nomgroupe FROM groupe,appartient WHERE groupe.numg = appartient.numg and appartient.codec = ".$_SESSION['code']);
                                    if (empty($ligne = $groupe->fetch(PDO::FETCH_OBJ))){
                                        echo 'Vous n\'avez pas de groupe...';
                                    }
                                    else{
                                        echo $ligne->nomgroupe;
                                    }




                                ?>


                                </p>
                            </div>
                            <div class="col mb-5 mb-md-0 h-100">
                                <div class="feature bg-danger bg-gradient text-white rounded-3 mb-3"><i class="bi bi-calendar"></i></div>
                                <h2 class="h5">Date de votre séjour</h2>
                                <p class="mb-0">

                                <?php

                                    $reservation=$conn->query("SELECT date_debutr,date_finr FROM reservations,appartient WHERE reservations.numg = appartient.numg and appartient.codec = ".$_SESSION['code']);
                                    if (empty($ligne = $reservation->fetch(PDO::FETCH_OBJ))){
                                        echo 'Vous n\'avez pas de réservation...';
                                    }else{
                                        echo 'date début : '.$ligne->date_debutr;
                                        echo '<br>date fin : '.$ligne->date_finr;
                                    }
                                ?>

                                </p>
                            </div>
                            <div class="col h-100">
                                <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-star"></i></div>
                                <h2 class="h5">Formule</h2>
                                <p class="mb-0">
                                <?php

                                    $formule=$conn->query("SELECT formulec FROM clients WHERE clients.codec = ".$_SESSION["code"]);
                                    while( $ligne = $formule->fetch() ) {
                                        echo $ligne[0];
                                    }

                                    ?>




                                </p>
                            </div>

                        </div>

                    </div>
                </div>

                <a href="php/clientdisconnect.php" class="btn btn-danger">Se déconnecter</a>
                <br>
                <br>
                <div class="row gx-5">
                        <div class="col-lg-4 mb-5 mb-lg-0"><h2 class="fw-bolder mb-0">Voyager avec un groupe</h2></div>

                        <div class="col-lg-8">
                            <div class="row gx-5 row-cols-1 row-cols-md-2">
                            <?php
                                        if (isset($_GET["newGroup"]) && $_GET["newGroup"]=='1'){
                                            echo '<div class="alert alert-success" role="alert" style="width:70%;">
                                            Vous avez été affecté au groupe ! :)
                                          </div>';
                                        }
                                        echo '<br>';
                                    ?>


                            </div>

<?php
function isAlreadyInAGroup($codec, $conn){
    $result = $conn->query("SELECT * FROM appartient");

    while($ligne = $result->fetch()){
        if ($ligne["codec"]==$codec){
            return true;
        }
    }
    return false;
}

if (!isAlreadyInAGroup($_SESSION["code"],$conn)){
  if (isset($_GET["GroupeLeaved"]) && $_GET["GroupeLeaved"]=='1'){
      echo '<div class="alert alert-warning" role="alert" style="width:70%;">
      Vous avez quitté le groupe :)
    </div>';
  }
  echo '<br>';

    echo "
    <form id='contactForm' method='POST' action='php/affecterGroupe.php'>

                            <div class='form-floating mb-3'>
                                <br>
                                <select class='form-control' name='groupe'>";

                                        $results=$conn->query('SELECT DISTINCT nomgroupe, groupe_clients.numg AS numg FROM groupe,groupe_clients WHERE groupe.numg = groupe_clients.numg');


                                        // Exécution de la requête SQL
                                        while( $ligne = $results->fetch(PDO::FETCH_OBJ) ) {
                                        echo '<option value="'.$ligne->numg.'">Groupe '.$ligne->nomgroupe.'</option>';
                                        }

                                        echo"
                                </select>
                            </div>


                            <!-- Submit Button-->
                            <div class='d-grid'><button class='btn btn-info btn-lg' type='submit'>Rejoindre</button></div>
                            </form>


    <br><div class='row gx-5 row-cols-1 row-cols-md-2'>
      <h1> Ou bien, vous pouvez créer votre propre groupe ^^</h1>
            <div class='row'>
                <form action='php/createGroup.php' method='POST'>


                        <label for='name'>Date de début du séjour</label>
                         <input class='form-control' name='datedebut' type='date' required/>

                         <br>
                         <label for='name'>Date de fin du séjour</label>
                         <input class='form-control' name='datefin' type='date' required/>

                         <br>


                          <label for='groupeName'>Nom de groupe</label>
                            <input class='form-control' id='name' name='groupeName' type='text'  required/>
                            <br>

                    <button class='btn btn-primary btn-lg' type='submit'>Créer mon propre groupe</button>
            </form>
            ";
}else{

    echo '<a href="group.php"> <button class="btn btn-secondary btn-lg">Voir mon groupe</button></a>
          <a href="php/quitterGroup.php"> <button class="btn btn-warning btn-lg">Quitter mon groupe</button></a>
    ';
}


?>
                               </div>
                            </div>

                        </div>




                    </div>

            </div>
        </section>





<?php

include('includes/footer.inc.html')

?>
