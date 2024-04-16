<?php

include __DIR__ . "/includes/is_logged.php";

$_SESSION = [];

session_destroy();

header('Location: /IFOA-BackEnd/S-2/S2-L1/index.php');
exit();