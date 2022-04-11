<?php
include('includes/header.inc.html')

?>
<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['psw'])){

    // si c'est un admin
    if ($_SESSION['id']=='admin' && $_SESSION['psw']=='admin'){
        header('Location: manager.php');
    }else{
        // sinon si c'est un client...
        echo 'Salut vous êtes le client : '.$_SESSION['id'].' et le psw='.$_SESSION['psw'];
    }

}

?>

<section class="py-5" id="features">
            <div class="container px-5 my-5">
                <div class="row gx-5">
                    <div class="col-lg-4 mb-5 mb-lg-0"><h2 class="fw-bolder mb-0">Voici les informations vous concernant</h2></div>
                    <div class="col-lg-8">
                        <div class="row gx-5 row-cols-1 row-cols-md-2">
                            <div class="col mb-5 h-100">
                                <div class="feature bg-info bg-gradient text-white rounded-3 mb-3"><i class="bi bi-door-open"></i></div>
                                <h2 class="h5">Votre Chambre</h2>
                                <p class="mb-0">
                                    
                                <?php

                                    echo '234';

                                ?>



                                </p>


                            </div>
                            <div class="col mb-5 h-100">
                                <div class="feature bg-warning bg-gradient text-white rounded-3 mb-3"><i class="bi bi-door-open"></i></div>
                                <h2 class="h5">Votre groupe</h2>
                                <p class="mb-0">
                                <?php

                                        echo "bg de la street";

                                ?>
                                    
                                
                                </p>
                            </div>
                            <div class="col mb-5 mb-md-0 h-100">
                                <div class="feature bg-danger bg-gradient text-white rounded-3 mb-3"><i class="bi bi-calendar"></i></div>
                                <h2 class="h5">date de votre séjour</h2>
                                <p class="mb-0">

                                <?php

                                    echo "01/01/2023 à 08/02/2023";
                                ?>
                                    
                                </p>
                            </div>
                            <div class="col h-100">
                                <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-star"></i></div>
                                <h2 class="h5">formule tout compris</h2>
                                <p class="mb-0">
                                <?php

                                    echo "oui"

                                    ?>
                                



                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        


<?php

include('includes/footer.inc.html')

?>