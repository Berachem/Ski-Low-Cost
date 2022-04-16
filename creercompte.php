<?php


session_start();

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
                            <h1 class="fw-bolder">Créer un compte</h1>
                            <p class="lead fw-normal text-muted mb-0">Le début de vos vacances de rêves !</p>
                        </div>
                        <div class="row gx-5 justify-content-center">
                            <div class="col-lg-8 col-xl-6">

                                <form action="php/addclient.php" method="POST">
                                    <br>
                                    <h1 class="fw-bolder">Informations</h1>
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
                                    <br>
                                    <h1 class="fw-bolder">Choix de la formule</h1>
                                <fieldset id="group1">
                                    <label for="name">Choisissez la formule souhaitée :</label> <br>
                                      <input type="radio"  name="formule" value="tout_compris" checked>
                                      <label for="html">Tout compris à 510 euros</label><br>
                                      <input type="radio"  name="formule" value="non_skieur">
                                      <label for="css">Non Skieur à 420 euros</label><br>
                                    <br>
                                    <h1 class="fw-bolder">Location de ski</h1>
                                </fieldset>
                                <fieldset id="group2">
                                    <label for="name">Sélectionnez votre niveau en ski :</label> <br>
                                      <input type="radio"  name="niveau_ski" value="debutant" checked>
                                      <label for="html">débutant</label><br>
                                      <input type="radio"  name="niveau_ski" value="moyen">
                                      <label for="css">moyen</label><br>
                                      <input type="radio"  name="niveau_ski" value="confirmé">
                                      <label for="javascript">confirmé</label>
                                </fieldset>

                                
                                    <br>
                                    <br>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" name="taille" type="number" required/>
                                        <label for="name">Taille (cm)</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" name="poids" type="number"  required/>
                                        <label for="name">Poids</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" name="pointure" type="number"  required/>
                                        <label for="name">Pointure</label>
                                    </div>
                                    <br>
                                    <h1 class="fw-bolder">Authentification</h1>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" name="id" type="text" required/>
                                        <label for="name">ID de connexion</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" name="psw" type="password" required/>
                                        <label for="name">Mot de passe</label>
    
                                    </div>
                                    <!-- Submit Button-->
                                    <div class="d-grid"><button class="btn btn-primary btn-lg" type="submit">Créer le compte</button></div>
                                   
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
