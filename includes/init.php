<?php

session_start();
include_once __DIR__ . "/db.php";

// $user_id = $_SESSION['user_id'];

if(isset($_SESSION['user_id'])){
    $stmt = $pdo->prepare('SELECT * FROM users WHERE id = :user_id');
    $stmt->execute([
        'user_id' => $_SESSION['user_id'],
    ]);

    $user = $stmt->fetch();
}
