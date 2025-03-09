<?php
$title = "Tâche";

require_once(__DIR__ . "/../parts/head.php");
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="text-center mt-5">Tâche</h2>
            <form action="" method="POST" class="needs-validation">
                <div class="form-group mt-5">
                    <label for="title">Titre</label>
                    <input type="text" class="form-control" id="title" value="<?php echo isset($myResult) ? $myResult->title : '' ?>" name="title" required>
                    <div class="invalid-feedback">Veuillez saisir un titre.</div>
                </div>
                <div class="form-group mt-5">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="5" cols="40" required><?php echo isset($myResult) ? $myResult->description : '' ?></textarea>
                    <div class="invalid-feedback">Veuillez saisir une description.</div>
                </div>
                <button type="submit" class="btn btn-primary btn-block mt-5"><?php echo isset($myResult) ? "Modifier" : "Créer" ?></button>
            </form>
            <?php if (isset($error)) {
                echo "<p class='text-danger'>" . $error . "</p>";
            } ?>
        </div>
    </div>
</div>

<?php
require_once(__DIR__ . "/../parts/footer.php");
?>