<?php
 
include_once __DIR__ . "/init.php";


if(!isset($_SESSION['loggato']) || $_SESSION['loggato'] !== true){
    header('Location /IFOA-BackEnd/S-2/S2-L1/login.php');
    exit();
};
?>