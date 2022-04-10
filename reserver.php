<?php

session_start();
if (isset($_SESSION['id']) && isset($_SESSION['psw'])){
    // si c'est un admin
    if ($_SESSION['id']=='admin' && $_SESSION['psw']=='admin'){
        header('Location: ../manager.php');
    }else{
        // sinon si c'est un client...
        header('Location: ../reserver.php');
    }
}
else{
    // si personne ne s'est connecté
    header('Location: ../connexion.php');
}

include('includes/header.inc.html')

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
                                <form id="contactForm" method="POST" action="book.php">
                                    <!-- Name input-->
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="name" type="text" placeholder="Enter your name..." data-sb-validations="required" />
                                        <label for="name">Nom</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="name" type="text" placeholder="Enter your name..." data-sb-validations="required" />
                                        <label for="name">Prénom</label>
    
                                    </div>
                                    
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="name" type="date" placeholder="Enter your name..." data-sb-validations="required" />
                                        <label for="name">Date de Naissance</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="name" type="text" placeholder="Enter your name..." data-sb-validations="required" />
                                        <label for="name">Adresse</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="name" type="tel" placeholder="Enter your name..." data-sb-validations="required" />
                                        <label for="name">Téléphone</label>
    
                                    </div>
                                    <label for="name">Choisissez la formule souhaitée :</label> <br>
                                      <input type="radio" id="html" name="fav_language" value="HTML">
                                      <label for="html">Tout compris à 510 euros</label><br>
                                      <input type="radio" id="css" name="fav_language" value="CSS">
                                      <label for="css">Non Skieur à 420 euros</label><br>
                                    <br>
                                    <h1 class="fw-bolder">Location de ski</h1>
            
                                    <label for="name">Sélectionnez votre niveau en ski :</label> <br>
                                      <input type="radio" id="html" name="fav_language" value="HTML">
                                      <label for="html">débutant</label><br>
                                      <input type="radio" id="css" name="fav_language" value="CSS">
                                      <label for="css">moyen</label><br>
                                      <input type="radio" id="javascript" name="fav_language" value="JavaScript">
                                      <label for="javascript">confirmé</label>
                                    <br>
                                    <br>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="name" type="text" placeholder="Enter your name..." data-sb-validations="required" />
                                        <label for="name">Taille</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="name" type="text" placeholder="Enter your name..." data-sb-validations="required" />
                                        <label for="name">Poids</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="name" type="text" placeholder="Enter your name..." data-sb-validations="required" />
                                        <label for="name">Pointure</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="name" type="text" placeholder="Enter your name..." data-sb-validations="required" />
                                        <label for="name" style="color: orange;">Code de Groupe</label>
                                    </div>

                                    
                                    <!-- Submit success message-->
                                    <!---->
                                    <!-- This is what your users will see when the form-->
                                    <!-- has successfully submitted-->
                                    <div class="d-none" id="submitSuccessMessage">
                                        <div class="text-center mb-3">
                                            <div class="fw-bolder">Form submission successful!</div>
                                            To activate this form, sign up at
                                            <br />
                                            <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                                        </div>
                                    </div>
                                    <!-- Submit error message-->
                                    <!---->
                                    <!-- This is what your users will see when there is-->
                                    <!-- an error submitting the form-->
                                    <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error sending message!</div></div>
                                    <!-- Submit Button-->
                                    <div class="d-grid"><button class="btn btn-primary btn-lg" id="submitButton" type="submit">Réserver</button></div>
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
