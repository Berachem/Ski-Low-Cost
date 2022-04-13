<?php

session_start();
unset($_SESSION['id']);
unset($_SESSION['psw']);
unset($_SESSION['code']);
session_destroy();
header('Location: ../connexion.php');



?>