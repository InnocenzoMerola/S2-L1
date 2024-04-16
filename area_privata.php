<?php


include_once __DIR__ . "/includes/init.php";







include __DIR__ . "/includes/initial.php";


?>


<div class="text-center">

    <h1>Area privata</h1>
    <h4>Benvenuto <?= $user['username']?></h4>
    
    <a class="btn btn-danger" href="./logout.php">Disconnetti</a>
</div>
<?php

include __DIR__ . "/includes/end.php";