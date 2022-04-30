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
                        <section class="py-5" id="features">
                <div class="container px-5 my-5">
                    <div class="row gx-5">
                        <div class="col-lg-4 mb-5 mb-lg-0"><h2 class="fw-bolder mb-0">Voici quelques statistiques sur la station.</h2></div>
                        <div class="col-lg-8">
                            <div class="row gx-5 row-cols-1 row-cols-md-2">
                                <div class="col mb-5 h-100">
                                    <div class="feature bg-info bg-gradient text-white rounded-3 mb-3"><i class="bi bi-currency-euro"></i></div>
                                    <h2 class="h5">Chiffre d'affaires</h2>
                                    <p class="mb-0">
                                        
                                    <?php

                                        $chiffreAffaire=$conn->query("SELECT SUM(montantfacture) AS s FROM facture_groupe");                         
                                        // Exécution de la requête SQL
                                        while( $ligne = $chiffreAffaire->fetch(PDO::FETCH_OBJ) ) {
                                            echo $ligne->s;
                                            echo ' €';
                                        }

                                    ?>



                                    </p>


                                </div>
                                <div class="col mb-5 h-100">
                                    <div class="feature bg-success bg-gradient text-white rounded-3 mb-3"><i class="bi bi-door-open"></i></div>
                                    <h2 class="h5">Nombre de chambres disponibles</h2>
                                    <p class="mb-0">
                                    <?php

                                        $results=$conn->query("SELECT COUNT(DISTINCT chambre.numchambre) FROM chambre,occupe,reservations WHERE chambre.numchambre NOT IN (SELECT numchambre FROM occupe) OR chambre.numchambre = occupe.numchambre AND occupe.numr = reservations.numr AND CURRENT_DATE NOT BETWEEN reservations.date_debutr AND reservations.date_finr");


                                        // Exécution de la requête SQL
                                        while( $ligne = $results->fetch(PDO::FETCH_OBJ) ) {
                                            echo $ligne->count;
                                        }
                                        
                                    ?> chambres
                                        
                                    
                                    </p>
                                </div>
                                <div class="col mb-5 mb-md-0 h-100">
                                    <div class="feature bg-danger bg-gradient text-white rounded-3 mb-3"><i class="bi bi-x-octagon-fill"></i></div>
                                    <h2 class="h5">Nombre de chambres occupées</h2>
                                    <p class="mb-0">

                                    <?php

                                        $requete=$conn->query("SELECT COUNT(DISTINCT numChambre) total FROM occupe,reservations WHERE occupe.numr = reservations.numr AND CURRENT_DATE BETWEEN reservations.date_debutr AND reservations.date_finr");    
                                        
                                        while( $ligne = $requete->fetch(PDO::FETCH_OBJ) ) {
                                            echo $ligne->total;
                                        }

                                    ?> chambres
                                        
                                    </p>
                                </div>
                                <div class="col h-100">
                                    <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-people-fill"></i></div>
                                    <h2 class="h5">Nombre de clients de l'hôtel</h2>
                                    <p class="mb-0">
                                    <?php

                                        $cpt=$conn->query("SELECT COUNT(*) AS total FROM appartient,reservations WHERE reservations.numg = appartient.numg AND CURRENT_DATE BETWEEN reservations.date_debutr AND reservations.date_finr");                         
                                        // Exécution de la requête SQL
                                        while( $ligne = $cpt->fetch(PDO::FETCH_OBJ) ) {
                                            echo $ligne->total;
                                        }

                                        ?>
                                    personnes



                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="py-5" id="features">
                <div class="container px-5 my-5">
                    <div class="row gx-5">
                        <div class="col-lg-4 mb-5 mb-lg-0"><h2 class="fw-bolder mb-0">Changer le tarif d'une formule</h2></div>
                        
                        <div class="col-lg-8">
                            <div class="row gx-5 row-cols-1 row-cols-md-2">
                            <?php
                                        if (isset($_GET["newTarif"]) && $_GET["newTarif"]=='1'){
                                            echo '<div class="alert alert-success" role="alert" style="width:70%;">
                                            Changement de Tarif réussi ! :)
                                          </div>';
                                        }
                                        echo '<br>';
                                    ?>
                            <form id="contactForm" method="POST" action="php/changeFormula.php">
                            
                            <div class="form-floating mb-3">
                            
                                 <input class="form-control"  name='tarif' type="number" placeholder="Entrez le nouveau tarif..." data-sb-validations="required" />
                                <label for="tarif">Tarif</label>

                                <br>

                                <select class="form-control" name="formule">
                                    <option value="tout_compris">Tout compris</option>
                                    <option value="non_skieur">Non Skieur</option>
                                </select> 
                            </div>
    
                    
                            <!-- Submit Button-->
                            <div class="d-grid"><button class="btn btn-info btn-lg" type="submit">Changer</button></div>
                            </form>
          

                            </div>
                        </div>
                    </div>
                    <a href="php/clientdisconnect.php" class="btn btn-danger">Se déconnecter</a>
                </form>
                </div>



            </section>


             <!-- List-->
             <div class="bg-light rounded-3 py-5 px-4 px-md-5 mb-5">
                <div class="text-center mb-5">
                    <div class="feature bg-info bg-gradient text-white rounded-3 mb-3"><i class="bi bi-person-lines-fill"></i></div>
                    <h1 class="fw-bolder">Liste des clients</h1>
                    <p class="lead fw-normal text-muted mb-0"></p>
                </div>
                <div class="row gx-2 justify-content-center" >
                    <div class="col-lg-8 " >
                            <table id="employee_grid" class="table" width="100%" cellspacing="0" >
                                    <thead>
                                    <tr>
                                    <th>Code client</th>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Date de naissance</th>
                                    <th>Adresse</th>
                                    <th>Téléphone</th>
                                    <th>Formule</th>
                                    <th>Niveau Ski</th>
                                    <th>Taille</th>
                                    <th>Poids</th>
                                    <th>Pointure</th>
                                    <th>Réduction</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                        <?php

                        $results=$conn->query("SELECT * FROM clients");

                            
                        // Exécution de la requête SQL
                        while( $ligne = $results->fetch(PDO::FETCH_OBJ) ) {
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

                            </tr>
                            ';
                        }
                   

                        
                        ?>
                        </tbody>
                        </table>
                        
                    </div>
                </div>
                
            </div>
        

             <!-- Kick form-->
             <div class="bg-light rounded-3 py-5 px-4 px-md-5 mb-5">
                <div class="text-center mb-5">
                    <div class="feature bg-danger bg-gradient text-white rounded-3 mb-3"><i class="bi bi-door-open-fill"></i></div>
                    <h1 class="fw-bolder">Expulser un client</h1>
                    <p class="lead fw-normal text-muted mb-0"></p>
                </div>
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-8 col-xl-6">
                    <?php
                            if (isset($_GET["banned"]) && $_GET["banned"]=='1'){
                                echo '<div class="alert alert-warning" role="alert" style="width:70%;">
                                Client banni avec succès...
                                </div>';
                            }
                            echo '<br>';
                                    ?>
                        <form id="contactForm" method="POST" action="php/ban.php">
                            <!-- Name input-->
                            <div class="form-floating mb-3">
                                <select class="form-control" name="banned">
                                    <option >Sélectionner un client</option>
                                <?php

                                    $results=$conn->query("SELECT * FROM clients");

                                                                
                                    // Exécution de la requête SQL
                                    while( $ligne = $results->fetch(PDO::FETCH_OBJ) ) {
                                    echo '

                                        <option value="'.$ligne->codec.'">'.$ligne->prenomc.' (code: '.$ligne->codec.')</option>

                                        ';
                                    }

                                ?>
                                </select>
                            </div>
                    
                            <!-- Submit Button-->
                            <div class="d-grid"><button class="btn btn-danger btn-lg" type="submit">Expulser</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
<?php

include('includes/footer.inc.html')

?>
