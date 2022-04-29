<?php
session_start();



if (isset($_SESSION['id']) && isset($_SESSION['psw'])){ // s'il est déjà connecté, pas besoin de le reconnecter... On le redirige
    // si c'est un admin
    if ($_SESSION['id']=='admin' && $_SESSION['psw']=='admin'){
        header('Location: ../manager.php');
    }else{
        // sinon si c'est un client...
        header('Location: ../reserver.php');
    }
}

include('includes/header.inc.html')

?>

            <!-- Page content-->
            <section class="py-5">
                <div class="container px-5">
                    <!-- Contact form-->
                    <div class="bg-light rounded-3 py-5 px-4 px-md-5 mb-5">
                        <div class="text-center mb-5">
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-person-fill"></i></div>
                            <h1 class="fw-bolder">Se connecter </h1>
                            <p class="lead fw-normal text-muted mb-0"></p>
                        </div>

                        
                        <div class="row gx-5 justify-content-center">
                                    <?php
                                        if (isset($_GET["error"]) && $_GET["error"]=='1'){
                                            echo '<div class="alert alert-danger" role="alert" style="width:70%;">
                                            Login incorrect :/ (Si vous n avez pas de compte, créez en ...)
                                          </div>';
                                        }
                                        if (isset($_GET["newAccount"]) && $_GET["newAccount"]=='1'){
                                            echo '<div class="alert alert-success" role="alert" style="width:70%;">
                                            Compte créé avec succès ! :)
                                          </div>';
                                        }

                                    ?>
                            <div class="col-lg-8 col-xl-6">

                                <form id="Form" method="POST" action="php/clientconnect.php">
                                    <!-- Name input-->
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="name" name='id' type="text" placeholder="Enter your name..." data-sb-validations="required" />
                                        <label for="id">Identifiant</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="name" name="psw" type="password" placeholder="Enter your name..." data-sb-validations="required" />
                                        <label for="psw">Mot de passe</label>
    
                                    </div>
                                    <!-- Submit Button-->
                                    <div class="d-grid"><button class="btn btn-primary btn-lg" id="Button" type="submit">Connexion</button></div>
                                    
                                    <br>
                                              
                                </form>
                                <a href="creercompte.php"> <div class="d-grid"><button class="btn btn-secondary btn-lg"  >Créer un compte</button></div></a>
                            
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
<?php

include('includes/footer.inc.html')

?>
