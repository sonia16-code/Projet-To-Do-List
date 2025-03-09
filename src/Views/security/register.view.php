<?php
$title = "Inscription";

require_once(__DIR__ . "/../parts/head.php");
?>

<h2 class="mt-3 text-center">Inscription</h2>

<div class="container">

    <form action="/register" method="POST" class=" row d-flex justify-content-center">
        <div class="col-md-7 d-flex justify-content-center">
            <div class="form-floating mb-3 col-md-7">
                <input type="text" class="form-control" id="floatingInput" name="pseudo" placeholder="Pseudo">
                <label for="floatingInput">Pseudo</label>
            </div>
        </div>

        <div class="col-md-7 d-flex justify-content-center">
                <div class="form-floating mb-3 col-md-7">
                        <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                        <?php if(isset($errorInvalidEmail)){
                                echo "<p class='text-danger'>" . $errorInvalidEmail ."</p>";
                        } ?>
                        <label for="floatingInput">Adresse e-mail</label>
                </div>
        </div>

        <div class="col-md-7 d-flex justify-content-center">
                <div class="form-floating col-md-7">
                        <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" autocomplete="off">
                        <?php if(isset($errorPassword)){
                                echo "<p class='text-danger'>" . $errorPassword ."</p>";
                        } ?>
                        <label for="floatingPassword">Mot de passe</label>
                </div>
        </div>

        <div class="text-center">
                <button class="btn btn-secondary  mt-4 ms-1" type="submit">S'inscrire</button>
        </div>
    </form>
</div>


<?php
require_once(__DIR__ . "/../parts/footer.php");
?>