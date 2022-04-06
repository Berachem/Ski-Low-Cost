<?php

include('includes/header.inc.html')

?>

            <!-- Page content-->
            <section class="py-5">
                <div class="container px-5">
                    <!-- Contact form-->
                    <div class="bg-light rounded-3 py-5 px-4 px-md-5 mb-5">
                        <div class="text-center mb-5">
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-person-fill"></i></div>
                            <h1 class="fw-bolder">Se connecter</h1>
                            <p class="lead fw-normal text-muted mb-0"></p>
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
                                <form id="contactForm" method="POST" action="php/clientconnect.php">
                                    <!-- Name input-->
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="name" for='id' type="text" placeholder="Enter your name..." data-sb-validations="required" />
                                        <label for="id">Identifiant</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="name" for='psw' type="password" placeholder="Enter your name..." data-sb-validations="required" />
                                        <label for="psw">Mot de passe</label>
    
                                    </div>
                                    <!-- Submit Button-->
                                    <div class="d-grid"><button class="btn btn-primary btn-lg" id="submitButton" type="submit">Connexion</button></div>
                                    
                                    <br>
                                    
                                    
                                    <!-- Submit error message-->
                                    <!---->
                                    <!-- This is what your users will see when there is-->
                                    <!-- an error submitting the form-->
                                    <?php
                                        if (isset($_GET["error"])){
                                            echo '
                                            <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">
                                            Login incorrect :/
                                            </div></div>

                                            ';
                                        }

                                    ?>
                                    
                                   
                                </form>
                                <a href="createaccount.php"> <div class="d-grid"><button class="btn btn-secondary btn-lg" id="createAccount" >Créer un compte</button></div></a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
<?php

include('includes/footer.inc.html')

?>
