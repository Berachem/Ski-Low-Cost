<?php

include('includes/header.inc.html');
include('php/connexion.inc.php');

?>
                        <section class="py-5" id="features">
                <div class="container px-5 my-5">
                    <div class="row gx-5">
                        <div class="col-lg-4 mb-5 mb-lg-0"><h2 class="fw-bolder mb-0">Voici quelques statistiques sur la station.</h2></div>
                        <div class="col-lg-8">
                            <div class="row gx-5 row-cols-1 row-cols-md-2">
                                <div class="col mb-5 h-100">
                                    <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-currency-euro"></i></div>
                                    <h2 class="h5">Chiffre d'affaires</h2>
                                    <p class="mb-0">17 570 005 €</p>
                                </div>
                                <div class="col mb-5 h-100">
                                    <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-door-open"></i></div>
                                    <h2 class="h5">Nombre de chambres disponibles</h2>
                                    <p class="mb-0">25 chambres</p>
                                </div>
                                <div class="col mb-5 mb-md-0 h-100">
                                    <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-x-octagon-fill"></i></div>
                                    <h2 class="h5">Nombre de chambres occupées</h2>
                                    <p class="mb-0">112 chambres</p>
                                </div>
                                <div class="col h-100">
                                    <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-people-fill"></i></div>
                                    <h2 class="h5">Nombre de clients dans l'hôtel</h2>
                                    <p class="mb-0">432 personnes</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="py-5" id="features">
                <div class="container px-5 my-5">
                    <div class="row gx-5">
                        <div class="col-lg-4 mb-5 mb-lg-0"><h2 class="fw-bolder mb-0">Chercher des choses spécifiques</h2></div>
                        <div class="col-lg-8">
                            <div class="row gx-5 row-cols-1 row-cols-md-2">
                                <div class="col mb-5 h-100">
                                    <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-currency-euro"></i></div>
                                    <h2 class="h5">Liste des facture de la chambre</h2> <input class="form-control" type="text" name="" value="214">
                                    <p class="mb-0">19/03 : 789 €</p>
                                    <p class="mb-0">12/03 : 1235 €</p>
                                    <p class="mb-0">09/03 : 1235 €</p>
                                </div>
                                <div class="col mb-5 h-100">
                                    <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-door-open"></i></div>
                                    <h2 class="h5">La facture du groupe</h2>
                                    <h2 class="h5">Liste des facture de la chambre</h2> <input class="form-control" type="text" name="" value="G156">
                                    <p class="mb-0">19/03 : 7560 €</p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </section>


             <!-- List-->
             <div class="bg-light rounded-3 py-5 px-4 px-md-5 mb-5">
                <div class="text-center mb-5">
                    <div class="feature bg-info bg-gradient text-white rounded-3 mb-3"><i class="bi bi-person-lines-fill"></i></div>
                    <h1 class="fw-bolder">Liste des clients</h1>
                    <p class="lead fw-normal text-muted mb-0"></p>
                </div>
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-8 col-xl-6">
                            <table id="employee_grid" class="table" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                    <th>Code client</th>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Date de naissance</th>
                                    <th>Adresse</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                        <?php

                        $results=$conn->query('SELECT * FROM clients');

                            
                        // Exécution de la requête SQL
                        while( $ligne = $results->fetch(PDO::FETCH_OBJ) ) {
                        print_r($ligne);
                        echo '

                            <tr>
                            <td>'. $ligne->codec .'</td>
                            <td>'. $ligne->nomc .'</td>
                            <td>'. $ligne->prenomc .'</td>
                            <td>'. $ligne->date_de_naissancec .'</td>
                            <td>'. $ligne->adressec .'</td>


                            <td><div class="btn-group" data-toggle="buttons"><a href="#" target="_blank" class="btn btn-warning btn-xs" rel="noopener">Edit</a><a href="#" target="_blank" class="btn btn-danger btn-xs" rel="noopener">Delete</a><a href="#" target="_blank" class="btn btn-primary btn-xs" rel="noopener">View</a></div></td>
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
                                <label for="name">Code client</label>
                            </div>
                            <div class="form-floating mb-3">
                                <textarea class="form-control" name="" id="" cols="30" rows="15" style="height: 100px;"></textarea>
                                <label for="name">motif de l'expulsion</label>
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
                            <div class="d-grid"><button class="btn btn-danger btn-lg" id="submitButton" type="submit">Expulser</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
        <!-- Footer-->
        <footer class="bg-dark py-4 mt-auto">
            <div class="container px-5">
                <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                    <div class="col-auto"><div class="small m-0 text-white">Copyright &copy; Your Website 2021</div></div>
                    <div class="col-auto">
                        <a class="link-light small" href="#!">Privacy</a>
                        <span class="text-white mx-1">&middot;</span>
                        <a class="link-light small" href="#!">Terms</a>
                        <span class="text-white mx-1">&middot;</span>
                        <a class="link-light small" href="#!">Contact</a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
