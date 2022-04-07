<?php

if (isset($_POST['id']) && isset($_POST['psw'])){
    // si dans la BDD...
    echo 'Salut vous êtes le client : '.$POST['id'].' et le psw='.$POST['psw'];
}

?>