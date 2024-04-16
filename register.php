<?php

include_once __DIR__ . "/includes/init.php";

if(isset($_SESSION['loggato']) && $_SESSION['loggato'] === true){
    header('Location: /IFOA-BackEnd/S-2/S2-L1/index.php');
    exit();
};

$username = $_POST['username'] ?? '';
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';
$image = $_POST['image'] ?? '';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    
    $errors = [];


    if($errors === []){
        $stmt = $pdo->prepare('INSERT INTO users (username, email, password, image) VALUE (:username, :email, :password, :image)');
        $stmt->execute([
            'username' => $username,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'image' => $image,
        ]);
        
    }
    
    header('Location: /IFOA-BackEnd/S-2/S2-L1/index.php');
    exit();
}



include_once __DIR__ . "/includes/initial.php"

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
            <label for="email" class="form-label">Email</label>
            <input type="email" value="<?= $email?>" name="email" class="form-control <?= isset($errors['email']) ? 'is-invalid' : ''?>" id="email" >
            <?= $errors['email'] ?? "" ?>
          </div>
            
          <div class="col-12">
            <label for="password" class="form-label">Password</label>
              <input type="password" name="password" value="" class="form-control <?= isset($errors['password']) ? 'is-invalid' : "" ?>" id="password" >
              <?= $errors['password'] ?? ""?>
          </div>

          <div class="col-12">
            <label for="image" class="form-label">Immagine del profilo</label>
              <input type="text" name="image" value="<?= $image?>" class="form-control <?= isset($errors['image']) ? 'is-invalid' : "" ?>" id="image" >
              <?= $errors['image'] ?? ""?>
          </div>
        

          <div class="col-12 mt-3">
            <button class="btn btn-primary" type="submit">
                Registrati
            </button>
          </div>
        </div>
      </form> 
    </div>
  </div>
</div>

<?php

include_once __DIR__ . "/includes/end.php";