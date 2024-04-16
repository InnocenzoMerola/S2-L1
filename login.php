<?php
include_once __DIR__ . "/includes/init.php";

if(isset($_SESSION['loggato']) && $_SESSION['loggato'] === true){
    header('Location: /IFOA-BackEnd/S-2/S2-L1/index.php');
    
    exit();
};

$username = $_POST['username'] ?? '';

$password = $_POST['password'] ?? '';


if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $errors = [];



    if($errors === []){
        $stmt = $pdo->prepare('SELECT * FROM users WHERE username = :username');
        $stmt->execute([
            'username' => $username,
        ]);

        $user = $stmt->fetch();

        if($user){
            if(password_verify($password, $user['password'])){
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['loggato'] = true;
                
                header('Location: /IFOA-BackEnd/S-2/S2-L1/area_privata.php');
                exit();
            }
        }
    }

    $errors['dati'] = "Nome utente o password non corretti";
}



include __DIR__ . "/includes/initial.php";
?>


<div class="row justify-content-center">
    <div class="col-5">
      <form action="" method="post" novalidate>
        <div class="row row-gap-2">
          <div class="col-12">
            <label for="username" class="form-label">Username</label>
            <input type="text" value="<?= $username;?>" name="username" class="form-control <?= isset($errors['username']) ? 'is-invalid' : ''?>" id="username" >
            <?= $errors['username'] ?? "" ?>
          </div>

            
          <div class="col-12">
            <label for="password" class="form-label">Password</label>
              <input type="password" name="password" value="" class="form-control <?= isset($errors['password']) ? 'is-invalid' : "" ?>" id="password" >
              <?= $errors['password'] ?? ""?>
          </div>

          <div class="col-12 mt-3">
            <button class="btn btn-primary" type="submit">
                Accedi
            </button>
          </div>
        </div>
      </form> 
    </div>
  </div>
</div>

<?php

include __DIR__ . "/includes/end.php";