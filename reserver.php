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
                            <h1 class="fw-bolder">Réservation</h1>
                            <p class="lead fw-normal text-muted mb-0">Organisez vos vacances de rêves !</p>
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
                                <form action="book.php" method="POST">
                                    <!-- Name input-->
                                    <div class="form-floating mb-3">
                                        <input class="form-control" name="nom" type="text" required/>
                                        <label for="name">Nom</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" name="prenom" type="text" required/>
                                        <label for="name">Prénom</label>
    
                                    </div>
                                    
                                    <div class="form-floating mb-3">
                                        <input class="form-control" name="date" type="date" required/>
                                        <label for="name">Date de Naissance</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" name="adresse" type="text" required/>
                                        <label for="name">Adresse</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" name="tel" type="tel" required/>
                                        <label for="name">Téléphone</label>
    
                                    </div>
                                <div>
                                    <label for="name">Choisissez la formule souhaitée :</label> <br>
                                      <input type="radio" id="html" name="tout_compris" value="tout_compris" checked>
                                      <label for="html">Tout compris à 510 euros</label><br>
                                      <input type="radio" id="css" name="non_skieur" value="non_skieur">
                                      <label for="css">Non Skieur à 420 euros</label><br>
                                    <br>
                                    <h1 class="fw-bolder">Location de ski</h1>
                                </div>
                                <div>
                                    <label for="name">Sélectionnez votre niveau en ski :</label> <br>
                                      <input type="radio" id="html" name="debutant" value="debutant" checked>
                                      <label for="html">débutant</label><br>
                                      <input type="radio" id="css" name="moyen" value="moyen">
                                      <label for="css">moyen</label><br>
                                      <input type="radio" id="javascript" name="fav_language" value="confirmé">
                                      <label for="javascript">confirmé</label>
                                </div>

                                
                                    <br>
                                    <br>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" name="taille" type="text" required/>
                                        <label for="name">Taille</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" name="poids" type="text"  required/>
                                        <label for="name">Poids</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" name="pointure" type="text"  required/>
                                        <label for="name">Pointure</label>
                                    </div>

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
