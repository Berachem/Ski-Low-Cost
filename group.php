<?php

session_start();


function getClientCode($id, $psw,$conn){
    $result = $conn->query("SELECT * FROM login");
    
    while($ligne = $result->fetch()){
        if ($ligne['id']==$id && $ligne['psw'] == $psw){
            return $ligne['code_client'];
        }
    }
    return false;
}


if (isset($_SESSION['id']) && isset($_SESSION['psw'])){
    // si c'est un admin
    if ($_SESSION['id']=='admin' && $_SESSION['psw']=='admin'){
        header('Location: manager.php');
    }
    
}else{
    // si personne ne s'est connecté
    header('Location: connexion.php');
}

include('includes/header.inc.html');
include('connexion.inc.php');


?>
            <!-- Page content-->
            <section class="py-5">
                <div class="container px-5">
                    <!-- Contact form-->
                    <div class="bg-light rounded-3 py-5 px-4 px-md-5 mb-5">
                        <div class="text-center mb-5">
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi  bi-box-arrow-in-down-right"></i></div>
                            <h1 class="fw-bolder">Répartition des clients dans les chambres</h1>
                            <p class="lead fw-normal text-muted mb-0">Répartissez les clients de votre groupe de voyage.
                                <br> Assurez vous que ceux que vous mettrez dans la même chambre s'entendent bien :)</p>
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
                                    <?php
                                        $numgroupe = "SELECT numg FROM appartient WHERE codec = ".$_SESSION['code'];
                                        $membres = $conn->query("SELECT nomc,prenomc FROM clients,appartient WHERE appartient.codec = clients.codec and appartient.numg IN (".$numgroupe.")");
                                        while( $ligne = $membres->fetch(PDO::FETCH_OBJ) ) {
                                            echo '
                                            <div class="form-floating mb-3">
                                            <p>'.$ligne->nomc.' '.$ligne->prenomc.'</p>
                                            Sera assigné dans la chambre : <input type="text" value="245"> 
                                            </div>';
                                        }
                                    ?>
                                    
                                                                        <!-- Name input-->
                                    
                                    
                                    
                                    
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
                                    <div class="d-grid"><button class="btn btn-primary btn-lg" id="submitButton" type="submit">Envoyer</button></div>
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
