<?php
$title = "Connexion";


require_once(__DIR__ . "/../parts/head.php");
?>

<?php
    if(isset($_SESSION['status'])){
        ?>

            <div class="alert alert-dismissible alert-danger">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <div class="text-center">
                    <strong>Oh snap!</strong> <?php echo $_SESSION['status']; ?>
                </div>
            </div>
        <?php
        unset($_SESSION['status']);
    }
?>




<h2 class="mt-4 text-center">Se connecter</h2>

<div class="container">
        <form action="login" method="POST" class="row d-flex justify-content-center">
                <div class="col-md-7 d-flex justify-content-center">
                        <div class="form-floating mb-3 col-md-7">
                                <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                                <?php if(isset($errorInvalidEmailLogin)){
                                        echo "<p class='text-danger'>" . $errorInvalidEmailLogin ."</p>";
                                } ?>
                                <label for="floatingInput">Adresse e-mail</label>
                        </div>
                </div>

                <div class="col-md-7 d-flex justify-content-center">
                        <div class="form-floating col-md-7">
                                <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" autocomplete="off">
                                <?php if(isset($errorInvalidLogin)){
                                        echo "<p class='text-danger'>" . $errorInvalidLogin ."</p>";
                                } ?>
                                <label for="floatingPassword">Mot de passe</label>
                        </div>
                </div>

                <div class="text-center">
                        <button type="submit" class="btn btn-secondary mt-4 ms-1">Connexion</button>
                </div>
        </form>
</div>


<?php
require_once(__DIR__ . "/../parts/footer.php");
?>