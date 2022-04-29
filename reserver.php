<?php


session_start();
if ((isset($_SESSION['id']) && isset($_SESSION['psw'])) || isset($_SESSION['code'])){
    // si c'est un admin
    if ($_SESSION['id']=='admin' && $_SESSION['psw']=='admin'){
        header('Location: manager.php');
    }
    
}else{
    // si personne ne s'est connecté
    header('Location: connexion.php');
}

include('includes/header.inc.html');
include('php/connexion.inc.php');

echo $_SESSION["code"];

?>
            <!-- Page content-->
            <section class="py-5">
                <div class="container px-5">
                    <!-- Contact form-->
                    <div class="bg-light rounded-3 py-5 px-4 px-md-5 mb-5">
                        <div class="text-center mb-5">
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-credit-card"></i></div>
                            <h1 class="fw-bolder">Choisissez le groupe avec qui vous voyagerez</h1>
                            <p class="lead fw-normal text-muted mb-0">Vos vacances de rêves sont proches !</p>
                        </div>
                        <div class="row gx-5 justify-content-center">
                            <?php
                                    if (isset($_GET["success"]) && $_GET["success"]=='1'){
                                        echo '<div class="alert alert-success" role="alert" style="width:70%;">
                                        Succès ! (Vous avez été ajouté au groupe de voyage)
                                        </div>';
                                    }

                             ?>
                            <div class="col-lg-8 col-xl-6">

                                <form action="php/addclientgroup.php" method="POST">

                                    <div class="form-floating mb-3">
                                    <select class="form-control" name="groupe" required>
                                            <option value="">Choisir un groupe</option>
                                            <?php

                                                $results=$conn->query("SELECT DISTINCT nomgroupe FROM groupe,appartient WHERE groupe.numg = appartient.numg");


                                                // Exécution de la requête SQL
                                                while( $ligne = $results->fetch(PDO::FETCH_OBJ) ) {
                                                echo '

                                                    <option value="'.$ligne->nomgroupe.'"> Groupe '.$ligne->nomgroupe.'</option> ';
                                                    echo $ligne->nomgroupe;
                                                }

                                            ?>
                                    </select>         
                                    </div>
                                    <!-- Submit Button-->
                                    <div class="d-grid"><button class="btn btn-primary btn-lg" type="submit">Choisir</button></div>
                                   
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
<?php

include('includes/footer.inc.html')

?>
