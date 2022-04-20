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

                                            $requete=$conn->query("SELECT DISTINCT numChambre 
                                            FROM occupe
                                            NATURAL JOIN reservations
                                            WHERE CURRENT_DATE NOT BETWEEN reservations.date_debutr AND reservations.date_finr");    
                                            $data = $requete->fetch();
                                            
                                            $data = array_unique($data);
                                            // Exécution de la requête SQL

                                            echo sizeof($data);
                                            echo ' chambre(s) (';
                                            echo implode(",", array_values($data));
                                            echo ')';


                                        

                                    ?>
                                        
                                    
                                    </p>
                                </div>
                                <div class="col mb-5 mb-md-0 h-100">
                                    <div class="feature bg-danger bg-gradient text-white rounded-3 mb-3"><i class="bi bi-x-octagon-fill"></i></div>
                                    <h2 class="h5">Nombre de chambres occupées</h2>
                                    <p class="mb-0">

                                    <?php

                                        $requete=$conn->query("SELECT DISTINCT numChambre 
                                        FROM occupe
                                        NATURAL JOIN reservations
                                        WHERE CURRENT_DATE BETWEEN reservations.date_debutr AND reservations.date_finr");    
                                        
                                        $data = $requete->fetch();

                                        $data = array_unique($data);
                                        // Exécution de la requête SQL

                                        echo sizeof($data);
                                        echo ' chambre(s) (';
                                        echo implode(",", array_values($data));
                                        echo ')';

                                    ?>
                                        
                                    </p>
                                </div>
                                <div class="col h-100">
                                    <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-people-fill"></i></div>
                                    <h2 class="h5">Nombre de clients dans l'hôtel</h2>
                                    <p class="mb-0">
                                    <?php

                                        $cpt=$conn->query("SELECT COUNT(*) AS total FROM occupe");                         
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
                        <div class="col-lg-4 mb-5 mb-lg-0"><h2 class="fw-bolder mb-0">Changer la formule choisie par un client</h2></div>
                        <div class="col-lg-8">
                            <div class="row gx-5 row-cols-1 row-cols-md-2">
                            <form id="contactForm" method="POST" action="php/changeFormula.php">
                            <!-- Name input-->
                            <div class="form-floating mb-3">
                                <select class="form-control" name="newFormuleClient">
                                    <option >Sélectionner un client</option>
                                <?php

                                    $results=$conn->query("SELECT * FROM clients");

                                                                
                                    // Exécution de la requête SQL
                                    while( $ligne = $results->fetch(PDO::FETCH_OBJ) ) {
                                    echo '

                                        <option value="'.$ligne->codec.'">'.$ligne->prenomc.' (code :'.$ligne->codec.')</option>

                                        ';
                                    }

                                ?>
                                </select>

                                <br>

                                <select class="form-control" name="newFormule">
                                    <option value="tout_compris">Tout compris (à 510 euros)</option>
                                    <option value="non_skieur">Non Skieur (à 410 euros)</option>
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


                            <td><div class="btn-group" data-toggle="buttons"><a href="#" target="_blank" class="btn btn-warning btn-xs" rel="noopener">Modifier</a></div></td>
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

                                        <option value="'.$ligne->codec.'">'.$ligne->prenomc.' (code :'.$ligne->codec.')</option>

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
