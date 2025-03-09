<?php
$title = "Tâches";

require_once(__DIR__ . "/parts/head.php");
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <?php $pseudo = $_SESSION['user']['pseudo']; ?>
            <h2 class="text-center mt-3">👋 <?= $pseudo ?> - To Do List </h2>
            <a class="btn btn-info btn-block mt-5 mb-5" href="/task-add">Ajouter une tâche</a>
            <h2 class="mt-3">Les tâches à faire :</h2>
            <?php foreach ($tasksList as $task) { ?>
                <div class="card mb-3">
                    <div class="card-header">
                        <h3><?= $task->title ?></h3>
                    </div>
                    <div class="card-body">
                        <p class="card-text"><?= nl2br($task->description) ?></p>
                        <footer class="blockquote-footer">
                            Créer le <?= $task->creation_date ?>
                            <?php if ($task->modification_date) { ?>
                                modifier le <?= $task->modification_date ?>
                            <?php } ?>
                        </footer>
                        <div class="row text-center">
                            <div class="col-md-4">
                                <form action="" method="POST">
                                    <input type="hidden" id="idDone" name="idDone" value="<?= $task->id; ?>">
                                    <button type="submit" class="btn btn-success btn-block">Fini</button>
                                </form>
                            </div>
                            <div class="col-md-4">
                                <a class="btn btn-warning btn-block" href="/task-update?id=<?= $task->id ?>">Modifier</a>
                            </div>
                            <div class="col-md-4">
                                <form action="" method="POST">
                                    <input type="hidden" id="idDelete" name="idDelete" value="<?= $task->id; ?>">
                                    <button type="submit" class="btn btn-danger btn-block">Annuler</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <h2 class="mt-3">Les tâches fini :</h2>
            <?php foreach ($tasksListDone as $task) { ?>
                <div class="card mb-3">
                    <div class="card-header">
                        <h3><?= $task->title ?></h3>
                    </div>
                    <div class="card-body">
                        <p class="card-text"><?= nl2br($task->description) ?></p>
                        <footer class="blockquote-footer">
                            Créer le <?= $task->creation_date ?>
                            <?php if ($task->modification_date) { ?>
                                modifier le <?= $task->modification_date ?>
                            <?php } ?>
                        </footer>
                        <form action="" method="POST">
                            <input type="hidden" id="idDelete" name="idDelete" value="<?= $task->id; ?>">
                            <button type="submit" class="btn btn-danger btn-block">Supprimer</button>
                        </form>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<?php
require_once(__DIR__ . "/parts/footer.php");
?>