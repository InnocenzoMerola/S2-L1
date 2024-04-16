<?php


include_once __DIR__ . "/includes/init.php";







include __DIR__ . "/includes/initial.php";


?>



<h1 class="text-center">Area privata</h1>
<h4>Benvenuto <?= $user['username']?></h4>

<a href="./logout.php">Disconnetti</a>
<?php

include __DIR__ . "/includes/end.php";