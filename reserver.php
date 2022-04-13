<?php


session_start();
if (isset($_SESSION['id']) && isset($_SESSION['psw'])){
    // si c'est un admin
    if ($_SESSION['id']=='admin' && $_SESSION['psw']=='admin'){
        header('Location: ../manager.php');
    }
    
}
else{
    // si personne ne s'est connecté
    header('Location: ../connexion.php');
}

include('includes/header.inc.html');
include('php/connexion.inc.php');

?>
            <!-- Page content-->
            <section class="py-5">
                <div class="container px-5">
                    <!-- Contact form-->
                    <div class="bg-light rounded-3 py-5 px-4 px-md-5 mb-5">
                        <div class="text-center mb-5">
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-credit-card"></i></div>
                            <h1 class="fw-bolder">Réserver</h1>
                            <p class="lead fw-normal text-muted mb-0">Vos vacances de rêves !</p>
                        </div>
                        <div class="row gx-5 justify-content-center">
                            <div class="col-lg-8 col-xl-6">
                                <!-- * * * * * * * * * * * * * * *-->
                                <!-- * * SB Forms Contact Form * *-->
                                <!-- * * * * * * * * * * * * * * *-->
                                <!-- This form is pre-integrated with SB Forms.-->
                                <!-- To make this form functional, sign up at-->
                                <!-- https://startbootstrap.com/solution/contact-forms-->
                                <!-- to get an API token!-->
                                <form action="reserverforclient.php" method="POST">

                                    <div class="form-floating mb-3">
                                    <select class="form-control" name="groupe" required>
                                            <option value="">Choisir un groupe</option>
                                            <?php

                                                $results=$conn->query("SELECT numg FROM groupe_clients");


                                                // Exécution de la requête SQL
                                                while( $ligne = $results->fetch(PDO::FETCH_OBJ) ) {
                                                echo '

                                                    <option value="'.$ligne->numg.'"> Groupe '.$ligne->numg.'</option> ';
                                                    echo $ligne->numg;
                                                }

                                            ?>
                                    </select>         
                                    </div>
                                    <!-- Submit Button-->
                                    <div class="d-grid"><button class="btn btn-primary btn-lg" type="submit">Réserver</button></div>
                                   
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
