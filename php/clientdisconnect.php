<?php

session_start();
unset($_SESSION['id']);
unset($_SESSION['psw']);
session_destroy();
header('Location: ../index.php');



?>